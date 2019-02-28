<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * PropertySubtypes Controller
 *
 * @property \App\Model\Table\PropertySubtypesTable $PropertySubtypes
 */
class PropertySubtypesController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['PropertyTypes']
        ];
        $this->set('propertySubtypes', $this->paginate($this->PropertySubtypes));
        $this->set('_serialize', ['propertySubtypes']);
    }

    /**
     * View method
     *
     * @param string|null $id Property Subtype id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $propertySubtype = $this->PropertySubtypes->get($id, [
            'contain' => ['PropertyTypes', 'Properties', 'PropertypeLocations']
        ]);
        $this->set('propertySubtype', $propertySubtype);
        $this->set('_serialize', ['propertySubtype']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $propertySubtype = $this->PropertySubtypes->newEntity();
        if ($this->request->is('post')) {
            $propertySubtype = $this->PropertySubtypes->patchEntity($propertySubtype, $this->request->data);
            if ($this->PropertySubtypes->save($propertySubtype)) {
                $this->Flash->success('The property subtype has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The property subtype could not be saved. Please, try again.');
            }
        }
        $propertyTypes = $this->PropertySubtypes->PropertyTypes->find('list', ['limit' => 200]);
        $this->set(compact('propertySubtype', 'propertyTypes'));
        $this->set('_serialize', ['propertySubtype']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Property Subtype id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $propertySubtype = $this->PropertySubtypes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $propertySubtype = $this->PropertySubtypes->patchEntity($propertySubtype, $this->request->data);
            if ($this->PropertySubtypes->save($propertySubtype)) {
                $this->Flash->success('The property subtype has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The property subtype could not be saved. Please, try again.');
            }
        }
        $propertyTypes = $this->PropertySubtypes->PropertyTypes->find('list', ['limit' => 200]);
        $this->set(compact('propertySubtype', 'propertyTypes'));
        $this->set('_serialize', ['propertySubtype']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Property Subtype id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $propertySubtype = $this->PropertySubtypes->get($id);
        if ($this->PropertySubtypes->delete($propertySubtype)) {
            $this->Flash->success('The property subtype has been deleted.');
        } else {
            $this->Flash->error('The property subtype could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }
}
