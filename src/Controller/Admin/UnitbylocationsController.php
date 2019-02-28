<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Unitbylocations Controller
 *
 * @property \App\Model\Table\UnitbylocationsTable $Unitbylocations
 */
class UnitbylocationsController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Locations', 'Units']
        ];
        $this->set('unitbylocations', $this->paginate($this->Unitbylocations));
        $this->set('_serialize', ['unitbylocations']);
    }

    /**
     * View method
     *
     * @param string|null $id Unitbylocation id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $unitbylocation = $this->Unitbylocations->get($id, [
            'contain' => ['Locations', 'Units']
        ]);
        $this->set('unitbylocation', $unitbylocation);
        $this->set('_serialize', ['unitbylocation']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $unitbylocation = $this->Unitbylocations->newEntity();
        if ($this->request->is('post')) {
            $unitbylocation = $this->Unitbylocations->patchEntity($unitbylocation, $this->request->data);
            if ($this->Unitbylocations->save($unitbylocation)) {
                $this->Flash->success('The unitbylocation has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The unitbylocation could not be saved. Please, try again.');
            }
        }
        $locations = $this->Unitbylocations->Locations->find('list', ['limit' => 200]);
        $units = $this->Unitbylocations->Units->find('list', ['limit' => 200]);
        $this->set(compact('unitbylocation', 'locations', 'units'));
        $this->set('_serialize', ['unitbylocation']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Unitbylocation id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $unitbylocation = $this->Unitbylocations->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $unitbylocation = $this->Unitbylocations->patchEntity($unitbylocation, $this->request->data);
            if ($this->Unitbylocations->save($unitbylocation)) {
                $this->Flash->success('The unitbylocation has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The unitbylocation could not be saved. Please, try again.');
            }
        }
        $locations = $this->Unitbylocations->Locations->find('list', ['limit' => 200]);
        $units = $this->Unitbylocations->Units->find('list', ['limit' => 200]);
        $this->set(compact('unitbylocation', 'locations', 'units'));
        $this->set('_serialize', ['unitbylocation']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Unitbylocation id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $unitbylocation = $this->Unitbylocations->get($id);
        if ($this->Unitbylocations->delete($unitbylocation)) {
            $this->Flash->success('The unitbylocation has been deleted.');
        } else {
            $this->Flash->error('The unitbylocation could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }
}
