<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Amenities Controller
 *
 * @property \App\Model\Table\AmenitiesTable $Amenities
 */
class AmenitiesController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('amenities', $this->paginate($this->Amenities));
        $this->set('_serialize', ['amenities']);
    }

    /**
     * View method
     *
     * @param string|null $id Amenity id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $amenity = $this->Amenities->get($id, [
            'contain' => []
        ]);
        $this->set('amenity', $amenity);
        $this->set('_serialize', ['amenity']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $amenity = $this->Amenities->newEntity();
        if ($this->request->is('post')) {
			
            $amenity = $this->Amenities->patchEntity($amenity, $this->request->data);
            if ($this->Amenities->save($amenity)) {
                $this->Flash->success('The amenity has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The amenity could not be saved. Please, try again.');
            }
        }
        $this->set(compact('amenity'));
        $this->set('_serialize', ['amenity']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Amenity id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $amenity = $this->Amenities->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $amenity = $this->Amenities->patchEntity($amenity, $this->request->data);
            if ($this->Amenities->save($amenity)) {
                $this->Flash->success('The amenity has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The amenity could not be saved. Please, try again.');
            }
        }
        $this->set(compact('amenity'));
        $this->set('_serialize', ['amenity']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Amenity id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $amenity = $this->Amenities->get($id);
        if ($this->Amenities->delete($amenity)) {
            $this->Flash->success('The amenity has been deleted.');
        } else {
            $this->Flash->error('The amenity could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }
}
