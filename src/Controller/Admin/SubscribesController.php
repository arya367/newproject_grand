<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Subscribes Controller
 *
 * @property \App\Model\Table\SubscribesTable $Subscribes
 */
class SubscribesController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('subscribes', $this->paginate($this->Subscribes));
        $this->set('_serialize', ['subscribes']);
    }

    /**
     * View method
     *
     * @param string|null $id Subscribe id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $subscribe = $this->Subscribes->get($id, [
            'contain' => []
        ]);
        $this->set('subscribe', $subscribe);
        $this->set('_serialize', ['subscribe']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $subscribe = $this->Subscribes->newEntity();
        if ($this->request->is('post')) {
            $subscribe = $this->Subscribes->patchEntity($subscribe, $this->request->data);
            if ($this->Subscribes->save($subscribe)) {
                $this->Flash->success('The subscribe has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The subscribe could not be saved. Please, try again.');
            }
        }
        $this->set(compact('subscribe'));
        $this->set('_serialize', ['subscribe']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Subscribe id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $subscribe = $this->Subscribes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $subscribe = $this->Subscribes->patchEntity($subscribe, $this->request->data);
            if ($this->Subscribes->save($subscribe)) {
                $this->Flash->success('The subscribe has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The subscribe could not be saved. Please, try again.');
            }
        }
        $this->set(compact('subscribe'));
        $this->set('_serialize', ['subscribe']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Subscribe id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $subscribe = $this->Subscribes->get($id);
        if ($this->Subscribes->delete($subscribe)) {
            $this->Flash->success('The subscribe has been deleted.');
        } else {
            $this->Flash->error('The subscribe could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }
}
