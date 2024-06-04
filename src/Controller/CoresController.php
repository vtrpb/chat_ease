<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Datasource\ConnectionManager;

/**
 * Cores Controller
 *
 * @property \App\Model\Table\CoresTable $Cores
 *
 * @method \App\Model\Entity\Core[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CoresController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Subsectors'=>['Sectors']]
        ];
        $cores = $this->paginate($this->Cores);

        $this->set(compact('cores'));
    }

    /**
     * View method
     *
     * @param string|null $id Core id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $core = $this->Cores->get($id, [
            'contain' => ['ReportTemplates']
        ]);

        $this->set('core', $core);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $core = $this->Cores->newEntity();

        if ($this->request->is('post')) {

            $core = $this->Cores->patchEntity($core, $this->request->getData());

            if ($this->Cores->save($core)) {

                $this->Flash->success(__('Núcleo salvo com sucesso!'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('O Núcleo não pode ser salvo.'));
        }
        
        $sectors = $this->Cores->Subsectors->Sectors->find('list', ['limit' => 1000]);
        //$subsectors = $this->Cores->Subsectors->find('list', ['limit' => 1000]);
        $this->set(compact('core','sectors'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Core id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $core = $this->Cores->get($id, [
            'contain' => []
        ]);

        if ($this->request->is(['patch', 'post', 'put'])) {

            $core = $this->Cores->patchEntity($core, $this->request->getData());

            if ($this->Cores->save($core)) {
                $this->Flash->success(__('Núcleo editado com sucesso!'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('O Núcleo não pode ser editado, por favor tente novamente!'));

        }

        $sectors = $this->Cores->Subsectors->Sectors->find('list', ['limit' => 1000]);

        $subsectors = $this->Cores->Subsectors->find('list', ['limit' => 1000]);
        $this->set(compact('core','sectors','subsectors'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Core id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);

        $core = $this->Cores->get($id);

        if ($this->Cores->delete($core)) {
            
            $this->Flash->success(__('Núcleo deletado com sucesso!'));
        } else {
            $this->Flash->error(__('O Núcleo não pode ser deletado, por favor tente novamente!'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function getBySubsectorId($subsector_id = null)   {

        $conn = ConnectionManager::get('default');  

        $stmt       = $conn->execute('SELECT id,name,alias FROM cores WHERE subsector_id = '. $subsector_id .' ORDER BY name ASC;');   
        $subsectors = $stmt ->fetchAll('assoc');  

        $json_array = array();

        for ($i = 0; $i < sizeof($subsectors); $i++)  { 
            array_push($json_array,['id' => $subsectors[$i]['id'], 'name' => $subsectors[$i]['name'], 'alias' => $subsectors[$i]['alias']]);
        }

        $this->set(compact('json_array'));    
    }
}
