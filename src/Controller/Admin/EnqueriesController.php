<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Enqueries Controller
 *
 * @property \App\Model\Table\EnqueriesTable $Enqueries
 */
class EnqueriesController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {  
        $this->set('enqueries', $this->paginate($this->Enqueries));
        $this->set('_serialize', ['enqueries']);
    }

    /**
     * View method
     *
     * @param string|null $id Enquery id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $enquery = $this->Enqueries->get($id, [
            'contain' => []
        ]);
        $this->set('enquery', $enquery);
        $this->set('_serialize', ['enquery']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $enquery = $this->Enqueries->newEntity();
        if ($this->request->is('post')) {
            $enquery = $this->Enqueries->patchEntity($enquery, $this->request->data);
            if ($this->Enqueries->save($enquery)) {
                $this->Flash->success('The enquery has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The enquery could not be saved. Please, try again.');
            }
        }
        $this->set(compact('enquery'));
        $this->set('_serialize', ['enquery']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Enquery id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $enquery = $this->Enqueries->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $enquery = $this->Enqueries->patchEntity($enquery, $this->request->data);
            if ($this->Enqueries->save($enquery)) {
                $this->Flash->success('The enquery has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The enquery could not be saved. Please, try again.');
            }
        }
        $this->set(compact('enquery'));
        $this->set('_serialize', ['enquery']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Enquery id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $enquery = $this->Enqueries->get($id);
        if ($this->Enqueries->delete($enquery)) {
            $this->Flash->success('The enquery has been deleted.');
        } else {
            $this->Flash->error('The enquery could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']); 
    }
}
