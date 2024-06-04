<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * PermissionRoles Controller
 *
 * @property \App\Model\Table\PermissionRolesTable $PermissionRoles
 *
 * @method \App\Model\Entity\PermissionRole[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PermissionRolesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Permissions', 'Roles']
        ];
        $permissionRoles = $this->paginate($this->PermissionRoles);

        $this->set(compact('permissionRoles'));
    }

    /**
     * View method
     *
     * @param string|null $id Permission Role id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $permissionRole = $this->PermissionRoles->get($id, [
            'contain' => ['Permissions', 'Roles']
        ]);

        $this->set('permissionRole', $permissionRole);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $permissionRole = $this->PermissionRoles->newEntity();
        if ($this->request->is('post')) {
            $permissionRole = $this->PermissionRoles->patchEntity($permissionRole, $this->request->getData());
            if ($this->PermissionRoles->save($permissionRole)) {
                $this->Flash->success(__('The permission role has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The permission role could not be saved. Please, try again.'));
        }
        $permissions = $this->PermissionRoles->Permissions->find('list', ['limit' => 200]);
        $roles = $this->PermissionRoles->Roles->find('list', ['limit' => 200]);
        $this->set(compact('permissionRole', 'permissions', 'roles'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Permission Role id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $permissionRole = $this->PermissionRoles->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $permissionRole = $this->PermissionRoles->patchEntity($permissionRole, $this->request->getData());
            if ($this->PermissionRoles->save($permissionRole)) {
                $this->Flash->success(__('The permission role has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The permission role could not be saved. Please, try again.'));
        }
        $permissions = $this->PermissionRoles->Permissions->find('list', ['limit' => 200]);
        $roles = $this->PermissionRoles->Roles->find('list', ['limit' => 200]);
        $this->set(compact('permissionRole', 'permissions', 'roles'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Permission Role id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $permissionRole = $this->PermissionRoles->get($id);
        if ($this->PermissionRoles->delete($permissionRole)) {
            $this->Flash->success(__('The permission role has been deleted.'));
        } else {
            $this->Flash->error(__('The permission role could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
