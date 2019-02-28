<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * FloorSubcategories Controller
 *
 * @property \App\Model\Table\FloorSubcategoriesTable $FloorSubcategories
 */
class FloorSubcategoriesController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['FloorCategories']
        ];
        $this->set('floorSubcategories', $this->paginate($this->FloorSubcategories));
        $this->set('_serialize', ['floorSubcategories']);
    }

    /**
     * View method
     *
     * @param string|null $id Floor Subcategory id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $floorSubcategory = $this->FloorSubcategories->get($id, [
            'contain' => ['FloorCategories', 'FloorPlans']
        ]);
        $this->set('floorSubcategory', $floorSubcategory);
        $this->set('_serialize', ['floorSubcategory']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $floorSubcategory = $this->FloorSubcategories->newEntity();
        if ($this->request->is('post')) {
            $floorSubcategory = $this->FloorSubcategories->patchEntity($floorSubcategory, $this->request->data);
            if ($this->FloorSubcategories->save($floorSubcategory)) {
                $this->Flash->success('The floor subcategory has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The floor subcategory could not be saved. Please, try again.');
            }
        }
        $floorCategories = $this->FloorSubcategories->FloorCategories->find('list', ['limit' => 200]);
        $this->set(compact('floorSubcategory', 'floorCategories'));
        $this->set('_serialize', ['floorSubcategory']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Floor Subcategory id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $floorSubcategory = $this->FloorSubcategories->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $floorSubcategory = $this->FloorSubcategories->patchEntity($floorSubcategory, $this->request->data);
            if ($this->FloorSubcategories->save($floorSubcategory)) {
                $this->Flash->success('The floor subcategory has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The floor subcategory could not be saved. Please, try again.');
            }
        }
        $floorCategories = $this->FloorSubcategories->FloorCategories->find('list', ['limit' => 200]);
        $this->set(compact('floorSubcategory', 'floorCategories'));
        $this->set('_serialize', ['floorSubcategory']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Floor Subcategory id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $floorSubcategory = $this->FloorSubcategories->get($id);
        if ($this->FloorSubcategories->delete($floorSubcategory)) {
            $this->Flash->success('The floor subcategory has been deleted.');
        } else {
            $this->Flash->error('The floor subcategory could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }
	
	public function subfloor($catid) {
	    $this->layout='ajax';
        $this->autoRender = false;
	    $data='<option value="0">Select Sub category</option>';
		$subcatlist=$this->FloorSubcategories->find()->select(['name','id'])->where(['floor_category_id'=>$catid]);
		foreach($subcatlist as $key=>$value){ $data.='<option value="'.$value['id'].'">'.$value['name'].'</option>';}
		echo $data;
	}
	
	
}
