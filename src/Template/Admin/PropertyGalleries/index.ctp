<div id="wrapper">

      <div id="content-wrapper">

        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
             <a href="<?=SITE_PATH?>admin/users/welcome/">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Gallery</li>
          </ol>
            <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Property Gallery'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Properties'), ['controller' => 'Properties', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Property'), ['controller' => 'Properties', 'action' => 'add']) ?> </li>
    </ul>
          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Properties Gallery</div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                    <th><input type="checkbox" id="checkall"> <?= $this->Paginator->sort('id') ?></th>
                     <th>Property Name</th>
                     <th>Alt</th>
                     <th>image</th>
                     <th>Type</th>
                     <th>Actions</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                    <th><input type="checkbox" id="checkall"> <?= $this->Paginator->sort('id') ?></th>
                     <th>Property Name</th>
                     <th>Alt</th>
                     <th>Image</th>
                     <th>Type</th>
                     <th>Actions</th>
                    </tr>
                    <tr><td colspan='6' align='left'><input type="hidden" name="referer" value="/admin/property_galleries/index?<? if(isset($_SERVER['REDIRECT_QUERY_STRING'])){ echo $_SERVER['REDIRECT_QUERY_STRING'];}?>"><button type="submit" onclick="if(confirm('Are you sure you want to delete')){ return true;}else{return false;}">Delete</button></td></tr>
                    
                  </tfoot>
                  <tbody>
                    <?php foreach ($propertyGalleries as $propertyGallery): ?>
        <tr>
            <td><input type="checkbox" name="photo_multi_delete[]" value="<?=$propertyGallery->id?>" class="kselItems">&nbsp;<?= $this->Number->format($propertyGallery->id) ?></td>
            <td>
                <?= $propertyGallery->has('property') ? $this->Html->link($propertyGallery->Property->name, ['controller' => 'Properties', 'action' => 'view', $propertyGallery->property->id]) : '' ?>
            </td>
            <td><?= h($propertyGallery->alt) ?></td>
            <td><?= $this->Html->image(IMG_PATH.'property/gallery/thumb/'.$propertyGallery->image, ['alt' => $propertyGallery->name,'width' => '20','height' => '20']); ?></td>
            <td><?= h($propertyGallery->type) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $propertyGallery->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $propertyGallery->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $propertyGallery->id], ['confirm' => __('Are you sure you want to delete # {0}?', $propertyGallery->id)]) ?>
            </td>
        </tr>

    <?php endforeach; ?>
    
          
                  </tbody>
                </table>
              </div>
            </div>
            
          </div>
        </div>
        <!-- /.container-fluid -->

        <!-- Sticky Footer -->

      </div>
      <!-- /.content-wrapper -->

    </div>