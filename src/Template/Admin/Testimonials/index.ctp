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
            <li class="breadcrumb-item active">Testimonial</li>
          </ol>
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
       
        <li><?= $this->Html->link(__('List Testimonial'), ['action' => 'index']) ?> </li>
		 <li><?= $this->Html->link(__('New Testimonial'), ['action' => 'add']) ?></li>
       
    </ul>
</div>
<div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Testimonial List</div>
            <div class="card-body">
              <div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Location</th>
            <th>Post</th>
			<th>Created</th>
            <th>Actions</th>
        </tr>
    </thead>
	 <tfoot>
        <tr>
             <th>Id</th>
            <th>Name</th>
            <th>Location</th>
            <th>Post</th>
			<th>Created</th>
            <th>Actions</th>
        </tr>
    </tfoot>
    <tbody>
    <?php foreach ($testimonials as $testimonial): ?>
        <tr>
            <td><?= $this->Number->format($testimonial->id) ?></td>
            <td><?= h($testimonial->name) ?></td>
            <td><?= h($testimonial->location) ?></td>
			<td><?= h($testimonial->post) ?></td>
			<td><?= h($testimonial->created) ?></td>
            
            <td class="actions">
               
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $testimonial->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $testimonial->id], ['confirm' => __('Are you sure you want to delete # {0}?', $blog->id)]) ?>
            </td>
        </tr>

    <?php endforeach; ?>
    </tbody>
    </table>
    
    </div></div></div>
</div>
