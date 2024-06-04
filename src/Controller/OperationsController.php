<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Operations Controller
 *
 * @property \App\Model\Table\OperationsTable $Operations
 *
 * @method \App\Model\Entity\Operation[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class OperationsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $operations = $this->paginate($this->Operations);

        $this->set(compact('operations'));
    }

    /**
     * View method
     *
     * @param string|null $id Operation id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $operation = $this->Operations->get($id, [
            'contain' => []
        ]);

        $this->set('operation', $operation);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $operation = $this->Operations->newEntity();

        if ($this->request->is('post')) {

            $format = "d/m/Y";           

            $operation = $this->Operations->patchEntity($operation, $this->request->getData());

            if (!is_null($this->request->data['initial_date']) || ($this->request->data['initial_date'] != '') )  {                
                $operation->initial_date = \DateTime::createFromFormat($format, $this->request->data['initial_date']);                       
            }            

            if (!is_null($this->request->data['final_date']) || ($this->request->data['final_date'] != '') )  {            
                $operation->final_date = \DateTime::createFromFormat($format, $this->request->data['final_date']);                       
            }            

            if ($this->Operations->save($operation)) {

                $this->Flash->success(__('Operação salva com sucesso!'));

                return $this->redirect(['action' => 'index']);
            }

            $this->Flash->error(__('A operação não pode ser salva! Tente novamente!'));
        }
        $this->set(compact('operation'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Operation id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $operation = $this->Operations->get($id, [
            'contain' => []
        ]);

        if ($this->request->is(['patch', 'post', 'put'])) {

            $format = "d/m/Y";                       

            $operation = $this->Operations->patchEntity($operation, $this->request->getData());

            if (!is_null($this->request->data['initial_date']) || ($this->request->data['initial_date'] != '') )  {                
                $operation->initial_date = \DateTime::createFromFormat($format, $this->request->data['initial_date']);                       
            }            

            if (!is_null($this->request->data['final_date']) || ($this->request->data['final_date'] != '') )  {            
                $operation->final_date = \DateTime::createFromFormat($format, $this->request->data['final_date']);                       
            }                        

            if ($this->Operations->save($operation)) {

                $this->Flash->success(__('Operação salva com sucesso!'));

                return $this->redirect(['action' => 'index']);
            }

            debug($operation->errors());

            $this->Flash->error(__('Operação salva não pode ser salva, tente novamente!'));
        }

        $this->set(compact('operation'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Operation id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $operation = $this->Operations->get($id);
        if ($this->Operations->delete($operation)) {
            $this->Flash->success(__('Operação excluída com sucesso!'));
        } else {
            $this->Flash->error(__('Operação não pode ser deletada, tente novamente!'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
