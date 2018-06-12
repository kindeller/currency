<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * UserCurrencyTracking Controller
 *
 * @property \App\Model\Table\UserCurrencyTrackingTable $UserCurrencyTracking
 *
 * @method \App\Model\Entity\UserCurrencyTracking[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UserCurrencyTrackingController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['User', 'Currency']
        ];
        $userCurrencyTracking = $this->paginate($this->UserCurrencyTracking);

        $this->set(compact('userCurrencyTracking'));
    }

    /**
     * View method
     *
     * @param string|null $id User Currency Tracking id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $userCurrencyTracking = $this->UserCurrencyTracking->get($id, [
            'contain' => ['User', 'Currency']
        ]);

        $this->set('userCurrencyTracking', $userCurrencyTracking);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $userCurrencyTracking = $this->UserCurrencyTracking->newEntity();
        if ($this->request->is('post')) {
            $userCurrencyTracking = $this->UserCurrencyTracking->patchEntity($userCurrencyTracking, $this->request->getData());
            if ($this->UserCurrencyTracking->save($userCurrencyTracking)) {
                $this->Flash->success(__('The user currency tracking has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user currency tracking could not be saved. Please, try again.'));
        }
        $user = $this->UserCurrencyTracking->User->find('list', ['limit' => 200]);
        $currency = $this->UserCurrencyTracking->Currency->find('list', ['limit' => 200]);
        $this->set(compact('userCurrencyTracking', 'user', 'currency'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User Currency Tracking id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $userCurrencyTracking = $this->UserCurrencyTracking->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $userCurrencyTracking = $this->UserCurrencyTracking->patchEntity($userCurrencyTracking, $this->request->getData());
            if ($this->UserCurrencyTracking->save($userCurrencyTracking)) {
                $this->Flash->success(__('The user currency tracking has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user currency tracking could not be saved. Please, try again.'));
        }
        $user = $this->UserCurrencyTracking->User->find('list', ['limit' => 200]);
        $currency = $this->UserCurrencyTracking->Currency->find('list', ['limit' => 200]);
        $this->set(compact('userCurrencyTracking', 'user', 'currency'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User Currency Tracking id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $userCurrencyTracking = $this->UserCurrencyTracking->get($id);
        if ($this->UserCurrencyTracking->delete($userCurrencyTracking)) {
            $this->Flash->success(__('The user currency tracking has been deleted.'));
        } else {
            $this->Flash->error(__('The user currency tracking could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
