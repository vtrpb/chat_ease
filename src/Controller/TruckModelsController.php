<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * TruckModels Controller
 *
 * @property \App\Model\Table\TruckModelsTable $TruckModels
 *
 * @method \App\Model\Entity\TruckModel[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TruckModelsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['TruckBrands', 'TruckTypes']
        ];
        $truckModels = $this->paginate($this->TruckModels);

        $this->set(compact('truckModels'));
    }

    /**
     * View method
     *
     * @param string|null $id Truck Model id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $truckModel = $this->TruckModels->get($id, [
            'contain' => ['TruckBrands', 'TruckTypes', 'Externals', 'TruckYears']
        ]);

        $this->set('truckModel', $truckModel);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $truckModel = $this->TruckModels->newEntity();

        if ($this->request->is('post')) {

            $truckModel = $this->TruckModels->patchEntity($truckModel, $this->request->getData());
            if ($this->TruckModels->save($truckModel)) {
                $this->Flash->success(__('Modelo de veículo cadastrado com sucesso!'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Modelo não pode ser salvo, tente novamente!'));
        }

        $truckBrands = $this->TruckModels->TruckBrands->find('list', ['limit' => 200]);
        $truckTypes = $this->TruckModels->TruckTypes->find('list', ['limit' => 200]);
        
        $this->set(compact('truckModel', 'truckBrands', 'truckTypes', 'externals'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Truck Model id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $truckModel = $this->TruckModels->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {

            $truckModel = $this->TruckModels->patchEntity($truckModel, $this->request->getData());

            if ($this->TruckModels->save($truckModel)) {

                $this->Flash->success(__('Modelo de veículo editado com sucesso!'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Modelo não pode ser salvo, tente novamente!'));
        }

        $truckBrands = $this->TruckModels->TruckBrands->find('list', ['limit' => 200]);
        $truckTypes = $this->TruckModels->TruckTypes->find('list', ['limit' => 200]);
        
        $this->set(compact('truckModel', 'truckBrands', 'truckTypes', 'externals'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Truck Model id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);

        $truckModel = $this->TruckModels->get($id);

        if ($this->TruckModels->delete($truckModel)) {
            $this->Flash->success(__('Modelo de veículo excluído com sucesso!'));
        } else {
            $this->Flash->error(__('Modelo de veículo não pode ser excluído!'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function getModelsByTypeAndBrand($truckTypeId, $truckBrandId)
    {
        $models = $this->TruckModels->find()
            ->where(['TruckModels.truck_type_id' => $truckTypeId, 'TruckModels.truck_brand_id' => $truckBrandId])
            ->all();
            
        $this->RequestHandler->renderAs($this, 'json');
        $this->RequestHandler->respondAs('application/json');        
        
        $this->set([
            'models' => $models,
            '_serialize' => ['models']
        ]);
    }
}
