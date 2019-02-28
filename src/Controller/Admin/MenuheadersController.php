<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Menuheaders Controller
 *
 * @property \App\Model\Table\MenuheadersTable $Menuheaders
 */
class MenuheadersController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('menuheaders', $this->paginate($this->Menuheaders));
        $this->set('_serialize', ['menuheaders']);
    }

    /**
     * View method
     *
     * @param string|null $id Menuheader id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $menuheader = $this->Menuheaders->get($id, [
            'contain' => ['Menus']
        ]);
        $this->set('menuheader', $menuheader);
        $this->set('_serialize', ['menuheader']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $menuheader = $this->Menuheaders->newEntity();
        if ($this->request->is('post')) {
            $menuheader = $this->Menuheaders->patchEntity($menuheader, $this->request->data);
            if ($this->Menuheaders->save($menuheader)) {
                $this->Flash->success('The menuheader has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The menuheader could not be saved. Please, try again.');
            }
        }
        $this->set(compact('menuheader'));
        $this->set('_serialize', ['menuheader']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Menuheader id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $menuheader = $this->Menuheaders->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $menuheader = $this->Menuheaders->patchEntity($menuheader, $this->request->data);
            if ($this->Menuheaders->save($menuheader)) {
                $this->Flash->success('The menuheader has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The menuheader could not be saved. Please, try again.');
            }
        }
        $this->set(compact('menuheader'));
        $this->set('_serialize', ['menuheader']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Menuheader id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $menuheader = $this->Menuheaders->get($id);
        if ($this->Menuheaders->delete($menuheader)) {
            $this->Flash->success('The menuheader has been deleted.');
        } else {
            $this->Flash->error('The menuheader could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }
}
