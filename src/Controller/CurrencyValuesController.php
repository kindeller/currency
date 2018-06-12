<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * CurrencyValues Controller
 *
 * @property \App\Model\Table\CurrencyValuesTable $CurrencyValues
 *
 * @method \App\Model\Entity\CurrencyValue[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CurrencyValuesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Currency']
        ];
        $currencyValues = $this->paginate($this->CurrencyValues);

        $this->set(compact('currencyValues'));
    }

    /**
     * View method
     *
     * @param string|null $id Currency Value id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $currencyValue = $this->CurrencyValues->get($id, [
            'contain' => ['Currency']
        ]);

        $this->set('currencyValue', $currencyValue);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $currencyValue = $this->CurrencyValues->newEntity();
        if ($this->request->is('post')) {
            $currencyValue = $this->CurrencyValues->patchEntity($currencyValue, $this->request->getData());
            if ($this->CurrencyValues->save($currencyValue)) {
                $this->Flash->success(__('The currency value has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The currency value could not be saved. Please, try again.'));
        }
        $currency = $this->CurrencyValues->Currency->find('list', ['limit' => 200]);
        $this->set(compact('currencyValue', 'currency'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Currency Value id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $currencyValue = $this->CurrencyValues->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $currencyValue = $this->CurrencyValues->patchEntity($currencyValue, $this->request->getData());
            if ($this->CurrencyValues->save($currencyValue)) {
                $this->Flash->success(__('The currency value has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The currency value could not be saved. Please, try again.'));
        }
        $currency = $this->CurrencyValues->Currency->find('list', ['limit' => 200]);
        $this->set(compact('currencyValue', 'currency'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Currency Value id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $currencyValue = $this->CurrencyValues->get($id);
        if ($this->CurrencyValues->delete($currencyValue)) {
            $this->Flash->success(__('The currency value has been deleted.'));
        } else {
            $this->Flash->error(__('The currency value could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
