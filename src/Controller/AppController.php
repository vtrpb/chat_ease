<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Filesystem\Folder;
use Cake\Event\Event;
use Cake\Core\Configure;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link https://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */    

    public function initialize()
    {
        parent::initialize();

        //$this->loadComponent('Csrf');   
        //ini_get('allow_url_fopen');
        
        //PRODUCTION
        Configure::write('domain', 'https://www.truckzone.com.br');        
        Configure::write('debug',true);

        // SANDBOX
        /*Configure::write('domain', 'http://localhost:8765');                
        Configure::write('debug',true);*/

        $this->loadComponent('RequestHandler', [
            'enableBeforeRedirect' => false,
        ]);        
        $this->loadComponent('Flash');

        $this->loadComponent('Auth', [
          'authenticate' => [
                'Form' => [
                    'fields' => [
                        'username' => 'email',
                        'password' => 'password'
                    ]
                ]
            ],
            'loginRedirect' => [
                'controller' => 'Reports',
                'action' => 'index'
            ],
            'logoutRedirect' => [
                'controller' => 'Site',
                'action' => 'home'
            ]
        ]);

        $this->viewBuilder()->setLayout('adminlte');

        //ViewBuilder::setLayout() 

        /*
         * Enable the following component for recommended CakePHP security settings.
         * see https://book.cakephp.org/3.0/en/controllers/components/security.html
         */
        //$this->loadComponent('Security');
        //parent::initialize();      
  
    }

      /**
  * Check if the ditecory already exists, case not create it 
  * @access public  
  * @param String $dir  
  */ 
    public function checkDir($dir)
    {
        $folder = new Folder();

        if (!is_dir($dir)){
            $folder->create($dir);
        }
    }

    /**
  * Check if the name of file already exists, if exist add a number to the name of the file and check it again  
  * @access public
  * @param Array $imagem
  * @param String $data
  * @return nome da imagem
  */ 
    public function checkName($image, $dir)
    {
        $image_info = pathinfo($dir.$image['name']);
        $image_name = $this->treatName($image_info['image']).'.'.$image_info['extension'];        
        $count = 2;
        while (file_exists($dir.$image_name)) {
            $image_name  = $this->treatName($imagem_info['image']).'-'.$count;
            $image_name .= '.'.$image_info['extension'];
            $count++;            
        }
        $image['name'] = $image_name;
        return $image;
    }

    /** 
 * Treat the name removing spaces, accents and uppercase characteres
 * @access public
 * @param Array $image_name
 * @param String $data
*/ 
    public function treatName($image_name)
    {
        $image_name = strtolower(Inflector::slug($image_name,'-'));
        return $image_name;
    }

    /**
 * Move o arquivo para a pasta de destino.
 * @access public
 * @param Array $image
 * @param String $data
*/ 
    public function moveFiles($image, $dir)
    {
        App::uses('File', 'Utility');
        $file = new File($image['tmp_name']);
        $file->copy($dir.$image['name']);
        $file->close();
    }


     /**
     * Before render callback.
     *
     * @param \Cake\Event\Event $event The beforeRender event.
     * @return \Cake\Network\Response|null|void
     */
    public function beforeRender(Event $event)
    {   
       if (!array_key_exists('_serialize', $this->viewVars) && in_array($this->response->type(), ['application/json', 'application/xml']) ) {
            $this->set('_serialize', true);
       }
    }    

    public function beforeFilter(Event $event)
    {

        $this->Auth->authError = __('Você não está autorizado a visulizar esta página.');
        $this->Auth->loginError = __('Usuário ou senha inválidos!');


        $this->Auth->allow(['comingSoon','home','aboutUs','login','register','addUserFiles','search','displaySearchResults','viewAd','registrationCompleted','activate','forgotPassword','getBrandsWithModelsByType','getModelsByTypeAndBrand']);
    }

    

}
