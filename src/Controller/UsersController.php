<?php
namespace App\Controller;

use App\Controller\AppController;

use Cake\ORM\TableRegistry;

use Cake\Datasource\ConnectionManager;

use Cake\Auth\DefaultPasswordHasher;

use Cake\Filesystem\File;

use Cake\Mailer\Email;

use Cake\Log\Log;


/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $session            = $this->request->session();
        $user_id            = $session->read('Users.id');
        $user_role          = $session->read('Users.role'); 
        $users_search_str   = $session->read('Users.search_str');                                 

        if ($user_role == 'admin' )  {
            $this->paginate = [
                'contain' => ['Files'],
                'conditions'=>['Users.name ILIKE'=>$users_search_str]
            ];
        }        
        if ($user_role == 'editor' )  {
            $this->paginate = [
                'contain' => ['Files'],
                'conditions'=>['Users.name ILIKE'=>$users_search_str]
            ];
        }        
        if ($user_role == 'validador' )  {
            $this->paginate = [
                'contain' => ['Files'],
                'conditions'=>['Users.id'=>$user_id,'Users.name ILIKE'=>$users_search_str]
            ];
        }        
        else if ($user_role == 'representante') {
            $this->paginate = [
                'contain' => ['Files'],
                'conditions'=>['Users.id'=>$user_id,'Users.name ILIKE'=>$users_search_str]
            ];
        }

        else if ($user_role == 'individual' )  {
            $this->paginate = [
                'contain' => ['Files'],
                'conditions'=>['Users.id'=>$user_id,'Users.name ILIKE'=>$users_search_str]
            ];
        }
        else if ($user_role == 'lojista' )  {
            $this->paginate = [
                'contain' => ['Files'],
                'conditions'=>['Users.id'=>$user_id,'Users.name ILIKE'=>$users_search_str]
            ];
        }

        if ($this->request->is('post')) {

            $search_str  = '%'.$this->request->data['search'].'%';                       
                   
            $session->write('Users.search_str',$search_str);             

            return $this->redirect(['action' => 'index']);                      
        }  
        
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Permissions'=>['Users','Roles']]
        ]);

        $this->set('user', $user);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEntity();

        if ($this->request->is('post')) {

            $user = $this->Users->patchEntity($user, $this->request->getData());

            $user->active = true; 
            $user->otp    = '';
            $user->status = 'ativo';

            if ($this->Users->save($user)) {

                $this->Flash->success(__('Usuário salvo com sucesso!'));

                return $this->redirect(['action' => 'index']);
            }
            debug($user->errors()) or die();

            $this->Flash->error(__('Usuário não pode ser salvo, tente novamente!'));
        }
        $this->set(compact('user'));
    }

    /**
     * Register method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
   /* public function register()
    {
        $this->viewBuilder()->setLayout('register');

        $connection       = ConnectionManager::get('default');

        $permissionsTable = TableRegistry::get('Permissions');                
        $filesTable       = TableRegistry::get('Files');                

        $user       = $this->Users->newEntity();
        $permission = $permissionsTable->newEntity();
        $file       = $filesTable->newEntity();

        if ($this->request->is('post')) {

            $user = $this->Users->patchEntity($user, $this->request->getData());
            $file = $filesTable->patchEntity($file, $this->request->getData());

            $connection->begin();

            $user->active = true; 
            $user->otp    = '';
            $user->status = 'ativo';

           try {
                if ($savedUser = $this->Users->save($user)) {
                    $file->table_name = 'users';
                    $file->table_pk   = $savedUser->id;
                    $file->path       = 'docs/pdfs'; // Defina o caminho onde o arquivo será armazenado
                    $file->type       = 'pdf'; // O tipo de arquivo é PDF
                    $file->date       = date('Y-m-d');
                    $file->hash       = ''; // Gere um hash único para o arquivo, por exemplo, usando md5()
                    $file->comment    = ''; // Adicione um comentário, se necessário
                    $file->created    = date('Y-m-d H:i:s');
                    $file->modified   = date('Y-m-d H:i:s');
                }

                // Permissions
                $permission->user_id = $user->id;
                if (!is_null($user->cnpj))  {
                    $permission->role_id = 6; // "individual"    
                }
                else  {
                    $permission->role_id = 5; // "lojista"       
                }
                //

                $permissionsTable->save($permission);
                $filesTable->save($file);                
                    
                $userErrors = $user->getErrors();
                $permissionErrors = $permission->getErrors();
                $fileErrors = $file->getErrors();

                // Imprime os erros
                debug($userErrors);
                debug($permissionErrors);
                debug($fileErrors) or die();
                
                $connection->commit();

                $this->Flash->success(__('Usuário salvo com sucesso!'));

                return $this->redirect(['action' => 'login']);
                //return $this->redirect(['controller'=>'Files','action' => 'addUserFiles']);

            } catch (\Exception $e) {
                $connection->rollback();
                debug('Exceção: ' . $e->getMessage()) or die(); // Adicione esta linha
                //$this->Flash->error(__('Usuário não pode ser salvo, tente novamente!'));
            }

            
        }

        $this->set(compact('user'));
    }*/

    public function register()
    {
        $this->viewBuilder()->setLayout('register');

        $user = $this->Users->newEntity();

        if ($this->request->is('post')) {

             // Adicione esta linha para obter o arquivo PDF enviado
            $uploadedFile = $this->request->getData('file');

            $uniquecode = substr(md5(microtime()),0,10); 
            //$randomKey  = substr(md5(microtime()),0,10);              

            $user = $this->Users->patchEntity($user, $this->request->getData());

            $permissionsTable = TableRegistry::getTableLocator()->get('Permissions');
            $filesTable       = TableRegistry::getTableLocator()->get('Files');

            $permission = $permissionsTable->newEntity();
            $file       = $filesTable->newEntity();

            $connection = ConnectionManager::get('default');

            $connection->begin();            

            $user->active = true; 
            $user->otp    = $uniquecode;
            $user->status = 0;

            //$this->checkDir(WWW_ROOT . DS . 'docs/pdfs'); 

            try {

                if ($savedUser = $this->Users->save($user)) {

                     if ($uploadedFile && $uploadedFile['error'] === UPLOAD_ERR_OK) {

                        $originalFilename = $uploadedFile['name'];
                        $fileExtension    = pathinfo($originalFilename, PATHINFO_EXTENSION);
                        $uploadPath = WWW_ROOT . 'files' . DS . 'users' . DS;
                        $filename   = $uploadedFile['name'];
                        $hash       = md5_file($uploadedFile['tmp_name']);
                        $targetPath = $uploadPath . $hash . '.' . $fileExtension;
                      
                        $file->table_name = 'users';
                        $file->table_pk   = $user->id;
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
               
                    $permission->user_id = $user->id;
                    $permission->role_id = is_null($user->cnpj) ? 6 : 5;
                }

                if (!$savedUser || !$permissionsTable->save($permission) || !$filesTable->save($file)) {

                    $userErrors = $user->getErrors();
                    $permissionErrors = $permission->getErrors();
                    $fileErrors = $file->getErrors();

                    // Imprime os erros
                    debug($userErrors);
                    debug($permissionErrors);
                    debug($fileErrors);
                    throw new \Exception('Não foi possível salvar as entidades.');
                }
                
                if ($this->sendConfirmationEmail($user) )  {

                    $this->sendNewUserNotificationEmail($user);

                    $this->Flash->success(__('Sua conta foi criada com sucesso! Por favor verifique seu email para ativar sua conta.'));
                }
                else {

                    $this->Flash->error(__('Cadastro realizado, porém não foi possível enviar o email de ativação!'));                          
                }
             
                $connection->commit();

                $this->Flash->success(__('Usuário, arquivo e permissão salvos com sucesso!'));

                return $this->redirect(['controller'=>'Site','action' => 'registrationCompleted']);

            } catch (\Exception $e) {

                $connection->rollback();

                $this->Flash->error(__('Não foi possível salvar os dados: ' . $e->getMessage()));
            }
        }

        $this->set(compact('user'));
    }
    
    public function sendConfirmationEmail($user)
    {
        $email = new Email('default');
        $email
            ->to($user->email)
            ->subject('Confirmação de conta')
            ->emailFormat('html')
            ->template('confirmation')
            ->viewVars(['user' => $user]);

        if ($email->send()) {
            return true;
        } else {
            return false;
        }
    }

    public function sendForgotPasswordEmail($user,$uniquecode)
    {
        $email = new Email('default');
        $email
            ->to($user->email)
            ->subject('Recuperação de Senha')
            ->emailFormat('html')
            ->template('forgotPassword')
            ->viewVars(['user' => $user,'uniquecode'=>$uniquecode]);

        if ($email->send()) {
            return true;
        } else {
            return false;
        }
    }

    public function sendNewUserNotificationEmail($user)
    {
        $email = new Email('default');
        $email
            ->to(['suporte@truckzone.com.br', 'viniciustrocha@gmail.com'])
            ->subject('Novo usuário cadastrado no Truck Zone')
            ->emailFormat('html')
            ->template('newUser')
            ->viewVars(['user' => $user]);

        if ($email->send()) {
            return true;
        } else {
            return false;
        }
    }

    public function activate($uniquecode='') 
    {
       if(trim($uniquecode)!="") {

         $uniquecode = filter_var($uniquecode, FILTER_SANITIZE_STRING);

         $user = $this->Users->find('all',['conditions'=> ['otp'=> $uniquecode,'status' => 0]])->first(); 

         if($user) {
           
           $this->Users->updateAll(['status'=> 1, 'otp'=> ''], ['id' => $user->id]);           

           $this->Flash->success(__('Sua conta foi ativada com sucesso! Faça login.'));

           return $this->redirect(['action' => 'login']);

         }
       }
       else  {
           return $this->redirect(['action' => 'login']);
       }

    }      

    public function forgotPassword($id = 0) 
    {

      $this->viewBuilder()->setLayout('login');
      $this->Flash->warning(__('ATENÇÃO: Um nova senha será criada e enviada para seu email cadastrado.'));

      try {                   

                if ($this->request->is(['patch', 'post', 'put'])) {                 

                    $email = $this->request->data['email'];

                    $user  = $this->Users->find('all',['conditions'=> ['email'=> $email]])->first();               

                    if($user) {                                                

                        $uniquecode = substr(md5(microtime()),0,10); 

                        $newPassword = new DefaultPasswordHasher();                        

                        $updatePassword  = $this->Users->updateAll(['password'=> $newPassword->hash($uniquecode)], ['id'=> $user->id]);

                        if ($updatePassword)  {                            

                            if ($this->sendForgotPasswordEmail($user,$uniquecode)) {
                                $this->Flash->success(__('Nova senha gerada com sucesso! Sua nova senha foi enviada para seu email.'));
                                return $this->redirect(['action' => 'login']);
                            }
                            else {
                                $this->Flash->error(__('Não conseguimos lhe enviar a nova senha por email.'));
                                return $this->redirect(['action' => 'login']);
                            }

                        }
                        else  {

                            $this->Flash->error(__('Não foi possível resetar sua senha!'));
                            return $this->redirect(['action' => 'login']);
                        }                        
                    }
                    else  {

                        $this->Flash->error(__('Não encontramos nenhum usuário com esse email.'));
                        return $this->redirect(['action' => 'login']);
                    }

                }

        }
        catch (\Exception $e) {
            $this->Flash->error($e->getMessage());
            return $this->redirect(['action' => 'login']);
        } 
        
    }  


    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);        

        if ($this->request->is(['patch', 'post', 'put'])) {          


            $user = $this->Users->patchEntity($user, $this->request->getData());


            if ($this->request->data['new_password'] != '')  {

                $actual_password = new DefaultPasswordHasher();  
             
                if ((new DefaultPasswordHasher)->check($this->request->data['actual_password'], $user->password)) {

                    if($this->request->data['new_password'] == $this->request->data['con_new_password']) {

                        $new_password = new DefaultPasswordHasher;

                        if($this->Users->updateAll(['password'=> $new_password->hash($this->request->data['new_password'])], ['id'=> $id]) )  {
                            $this->Flash->success(__('Senha alterada com sucesso!'));
                        }
                    }
                }             
            }

            if ($this->Users->save($user)) {

                $this->Flash->success(__('Usuário modificado com sucesso!'));

                return $this->redirect(['action' => 'index']);
            }

            $this->Flash->error(__('O usuário não pode ser modificado! Tente novamente!'));
        }

        $this->set(compact('user'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);

        $user = $this->Users->get($id);

        if ($this->Users->delete($user)) {

            $this->Flash->success(__('Usuário excluído com sucesso!'));

        } else {

            $this->Flash->error(__('O usuário não pode ser excluído, tente novamente!'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function login()
    {
        $this->viewBuilder()->setLayout('login');
        
        if ($this->request->is('post')) {

            $user = $this->Auth->identify();

            $this->getRequest()->getSession()->destroy();

            if ($user && ($user['status'] == '1') ) {

                $this->Auth->setUser($user);

                $session = $this->request->session();

                $session->write('Users.id'           ,$this->Auth->user('id'));
                $session->write('Users.username'     ,$this->Auth->user('email'));
                $session->write('Users.name'         ,$this->Auth->user('name'));                                
                $session->write('Users.cpf'          ,$this->Auth->user('cpf'));
                $session->write('Users.mobile_number',$this->Auth->user('mobile_number'));
                $session->write('Users.email'        ,$this->Auth->user('email'));
                $session->write('Ads.search_str'     ,'%');
                $session->write('Users.search_str'     ,'%');
                $session->write('Trucks.search_str'  ,'%');

                return $this->redirect(['controller' => 'Permissions','action' => 'selectRole']);                    

                //return $this->redirect($this->Auth->redirectUrl());
            } 
            else if ($user && $user['status'] == '0')  {
                $this->Flash->warning(__('Foi enviado um email de confirmação para você. É necessário clicar no link de confirmação de email para ativar sua conta! Verifique seu email.'));
            }            
            else  {
                $this->Flash->error(__('Usuário ou senha inválidas! Tente novamente!'));
            }            
        }
    }

    public function logout()
    {
        $session = $this->request->session();

        $session->destroy();
        
        return $this->redirect($this->Auth->logout());
    }
}
