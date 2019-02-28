<style>
.overview{width:100%}
</style>
<ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="<?=SITE_PATH?>admin/users/welcome/">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Properties Overview</li>
          </ol>
<script src="<? echo JS_PATH?>ckeditor/ckeditor.js"></script>
<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('List Properties'), ['action' => 'index']) ?></li>
        <?php  echo $this->element('adminptabs'); ?>
    </ul>
</div>
<div class="form-group container">
    <?= $this->Form->create($property,['type'=>'file']); ?>
    <fieldset>
        <legend><?= __('Update Overview') ?></legend>
        <div class="accordion" id="accordion2">
  <div class="accordion-group">
    <div class="accordion-heading">
      <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion2" href="#overview1">
        Overview
      </a>
    </div>
    <div id="overview1" class="accordion-body collapse">
      <div class="accordion-inner">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
      <?php 
        echo "<tr><td>".$this->Form->input('overview_heading',['placeholder'=>'Overview Heading','label'=>false,'div'=>false,'class'=>'overview'])."</td></tr>";
		echo "<tr><td>".$this->Form->input('overview')."</tt></tr>";
	?>
    </table>
      </div>
    </div>
  </div>
  <div class="accordion-group">
    <div class="accordion-heading">
      <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#pricelist">
        Pricelist
      </a>
    </div>
    <div id="pricelist" class="accordion-body collapse">
      <div class="accordion-inner">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
      <?php 
        echo "<tr><td>".$this->Form->input('pricelist_heading',['placeholder'=>'Price List Heading','label'=>false,'div'=>false,'class'=>'overview'])."</td></tr>";
		echo "<tr><td>".$this->Form->input('price_list_desc')."</td></tr>";
	?></table>
      </div>
    </div>
  </div>
  <div class="accordion-group">
    <div class="accordion-heading">
      <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#specification1">
        Specification
      </a>
    </div>
    <div id="specification1" class="accordion-body collapse">
      <div class="accordion-inner">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
      <?php 
        echo "<tr><td>".$this->Form->input('specification_heading',['placeholder'=>'Specification','label'=>false,'div'=>false,'class'=>'overview'])."</td></tr>";
		echo "<tr><td>".$this->Form->input('specification')."</td></tr>";
	?>
    </table>
      </div>
    </div>
  </div>
  <?php /*?><div class="accordion-group">
    <div class="accordion-heading">
      <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#locationdetail">
        Location Detail
      </a>
    </div>
    <div id="locationdetail" class="accordion-body collapse">
      <div class="accordion-inner">
      <?php 
        echo $this->Form->input('location_detail');
	?>
      </div>
    </div>
  </div><?php */?>
  <div class="accordion-group">
    <div class="accordion-heading">
      <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#gallery">
        Video Url
      </a>
    </div>
    <div id="gallery" class="accordion-body collapse">
      <div class="accordion-inner">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
      <?php 
        echo "<tr><td>".$this->Form->input('gallery_heading',['placeholder'=>'Gallery Heading','label'=>false,'div'=>false,'class'=>'overview'])."</td></tr>";
		echo "<tr><td>".$this->Form->input('youtube_url',array('class'=>'overview'))."</td></tr>";
	
	?></table>
      </div>
    </div>
  </div>
  
</div>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
<?php echo $this->SetupEditor->setupEditor('overview'); ?>
<?php echo $this->SetupEditor->setupEditor('price-list-desc'); ?>
<?php echo $this->SetupEditor->setupEditor('specification'); ?>
<?php echo $this->SetupEditor->setupEditor('location-detail'); ?>
<script src="<?=SITE_PATH?>js/boot/jquery.js"></script>
<script src="<?=SITE_PATH?>js/boot/bootstrap-collapse.js"></script>