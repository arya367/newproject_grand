<html>
<head>
<link rel="stylesheet" type="text/css" href="<?=SITE_PATH?>css/base.css" />

</head>
<body>
<div class="blogs form">
<div id="content">
<?= $this->Flash->render() ?>
<?= $this->Form->create($blog,["type"=>"file"]); ?>
	<fieldset>
		<legend><?php echo __('Upload Image'); ?></legend>
	<?php //print_r($blogs);
		echo $this->Form->input('image',["name"=>"image[]","type"=>"file","multiple"=>"multiple"]);
		echo $this->Form->input('more_images',["type"=>"hidden","value"=>$blog->more_images]);

	?>
	</fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?><br/>

<table cellpadding="0" cellspacing="0">
	<tr><th><?php echo ('image'); ?></th><th><?php echo ('link'); ?></th></tr>
    
    <?php if($blog->more_images!="") { $blogs=@explode("##",$blog->more_images); if(!empty($blogs)) { foreach ($blogs as $val): if($val!="") { ?>
	<tr>
	<td><img alt="" src="<?=SITE_PATH?>img/blogs/<?php echo h($val); ?>" width="50px" height="50px" />&nbsp;</td>
	<td><input type="text" value='<div class="body_img"><img alt="" src="<?=SITE_PATH?>img/blogs/<?php echo h($val); ?>" style="width: 100%" title="" /></div>'></td>
	</tr>
<?php } endforeach; } } ?>
	</table>
</div></div>
</body></html>
<script src="<?=SITE_PATH?>js/jquery-1.10.0.min.js"></script>
<script>
$(document).ready(function() {
    $("input:text").focus(function() { $(this).select(); } );
});
</script>