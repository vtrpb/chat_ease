<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * TruckBrands Controller
 *
 * @property \App\Model\Table\TruckBrandsTable $TruckBrands
 *
 * @method \App\Model\Entity\TruckBrand[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TruckBrandsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            //'contain' => ['Externals']
        ];
        $truckBrands = $this->paginate($this->TruckBrands);

        $this->set(compact('truckBrands'));
    }

    /**
     * View method
     *
     * @param string|null $id Truck Brand id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $truckBrand = $this->TruckBrands->get($id, [
            'contain' => ['Externals', 'TruckModels']
        ]);

        $this->set('truckBrand', $truckBrand);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $truckBrand = $this->TruckBrands->newEntity();

        if ($this->request->is('post')) {

            $truckBrand = $this->TruckBrands->patchEntity($truckBrand, $this->request->getData());

            if ($this->TruckBrands->save($truckBrand)) {

                $this->Flash->success(__('Marca criada com sucesso!'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Marca não pode ser salva, tente novamente!'));
        }
        
        $this->set(compact('truckBrand', 'externals'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Truck Brand id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $truckBrand = $this->TruckBrands->get($id, [
            'contain' => []
        ]);

        if ($this->request->is(['patch', 'post', 'put'])) {

            $truckBrand = $this->TruckBrands->patchEntity($truckBrand, $this->request->getData());

            if ($this->TruckBrands->save($truckBrand)) {

                $this->Flash->success(__('Marca alterada com sucesso!'));

                return $this->redirect(['action' => 'index']);
            }
            debug($truckBrand->errors());
            $this->Flash->error(__('Marca não pode ser editada!'));
        }
        

        $this->set(compact('truckBrand'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Truck Brand id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $truckBrand = $this->TruckBrands->get($id);
        if ($this->TruckBrands->delete($truckBrand)) {
            $this->Flash->success(__('The truck brand has been deleted.'));
        } else {
            $this->Flash->error(__('The truck brand could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }    

    public function getBrandsWithModelsByType($truckTypeId)
    {        
        $brandsWithModels = $this->TruckBrands->find()
            ->distinct(['TruckBrands.id'])
            ->innerJoinWith('TruckModels', function ($query) use ($truckTypeId) {
                return $query->where(['TruckModels.truck_type_id' => $truckTypeId]);
            })
            ->all();
        
        $this->RequestHandler->renderAs($this, 'json');
        $this->RequestHandler->respondAs('application/json');        
        
        $this->set('brandsWithModels', $brandsWithModels);
        $this->set('_serialize', ['brandsWithModels']);        
    }
}
