<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Workplaces Controller
 *
 * @property \App\Model\Table\WorkplacesTable $Workplaces
 *
 * @method \App\Model\Entity\Workplace[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class WorkplacesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'Sectors', 'Subsectors', 'Cores']
        ];
        $workplaces = $this->paginate($this->Workplaces);

        $this->set(compact('workplaces'));
    }

    /**
     * View method
     *
     * @param string|null $id Workplace id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $workplace = $this->Workplaces->get($id, [
            'contain' => ['Users', 'Sectors', 'Subsectors', 'Cores']
        ]);

        $this->set('workplace', $workplace);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $workplace = $this->Workplaces->newEntity();

        if ($this->request->is('post')) {

            $workplace = $this->Workplaces->patchEntity($workplace, $this->request->getData());

            if ($this->Workplaces->save($workplace)) {

                $this->Flash->success(__('Local de trabalho salvo com sucesso!'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Local de trabalho não pode ser salvo, tente novamente!'));
        }

        $users      = $this->Workplaces->Users->find('list', ['limit' => 200]);
        $sectors    = $this->Workplaces->Sectors->find('list', ['limit' => 200]);
        $subsectors = $this->Workplaces->Subsectors->find('list', ['limit' => 200]);
        $cores      = $this->Workplaces->Cores->find('list', ['limit' => 200]);

        $this->set(compact('workplace', 'users', 'sectors', 'subsectors', 'cores'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Workplace id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null,$user_id=null)
    {
        $session             = $this->request->getSession();
        $session_user_id     = $session->read('Users.id');        

        $workplace = $this->Workplaces->get($id, [
            'contain' => []
        ]);

        if ($this->request->is(['patch', 'post', 'put'])) {          


            $workplace = $this->Workplaces->patchEntity($workplace, $this->request->getData());

            $workplace->sector_id    = $this->request->data['new_sector_id'];
            $workplace->subsector_id = $this->request->data['new_subsector_id'];
            $workplace->core_id      = $this->request->data['new_core_id'];           

//            debug($this->request->data['sector_id']) or die();

            if ($this->Workplaces->save($workplace)) {

                // Update actual session, if are updating the same logged user
                if ($session_user_id == $user_id)  {
                    $session->write('Users.sector_id'   ,$this->request->data['new_sector_id']);
                    $session->write('Users.subsector_id',$this->request->data['new_subsector_id']);
                    $session->write('Users.core_id'     ,$this->request->data['new_core_id']);
                } 

                $this->Flash->success(__('Local de trabalho editado com sucesso!'));

                return $this->redirect(['action' => 'index']);
            }
            debug($workplace->errors()); 
            $this->Flash->error(__('O local de trabalho não pode ser salvo, tente novamente!'));
        }

        $users = $this->Workplaces->Users->find('list', ['conditions'=> ['Users.id' => $user_id]]);
        
        //$users =    $this->Reports->Users->find('list', ['conditions' =>['Users.id' => $user_id]]);

        $sectors = $this->Workplaces->Sectors->find('list', ['limit' => 200]);

        $subsectors = $this->Workplaces->Subsectors->find('list', ['limit' => 200]);

        $cores = $this->Workplaces->Cores->find('list', ['limit' => 200]);

        $this->set(compact('workplace', 'users', 'sectors', 'subsectors', 'cores'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Workplace id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $workplace = $this->Workplaces->get($id);
        if ($this->Workplaces->delete($workplace)) {
            $this->Flash->success(__('Local de trabalho deletado com sucesso!'));
        } else {
            $this->Flash->error(__('O local de trabalho não pode ser deletado!'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function checkUserSector($user_id=null)  {

        $workplace = $this->Workplaces->Users->find('list', ['limit' => 1 ,'conditions'=>['Workplaces.user_id' => $user_id]]);

        return $workplace->sector_id;

    }
}
