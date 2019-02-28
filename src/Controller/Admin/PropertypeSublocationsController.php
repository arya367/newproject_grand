<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * PropertypeSublocations Controller
 *
 * @property \App\Model\Table\PropertypeSublocationsTable $PropertypeSublocations
 */
class PropertypeSublocationsController extends AppController
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
        $this->set('propertypeSublocations', $this->paginate($this->PropertypeSublocations));
        $this->set('_serialize', ['propertypeSublocations']);
    }

    /**
     * View method
     *
     * @param string|null $id Propertype Sublocation id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $propertypeSublocation = $this->PropertypeSublocations->get($id, [
            'contain' => ['Locations']
        ]);
        $this->set('propertypeSublocation', $propertypeSublocation);
        $this->set('_serialize', ['propertypeSublocation']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $propertypeSublocation = $this->PropertypeSublocations->newEntity();
        if ($this->request->is('post')) {
            $propertypeSublocation = $this->PropertypeSublocations->patchEntity($propertypeSublocation, $this->request->data);
            if ($this->PropertypeSublocations->save($propertypeSublocation)) {
                $this->Flash->success('The propertype sublocation has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The propertype sublocation could not be saved. Please, try again.');
            }
        }
        $locations = $this->PropertypeSublocations->Locations->find('list', ['limit' => 200]);
        //$sectors = $this->PropertypeSublocations->Sectors->find('list', ['limit' => 200]);
        $this->set(compact('propertypeSublocation', 'locations', 'sectors'));
        $this->set('_serialize', ['propertypeSublocation']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Propertype Sublocation id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $propertypeSublocation = $this->PropertypeSublocations->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $propertypeSublocation = $this->PropertypeSublocations->patchEntity($propertypeSublocation, $this->request->data);
            if ($this->PropertypeSublocations->save($propertypeSublocation)) {
                $this->Flash->success('The propertype sublocation has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The propertype sublocation could not be saved. Please, try again.');
            }
        }
        $locations = $this->PropertypeSublocations->Locations->find('list', ['limit' => 200]);
        //$sectors = $this->PropertypeSublocations->Sectors->find('list', ['limit' => 200]);
        $this->set(compact('propertypeSublocation', 'locations'));
        $this->set('_serialize', ['propertypeSublocation']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Propertype Sublocation id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $propertypeSublocation = $this->PropertypeSublocations->get($id);
        if ($this->PropertypeSublocations->delete($propertypeSublocation)) {
            $this->Flash->success('The propertype sublocation has been deleted.');
        } else {
            $this->Flash->error('The propertype sublocation could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }
	
	public function sublocationlist($locid=null) {
	    $this->layout='ajax';
		$this->autoRender = false;
        $data='<option value="">Select Sublocation</option>';
		$sectors=$this->PropertypeSublocations->find()->select(['name','id'])->where(['location_id'=>$locid]);
		foreach($sectors as $key=>$value){ $data.='<option value="'.$value['id'].'">'.$value['name'].'</option>';}
		echo $data;
	}
	
	
}
