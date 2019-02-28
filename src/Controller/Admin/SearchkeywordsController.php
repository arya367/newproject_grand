<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Searchkeywords Controller
 *
 * @property \App\Model\Table\SearchkeywordsTable $Searchkeywords
 */
class SearchkeywordsController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('searchkeywords', $this->paginate($this->Searchkeywords));
        $this->set('_serialize', ['searchkeywords']);
    }

    /**
     * View method
     *
     * @param string|null $id Searchkeyword id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $searchkeyword = $this->Searchkeywords->get($id, [
            'contain' => []
        ]);
        $this->set('searchkeyword', $searchkeyword);
        $this->set('_serialize', ['searchkeyword']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $searchkeyword = $this->Searchkeywords->newEntity();
        if ($this->request->is('post')) {
            $searchkeyword = $this->Searchkeywords->patchEntity($searchkeyword, $this->request->data);
            if ($this->Searchkeywords->save($searchkeyword)) {
                $this->Flash->success('The searchkeyword has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The searchkeyword could not be saved. Please, try again.');
            }
        }
        $this->set(compact('searchkeyword'));
        $this->set('_serialize', ['searchkeyword']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Searchkeyword id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $searchkeyword = $this->Searchkeywords->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $searchkeyword = $this->Searchkeywords->patchEntity($searchkeyword, $this->request->data);
            if ($this->Searchkeywords->save($searchkeyword)) {
                $this->Flash->success('The searchkeyword has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The searchkeyword could not be saved. Please, try again.');
            }
        }
        $this->set(compact('searchkeyword'));
        $this->set('_serialize', ['searchkeyword']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Searchkeyword id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $searchkeyword = $this->Searchkeywords->get($id);
        if ($this->Searchkeywords->delete($searchkeyword)) {
            $this->Flash->success('The searchkeyword has been deleted.');
        } else {
            $this->Flash->error('The searchkeyword could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }
}
