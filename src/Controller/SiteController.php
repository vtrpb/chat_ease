<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;


class SiteController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->viewBuilder()->setLayout('medwise');
    }

    public function comingSoon()                    
    {       
        $this->viewBuilder()->setLayout('ajax');
        $this->set('title','Truck Zone');
    }  

    public function registrationCompleted()
    {
        $this->viewBuilder()->setLayout('register');
        $this->set('title','Truck Zone');
    }

    public function home()
    {
        $this->set('title','Truck Zone');        

        $MAX_TRUCK_PRICE = 10000;
        $MAX_MILEAGE = 3000000;
       
        $adsTable    = TableRegistry::get('Ads');        
        $statesTable = TableRegistry::get('States');                

      $conditions = [
        'Ads.ad_state_id' => 1,
        'Ads.AdPlans.plan' => ['Users.plan_id' => 'pj'], // Assuming the association path to the plan_id field of the Users table
      ];

/*    $ads = $adsTable->find('all', [
            'contain' => [
                'Users',
                'Trucks' => ['States', 'Cities'],
                'AdStates',
                'AdImages' => ['sort' => ['AdImages.sequence' => 'ASC']]
            ],
            'conditions' => $conditions,
        ])
        ->order(['Ads.created' => 'DESC'])
        ->limit(12)
        ->toArray();
     
        $this->loadModel('TruckTypes');

        $states      = $statesTable->find('list',['keyField' => 'id','valueField' => 'name'])->toArray();                                  
        $truckTypes  = $this->TruckTypes->find('list',['keyField' => 'id','valueField' => 'name'])->toArray(); */                         

        
        
        $this->set(compact('price', 'km', 'brand', 'model', 'ads','states','minTruckPrice','maxTruckPrice','minMileage','maxMileage','truckTypes'));
    }  

    public function aboutUs()
    {
        $this->set('title','Truck Zone');        
    }  

    public function search()  {

        //$searchTerm = isset($this->request->getData('search')) ? $this->request->getData('search') : '';
        
        //$searchTerm = $this->request->getQuery('searchTerm');

      /*  $price  = $this->request->getQuery('price');
        $km     = $this->request->getQuery('km');
        $state  = $this->request->getQuery('state_hidden');
        $brand  = $this->request->getQuery('brand_hidden');
        $model  = $this->request->getQuery('model_hidden');
        $max_truck_price  = $this->request->getQuery('max_truck_price_hidden');
        $min_truck_price  = $this->request->getQuery('min_truck_price_hidden');
        $max_mileage  = $this->request->getQuery('max_mileage_hidden');
        $min_mileage  = $this->request->getQuery('min_mileage_hidden');*/

        $session    = $this->request->session();

        // Armazenando as variáveis de consulta em variáveis de sessão
        //$searchTerm = $this->request->getData('search') ?? '';
        $session->write('searchTerm',$this->request->getData('search') ?? '');
        $session->write('price', $this->request->getQuery('price'));
        $session->write('km', $this->request->getQuery('km'));
        $session->write('state', $this->request->getQuery('state_hidden'));
        $session->write('brand', $this->request->getQuery('brand_hidden'));
        $session->write('model', $this->request->getQuery('model_hidden'));
        $session->write('max_truck_price', $this->request->getQuery('max_truck_price_hidden'));
        $session->write('min_truck_price', $this->request->getQuery('min_truck_price_hidden'));
        $session->write('max_mileage', $this->request->getQuery('max_mileage_hidden'));
        $session->write('min_mileage', $this->request->getQuery('min_mileage_hidden'));




        return $this->redirect([
            'controller' => 'Site',
            'action' => 'displaySearchResults',
            '?' => ['searchTerm' => $searchTerm]
        ]);
    }

    public function displaySearchResults()
    {       
        $this->set('title','Truck Zone');

        $MAX_TRUCK_PRICE = 10000;
        $MAX_MILEAGE = 3000000;

        //$searchTerm = isset($this->request->data['search']) ? $this->request->data['search'] : '';
        $searchTerm = $this->request->getQuery('searchTerm');

       
        $adsTable    = TableRegistry::get('Ads');        
        $statesTable = TableRegistry::get('States');        
        
        /*$price  = $this->request->getQuery('price');
        $km     = $this->request->getQuery('km');
        $state  = $this->request->getQuery('state_hidden');
        $brand  = $this->request->getQuery('brand_hidden');
        $model  = $this->request->getQuery('model_hidden');
        $max_truck_price  = $this->request->getQuery('max_truck_price_hidden');
        $min_truck_price  = $this->request->getQuery('min_truck_price_hidden');
        $max_mileage  = $this->request->getQuery('max_mileage_hidden');
        $min_mileage  = $this->request->getQuery('min_mileage_hidden');*/

        // Obtendo a instância da sessão
        //$session = new Session();
        $session    = $this->request->session();

        // Lendo os valores das variáveis de sessão e atribuindo às variáveis respectivas
        $searchTerm =  $session->read('searchTerm');
        $price = $session->read('price');
        $km = $session->read('km');
        $state = $session->read('state');
        $brand = $session->read('brand');
        $model = $session->read('model');
        $max_truck_price = $session->read('max_truck_price');
        $min_truck_price = $session->read('min_truck_price');
        $max_mileage = $session->read('max_mileage');
        $min_mileage = $session->read('min_mileage');

        $conditions = [];

        $conditions[] = ['Ads.ad_state_id '=>1];               

        //debug($state) or die();

        if (!empty($price)) {

            list($priceMin, $priceMax) = explode(';', $price);                        

            $conditions[] = ['Ads.truck_price BETWEEN '.$priceMin.' AND '.$priceMax];               
        }

        if (!empty($km)) {

            list($kmMin, $kmMax) = explode(';', $km);            

            $conditions[] = ['CAST(Trucks.mileage AS INTEGER) BETWEEN '.$kmMin.' AND '.$kmMax.''];                

        }
        if (!empty($brand)) {

            $conditions['Trucks.brand'] = $brand;

        }
        if (!empty($model)) {

            $conditions['Trucks.model'] = $model;

        }
        if (!empty($state)) {

            $conditions['States.name'] = $state;

        }

        if (!empty($searchTerm))  {
            $conditions[] = [
                        'OR' => [
                            'LOWER(Trucks.brand) ILIKE' => '%' . strtolower($searchTerm) . '%',
                            'LOWER(Trucks.model) ILIKE' => '%' . strtolower($searchTerm) . '%'                            
                        ]
                    ];
        }

        //debug($conditions) or die();
        
        $ads = $adsTable->find('all', [
            'contain' => ['Users','Trucks'=>['States','Cities'],'AdStates','AdImages'=> ['sort' => ['AdImages.sequence' => 'ASC'] ] ],
            'conditions' => $conditions
            ])
            ->order(['Ads.created' => 'DESC'])
            ->toArray();  
        
        $minTruckPrice = ($min_truck_price != '' && !is_null($min_truck_price) ) ? $min_truck_price : $MAX_TRUCK_PRICE;
        $maxTruckPrice = ($max_truck_price != '' && !is_null($max_truck_price) ) ? $max_truck_price : 0;
        $minMileage    = ($min_mileage     != '' && !is_null($min_mileage) ) ? $min_mileage : $MAX_MILEAGE;
        $maxMileage    = ($max_mileage     != '' && !is_null($max_mileage) ) ? $max_mileage : 0;        


        if (sizeof($ads) == 0)  {

            $minTruckPrice = 0;
            $maxTruckPrice = $MAX_TRUCK_PRICE;
            $minMileage    = 0;
            $maxMileage    = $MAX_MILEAGE;
        }        

        for ($i=0;$i<sizeof($ads);$i++)  {

            if ($ads[$i]['truck_price'] < $minTruckPrice )  {
                $minTruckPrice = $ads[$i]['truck_price'];
            }
            if ($ads[$i]['truck_price'] > $maxTruckPrice)  {
                $maxTruckPrice = $ads[$i]['truck_price'];
            }

            if ($ads[$i]['truck']['mileage'] < $minMileage)  {
                $minMileage = $ads[$i]['truck']['mileage'];
            }
            if ($ads[$i]['truck']['mileage'] > $maxMileage)  {
                $maxMileage = $ads[$i]['truck']['mileage'];
            }
        }
        
        $this->loadModel('TruckTypes');

        $states      = $statesTable->find('list',['keyField' => 'id','valueField' => 'name'])->toArray();                                  
        $truckTypes  = $this->TruckTypes->find('list',['keyField' => 'id','valueField' => 'name'])->toArray();                          

        
        
        $this->set(compact('price', 'km', 'brand', 'model', 'ads','states','minTruckPrice','maxTruckPrice','minMileage','maxMileage','truckTypes'));
      
    }    

    public function viewAd($id = null)
    {       

        $adsTable = TableRegistry::get('Ads');

        $ad = $adsTable->get($id, [
            'contain' => ['Users','Trucks','Trucks.TruckTypes','Trucks.States','Trucks.Cities', 'AdStates','AdImages'=> ['sort' => ['AdImages.sequence' => 'ASC']]  ]
        ]);

        $this->set('title','Truck Zone - '.$ad->title);

        $ad->number_of_views = $ad->number_of_views + 1;

        $adsTable->save($ad);

        $this->set('ad', $ad);

    }

    
}
?>