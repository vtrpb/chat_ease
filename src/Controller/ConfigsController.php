<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Configs Controller
 *
 * @property \App\Model\Table\ConfigsTable $Configs
 *
 * @method \App\Model\Entity\Config[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ConfigsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users']
        ];
        $configs = $this->paginate($this->Configs);

        $this->set(compact('configs'));
    }

    /**
     * View method
     *
     * @param string|null $id Config id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $config = $this->Configs->get($id, [
            'contain' => ['Users']
        ]);

        $this->set('config', $config);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $session      = $this->request->getSession();
        $user_type_id = $session->read('Users.user_type_id'); 
        $user_id      = $session->read('Users.id'); 

        $config = $this->Configs->newEntity();

        if ($this->request->is('post')) {

            $config = $this->Configs->patchEntity($config, $this->request->getData());

            if ($this->Configs->save($config)) {
                $this->Flash->success(__('Configuração adicionada com sucesso!'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('A configuração não pode ser salva!'));
        }

        if ($user_type_id == 1)  { // Perito(a)
            $users = $this->Configs->Users->find('list', ['conditions' => ['Users.id' => $user_id] ]);    
        }
        if ($user_type_id == 2)  { // Admin
            $users = $this->Configs->Users->find('list',['conditions' => ['Users.user_type_id' => 1] ]);    
        }        

        $this->set(compact('config', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Config id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($user_id = null)
    {
        $session      = $this->request->getSession();
        $user_id      = $session->read('Users.id'); 
        $user_type_id = $session->read('Users.user_type_id'); 

        $config_user = $this->Configs->find('list',['conditions'=>['Configs.user_id'=>$user_id]])->first();

        //debug($config_user) or die();

        $config = $this->Configs->get($config_user, [
            'contain' => [],
        ]);

        if ($this->request->is(['patch', 'post', 'put'])) {

            $config = $this->Configs->patchEntity($config, $this->request->getData());

            if ($this->Configs->save($config)) {
                $this->Flash->success(__('Configurações salvas com sucesso!'));

                return $this->redirect(['action' => 'edit',$user_id]);
            }

            $this->Flash->error(__('As configurações não poderam ser salvas, tente novamente!'));
        }
        
        if ($user_type_id == 1) // Perito 
            $users = $this->Configs->Users->find('list', ['conditions' => ['Users.id' => $user_id] ]);
        if ($user_type_id == 2) // Admin
            $users = $this->Configs->Users->find('list');

        $this->set(compact('config', 'users'));        
    }

    /**
     * Delete method
     *
     * @param string|null $id Config id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $config = $this->Configs->get($id);
        if ($this->Configs->delete($config)) {
            $this->Flash->success(__('Configurações deletadas com sucesso!'));
        } else {
            $this->Flash->error(__('As configurações não poderam ser deletadas!'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
