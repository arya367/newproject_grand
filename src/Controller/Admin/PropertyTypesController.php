<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * PropertyTypes Controller
 *
 * @property \App\Model\Table\PropertyTypesTable $PropertyTypes
 */
class PropertyTypesController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('propertyTypes', $this->paginate($this->PropertyTypes));
        $this->set('_serialize', ['propertyTypes']);
    }

    /**
     * View method
     *
     * @param string|null $id Property Type id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $propertyType = $this->PropertyTypes->get($id, [
           // 'contain' => ['Properties', 'PropertySubtypes', 'PropertypeLocations']
        ]);
        $this->set('propertyType', $propertyType);
        $this->set('_serialize', ['propertyType']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $propertyType = $this->PropertyTypes->newEntity();
        if ($this->request->is('post')) {
            $propertyType = $this->PropertyTypes->patchEntity($propertyType, $this->request->data);
            if ($this->PropertyTypes->save($propertyType)) {
                $this->Flash->success('The property type has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The property type could not be saved. Please, try again.');
            }
        }
        $this->set(compact('propertyType'));
        $this->set('_serialize', ['propertyType']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Property Type id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $propertyType = $this->PropertyTypes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $propertyType = $this->PropertyTypes->patchEntity($propertyType, $this->request->data);
            if ($this->PropertyTypes->save($propertyType)) {
                $this->Flash->success('The property type has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The property type could not be saved. Please, try again.');
            }
        }
        $this->set(compact('propertyType'));
        $this->set('_serialize', ['propertyType']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Property Type id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $propertyType = $this->PropertyTypes->get($id);
        if ($this->PropertyTypes->delete($propertyType)) {
            $this->Flash->success('The property type has been deleted.');
        } else {
            $this->Flash->error('The property type could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }
}
