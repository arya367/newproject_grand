<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * PropertyTabs Controller
 *
 * @property \App\Model\Table\PropertyTabsTable $PropertyTabs
 */
class PropertyTabsController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('propertyTabs', $this->paginate($this->PropertyTabs));
        $this->set('_serialize', ['propertyTabs']);
    }

    /**
     * View method
     *
     * @param string|null $id Property Tab id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $propertyTab = $this->PropertyTabs->get($id, [
            'contain' => []
        ]);
        $this->set('propertyTab', $propertyTab);
        $this->set('_serialize', ['propertyTab']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $propertyTab = $this->PropertyTabs->newEntity();
        if ($this->request->is('post')) {
            $propertyTab = $this->PropertyTabs->patchEntity($propertyTab, $this->request->data);
            if ($this->PropertyTabs->save($propertyTab)) {
                $this->Flash->success('The property tab has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The property tab could not be saved. Please, try again.');
            }
        }
        $this->set(compact('propertyTab'));
        $this->set('_serialize', ['propertyTab']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Property Tab id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $propertyTab = $this->PropertyTabs->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $propertyTab = $this->PropertyTabs->patchEntity($propertyTab, $this->request->data);
            if ($this->PropertyTabs->save($propertyTab)) {
                $this->Flash->success('The property tab has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The property tab could not be saved. Please, try again.');
            }
        }
        $this->set(compact('propertyTab'));
        $this->set('_serialize', ['propertyTab']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Property Tab id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $propertyTab = $this->PropertyTabs->get($id);
        if ($this->PropertyTabs->delete($propertyTab)) {
            $this->Flash->success('The property tab has been deleted.');
        } else {
            $this->Flash->error('The property tab could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }
}
