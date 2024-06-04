<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Datasource\ConnectionManager;

/**
 * Permissions Controller
 *
 * @property \App\Model\Table\PermissionsTable $Permissions
 *
 * @method \App\Model\Entity\Permission[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PermissionsController extends AppController
{  
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'Roles']
        ];
        
        $permissions = $this->paginate($this->Permissions);        

        $this->set(compact('permissions'));
    }

    /**
     * View method
     *
     * @param string|null $id Permission id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $permission = $this->Permissions->get($id, [
            'contain' => ['Users', 'Roles']
        ]);

        $this->set('permission', $permission);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $permission = $this->Permissions->newEntity();

        if ($this->request->is('post')) {

            $permission = $this->Permissions->patchEntity($permission, $this->request->getData());

            //debug($permission) or die();

            if ($this->Permissions->save($permission)) {

                $this->Flash->success(__('Permissão salva com sucesso!'));

                return $this->redirect(['action' => 'index']);
            }

            $this->Flash->error(__('A permissão não pode ser salva, por favor tente novamente!'));
        }

        $users = $this->Permissions->Users->find('list', ['limit' => 1000]);

        $roles = $this->Permissions->Roles->find('list', ['limit' => 1000]);

        $this->set(compact('permission', 'users', 'roles'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Permission id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $permission = $this->Permissions->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $permission = $this->Permissions->patchEntity($permission, $this->request->getData());
            if ($this->Permissions->save($permission)) {
                $this->Flash->success(__('Permissão editada com sucesso!'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('A permissão não pode ser editada, por favor tente novamente!'));
        }
        $users = $this->Permissions->Users->find('list', ['limit' => 200]);
        $roles = $this->Permissions->Roles->find('list', ['limit' => 200]);
        $this->set(compact('permission', 'users', 'roles'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Permission id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $permission = $this->Permissions->get($id);
        if ($this->Permissions->delete($permission)) {
            $this->Flash->success(__('Permissão deletada com sucesso!'));
        } else {
            $this->Flash->error(__('A permissão não pode ser deletada, por favor tente novamente!'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function selectRole()  {

        $session             = $this->request->getSession();
        $user_id             = $session->read('Users.id');

        $this->paginate = [
            'contain' => ['Users', 'Roles'],
            'conditions' => ['Permissions.user_id' => $user_id]
        ];
        
        $permissions = $this->paginate($this->Permissions);

        if (count($permissions) == 1)  {
            foreach ($permissions as $permission)  {
                return $this->redirect(['controller' => 'Permissions','action' => 'selectedRole',$permission->role->alias]);
            }
        }

        $this->set(compact('permissions'));

    }
    public function selectedRole($role_alias=null)  {

        $session = $this->request->session();
        $user_id = $session->read('Users.id');

        $session->write('Users.role',$role_alias);
        $session->write('Ads.search_str','%');
        $session->write('Trucks.search_str','%');

        if ($role_alias == 'admin')  {
            return $this->redirect(['controller' => 'Users','action' => 'index']);                    
        }
        if ($role_alias == 'editor')  {
            return $this->redirect(['controller' => 'Ads','action' => 'index']);                    
        }
        if ($role_alias == 'validador')  {
            return $this->redirect(['controller' => 'Ads','action' => 'index']);                    
        }
        if ($role_alias == 'representante')  {
            return $this->redirect(['controller' => 'Ads','action' => 'index']);                    
        }
        if ($role_alias == 'lojista')  {
            return $this->redirect(['controller' => 'Ads','action' => 'index']);                    
        }
        if ($role_alias == 'individual')  {
            return $this->redirect(['controller' => 'Ads','action' => 'index']);                    
        }        
    }    
}
