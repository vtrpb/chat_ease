<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ReportTemplates Controller
 *
 * @property \App\Model\Table\ReportTemplatesTable $ReportTemplates
 *
 * @method \App\Model\Entity\ReportTemplate[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ReportTemplatesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $session      = $this->request->session();
        $user_core_id = $session->read('Users.core_id');

        $this->paginate = [
            'contain' => ['Cores', 'Sectors', 'Subsectors', 'ReportTypes']
        ];
        $reportTemplates = $this->paginate($this->ReportTemplates);

        $this->set(compact('reportTemplates'));      
        
    }

    /**
     * View method
     *
     * @param string|null $id Report Template id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $reportTemplate = $this->ReportTemplates->get($id, [
            //'contain' => ['Sectors'=>['SubSectors'=>['Cores'] ] ]
            'contain' => ['Sectors','SubSectors','Cores','ReportTypes']
        ]);

        $this->set('reportTemplate', $reportTemplate);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $session      = $this->request->session();
        $user_core_id = $session->read('Users.core_id');

        $reportTemplate = $this->ReportTemplates->newEntity();

        if ($this->request->is('post')) {

            $reportTemplate = $this->ReportTemplates->patchEntity($reportTemplate, $this->request->getData());

            $reportTemplate->template = $this->request->data['hidden_template'];
            

            if ($this->ReportTemplates->save($reportTemplate)) {
                $this->Flash->success(__('Modelo de documento salvo com sucesso!'));

                return $this->redirect(['action' => 'index']);
            }

            //debug($reportTemplate->errors()) or die();

            $this->Flash->error(__('O modelo de documento não pode ser salvo, por favor tente novamente!'));
        }

        //$sectors = $this->ReportTemplates->Sectors->find('list', ['limit' => 200,'conditions' => ['Users.id' => $user_id]]);
        $sectors = $this->ReportTemplates->Sectors->find('list', ['limit' => 200]);
        //$subsectors = $this->ReportTemplates->SubSectors->find('list', ['limit' => 200]);
        //$cores = $this->ReportTemplates->Cores->find('list', ['limit' => 200]);

        $this->set(compact('reportTemplate', 'sectors'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Report Template id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $reportTemplate = $this->ReportTemplates->get($id, [
            'contain' => []
        ]);

        if ($this->request->is(['patch', 'post', 'put'])) {

            $reportTemplate = $this->ReportTemplates->patchEntity($reportTemplate, $this->request->getData());

            $reportTemplate->template = $this->request->data['hidden_template'];

            if ($this->ReportTemplates->save($reportTemplate)) {

                $this->Flash->success(__('Modelo de documento alterado com sucesso!'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('O modelo de documento não pode ser salvo, tente novamente!'));
        }

        //$users = $this->ReportTemplates->Users->find('list', ['limit' => 200]);
        $sectors = $this->ReportTemplates->Sectors->find('list', ['limit' => 200]);
       // $subsectors = $this->ReportTemplates->SubSectors->find('list', ['limit' => 200]);
       // $cores = $this->ReportTemplates->Cores->find('list', ['limit' => 200]);

        //debug($reportTemplate) or die();

        $this->set(compact('reportTemplate', 'sectors'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Report Template id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $reportTemplate = $this->ReportTemplates->get($id);
        if ($this->ReportTemplates->delete($reportTemplate)) {
            $this->Flash->success(__('Modelo de documento deletado com sucesso!'));
        } else {
            $this->Flash->error(__('O modelo de documento não pode ser deletado, tente novamente!'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function getById($report_template_id = null)
    {
        $this->paginate = [
            'contain' => ['Sectors'],
            'conditions' => ['ReportTemplates.id' => $report_template_id]
        ];

        $report_template = $this->paginate($this->ReportTemplates);

        $this->set(compact('report_template'));
    }

}
