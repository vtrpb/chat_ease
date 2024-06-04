<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * AdStates Controller
 *
 * @property \App\Model\Table\AdStatesTable $AdStates
 *
 * @method \App\Model\Entity\AdState[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AdStatesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $adStates = $this->paginate($this->AdStates);

        $this->set(compact('adStates'));
    }

    /**
     * View method
     *
     * @param string|null $id Ad State id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $adState = $this->AdStates->get($id, [
            'contain' => ['Ads']
        ]);

        $this->set('adState', $adState);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $adState = $this->AdStates->newEntity();

        if ($this->request->is('post')) {

            $adState = $this->AdStates->patchEntity($adState, $this->request->getData());

            if ($this->AdStates->save($adState)) {

                $this->Flash->success(__('Anúncio salvo com sucesso!'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('O anúncio não pode ser salvo, tente novamente!'));
        }
        $this->set(compact('adState'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Ad State id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $adState = $this->AdStates->get($id, [
            'contain' => []
        ]);

        if ($this->request->is(['patch', 'post', 'put'])) {

            $adState = $this->AdStates->patchEntity($adState, $this->request->getData());

            if ($this->AdStates->save($adState)) {
                
                $this->Flash->success(__('The ad state has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ad state could not be saved. Please, try again.'));
        }

        $this->set(compact('adState'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Ad State id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $adState = $this->AdStates->get($id);
        if ($this->AdStates->delete($adState)) {
            $this->Flash->success(__('The ad state has been deleted.'));
        } else {
            $this->Flash->error(__('The ad state could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
