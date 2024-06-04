<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Datasource\ConnectionManager;

/**
 * Subsectors Controller
 *
 * @property \App\Model\Table\SubsectorsTable $Subsectors
 *
 * @method \App\Model\Entity\Subsector[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SubsectorsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Sectors']
        ];
        $subsectors = $this->paginate($this->Subsectors);

        $this->set(compact('subsectors'));
    }

    /**
     * View method
     *
     * @param string|null $id Subsector id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $subsector = $this->Subsectors->get($id, [
            'contain' => ['Sectors', 'ReportTemplates']
        ]);

        $this->set('subsector', $subsector);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $subsector = $this->Subsectors->newEntity();
        if ($this->request->is('post')) {
            $subsector = $this->Subsectors->patchEntity($subsector, $this->request->getData());
            if ($this->Subsectors->save($subsector)) {
                $this->Flash->success(__('The subsector has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('O Subsetor não pode ser salvo, tente novamente!'));
        }
        $sectors = $this->Subsectors->Sectors->find('list', ['limit' => 200]);
        $this->set(compact('subsector', 'sectors'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Subsector id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $subsector = $this->Subsectors->get($id, [
            'contain' => []
        ]);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $subsector = $this->Subsectors->patchEntity($subsector, $this->request->getData());
            if ($this->Subsectors->save($subsector)) {
                $this->Flash->success(__('O Subsetor foi salvo com sucesso!'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('O Subsetor não pode ser salvo, tente novamente!'));
        }


        $sectors = $this->Subsectors->Sectors->find('list', ['limit' => 200]);


        $this->set(compact('subsector', 'sectors'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Subsector id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $subsector = $this->Subsectors->get($id);
        if ($this->Subsectors->delete($subsector)) {
            $this->Flash->success(__('The subsector has been deleted.'));
        } else {
            $this->Flash->error(__('The subsector could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }


    public function getBySectorId($sector_id = null)   {

        $conn = ConnectionManager::get('default');  

        $stmt       = $conn->execute('SELECT id,name,alias FROM subsectors WHERE sector_id = '. $sector_id .' ORDER BY name ASC;');   
        $subsectors = $stmt ->fetchAll('assoc');  

        $json_array = array();

        for ($i = 0; $i < sizeof($subsectors); $i++)  { 
            array_push($json_array,['id' => $subsectors[$i]['id'], 'name' => $subsectors[$i]['name']. ' - ' .$subsectors[$i]['alias'], 'alias' => $subsectors[$i]['alias']]);
        }

        $this->set(compact('json_array'));    
    }
}
