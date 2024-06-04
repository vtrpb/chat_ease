<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * AdImages Controller
 *
 * @property \App\Model\Table\AdImagesTable $AdImages
 *
 * @method \App\Model\Entity\AdImage[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AdImagesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Ads']
        ];
        $adImages = $this->paginate($this->AdImages);

        $this->set(compact('adImages'));
    }

    /**
     * View method
     *
     * @param string|null $id Ad Image id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $adImage = $this->AdImages->get($id, [
            'contain' => ['Ads']
        ]);

        $this->set('adImage', $adImage);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add($ad_id = null)
    {
        $adImage = $this->AdImages->newEntity();

        if ($this->request->is('post') ) {

            /*$adImage = $this->AdImages->patchEntity($adImage, $this->request->getData());

            console.log($adImage);

            if ($this->AdImages->save($adImage)) {

                $this->Flash->success(__('The ad image has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ad image could not be saved. Please, try again.'));
            */
            return $this->redirect(['controller'=>'Ads','action' => 'index']);
        }

        $ads = $this->AdImages->Ads->find('list', ['limit' => 200]);

        $this->set(compact('adImage', 'ads','ad_id'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Ad Image id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $adImage = $this->AdImages->get($id, [
            'contain' => []
        ]);

        $ad_id = $id;

        if ($this->request->is(['patch', 'post', 'put'])) {

            $adImage = $this->AdImages->patchEntity($adImage, $this->request->getData());

            if ($this->AdImages->save($adImage)) {

                $this->Flash->success(__('The ad image has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ad image could not be saved. Please, try again.'));
        }

        $ads = $this->AdImages->Ads->find('list', ['limit' => 200]);

        $this->set(compact('adImage', 'ads','ad_id'));
    }

    public function upload()
    {
        $this->autoRender = false;

        if ($this->request->is(['post','delete']) ) {

            $uploadedFile  = $this->request->getData('file');
            $adId          = $this->request->getData('ad_id');

            $originalFilename = $uploadedFile['name'];
            $fileExtension    = pathinfo($originalFilename, PATHINFO_EXTENSION);
            $uploadPath       = WWW_ROOT . 'files' . DS . 'ad_images' . DS;
            $filename         = $uploadedFile['name'];
            $hash             = md5_file($uploadedFile['tmp_name']);
            $targetPath       = $uploadPath . $hash . '.' . $fileExtension;
            
            if (move_uploaded_file($uploadedFile['tmp_name'], $targetPath)) {

                $adImage = $this->AdImages->newEntity();

                $adImage->name = $hash . '.' . $fileExtension;

                $adImage->ad_id = $adId;
                
                $count = $this->AdImages->find('all', ['conditions' => ['ad_id' => $adId]])->count();

                $adImage->set('sequence', $count + 1);

                $this->AdImages->save($adImage);

                $this->response = $this->response->withType('application/json')->withStringBody(json_encode(['id' => $adImage->id]));

                return $this->response;
            }            

            $this->response = $this->response->withType('application/json')->withStringBody(json_encode(['error' => 'Erro ao fazer upload']));

            return $this->response;

        }
    } 

    public function removeImage($imageId)
    {
        $this->request->allowMethod(['post', 'delete']);

        if ($this->request->is('ajax')) {  

            $imageId = $this->request->getData('id');
        }

        $adImage = $this->AdImages->get($imageId);
        $adId    = $adImage->ad_id;

        $imagePath = WWW_ROOT . 'img/uploads/' . $adImage->name;

        if (file_exists($imagePath)) {
            unlink($imagePath);
        }

        if ($this->AdImages->delete($adImage)) {

            $this->Flash->success(__('A imagem foi excluída com sucesso.'));

        } else {

            $this->Flash->error(__('A imagem não pôde ser excluída. Tente novamente mais tarde.'));            
        }

        return $this->redirect(['controller' => 'Ads', 'action' => 'edit', $adId]);
    }

    public function removeImageAjax()
    {
        $this->autoRender = false;

        if ($this->request->is(['post','delete']) ) {

            $imageId = $this->request->getData('id');

            $adImage = $this->AdImages->get($imageId);
            $adId    = $adImage->ad_id;
            
            $imagePath = WWW_ROOT . 'img/uploads/' . $adImage->name;

            if (file_exists($imagePath)) {
                unlink($imagePath);
            }

            if ($this->AdImages->delete($adImage)) {

                $this->Flash->success(__('A imagem foi excluída com sucesso.'));
                $this->response = $this->response->withType('application/json')->withStringBody(json_encode(['success' => true]));

            } else {

                $this->Flash->error(__('A imagem não pôde ser excluída. Tente novamente mais tarde.'));            
                $this->response = $this->response->withType('application/json')->withStringBody(json_encode(['success' =>false]));
            }            

            return $this->response;
        }
        
    }

    public function updateImageOrder()
    {
        $this->autoRender = false;

        $newOrder = $this->request->getData('order');

        //debug($newOrder) or die();

        foreach ($newOrder as $index => $imageIdWithPrefix) {

            $imageId = str_replace("file-", "", $imageIdWithPrefix);

            $adImage = $this->AdImages->get($imageId, [
                'contain' => []
            ]);

            $adImage->set('sequence', $index + 1);

            if (!$this->AdImages->save($adImage)) {
                debug($adImage->getErrors()); 
            }
        }

        $this->response = $this->response->withType('application/json')->withStringBody(json_encode(['success' => true]));

        return $this->response;
    }

    /**
     * Delete method
     *
     * @param string|null $id Ad Image id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);

        $adImage = $this->AdImages->get($id);

        if ($this->AdImages->delete($adImage)) {

            $this->Flash->success(__('Imagem de anúncio excluída com sucesso!'));

        } else {

            $this->Flash->error(__('A imagem do anúncio não pode ser excluída! Tente novamente.'));

        }

        return $this->redirect(['action' => 'index']);
    }

    /*public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->loadComponent('Csrf');
    }*/
}
