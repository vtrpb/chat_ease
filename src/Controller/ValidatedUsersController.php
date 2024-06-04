<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ValidatedUsers Controller
 *
 * @property \App\Model\Table\ValidatedUsersTable $ValidatedUsers
 *
 * @method \App\Model\Entity\ValidatedUser[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ValidatedUsersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'ValidatedUserStates']
        ];
        $validatedUsers = $this->paginate($this->ValidatedUsers);

        $this->set(compact('validatedUsers'));
    }

    /**
     * View method
     *
     * @param string|null $id Validated User id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $validatedUser = $this->ValidatedUsers->get($id, [
            'contain' => ['Users', 'ValidatedUserStates']
        ]);

        $this->set('validatedUser', $validatedUser);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $validatedUser = $this->ValidatedUsers->newEntity();
        if ($this->request->is('post')) {
            $validatedUser = $this->ValidatedUsers->patchEntity($validatedUser, $this->request->getData());
            if ($this->ValidatedUsers->save($validatedUser)) {
                $this->Flash->success(__('The validated user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The validated user could not be saved. Please, try again.'));
        }
        $users = $this->ValidatedUsers->Users->find('list', ['limit' => 200]);
        $validatedUserStates = $this->ValidatedUsers->ValidatedUserStates->find('list', ['limit' => 200]);
        $this->set(compact('validatedUser', 'users', 'validatedUserStates'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Validated User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $validatedUser = $this->ValidatedUsers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $validatedUser = $this->ValidatedUsers->patchEntity($validatedUser, $this->request->getData());
            if ($this->ValidatedUsers->save($validatedUser)) {
                $this->Flash->success(__('The validated user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The validated user could not be saved. Please, try again.'));
        }
        $users = $this->ValidatedUsers->Users->find('list', ['limit' => 200]);
        $validatedUserStates = $this->ValidatedUsers->ValidatedUserStates->find('list', ['limit' => 200]);
        $this->set(compact('validatedUser', 'users', 'validatedUserStates'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Validated User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $validatedUser = $this->ValidatedUsers->get($id);
        if ($this->ValidatedUsers->delete($validatedUser)) {
            $this->Flash->success(__('The validated user has been deleted.'));
        } else {
            $this->Flash->error(__('The validated user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
