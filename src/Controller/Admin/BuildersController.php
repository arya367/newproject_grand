<?php
namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
/**
 * Builders Controller
 *
 * @property \App\Model\Table\BuildersTable $Builders
 */
class BuildersController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
		$this->paginate = [
			'order'=>['navid'=>'asc']
        ];
        $this->set('builders', $this->paginate($this->Builders));
        $this->set('_serialize', ['builders']);
    }

    /**
     * View method
     *
     * @param string|null $id Builder id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $builder = $this->Builders->get($id, [
            'contain' => ['Properties']
        ]);
        $this->set('builder', $builder);
        $this->set('_serialize', ['builder']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $builder = $this->Builders->newEntity();
        if ($this->request->is('post')) {
			$this->loadComponent('Upload');
			$destinationorig = realpath('../webroot/img/builder/orig/') . '/';
	        $destinationthumb =realpath('../webroot/img/builder/thumb/') . '/';
			$resultval="" ;
			$file = $this->request->data['photo'];
			if($file['name']!=""){ 
			$resultval = $this->Upload->uploadimg($file,$destinationorig,$destinationthumb,162,76); }
			$this->request->data['photo']=$resultval;
            $builder = $this->Builders->patchEntity($builder, $this->request->data);
            if ($this->Builders->save($builder)) {
                $this->Flash->success('The builder has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The builder could not be saved. Please, try again.');
            }
        }
        $this->set(compact('builder'));
        $this->set('_serialize', ['builder']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Builder id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $builder = $this->Builders->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
			$this->loadComponent('Upload');
			$destinationorig  = realpath('../webroot/img/builder/orig/') . '/';
	        $destinationthumb = realpath('../webroot/img/builder/thumb/') . '/';
			$resultval="" ;
			if($this->request->data['photonew']['size']!=0){
			@unlink($destinationorig.$this->request->data['photo']);
			@unlink($destinationthumb.$this->request->data['photo']);
			$file = $this->request->data['photonew'];
			$resultval = $this->Upload->uploadimg($file,$destinationorig,$destinationthumb,162,76); 
			$this->request->data['photo']=$resultval;}
			
			
            $builder = $this->Builders->patchEntity($builder, $this->request->data);
            if ($this->Builders->save($builder)) {
                $this->Flash->success('The builder has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The builder could not be saved. Please, try again.');
            }
        }
        $this->set(compact('builder'));
        $this->set('_serialize', ['builder']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Builder id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $builder = $this->Builders->get($id);
		
		$destinationorig  = realpath('../webroot/img/builder/orig/') . '/';
	    $destinationthumb = realpath('../webroot/img/builder/thumb/') . '/';
			
			
        if ($this->Builders->delete($builder)) {
			@unlink($destinationorig.$builder['photo']);
			@unlink($destinationthumb.$builder['photo']);
            $this->Flash->success('The builder has been deleted.');
        } else {
            $this->Flash->error('The builder could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }
	
	public function resetallpriority() {
	
	if ($this->request->is('ajax')) {
	$builders = TableRegistry::get('Builders');
	$this->layout='ajax';
    $this->autoRender = false;
	
	$orderby='navid';
	
	$result=$builders->find()->select(['id'])->where(['status' => 'active'])->order(['navid'=>'asc']);
	
	//"select id from builders where status='active' order by $orderby";
	$i=1;
	foreach ($result as $builder)
	{
	// where '1' is the id of your user 
	//echo $builder['id'];
	$builders->query()->update()->set([$orderby => $i])->where(['id' => $builder['id']])->execute();
	$i++;
	    }
	  }
     }
	 
	 
	 public function swappriority() {
	
	if ($this->request->is('ajax') and isset($this->request->params['pass'][0])) {
	$this->layout='ajax';
    $this->autoRender = false;
	$builders = TableRegistry::get('Builders');
	
	$orderby=$this->request->params['pass'][0];
	$newpr=$this->request->params['pass'][1];
	$oldpr=$this->request->params['pass'][2];
	
	$old=$oldpr;
	$newagain=$newpr;
	$oldagain=$oldpr;
	
	if ($newpr > $oldpr)
	{
	$firstquery=$builders->query()->update()->set([$orderby => '2147483647'])->where([$orderby => $oldagain,'status'=>'active'])->execute();
	//$firstquery=$this->Builder->query("update builders set $orderby = '2147483647' where $orderby = '".$oldagain."'  and status='active'");
	for ($pq=$oldagain+1;$pq<=$newagain;$pq++)
	{
	$try=$builders->query()->update()->set([$orderby => $old])->where([$orderby => $pq,'status'=>'active'])->execute();
	//$try=$this->Builder->query("update builders set $orderby = '".$old."' where $orderby = '".$pq."'  and status='active'");
	$old++;
	}
	$secondquery=$builders->query()->update()->set([$orderby => $newagain])->where([$orderby => '2147483647','status'=>'active'])->execute();
	//$secondquery=$this->Builder->query("update builders set $orderby = '".$newagain."' where $orderby = '2147483647'  and status='active'");
	}
	if ($oldpr > $newpr)
	{
	$firstquery=$builders->query()->update()->set([$orderby => '2147483647'])->where([$orderby => $oldagain,'status'=>'active'])->execute();
	//$firstquery=$this->Builder->query("update builders set $orderby = '2147483647' where $orderby = '".$oldagain."'  and status='active'");
	for ($pq=$oldagain-1;$pq>=$newagain;$pq--)
	{
	$try=$builders->query()->update()->set([$orderby => $old])->where([$orderby => $pq,'status'=>'active'])->execute();
	//$try=$this->Builder->query("update builders set $orderby = '".$old."' where $orderby = '".$pq."'  and status='active'");
	$old--;
	}
	$secondquery=$builders->query()->update()->set([$orderby => $newagain])->where([$orderby => '2147483647','status'=>'active'])->execute();
	//$secondquery=$this->Builder->query("update builders set $orderby = '".$newagain."' where $orderby = '2147483647'  and status='active'");
	}
	}
	}
}
