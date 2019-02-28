<style>
.overview{width:100%}
</style>
<div id="wrapper">

      <div id="content-wrapper">

        <div class="container-fluid">
<ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="<?=SITE_PATH?>admin/users/welcome/">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Builder List</li>
          </ol>

    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Builder'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Properties'), ['controller' => 'Properties', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Property'), ['controller' => 'Properties', 'action' => 'add']) ?> </li>
    </ul>
<div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Projects Builder List</div>
            <div class="card-body">
              <div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
    <tr><th colspan="7"> <button class="resetall" name="reset">Reset All Priority</button></th></tr>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Heading</th>
            <th>Logo</th>
            <th>Status</th>
			<th>Navid</th>
            <th>Actions</th>
        </tr>
    </thead>
	<tfoot>
   
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Heading</th>
            <th>Logo</th>
            <th>Status</th>
			<th>Navid</th>
            <th>Actions</th>
        </tr>
		 <tr><th colspan="7"> <button class="resetall" name="reset">Reset All Priority</button></th></tr>
    </tfoot>
    <tbody>
    <?php foreach ($builders as $key=>$builder): ?>
        <tr>
            <td><?= $this->Number->format($builder->id) ?></td>
            <td><?= h($builder->name) ?></td>
            <td><?= h($builder->heading) ?></td>
            <td><?php echo $this->Html->image(IMG_PATH.'builder/thumb/'.$builder->photo, ['width' =>'30','height' =>'30']); ?></td>
            <td><?= h($builder->status) ?></td>
            <td><input type="number" value="<?= $this->Number->format($builder->navid) ?>" id="<?=$key?>_new<?= $this->Number->format($builder->navid) ?>" onChange="changePriority('<?=$key?>','<?= $this->Number->format($builder->navid) ?>')"><input type="hidden"  value="<?= $this->Number->format($builder->navid) ?>" id="<?=$key?>_old<?= $this->Number->format($builder->navid) ?>"></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $builder->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $builder->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $builder->id], ['confirm' => __('Are you sure you want to delete # {0}?', $builder->id)]) ?>
            </td>
        </tr>

    <?php endforeach; ?>
    </tbody>
    </table>
   
</div></div></div></div>
<script>

$(document).ready(function(){
 $(".resetall").click(function(){
 $("#response").html("loading please wait......");
		$.ajax({url:"<?=SITE_PATH?>admin/builders/resetallpriority/",dataType:"html",success:function(result){
		 window.location.href="<?=SITE_PATH?>admin/builders/";
		}});
	});
});

function changePriority(key,field){
 
  var newpr=$("#"+key+"_new"+field).val();
  var oldpr=$("#"+key+"_old"+field).val();
  var orderby='navid';

  if(newpr<=0){alert("Please Insert Ranking For Project"); return false;}
  else if($.isNumeric( newpr )==false){alert("Please enter numeric value"); return false;}
  else
  {
     $("#response").html("loading please wait......");
     $.ajax({url:"<?=SITE_PATH?>admin/builders/swappriority/"+escape(orderby)+"/"+escape(newpr)+"/"+escape(oldpr),dataType:"html",success:function(result){
     window.location.href="<?=SITE_PATH?>admin/builders/";
	 
}});
}
}
</script>