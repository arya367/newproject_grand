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
            <li class="breadcrumb-item active">Page View</li>
          </ol>


    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Page'), ['action' => 'edit', $page->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Page'), ['action' => 'delete', $page->id], ['confirm' => __('Are you sure you want to delete # {0}?', $page->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Pages'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Page'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Locations'), ['controller' => 'Locations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Location'), ['controller' => 'Locations', 'action' => 'add']) ?> </li>
    </ul>

<div class="form-group container">
    <h2><?= h($page->title) ?></h2>
	 <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    
           <tr><td> <h6 class="subheader"><?= __('Menu Heading') ?></h6></td>
            <td><p><?= h($page->menu_heading) ?></p></td></tr>
            <tr><td><h6 class="subheader"><?= __('Url Display') ?></h6>
            <td><p><?= h($page->url_display) ?></p></td></tr>
            <tr><td><h6 class="subheader"><?= __('Title') ?></h6>
           <td> <p><?= h($page->title) ?></p></td></tr>
           <tr><td> <h6 class="subheader"><?= __('Location') ?></h6>
           <td> <p><?= $page->has('location') ? $this->Html->link($page->location->name, ['controller' => 'Locations', 'action' => 'view', $page->location->id]) : '' ?></p></td></tr>
       
            <tr><td><h6 class="subheader"><?= __('Id') ?></h6>
            <td><p><?= $this->Number->format($page->id) ?></p></td></tr>
           <tr><td> <h6 class="subheader"><?= __('Navid') ?></h6>
           <td> <p><?= $this->Number->format($page->navid) ?></p></td></tr>
      
          <tr><td>  <h6 class="subheader"><?= __('Short Description') ?></h6>
          <td>  <?= $this->Text->autoParagraph(h($page->short_description)); ?></td></tr>

      
           <tr><td> <h6 class="subheader"><?= __('Description') ?></h6>
           <td> <?= $this->Text->autoParagraph(h($page->description)); ?></td></tr>

      
           <tr><td> <h6 class="subheader"><?= __('Status') ?></h6>
           <td> <?= $this->Text->autoParagraph(h($page->status)); ?></td></tr>

       
           <tr><td> <h6 class="subheader"><?= __('Top') ?></h6>
            <td><?= $this->Text->autoParagraph(h($page->top)); ?></td></tr>

      
           <tr><td> <h6 class="subheader"><?= __('Right') ?></h6>
           <td> <?= $this->Text->autoParagraph(h($page->right)); ?></td></tr>

       
           <tr><td> <h6 class="subheader"><?= __('Left') ?></h6>
           <td> <?= $this->Text->autoParagraph(h($page->left)); ?></td></tr>

   
           <tr><td> <h6 class="subheader"><?= __('Bottom') ?></h6>
           <td> <?= $this->Text->autoParagraph(h($page->bottom)); ?></td></tr>

      
            <tr><td><h6 class="subheader"><?= __('Meta Title') ?></h6>
            <td><?= $this->Text->autoParagraph(h($page->meta_title)); ?></td></tr>

      
           <tr><td> <h6 class="subheader"><?= __('Meta Keyword') ?></h6>
            <td><?= $this->Text->autoParagraph(h($page->meta_keyword)); ?></td></tr>

            <tr><td><h6 class="subheader"><?= __('Meta Description') ?></h6>
            <td> <?= $this->Text->autoParagraph(h($page->meta_description)); ?></td></tr>

           <tr><td> <h6 class="subheader"><?= __('Searchby') ?></h6>
           <td> <?= $this->Text->autoParagraph(h($page->searchby)); ?></td></tr>
</table>
        </div>
    </div>
</div>
