<?php
namespace App\Controller\Admin;

use App\Controller\AppController;


/**
 * PropertypeLocations Controller
 *
 * @property \App\Model\Table\PropertypeLocationsTable $PropertypeLocations
 */
class PropertypeLocationsController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['PropertyTypes', 'Locations']
        ];
        $this->set('propertypeLocations', $this->paginate($this->PropertypeLocations));
        $this->set('_serialize', ['propertypeLocations']);
    }

    /**
     * View method
     *
     * @param string|null $id Propertype Location id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $propertypeLocation = $this->PropertypeLocations->get($id, [
            'contain' => ['PropertyTypes', 'PropertySubtypes', 'Locations', 'Properties']
        ]);
        $this->set('propertypeLocation', $propertypeLocation);
        $this->set('_serialize', ['propertypeLocation']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $propertypeLocation = $this->PropertypeLocations->newEntity();
        if ($this->request->is('post')) {
			
		//$this->request->data['created']=date('Y-m-d h:i:s');
		$this->request->data['updated']=date('Y-m-d h:i:s');
		
            $propertypeLocation = $this->PropertypeLocations->patchEntity($propertypeLocation, $this->request->data);
            if ($this->PropertypeLocations->save($propertypeLocation)) {
                $this->Flash->success('The propertype location has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The propertype location could not be saved. Please, try again.');
            }
        }
        $propertyTypes = $this->PropertypeLocations->PropertyTypes->find('list', ['limit' => 200]);
        $propertySubtypes = $this->PropertypeLocations->PropertySubtypes->find('list', ['limit' => 200]);
        $locations = $this->PropertypeLocations->Locations->find('list', ['limit' => 200]);
        $this->set(compact('propertypeLocation', 'propertyTypes', 'propertySubtypes', 'locations'));
        $this->set('_serialize', ['propertypeLocation']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Propertype Location id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $propertypeLocation = $this->PropertypeLocations->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
			
			
			$this->request->data['updated']=date('Y-m-d h:i:s');
			
            $propertypeLocation = $this->PropertypeLocations->patchEntity($propertypeLocation, $this->request->data);
			
            if ($this->PropertypeLocations->save($propertypeLocation)) {
                $this->Flash->success('The propertype location has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The propertype location could not be saved. Please, try again.');
            }
        }
        $propertyTypes = $this->PropertypeLocations->PropertyTypes->find('list', ['limit' => 200]);
        $propertySubtypes = $this->PropertypeLocations->PropertySubtypes->find('list', ['limit' => 200]);
        $locations = $this->PropertypeLocations->Locations->find('list', ['limit' => 200]);
        $this->set(compact('propertypeLocation', 'propertyTypes', 'propertySubtypes', 'locations'));
        $this->set('_serialize', ['propertypeLocation']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Propertype Location id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $propertypeLocation = $this->PropertypeLocations->get($id);
        if ($this->PropertypeLocations->delete($propertypeLocation)) {
            $this->Flash->success('The propertype location has been deleted.');
        } else {
            $this->Flash->error('The propertype location could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }
}
