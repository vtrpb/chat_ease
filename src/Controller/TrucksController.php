<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Trucks Controller
 *
 * @property \App\Model\Table\TrucksTable $Trucks
 *
 * @method \App\Model\Entity\Truck[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TrucksController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $session            = $this->request->session();
        $user_id            = $session->read('Users.id');
        $user_role          = $session->read('Users.role'); 
        $trucks_search_str  = $session->read('Trucks.search_str');                                 

        /*if (is_null($trucks_search_str) )  {                
        }*/

        if ($user_role == 'admin' )  {
            $this->paginate = [
                'contain' => ['Users', 'TruckTypes', 'States', 'Cities']            
            ];            
        }        
        if ($user_role == 'editor' )  {
            $this->paginate = [
                'contain' => ['Users', 'TruckTypes', 'States', 'Cities']                
            ];            
        }        
        if ($user_role == 'validador' )  {
            $this->paginate = [
                'contain' => ['Users', 'Trucks', 'AdStates','AdImages']            
            ];
        }        
        else if ($user_role == 'representante' )  {
            $this->paginate = [
                'contain' => ['Users', 'Trucks', 'AdStates','AdImages']                
            ];
        }
        else if ($user_role == 'individual' )  {
            $this->paginate = [
                'contain' => ['Users', 'TruckTypes', 'States', 'Cities'],
                'conditions'=>['Trucks.user_id'=>$user_id]
            ];            
        }
        else if ($user_role == 'lojista' )  {
            $this->paginate = [
                'contain' => ['Users', 'TruckTypes', 'States', 'Cities'],
                'conditions'=>['Trucks.user_id'=>$user_id]
            ];            
        }

        if ($this->request->is('post')) {

            $search_str  = '%'.$this->request->data['search'].'%';                       
                   
            $session->write('Trucks.search_str',$search_str);             

            return $this->redirect(['action' => 'indexApproved']);                      
        }       

        
        
        $trucks = $this->paginate($this->Trucks);

        $this->set(compact('trucks'));
    }

    /**
     * View method
     *
     * @param string|null $id Truck id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $truck = $this->Trucks->get($id, [
            'contain' => ['Users', 'TruckTypes', 'States', 'Cities', 'Ads']
        ]);

        $this->set('truck', $truck);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $session    = $this->request->session();
        $user_id    = $session->read('Users.id');
        $user_role  = $session->read('Users.role'); 

        $truck = $this->Trucks->newEntity();

        if ($this->request->is('post')) {

            //debug($this->request->data['mileage'] ); 
            //debug(str_replace(['km', '.', ','], '', $this->request->data['mileage']) ) or die();

            $this->request->data['brand']       = $this->request->data['brand_hidden'];
            $this->request->data['model']       = $this->request->data['model_hidden'];
            $this->request->data['year']        = $this->request->data['year_hidden'];
            $this->request->data['year_model']  = $this->request->data['year_model_hidden'];
            $this->request->data['mileage']     = rtrim(str_replace(['km', '.', ','], '', $this->request->data['mileage']));


            $truck = $this->Trucks->patchEntity($truck, $this->request->getData());

            if ($this->Trucks->save($truck)) {

                $this->Flash->warning(__('Veículo cadastrado, continue com seu anúncio...'));

                return $this->redirect(['controller'=>'Ads','action' => 'add',$truck->id]);
            }
            $this->Flash->error(__('O veículo não pode ser salvo, tente novamente!'));
        }        

        if ($user_role == 'admin' )  {
            $users = $this->Trucks->Users->find('list');
        }        
        if ($user_role == 'editor' )  {
            $users = $this->Trucks->Users->find('list');
        }        
        if ($user_role == 'validador' )  {
            $users = $this->Trucks->Users->find('list');
        }        
        else if ($user_role == 'representante' )  {
            $users = $this->Trucks->Users->find('list', [
                'conditions' => ['Users.id' => $user_id],
                'limit' => 200
            ]);
        }
        else if ($user_role == 'individual' )  {
            $users = $this->Trucks->Users->find('list', [
                'conditions' => ['Users.id' => $user_id],
                'limit' => 200
            ]);
        }
        else if ($user_role == 'lojista' )  {
            $users = $this->Trucks->Users->find('list', [
                'conditions' => ['Users.id' => $user_id]
                
            ]);
        }
        
        $truckTypes = $this->Trucks->TruckTypes->find('list');
        $states = $this->Trucks->States->find('list');
        $cities = $this->Trucks->Cities->find('list');
        
        $this->set(compact('truck', 'users', 'truckTypes', 'states', 'cities'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Truck id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $session    = $this->request->session();
        $user_id    = $session->read('Users.id');
        $user_role  = $session->read('Users.role'); 

        $truck = $this->Trucks->get($id, [
            'contain' => []
        ]);

        if ($this->request->is(['patch', 'post', 'put'])) {

            $truck = $this->Trucks->patchEntity($truck, $this->request->getData());

            if ($this->Trucks->save($truck)) {
                $this->Flash->success(__('Caminhão editado com sucesso!'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('O Caminhão não pode ser editado!'));
        }

        if ($user_role == 'admin' )  {
            $users = $this->Trucks->Users->find('list',['conditions'=>['Users.id'=>$truck->user_id]]);
        }        
        if ($user_role == 'editor' )  {
            $users = $this->Trucks->Users->find('list',['conditions'=>['Users.id'=>$truck->user_id]]);
        }        
        if ($user_role == 'validador' )  {
            $users = $this->Trucks->Users->find('list',['conditions'=>['Users.id'=>$truck->user_id]]);
        }        
        else if ($user_role == 'representante' )  {
            $users = $this->Trucks->Users->find('list',['conditions'=>['Users.id'=>$truck->user_id]]);
        }
        else if ($user_role == 'individual' )  {
            $users = $this->Trucks->Users->find('list',['conditions'=>['Users.id'=>$truck->user_id]]);
        }
        else if ($user_role == 'lojista' )  {
            $users = $this->Trucks->Users->find('list',['conditions'=>['Users.id'=>$truck->user_id]]);
        }
        

        $truckTypes = $this->Trucks->TruckTypes->find('list', ['limit' => 1,'conditions'=>['TruckTypes.id'=>$truck->truck_type_id]]);
        $states = $this->Trucks->States->find('list', ['limit' => 200]);
        $cities = $this->Trucks->Cities->find('list', ['limit' => 200]);
        $this->set(compact('truck', 'users', 'truckTypes', 'states', 'cities'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Truck id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function editAdmin($id = null)
    {
        $session    = $this->request->session();
        $user_id    = $session->read('Users.id');
        $user_role       = $session->read('Users.role');         
        
        $truck = $this->Trucks->get($id, [
                'contain' => []
            ]);
      
        if ($this->request->is(['patch', 'post', 'put'])) {

            $truck = $this->Trucks->patchEntity($truck, $this->request->getData());

            if ($this->Trucks->save($truck)) {
                $this->Flash->success(__('Caminhão editado com sucesso!'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('O Caminhão não pode ser editado!'));
        }

       
        if ($user_role == 'admin' || $user_role == 'editor' )  {
            $users = $this->Trucks->Users->find('list',['conditions'=>['Users.id'=>$truck->user_id]]);
        }        

        $truckTypes = $this->Trucks->TruckTypes->find('list');        
        $states = $this->Trucks->States->find('list');
        $cities = $this->Trucks->Cities->find('list');
        $this->set(compact('truck', 'users', 'truckTypes', 'states', 'cities'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Truck id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $truck = $this->Trucks->get($id);
        if ($this->Trucks->delete($truck)) {
            $this->Flash->success(__('Caminhão excluído com sucesso!'));
        } else {
            $this->Flash->error(__('O Caminhão não pode ser excluído, tente novamente!'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
