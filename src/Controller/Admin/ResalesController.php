<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Resales Controller
 *
 * @property \App\Model\Table\ResalesTable $Resales
 */
class ResalesController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Builders', 'Properties', 'Locations', 'PropertyTypes', 'PropertySubtypes', 'Sectors']
        ];
        $this->set('resales', $this->paginate($this->Resales));
        $this->set('_serialize', ['resales']);
    }

    /**
     * View method
     *
     * @param string|null $id Resale id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $resale = $this->Resales->get($id, [
            'contain' => ['Builders', 'Properties', 'Locations', 'PropertyTypes', 'PropertySubtypes', 'Sectors']
        ]);
        $this->set('resale', $resale);
        $this->set('_serialize', ['resale']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $resale = $this->Resales->newEntity();
        if ($this->request->is('post')) {
			$this->request->data['posted_date']=date("Y-m-d H:i:s");
			$bhk_type=strtoupper($this->request->data['bhk_type']); 
			$this->request->data['bhk_type']=$bhk_type;
			$this->request->data['posted_date']=date("Y-m-d H:i:s");
            $resale = $this->Resales->patchEntity($resale, $this->request->data);
            if ($this->Resales->save($resale)) {
                $this->Flash->success('The resale has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The resale could not be saved. Please, try again.');
            }
        }
        $builders = $this->Resales->Builders->find('list', ['limit' => 200]);
        $properties = $this->Resales->Properties->find('list', ['limit' => 200]);
        $locations = $this->Resales->Locations->find('list', ['limit' => 200]);
        $propertyTypes = $this->Resales->PropertyTypes->find('list', ['limit' => 200]);
        $propertySubtypes = $this->Resales->PropertySubtypes->find('list', ['limit' => 200]);
        $sectors = $this->Resales->Sectors->find('list', ['limit' => 200]);
        $this->set(compact('resale', 'builders', 'properties', 'locations', 'propertyTypes', 'propertySubtypes', 'sectors'));
        $this->set('_serialize', ['resale']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Resale id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
	 
    public function edit($id = null)
    {
        $resale = $this->Resales->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
			$this->request->data['updated_date']=date("Y-m-d H:i:s");
			$bhk_type=strtoupper($this->request->data['bhk_type']); 
			$this->request->data['bhk_type']=$bhk_type;
            $resale = $this->Resales->patchEntity($resale, $this->request->data);
            if ($this->Resales->save($resale)) {
                $this->Flash->success('The resale has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The resale could not be saved. Please, try again.');
            }
        }
        $builders = $this->Resales->Builders->find('list', ['limit' => 200]);
        $properties = $this->Resales->Properties->find('list', ['limit' => 200]);
        $locations = $this->Resales->Locations->find('list', ['limit' => 200]);
        $propertyTypes = $this->Resales->PropertyTypes->find('list', ['limit' => 200]);
        $propertySubtypes = $this->Resales->PropertySubtypes->find('list', ['limit' => 200]);
        $sectors = $this->Resales->Sectors->find('list', ['limit' => 200]);
        $this->set(compact('resale', 'builders', 'properties', 'locations', 'propertyTypes', 'propertySubtypes', 'sectors'));
        $this->set('_serialize', ['resale']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Resale id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
	 
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $resale = $this->Resales->get($id);
        if ($this->Resales->query()->update()->set(['status' => 'deactive'])->where(['id' => $id])->execute()) {
            $this->Flash->success('The resale has been deleted.');
        } else {
            $this->Flash->error('The resale could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }
}
?>
