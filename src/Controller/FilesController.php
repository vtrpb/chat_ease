<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Filesystem\File;

/**
 * Files Controller
 *
 * @property \App\Model\Table\FilesTable $Files
 *
 * @method \App\Model\Entity\File[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class FilesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [            
        ];
        $files = $this->paginate($this->Files);

        $this->set(compact('files'));
    }

    public function userFiles($userId = null)
    {
        $usersTable = TableRegistry::getTableLocator()->get('Users');        

        $user       = $usersTable->get($userId);

        $this->paginate = [            
             'conditions' => [
                'Files.table_name' => 'users',
                'Files.table_pk' => $userId
              ]
        ];

        $files = $this->paginate($this->Files);

        $this->set(compact('files','user'));
    }

    public function truckFiles($truckId = null)
    {
        $truckTable = TableRegistry::getTableLocator()->get('Trucks');        

        $truck      = $truckTable->get($truckId);

        $this->paginate = [            
             'conditions' => [
                'Files.table_name' => 'trucks',
                'Files.table_pk' => $truckId
              ]
        ];

        $files = $this->paginate($this->Files);

        $this->set(compact('files','truck'));
    }

    public function download($hash) 
    {
        $file = $this->Files->findByHash($hash)->firstOrFail();
        
        $filePath = WWW_ROOT . '/files/'.$file->table_name.'/' . $file->hash . '.' .$file->type;

        $filePath = str_replace('//', '/', $filePath);        

        if (file_exists($filePath)) {
            $this->response = $this->response->withFile($filePath, ['download' => false, 'name' => $file->name]);

        } else {
            // Trate o caso em que o arquivo não existe ou houve um erro
            $this->Flash->error(__('O arquivo não foi encontrado.'));
            return $this->redirect($this->referer());
        }

        return $this->response;
    }


    /**
     * View method
     *
     * @param string|null $id File id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $file = $this->Files->get($id, [
            'contain' => ['Users']
        ]);

        $this->set('file', $file);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add($tableName=null, $pkId=null)
    {
        $registryTable = TableRegistry::getTableLocator()->get($tableName);        

        $file = $this->Files->newEntity();

        $table = $registryTable->get($pkId);

        if ($this->request->is('post')) {

            $data = $this->request->getData();

            $uploadedFile = $this->request->getData('file');
            
            if ($uploadedFile && $uploadedFile['error'] === UPLOAD_ERR_OK) {

                $originalFilename = $uploadedFile['name'];
                $fileExtension    = pathinfo($originalFilename, PATHINFO_EXTENSION);
                $uploadPath       = WWW_ROOT . 'files' . DS . strtolower($tableName) . DS;
                $filename         = $uploadedFile['name'];
                $hash             = md5_file($uploadedFile['tmp_name']);
                $targetPath       = $uploadPath . $hash . '.' . $fileExtension;

                $file->table_name = strtolower($tableName);
                $file->table_pk   = $pkId;
                $file->path       = $uploadPath; // Atualize o caminho para a pasta de destino
                $file->type       = $fileExtension;
                $file->comment    = $originalFilename;
                $file->date       = date('Y-m-d');
                $file->hash       = $hash ; // Gere um hash único para o arquivo usando md5_file()
                $file->comment    = '';
                $file->created    = date('Y-m-d H:i:s');
                $file->modified   = date('Y-m-d H:i:s');

                move_uploaded_file($uploadedFile['tmp_name'], $targetPath);

            } else {
                throw new \Exception('Erro ao fazer upload do arquivo.');
            }                     

            if ($this->Files->save($file)) {

                $this->Flash->success(__('O arquivo foi salvo com sucesso.'));

                if ($tableName == 'Users')  {
                    return $this->redirect(['action' => 'UserFiles',$pkId]);

                }
                else if ($tableName == 'Trucks')  {
                    return $this->redirect(['action' => 'TruckFiles',$pkId]);
                }

                
            }

            $this->Flash->error(__('Não foi possível salvar o arquivo. Por favor, tente novamente.'));
        }

        $this->set(compact('file','tableName','table'));

        $this->set('_serialize', ['file']);
    }

    /**
     * Edit method
     *
     * @param string|null $id File id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $file = $this->Files->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $file = $this->Files->patchEntity($file, $this->request->getData());
            if ($this->Files->save($file)) {
                $this->Flash->success(__('The file has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The file could not be saved. Please, try again.'));
        }
        $users = $this->Files->Users->find('list', ['limit' => 200]);
        $this->set(compact('file', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id File id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);

        $file = $this->Files->get($id);

        if ($this->Files->delete($file)) {

            $this->Flash->success(__('Arquivo excluído com sucesso!'));

        } else {
            
            $this->Flash->error(__('O arquivo não pode ser excluído! Tente novamente!'));
        }

        return $this->redirect($this->referer());
    }    
   
    /*public function uploadUserDocs()
    {
        $this->autoRender = false;

        if ($this->request->is(['post','delete']) ) {

            $uploadedFile  = $this->request->getData('file');
            $userId        = $this->request->getData('user_id');

            // Calcular o hash SHA256 do arquivo
            $fileObject = new File($uploadFile);
            $hash       = hash_file('sha256', $fileObject->path);
            
            // salva a imagem no banco de dados
            //debug('entrou'); 
            $file = $this->Files->newEntity();

            $filename   = $uploadedFile->getClientFilename();
            $fileType   = $uploadedFile->getClientMediaType();
            $uploadPath = 'uploads/files/users';
            $uploadFile = $uploadPath . $hash;

            // Mover o arquivo para a pasta de destino
            $uploadedFile->moveTo($uploadFile);

            // Preencher os campos adicionais
            $data['path'] = $uploadFile;
            $data['type'] = $fileType;
            $data['date'] = date('Y-m-d');
            $data['hash'] = $hash;
            $data['comment'] = !empty($data['comment']) ? $data['comment'] : null;

            $data['table_name'] = 'users';
            $data['table_id'] = $userId;

            $this->Files->save($file);            
        }
    }*/
}
