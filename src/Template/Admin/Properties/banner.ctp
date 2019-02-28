<ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="<?=SITE_PATH?>admin/users/welcome/">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Properties Banner</li>
          </ol>
<?  //use Cake\I18n\Time; ?><div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('List Properties'), ['action' => 'index']) ?></li>
        <?php  echo $this->element('adminptabs'); ?>
    </ul>
</div> 
<div class="form-group container">
   <?= $this->Form->create('banners',['type'=>'file']); ?> 
    <fieldset>
        <legend><?= __('Update Banners') ?></legend>
         <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <?php
         
		//echo  Time::now();
		if(!empty($banners) && isset($banners[0])) {
		echo "<tr><td><p>Name 1</p>".$this->Form->input('name[]',['label'=>false,'value'=>$banners[0]['name']]);
		echo $this->Form->input('id[]',['type'=>'hidden','value'=>$banners[0]['id']]);
		echo "<td><p>Banner 1</p>".$this->Form->input('photonew[]',["type"=>"file",'label'=>false])."</td>";
		if(!empty($banners[0]['photo'])){echo "<td>".$this->Html->image(IMG_PATH.'banner/thumb/'.$banners[0]['photo'], ['width' =>'50','height' =>'50'])."</td></tr>";}
		echo $this->Form->input('photo[]',["type"=>"hidden",'value'=>$banners[0]['photo']]);
		}
		
		else {
			
		echo "<tr><td><p>Name 1</p>".$this->Form->input('name[]',['label'=>false]);
		echo "</td><td>".$this->Form->input('photonew[]',["type"=>"file",'label'=>false])."</td></tr>";
		
			}
		if(!empty($banners) && isset($banners[1])) {
		echo "<tr><td><p>Name 2</p>".$this->Form->input('name[]',['label'=>false,'value'=>$banners[1]['name']]);
		echo  $this->Form->input('id[]',['type'=>'hidden','value'=>$banners[1]['id']]);
		echo "</td><td>".$this->Form->input('photonew[]',["type"=>"file",'label'=>'Banner 2'])."</td>";
		if(!empty($banners[1]['photo'])){echo "<td>".$this->Html->image(IMG_PATH.'banner/thumb/'.$banners[1]['photo'], ['width' =>'50','height' =>'50'])."</td></tr>";}
		echo $this->Form->input('photo[]',["type"=>"hidden",'value'=>$banners[1]['photo']]);
		}
		
		else {
			
		echo "<tr><td><p>Name 2</p>".$this->Form->input('name[]',['label'=>false]);
		echo "</td><td colspan='2'><p>Banner 2</p>".$this->Form->input('photonew[]',["type"=>"file",'label'=>false])."</td></tr>";
		
			}
		
		echo $this->Form->input('property_id',["type"=>"hidden","value"=>$this->request->params['pass'][0]]);
		//echo $this->Form->input('status',["type"=>"radio",'options' => ['active'=>'active', 'deactive'=>'deactive']]);
		//echo $this->Form->input('url');
			
			
			?>
    </fieldset>
    </table>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>