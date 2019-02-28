<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Pages Controller
 *
 * @property \App\Model\Table\PagesTable $Pages
 */
class PagesController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            //'contain' => ['Locations']
        ];
        $this->set('pages', $this->paginate($this->Pages));
        $this->set('_serialize', ['pages']);
    }

    /**
     * View method
     *
     * @param string|null $id Page id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $page = $this->Pages->get($id, [
           // 'contain' => ['Locations']
        ]);
        $this->set('page', $page);
        $this->set('_serialize', ['page']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $page = $this->Pages->newEntity();
        if ($this->request->is('post')) {
            $page = $this->Pages->patchEntity($page, $this->request->data);
            if ($this->Pages->save($page)) {
                $this->Flash->success('The page has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The page could not be saved. Please, try again.');
            }
        }
        $locations = $this->Pages->Locations->find('list', ['limit' => 200]);
        $this->set(compact('page', 'locations'));
        $this->set('_serialize', ['page']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Page id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $page = $this->Pages->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
			$this->loadComponent('Upload');
			$popuporig  = realpath('../webroot/img/popup/') . '/';
			$popupthumb  = "";
            if($this->request->data['homePopupBanner']['size']!=0){
			@unlink($popuporig.$this->request->data['hiddenPopupBanner']);
			@unlink($popuporig.$this->request->data['hiddenPopupBanner']);
			$file = $this->request->data['homePopupBanner'];
			$resultval1 = $this->Upload->uploadimg($file,$popuporig,$popupthumb,162,76);
			$this->request->data['homePopupBanner']=$resultval1;
			}
			else
			{
				$this->request->data['homePopupBanner']=$this->request->data['hiddenPopupBanner'];
			}
			if($this->request->data['homePopupBannerUrl']==""){ 
			@unlink($popuporig.$this->request->data['hiddenPopupBanner']);
			@unlink($popuporig.$this->request->data['hiddenPopupBanner']);
			$this->request->data['homePopupBanner']="";
			}
			
			
            $page = $this->Pages->patchEntity($page, $this->request->data);
            if ($this->Pages->save($page)) {
                $this->Flash->success('The page has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The page could not be saved. Please, try again.');
            }
        }
        $locations = $this->Pages->Locations->find('list', ['limit' => 200]);
        $this->set(compact('page', 'locations'));
        $this->set('_serialize', ['page']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Page id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $page = $this->Pages->get($id);
        if ($this->Pages->delete($page)) {
            $this->Flash->success('The page has been deleted.');
        } else {
            $this->Flash->error('The page could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }
	
	 public function display()
    {
        $path = func_get_args();

        $count = count($path);
        if (!$count) {
            return $this->redirect('/');
        }
        $page = $subpage = null;

        if (!empty($path[0])) {
            $page = $path[0];
        }
        if (!empty($path[1])) {
            $subpage = $path[1];
        }
        $this->set(compact('page', 'subpage'));

        try {
            $this->render(implode('/', $path));
        } catch (MissingTemplateException $e) {
            if (Configure::read('debug')) {
                throw $e;
            }
            throw new NotFoundException();
        }
    }
}
