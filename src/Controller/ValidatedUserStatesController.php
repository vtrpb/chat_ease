<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ValidatedUserStates Controller
 *
 * @property \App\Model\Table\ValidatedUserStatesTable $ValidatedUserStates
 *
 * @method \App\Model\Entity\ValidatedUserState[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ValidatedUserStatesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $validatedUserStates = $this->paginate($this->ValidatedUserStates);

        $this->set(compact('validatedUserStates'));
    }

    /**
     * View method
     *
     * @param string|null $id Validated User State id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $validatedUserState = $this->ValidatedUserStates->get($id, [
            'contain' => ['ValidatedUsers']
        ]);

        $this->set('validatedUserState', $validatedUserState);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $validatedUserState = $this->ValidatedUserStates->newEntity();
        if ($this->request->is('post')) {
            $validatedUserState = $this->ValidatedUserStates->patchEntity($validatedUserState, $this->request->getData());
            if ($this->ValidatedUserStates->save($validatedUserState)) {
                $this->Flash->success(__('The validated user state has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The validated user state could not be saved. Please, try again.'));
        }
        $this->set(compact('validatedUserState'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Validated User State id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $validatedUserState = $this->ValidatedUserStates->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $validatedUserState = $this->ValidatedUserStates->patchEntity($validatedUserState, $this->request->getData());
            if ($this->ValidatedUserStates->save($validatedUserState)) {
                $this->Flash->success(__('The validated user state has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The validated user state could not be saved. Please, try again.'));
        }
        $this->set(compact('validatedUserState'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Validated User State id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $validatedUserState = $this->ValidatedUserStates->get($id);
        if ($this->ValidatedUserStates->delete($validatedUserState)) {
            $this->Flash->success(__('The validated user state has been deleted.'));
        } else {
            $this->Flash->error(__('The validated user state could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
