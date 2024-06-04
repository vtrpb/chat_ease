<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * TruckTypes Controller
 *
 * @property \App\Model\Table\TruckTypesTable $TruckTypes
 *
 * @method \App\Model\Entity\TruckType[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TruckTypesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $truckTypes = $this->paginate($this->TruckTypes);

        $this->set(compact('truckTypes'));
    }

    /**
     * View method
     *
     * @param string|null $id Truck Type id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $truckType = $this->TruckTypes->get($id, [
            'contain' => ['Trucks']
        ]);

        $this->set('truckType', $truckType);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $truckType = $this->TruckTypes->newEntity();
        if ($this->request->is('post')) {
            $truckType = $this->TruckTypes->patchEntity($truckType, $this->request->getData());
            if ($this->TruckTypes->save($truckType)) {
                $this->Flash->success(__('The truck type has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The truck type could not be saved. Please, try again.'));
        }
        $this->set(compact('truckType'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Truck Type id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $truckType = $this->TruckTypes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $truckType = $this->TruckTypes->patchEntity($truckType, $this->request->getData());
            if ($this->TruckTypes->save($truckType)) {
                $this->Flash->success(__('The truck type has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The truck type could not be saved. Please, try again.'));
        }
        $this->set(compact('truckType'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Truck Type id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $truckType = $this->TruckTypes->get($id);
        if ($this->TruckTypes->delete($truckType)) {
            $this->Flash->success(__('The truck type has been deleted.'));
        } else {
            $this->Flash->error(__('The truck type could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
