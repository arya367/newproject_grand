<? use Cake\Network\Exception\NotFoundException; if(!isset($this->request->params['pass'][1])){ 
echo $this->element('overview');
 }else{ if(!$this->elementExists($this->request->params['pass'][1])){ throw new NotFoundException(__('404 NOT FOUND')); } else { echo $this->element($this->request->params['pass'][1]);} }?>