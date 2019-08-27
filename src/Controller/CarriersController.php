<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Carriers Controller
 *
 * @property \App\Model\Table\CarriersTable $Carriers
 *
 * @method \App\Model\Entity\Carrier[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CarriersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $carriers = $this->paginate($this->Carriers);

        $this->set(compact('carriers'));
    }

    /**
     * View method
     *
     * @param string|null $id Carrier id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $carrier = $this->Carriers->get($id, [
            'contain' => ['Patients']
        ]);

        $this->set('carrier', $carrier);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $carrier = $this->Carriers->newEntity();
        if ($this->request->is('post')) {
            $carrier = $this->Carriers->patchEntity($carrier, $this->request->getData());
            if ($this->Carriers->save($carrier)) {
                $this->Flash->success(__('The carrier has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The carrier could not be saved. Please, try again.'));
        }
        $this->set(compact('carrier'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Carrier id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $carrier = $this->Carriers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $carrier = $this->Carriers->patchEntity($carrier, $this->request->getData());
            if ($this->Carriers->save($carrier)) {
                $this->Flash->success(__('The carrier has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The carrier could not be saved. Please, try again.'));
        }
        $this->set(compact('carrier'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Carrier id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $carrier = $this->Carriers->get($id);
        if ($this->Carriers->delete($carrier)) {
            $this->Flash->success(__('The carrier has been deleted.'));
        } else {
            $this->Flash->error(__('The carrier could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
