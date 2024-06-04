<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ReportTypes Controller
 *
 * @property \App\Model\Table\ReportTypesTable $ReportTypes
 *
 * @method \App\Model\Entity\ReportType[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ReportTypesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $reportTypes = $this->paginate($this->ReportTypes);

        $this->set(compact('reportTypes'));
    }

    /**
     * View method
     *
     * @param string|null $id Report Type id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $reportType = $this->ReportTypes->get($id, [
            'contain' => []
        ]);

        $this->set('reportType', $reportType);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $reportType = $this->ReportTypes->newEntity();
        if ($this->request->is('post')) {
            $reportType = $this->ReportTypes->patchEntity($reportType, $this->request->getData());
            if ($this->ReportTypes->save($reportType)) {
                $this->Flash->success(__('Tipo de documento salvo com sucesso!'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('O tipo de docuemnto não pode ser salvo!'));
        }
        $this->set(compact('reportType'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Report Type id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $reportType = $this->ReportTypes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $reportType = $this->ReportTypes->patchEntity($reportType, $this->request->getData());
            if ($this->ReportTypes->save($reportType)) {
                $this->Flash->success(__('Tipo de documento editado com sucesso!'));

                return $this->redirect(['action' => 'index']);
            }
            debug($reportType->errors()) or die();
            $this->Flash->error(__('O tipo de documento não pode ser editado!'));
        }
        $this->set(compact('reportType'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Report Type id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $reportType = $this->ReportTypes->get($id);
        if ($this->ReportTypes->delete($reportType)) {
            $this->Flash->success(__('Tipo de documento deletado com sucesso!'));
        } else {
            $this->Flash->error(__('The report type could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
