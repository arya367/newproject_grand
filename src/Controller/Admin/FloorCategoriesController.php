<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * FloorCategories Controller
 *
 * @property \App\Model\Table\FloorCategoriesTable $FloorCategories
 */
class FloorCategoriesController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('floorCategories', $this->paginate($this->FloorCategories));
        $this->set('_serialize', ['floorCategories']);
    }

    /**
     * View method
     *
     * @param string|null $id Floor Category id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    { 
        $floorCategory = $this->FloorCategories->get($id);
        $this->set('floorCategory', $floorCategory);
        $this->set('_serialize', ['floorCategory']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $floorCategory = $this->FloorCategories->newEntity();
        if ($this->request->is('post')) {
            $floorCategory = $this->FloorCategories->patchEntity($floorCategory, $this->request->data);
            if ($this->FloorCategories->save($floorCategory)) {
                $this->Flash->success('The floor category has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The floor category could not be saved. Please, try again.');
            }
        }
        $this->set(compact('floorCategory'));
        $this->set('_serialize', ['floorCategory']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Floor Category id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $floorCategory = $this->FloorCategories->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $floorCategory = $this->FloorCategories->patchEntity($floorCategory, $this->request->data);
            if ($this->FloorCategories->save($floorCategory)) {
                $this->Flash->success('The floor category has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The floor category could not be saved. Please, try again.');
            }
        }
        $this->set(compact('floorCategory'));
        $this->set('_serialize', ['floorCategory']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Floor Category id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $floorCategory = $this->FloorCategories->get($id);
        if ($this->FloorCategories->delete($floorCategory)) {
            $this->Flash->success('The floor category has been deleted.');
        } else {
            $this->Flash->error('The floor category could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }
}
