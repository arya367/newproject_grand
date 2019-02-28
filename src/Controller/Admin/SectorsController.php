<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Sectors Controller
 *
 * @property \App\Model\Table\SectorsTable $Sectors
 */
class SectorsController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Locations']
        ];
        $this->set('sectors', $this->paginate($this->Sectors));
        $this->set('_serialize', ['sectors']);
    }

    /**
     * View method
     *
     * @param string|null $id Sector id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $sector = $this->Sectors->get($id, [
            'contain' => ['Locations']
        ]);
        $this->set('sector', $sector);
        $this->set('_serialize', ['sector']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $sector = $this->Sectors->newEntity();
        if ($this->request->is('post')) {
            $sector = $this->Sectors->patchEntity($sector, $this->request->data);
            if ($this->Sectors->save($sector)) {
                $this->Flash->success('The sector has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The sector could not be saved. Please, try again.');
            }
        }
        $locations = $this->Sectors->Locations->find('list', ['limit' => 200]);
        $this->set(compact('sector', 'locations'));
        $this->set('_serialize', ['sector']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Sector id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $sector = $this->Sectors->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $sector = $this->Sectors->patchEntity($sector, $this->request->data);
            if ($this->Sectors->save($sector)) {
                $this->Flash->success('The sector has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The sector could not be saved. Please, try again.');
            }
        }
        $locations = $this->Sectors->Locations->find('list', ['limit' => 200]);
        $this->set(compact('sector', 'locations'));
        $this->set('_serialize', ['sector']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Sector id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $sector = $this->Sectors->get($id);
        if ($this->Sectors->delete($sector)) {
            $this->Flash->success('The sector has been deleted.');
        } else {
            $this->Flash->error('The sector could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }
	
	
	public function sectorlist($locid=null) {
	    $this->layout='ajax';
		$this->autoRender = false;
        $data='<option value="">Select Sector</option>';
		$sectors=$this->Sectors->find()->select(['name','id'])->where(['location_id'=>$locid]);
		foreach($sectors as $key=>$value){ $data.='<option value="'.$value['id'].'">'.$value['name'].'</option>';}
		echo $data;
	}
}
