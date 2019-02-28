<div id="wrapper">

      <!-- Sidebar -->
 

      <div id="content-wrapper">

        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
               <a href="<?=SITE_PATH?>admin/users/welcome/">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Floor Plan</li>
          </ol>
       <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Floor Plan'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Floor Categories'), ['controller' => 'FloorCategories', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('List Floor Subcategories'), ['controller' => 'FloorSubcategories', 'action' => 'index']) ?> </li>
    </ul>
          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
             Properties Floor Plan List</div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                       <th><input type="checkbox" id="checkall"> <?= $this->Paginator->sort('id') ?></th>
                       <th>Property</th>
                       <th>Floor Category</th>
                       <th>Floor Subcategory</th>
                       <th>Name</th>
                       <th>Carpet area</th>
					   <th>Balcony area</th>
					   <th>Saleable area</th>
                       <th>Photo</th>
                       <th>Actions</th>
                    </tr>
                  </thead>
                  
                  <tfoot>
                    <tr>
                   <th><input type="checkbox" id="checkall"> <?= $this->Paginator->sort('id') ?></th>
                   <th>Property</th>
               	   <th>Floor Category</th>
               	   <th>Floor Subcategory</th>
                   <th>Name</th>
                   <th>Carpet area</th>
				   <th>Balcony area</th>
					<th>Saleable area</th>
                   <th>Photo</th>
				  
				   <th>Actions</th>
                 
                  <tr><td colspan='9' align='left'><input type="hidden" name="referer" value="/admin/floor_plans/index?<? if(isset($_SERVER['REDIRECT_QUERY_STRING'])){ echo $_SERVER['REDIRECT_QUERY_STRING'];}?>"><button type="submit" onclick="if(confirm('Are you sure you want to delete')){ return true;}else{return false;}">Delete</button></td></tr>
                    </tr>
                  </tfoot>
                  <tbody>
                   <?php foreach ($floorPlans as $floorPlan):
	      
	  ?>
        <tr>
            <td><input type="checkbox" name="photo_multi_delete[]" value="<?=$floorPlan->id?>"  class="kselItems"><?= $this->Number->format($floorPlan->id) ?></td>
            <td>
                <?= $floorPlan->has('property') ? $this->Html->link($floorPlan->property->name, ['controller' => 'Properties', 'action' => 'view', $floorPlan->property->id]) : '' ?>
            </td>
            <td>
                <?= $floorPlan->has('floor_category') ? $this->Html->link($floorPlan->floor_category->name, ['controller' => 'FloorCategories', 'action' => 'view', $floorPlan->floor_category->id]) : '' ?>
            </td>
            <td>
                <?= $floorPlan->has('floor_subcategory') ? $this->Html->link(substr($floorPlan->floor_subcategory->name,0,15), ['controller' => 'FloorSubcategories', 'action' => 'view', $floorPlan->floor_subcategory->id]) : '' ?>
            </td>
            <td><?= h(substr($floorPlan->name,0,15)) ?></td>
            <td><?= h(substr($floorPlan->carpet,0,15)) ?></td>
			<td><?= h(substr($floorPlan->balcony,0,15)) ?></td>
			<td><?= h(substr($floorPlan->saleable,0,15)) ?></td>
            <td><?= $this->Html->image(IMG_PATH.'property/floor/thumb/'.$floorPlan->photo, ['alt' => $floorPlan->name,'width' => '20','height' => '20']); ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $floorPlan->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $floorPlan->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $floorPlan->id], ['confirm' => __('Are you sure you want to delete # {0}?', $floorPlan->id)]) ?>
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