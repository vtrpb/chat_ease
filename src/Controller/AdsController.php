<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Ads Controller
 *
 * @property \App\Model\Table\AdsTable $Ads
 *
 * @method \App\Model\Entity\Ad[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AdsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $session    = $this->request->session();
        $user_id    = $session->read('Users.id');
        $user_role  = $session->read('Users.role'); 

        if ($user_role == 'admin' )  {
            $this->paginate = [
                'contain' => ['Users', 'Trucks', 'AdStates','AdImages'=> ['sort' => ['AdImages.sequence' => 'ASC'] ]],
                'conditions'=>['Ads.ad_state_id'=>4] // lista apenas "pendentes"
            ];
        }        
        if ($user_role == 'editor' )  {
            $this->paginate = [
            'contain' => ['Users', 'Trucks', 'AdStates','AdImages'=> ['sort' => ['AdImages.sequence' => 'ASC'] ]],
            'conditions'=>['Ads.ad_state_id'=>4] // lista apenas "pendentes"
            ];
        }        
        if ($user_role == 'validador' )  {
            $this->paginate = [
            'contain' => ['Users', 'Trucks', 'AdStates','AdImages'=> ['sort' => ['AdImages.sequence' => 'ASC'] ]],
            'conditions'=>['Ads.ad_state_id'=>4] // lista apenas "pendentes"
            ];
        }        
        else if ($user_role == 'representante' )  {
            $this->paginate = [
            'contain' => ['Users', 'Trucks', 'AdStates','AdImages'=> ['sort' => ['AdImages.sequence' => 'ASC'] ]],
            'conditions'=>['Ads.representative_user_id'=>$user_id,'Ads.ad_state_id'=>4] // lista apenas "próprios"
            ];
        }
        else if ($user_role == 'individual' )  {
            $this->paginate = [
            'contain' => ['Users', 'Trucks', 'AdStates','AdImages'=> ['sort' => ['AdImages.sequence' => 'ASC'] ]],
            'conditions'=>['Ads.user_id'=>$user_id,'Ads.ad_state_id'=>4] // lista apenas "próprios"
            ];
        }
        else if ($user_role == 'lojista' )  {
            $this->paginate = [
            'contain' => ['Users', 'Trucks', 'AdStates','AdImages'=> ['sort' => ['AdImages.sequence' => 'ASC'] ]],
            'conditions'=>['Ads.user_id'=>$user_id,'Ads.ad_state_id'=>4] // lista apenas "próprios"
            ];
        }

       /* if ($this->request->is('post')) {

            $search_str  = '%'.$this->request->data['search'].'%';                       
                   
            $session->write('Ads.search_str',$search_str);             

            return $this->redirect(['action' => 'indexApproved']);                      
        }  */     

        $ads = $this->paginate($this->Ads);                

        $this->set(compact('ads'));
    }

    public function indexApproved()
    {
        $session            = $this->request->session();
        $user_id            = $session->read('Users.id');
        $user_role          = $session->read('Users.role'); 
        $ads_search_str     = $session->read('Ads.search_str');                                 

        $this->loadModel('Trucks');

        $trucksQuery = $this->Trucks->find()->where(['Trucks.brand'=>$ads_search_str,'Trucks.model'=>$ads_search_str]);

        //debug($trucksQuery);

        if ($user_role == 'admin' )  {
            if (is_null($ads_search_str) )  {                
                $this->paginate = [
                'contain' => ['Users','Trucks', 'AdStates','AdImages'=>['sort' => ['AdImages.sequence' => 'ASC'] ]],
                'conditions'=>['Ads.ad_state_id'=>1] // lista apenas "aprovados"
                ];
            }
            else  {
                
                $this->paginate = [                
                'contain'   => ['Users','Trucks','AdStates','AdImages'=>['sort' => ['AdImages.sequence' => 'ASC'] ]],
                'conditions'=>['Ads.ad_state_id'=>1,'Ads.title ILIKE'=>$ads_search_str], // lista apenas "aprovados"
                'matching'  => ['Trucks',function ($q) use ($trucksQuery)  {
                        return $q->where([
                            'Trucks.id IN' => $trucksQuery
                        ]);
                    }],

                ];
            }            
        }        
        if ($user_role == 'editor' )  {
            if (is_null($ads_search_str) )  {                
                $this->paginate = [
                'contain' => ['Users', 'Trucks', 'AdStates','AdImages'],
                'conditions'=>['Ads.ad_state_id'=>1] // lista apenas "aprovados"
                ];
            }
            else  {
                $this->paginate = [
                'contain' => ['Users', 'Trucks', 'AdStates','AdImages'],
                'conditions'=>['Ads.ad_state_id'=>1,'Ads.title ILIKE'=>$ads_search_str] // lista apenas "aprovados"
                ];
            }            
            
        }        
        if ($user_role == 'validador' )  {
            if (is_null($ads_search_str) )  {                
                $this->paginate = [
                'contain' => ['Users', 'Trucks', 'AdStates','AdImages'],
                'conditions'=>['Ads.ad_state_id'=>1] // lista apenas "aprovados"
                ];
            }
            else  {
                $this->paginate = [
                'contain' => ['Users', 'Trucks', 'AdStates','AdImages'],
                'conditions'=>['Ads.ad_state_id'=>1,'Ads.title ILIKE'=>$ads_search_str] // lista apenas "aprovados"
                ];
            }
        }        
        else if ($user_role == 'representante' )  {
            if (is_null($ads_search_str) )  {                
                $this->paginate = [
                'contain' => ['Users', 'Trucks', 'AdStates','AdImages'],
                'conditions'=>['Ads.representative_user_id'=>$user_id, 'Ads.ad_state_id'=>1] // lista apenas os "próprios"
                ];
            }
            else  {
                $this->paginate = [
                'contain' => ['Users', 'Trucks', 'AdStates','AdImages'],
                'conditions'=>['Ads.representative_user_id'=>$user_id, 'Ads.ad_state_id'=>1,'Ads.title ILIKE'=>$ads_search_str] // lista apenas "aprovados"
                ];
            }
        }
        else if ($user_role == 'individual' )  {
            if (is_null($ads_search_str) )  {                
                $this->paginate = [
                'contain' => ['Users', 'Trucks', 'AdStates','AdImages'=> ['sort' => ['AdImages.sequence' => 'ASC'] ]],
                'conditions'=>['Ads.user_id'=>$user_id, 'Ads.ad_state_id'=>1] // lista apenas os "próprios"
                ];
            }
            else  {
                $this->paginate = [
                'contain' => ['Users', 'Trucks', 'AdStates','AdImages'=> ['sort' => ['AdImages.sequence' => 'ASC'] ]],
                'conditions'=>['Ads.user_id'=>$user_id, 'Ads.ad_state_id'=>1,'Ads.title ILIKE'=>$ads_search_str] // lista apenas "aprovados"
                ];
            }
        }
        else if ($user_role == 'lojista' )  {
            if (is_null($ads_search_str) )  {                
                $this->paginate = [
                'contain' => ['Users', 'Trucks', 'AdStates','AdImages'=> ['sort' => ['AdImages.sequence' => 'ASC'] ]],
                'conditions'=>['Ads.user_id'=>$user_id, 'Ads.ad_state_id'=>1] // lista apenas os "próprios"
                ];
            }
            else  {
                $this->paginate = [
                'contain' => ['Users', 'Trucks', 'AdStates','AdImages'=> ['sort' => ['AdImages.sequence' => 'ASC'] ]],
                'conditions'=>['Ads.user_id'=>$user_id, 'Ads.ad_state_id'=>1,'Ads.title ILIKE'=>$ads_search_str] // lista apenas "aprovados"
                ];
            }
        }

        if ($this->request->is('post')) {

            $search_str  = '%'.$this->request->data['search'].'%';                       
                   
            $session->write('Ads.search_str',$search_str);             

            return $this->redirect(['action' => 'indexApproved']);                      
        }       

        $ads = $this->paginate($this->Ads);                

        $this->set(compact('ads'));
    }

    public function indexDeny()
    {
        $session    = $this->request->session();
        $user_id    = $session->read('Users.id');
        $user_role  = $session->read('Users.role'); 

        if ($user_role == 'admin' )  {
            $this->paginate = [
                'contain' => ['Users', 'Trucks', 'AdStates','AdImages'=> ['sort' => ['AdImages.sequence' => 'ASC'] ]],
                'conditions'=>['Ads.ad_state_id'=>5]  // lista apenas "negados"
            ];
        }        
        if ($user_role == 'editor' )  {
            $this->paginate = [
            'contain' => ['Users', 'Trucks', 'AdStates','AdImages'=> ['sort' => ['AdImages.sequence' => 'ASC'] ]],
            'conditions'=>['Ads.ad_state_id'=>5] // lista apenas "negados"
            ];
        }        
        if ($user_role == 'validador' )  {
            $this->paginate = [
            'contain' => ['Users', 'Trucks', 'AdStates','AdImages'=> ['sort' => ['AdImages.sequence' => 'ASC'] ]],
            'conditions'=>['Ads.ad_state_id'=>5] // lista apenas "negados"
            ];
        }        
        else if ($user_role == 'representante' )  {
            $this->paginate = [
            'contain' => ['Users', 'Trucks', 'AdStates','AdImages'=> ['sort' => ['AdImages.sequence' => 'ASC'] ]],
            'conditions'=>['Ads.representative_user_id'=>$user_id, 'Ads.ad_state_id'=>5] // lista apenas os "próprios" "negados"
            ];
        }
        else if ($user_role == 'individual' )  {
            $this->paginate = [
            'contain' => ['Users', 'Trucks', 'AdStates','AdImages'=> ['sort' => ['AdImages.sequence' => 'ASC'] ]],
            'conditions'=>['Ads.user_id'=>$user_id, 'Ads.ad_state_id'=>5] // lista apenas os "próprios" "negados"
            ];
        }
        else if ($user_role == 'lojista' )  {
            $this->paginate = [
            'contain' => ['Users', 'Trucks', 'AdStates','AdImages'=> ['sort' => ['AdImages.sequence' => 'ASC'] ]],
            'conditions'=>['Ads.user_id'=>$user_id, 'Ads.ad_state_id'=>5] // lista apenas os "próprios" "negados"
            ];
        }
        

        $ads = $this->paginate($this->Ads);                

        $this->set(compact('ads'));
    }

    public function step($step = null)
    {
        $this->set(compact('step'));
        
    }

   

    /**
     * View method
     *
     * @param string|null $id Ad id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $ad = $this->Ads->get($id, [
            'contain' => ['Users', 'Trucks', 'AdStates','AdImages']
        ]);

        $this->set('ad', $ad);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add($truckId=null)
    {

        $session   = $this->request->session();
        $userId    = $session->read('Users.id');
        $userRole  = $session->read('Users.role'); 

        $ad        = $this->Ads->newEntity();

        if ($this->request->is('post')) {

            $ad = $this->Ads->patchEntity($ad, $this->request->getData());

            //$ad->initial_date = $this->request->getData('initial_date');
            //$ad->final_date   = $this->request->getData('final_date');


            $ad->initial_date = null;
            $ad->final_date   = null;

            $ad->number_of_photos = 12;
            $ad->free             = false;
            $ad->payment_value    = 0;
            $ad->ad_state_id      = 4; // pendente        
        
            if ($this->Ads->save($ad)) {               

                $this->Flash->warning(__('Agora adicione as foto do VEÍCULO para finalizar...'));

                return $this->redirect(['controller'=>'AdImages','action' => 'add',$ad->id]);
            }
            //debug($ad->errors()) or die();
            $this->Flash->error(__('O anúncio do Caminhão não pode ser salvo!'));
        }

        if ($userRole == 'admin' || $userRole == 'editor' )  {
            $users = $this->Ads->Users->find('list');   
        }
        else  {
            $users = $this->Ads->Users->find('list', ['limit' => 1,'conditions'=>['Users.id'=>$userId]]);            
        }

        if (!is_null($truckId))  {

            $truck = $this->Ads->Trucks->get($truckId);

            if ($truck->user_id == $userId)  {
                $trucks = $this->Ads->Trucks->find('list', ['keyField' => 'id','valueField' => 'model','conditions'=>['Trucks.id'=>$truckId] ]);    
            }
        }
        else  {
            $trucks = $this->Ads->Trucks->find('list', ['keyField' => 'id','valueField' => 'model','conditions'=>['Trucks.user_id'=>$userId]]);    
        }        

        $adStates = $this->Ads->AdStates->find('list', ['limit' => 200]);
        $adPlans  = $this->Ads->AdPlans->find('list', ['limit' => 200]);

        $this->set(compact('ad', 'users', 'trucks', 'adStates','adPlans'));
    }  

    /**
     * Edit method
     *
     * @param string|null $id Ad id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $session    = $this->request->session();

        $user_id   = $session->read('Users.id');
        $user_role        = $session->read('Users.role'); 

        $ad = $this->Ads->get($id, [
            'contain' => [
                'AdImages' => [
                    'sort' => ['AdImages.sequence' => 'ASC']
                ],
                'Trucks'
            ]
        ]);
        

        $ad_id = $id;

        if ($this->request->is(['patch', 'post', 'put'])) {

            $ad->ad_state_id = 4; // volta para pendente

            $ad = $this->Ads->patchEntity($ad, $this->request->getData());

            if ($this->Ads->save($ad)) {

                $this->Flash->warning(__('Anúncio foi alterado e está pendente para aprovação.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('O anúncio não pode ser salvo, tente novamente!'));
        }

        if ($user_role == 'admin' || $user_role == 'editor')  {            
            $users    = $this->Ads->Users->find('list', ['limit' => 1,'conditions'=>['Users.id'=>$ad->user_id]]);            
        }
        else  {
            $users    = $this->Ads->Users->find('list', ['limit' => 1,'conditions'=>['Users.id'=>$ad->user_id]]);            
        }
        
        $trucks   = $this->Ads->Trucks->find('list', ['keyField' => 'id','valueField' => 'model','limit' => 1,'conditions'=>['Trucks.id'=>$ad->truck_id]]);

        $adStates = $this->Ads->AdStates->find('list', ['limit' => 200]);

        $this->loadModel('AdImages');

        $adImages = $this->AdImages
            ->find()
            ->where(['ad_id' => $ad_id])
            ->order(['sequence'])
            ->toArray();        

        $adPlans  = $this->Ads->AdPlans->find('list', ['limit' => 200]);
        
        $this->set(compact('ad', 'users', 'trucks', 'adStates','adImages','adPlans','ad_id'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Ad id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $ad = $this->Ads->get($id);
        if ($this->Ads->delete($ad)) {
            $this->Flash->success(__('Anúncio deletado com sucesso!'));
        } else {
            $this->Flash->error(__('O anúncio não pode ser deletado, tente novamente!'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function approve($id) {        
        
        $ad = $this->Ads->get($id);

        $ad->ad_state_id = 1;
        
        if ($this->Ads->save($ad)) {

            $this->Flash->success('Anúncio autorizado com sucesso!');

        } else {
            $this->Flash->error('Não foi possível aprovar o anúncio. Tente novamente mais tarde.');
        }
        
        return $this->redirect($this->referer());
    }

    public function deny($id) {        
        
        $ad = $this->Ads->get($id);

        $ad->ad_state_id = 5;
        
        if ($this->Ads->save($ad)) {
            $this->Flash->danger('Anúncio negado!');
        } else {
            debug($ad->errors()) or die();
            $this->Flash->error('Não foi possível reprovar o anúncio. Tente novamente mais tarde.');
        }
        
        return $this->redirect($this->referer());
    }

    public function paid($id)
    {
        $ad = $this->Ads->get($id);

        if (!$ad) {
            $this->Flash->error('Anúncio não encontrado!');
            return $this->redirect(['action' => 'index']);
        }

        $ad->paid = !$ad->paid;

        if ($this->Ads->save($ad)) {
            $this->Flash->success('Status da pagamento alterado com sucesso!');
        } else {
            $this->Flash->error('Falha ao alterar!');
        }

        return $this->redirect($this->referer());
    }



    
}
