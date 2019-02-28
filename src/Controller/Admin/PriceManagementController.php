<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * PriceManagement Controller
 *
 * @property \App\Model\Table\PriceManagementTable $PriceManagement
 */
class PriceManagementController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Properties', 'Units']
        ];
        $this->set('priceManagement', $this->paginate($this->PriceManagement));
        $this->set('_serialize', ['priceManagement']);
    }

    /**
     * View method
     *
     * @param string|null $id Price Management id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $priceManagement = $this->PriceManagement->get($id, [
            'contain' => ['Properties', 'Units']
        ]);
        $this->set('priceManagement', $priceManagement);
        $this->set('_serialize', ['priceManagement']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $priceManagement = $this->PriceManagement->newEntity();
        if ($this->request->is('post')) {
            $priceManagement = $this->PriceManagement->patchEntity($priceManagement, $this->request->data);
            if ($this->PriceManagement->save($priceManagement)) {
                $this->Flash->success('The price management has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The price management could not be saved. Please, try again.');
            }
        }
        $properties = $this->PriceManagement->Properties->find('list', ['limit' => 200]);
        $units = $this->PriceManagement->Units->find('list', ['limit' => 200]);
        $this->set(compact('priceManagement', 'properties', 'units'));
        $this->set('_serialize', ['priceManagement']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Price Management id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $priceManagement = $this->PriceManagement->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $priceManagement = $this->PriceManagement->patchEntity($priceManagement, $this->request->data);
            if ($this->PriceManagement->save($priceManagement)) {
                $this->Flash->success('The price management has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The price management could not be saved. Please, try again.');
            }
        }
        $properties = $this->PriceManagement->Properties->find('list', ['limit' => 200]);
        $units = $this->PriceManagement->Units->find('list', ['limit' => 200]);
        $this->set(compact('priceManagement', 'properties', 'units'));
        $this->set('_serialize', ['priceManagement']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Price Management id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $priceManagement = $this->PriceManagement->get($id);
        if ($this->PriceManagement->delete($priceManagement)) {
            $this->Flash->success('The price management has been deleted.');
        } else {
            $this->Flash->error('The price management could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }
}
