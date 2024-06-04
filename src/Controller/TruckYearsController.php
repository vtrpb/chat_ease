<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * TruckYears Controller
 *
 * @property \App\Model\Table\TruckYearsTable $TruckYears
 *
 * @method \App\Model\Entity\TruckYear[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TruckYearsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['TruckModels']
        ];
        $truckYears = $this->paginate($this->TruckYears);

        $this->set(compact('truckYears'));
    }

    /**
     * View method
     *
     * @param string|null $id Truck Year id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $truckYear = $this->TruckYears->get($id, [
            'contain' => ['TruckModels', 'Externals']
        ]);

        $this->set('truckYear', $truckYear);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $truckYear = $this->TruckYears->newEntity();
        if ($this->request->is('post')) {
            $truckYear = $this->TruckYears->patchEntity($truckYear, $this->request->getData());
            if ($this->TruckYears->save($truckYear)) {
                $this->Flash->success(__('The truck year has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The truck year could not be saved. Please, try again.'));
        }
        $truckModels = $this->TruckYears->TruckModels->find('list', ['limit' => 200]);
        $externals = $this->TruckYears->Externals->find('list', ['limit' => 200]);
        $this->set(compact('truckYear', 'truckModels', 'externals'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Truck Year id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $truckYear = $this->TruckYears->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $truckYear = $this->TruckYears->patchEntity($truckYear, $this->request->getData());
            if ($this->TruckYears->save($truckYear)) {
                $this->Flash->success(__('The truck year has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The truck year could not be saved. Please, try again.'));
        }
        $truckModels = $this->TruckYears->TruckModels->find('list', ['limit' => 200]);
        $externals = $this->TruckYears->Externals->find('list', ['limit' => 200]);
        $this->set(compact('truckYear', 'truckModels', 'externals'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Truck Year id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $truckYear = $this->TruckYears->get($id);
        if ($this->TruckYears->delete($truckYear)) {
            $this->Flash->success(__('The truck year has been deleted.'));
        } else {
            $this->Flash->error(__('The truck year could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
