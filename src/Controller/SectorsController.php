<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Sectors Controller
 *
 * @property \App\Model\Table\SectorsTable $Sectors
 *
 * @method \App\Model\Entity\Sector[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SectorsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            //'contain' => ['']
        ];
        $sectors = $this->paginate($this->Sectors);

        $this->set(compact('sectors'));
    }

    /**
     * View method
     *
     * @param string|null $id Sector id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $sector = $this->Sectors->get($id, [
            'contain' => ['ReportTemplates', 'Subsectors']
        ]);

        $this->set('sector', $sector);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $sector = $this->Sectors->newEntity();
        if ($this->request->is('post')) {
            $sector = $this->Sectors->patchEntity($sector, $this->request->getData());
            if ($this->Sectors->save($sector)) {
                $this->Flash->success(__('Setor salvo com sucesso!'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The sector could not be saved. Please, try again.'));
        }

        //$cores = $this->Sectors->Cores->find('list', ['limit' => 200]);

        $this->set(compact('sector'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Sector id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $sector = $this->Sectors->get($id, [
            'contain' => []
        ]);

        if ($this->request->is(['patch', 'post', 'put'])) {

            $sector = $this->Sectors->patchEntity($sector, $this->request->getData());
            if ($this->Sectors->save($sector)) {
                $this->Flash->success(__('Setor salvo com sucesso!'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('O Setor não pode ser salvo, por favor tente novamente!'));
        }

        $subsectors = $this->Sectors->Subsectors->find('list', ['limit' => 200]);

        $this->set(compact('sector', 'subsectors'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Sector id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $sector = $this->Sectors->get($id);
        if ($this->Sectors->delete($sector)) {
            $this->Flash->success(__('The sector has been deleted.'));
        } else {
            $this->Flash->error(__('The sector could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
