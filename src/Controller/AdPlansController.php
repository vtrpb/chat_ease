<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * AdPlans Controller
 *
 * @property \App\Model\Table\AdPlansTable $AdPlans
 *
 * @method \App\Model\Entity\AdPlan[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AdPlansController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $adPlans = $this->paginate($this->AdPlans);

        $this->set(compact('adPlans'));
    }

    public function recurringPlans()
    {

    }

    /**
     * View method
     *
     * @param string|null $id Ad Plan id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $adPlan = $this->AdPlans->get($id, [
            'contain' => []
        ]);

        $this->set('adPlan', $adPlan);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $adPlan = $this->AdPlans->newEntity();
        if ($this->request->is('post')) {
            $adPlan = $this->AdPlans->patchEntity($adPlan, $this->request->getData());
            if ($this->AdPlans->save($adPlan)) {
                $this->Flash->success(__('Plano adicionado com sucesso!'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('O Plano não pode ser salvo, tente novamente!'));
        }
        $this->set(compact('adPlan'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Ad Plan id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $adPlan = $this->AdPlans->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $adPlan = $this->AdPlans->patchEntity($adPlan, $this->request->getData());
            if ($this->AdPlans->save($adPlan)) {
                $this->Flash->success(__('Plano alterado com sucesso!'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('O plano não pode ser alterado, tente novamente!'));
        }
        $this->set(compact('adPlan'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Ad Plan id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $adPlan = $this->AdPlans->get($id);
        if ($this->AdPlans->delete($adPlan)) {
            $this->Flash->success(__('Plano deletado com sucesso!'));
        } else {
            $this->Flash->error(__('O plano não pode ser deletado, tente novamente!'));
        }

        return $this->redirect(['action' => 'index']);
    }

}
