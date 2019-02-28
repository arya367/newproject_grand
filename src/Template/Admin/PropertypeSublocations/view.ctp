<ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="<?=SITE_PATH?>admin/users/welcome/">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Propertype Sublocation View</li>
          </ol>
<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Propertype Sublocation'), ['action' => 'edit', $propertypeSublocation->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Propertype Sublocation'), ['action' => 'delete', $propertypeSublocation->id], ['confirm' => __('Are you sure you want to delete # {0}?', $propertypeSublocation->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Propertype Sublocations'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Propertype Sublocation'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Locations'), ['controller' => 'Locations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Location'), ['controller' => 'Locations', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Sectors'), ['controller' => 'Sectors', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sector'), ['controller' => 'Sectors', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="form-group container">
    <h2><?= h($propertypeSublocation->name) ?></h2>
  
		<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <tr><td><h6 class="subheader"><?= __('Location') ?></h6>
            </td><td><p><?= $propertypeSublocation->has('location') ? $this->Html->link($propertypeSublocation->location->name, ['controller' => 'Locations', 'action' => 'view', $propertypeSublocation->location->id]) : '' ?></p></td></tr>
            <? /* ?><h6 class="subheader"><?= __('Sector') ?></h6>
            <tr><td><p><?= $propertypeSublocation->has('sector') ? $this->Html->link($propertypeSublocation->sector->name, ['controller' => 'Sectors', 'action' => 'view', $propertypeSublocation->sector->id]) : '' ?></p> <? */ ?>
           <tr><td> <h6 class="subheader"><?= __('Url') ?></h6>
           </td><td> <p><?= h($propertypeSublocation->url) ?></p></td></tr>
           <tr><td> <h6 class="subheader"><?= __('Name') ?></h6>
           </td><td><p><?= h($propertypeSublocation->name) ?></p></td></tr>
			
			<tr><td> <h6 class="subheader"><?= __('Heading1') ?></h6>
            </td><td><p><?= h($propertypeSublocation->heading1) ?></p></td></tr>
			
           <tr><td> <h6 class="subheader"><?= __('Heading2') ?></h6>
            </td><td><p><?= h($propertypeSublocation->heading2) ?></p></td></tr>
           <tr><td> <h6 class="subheader"><?= __('Id') ?></h6>
           </td><td> <p><?= $this->Number->format($propertypeSublocation->id) ?></p></td></tr>
           <tr><td> <h6 class="subheader"><?= __('Created') ?></h6>
           </td><td> <p><?= h($propertypeSublocation->created) ?></p></td></tr>
            <tr><td><h6 class="subheader"><?= __('Updated') ?></h6>
          </td><td> <p><?= h($propertypeSublocation->updated) ?></p></td></tr>
           <tr><td> <h6 class="subheader"><?= __('Seo Title') ?></h6>
            </td><td><?= $this->Text->autoParagraph(h($propertypeSublocation->seo_title)); ?></td></tr>
           <tr><td> <h6 class="subheader"><?= __('Seo Keyword') ?></h6>
           </td><td> <?= $this->Text->autoParagraph(h($propertypeSublocation->seo_keyword)); ?></td></tr>
           <tr><td> <h6 class="subheader"><?= __('Seo Description') ?></h6>
            </td><td><?= $this->Text->autoParagraph(h($propertypeSublocation->seo_description)); ?></td></tr>
            <tr><td><h6 class="subheader"><?= __('Description') ?></h6>
            </td><td><?= $this->Text->autoParagraph(h($propertypeSublocation->description)); ?></td></tr>
           <tr><td> <h6 class="subheader"><?= __('Status') ?></h6>
            </td><td><?= $this->Text->autoParagraph(h($propertypeSublocation->status)); ?></td></tr>
            <tr><td><h6 class="subheader"><?= __('Issublocation') ?></h6>
            </td><td><?= $this->Text->autoParagraph(h($propertypeSublocation->issublocation)); ?></td></tr>

		</table>
   