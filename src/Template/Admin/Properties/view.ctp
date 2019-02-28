<ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="<?=SITE_PATH?>admin/users/welcome/">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Properties</li>
          </ol>
<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Property'), ['action' => 'edit', $property->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Property'), ['action' => 'delete', $property->id], ['confirm' => __('Are you sure you want to delete # {0}?', $property->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Properties'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Property'), ['action' => 'add']) ?> </li>
    </ul>
</div>
<div class="form-label-group form-group container">
    <h2><?= h($property->name) ?></h2>
     <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
           <tr><td> <h6 class="subheader"><?= __('Builder') ?></h6>
            <td><p><?= $property->has('builder') ? $this->Html->link($property->builder->name, ['controller' => 'Builders', 'action' => 'view', $property->builder->id]) : '' ?></p>
            <tr><td><h6 class="subheader"><?= __('Property Type') ?></h6>
            <td><p><?= $property->has('property_type') ? $this->Html->link($property->property_type->name, ['controller' => 'PropertyTypes', 'action' => 'view', $property->property_type->id]) : '' ?></p>
            <tr><td><h6 class="subheader"><?= __('Location') ?></h6>
            <td><p><?= $property->has('location') ? $this->Html->link($property->location->name, ['controller' => 'Locations', 'action' => 'view', $property->location->id]) : '' ?></p>
            <tr><td><h6 class="subheader"><?= __('Propertype Location') ?></h6>
            <td><p><?= $property->has('propertype_location') ? $this->Html->link($property->propertype_location->name, ['controller' => 'PropertypeLocations', 'action' => 'view', $property->propertype_location->id]) : '' ?></p>
            <tr><td><h6 class="subheader"><?= __('Name') ?></h6>
            <td><p><?= h($property->name) ?></p>
            <tr><td><h6 class="subheader"><?= __('Url') ?></h6>
            <td><p><?= h($property->url) ?></p>
            <tr><td><h6 class="subheader"><?= __('Small Info') ?></h6>
            <td><p><?= h($property->small_info) ?></p>
            <tr><td><h6 class="subheader"><?= __('Heading2') ?></h6>
            <td><p><?= h($property->heading2) ?></p>
            <tr><td><h6 class="subheader"><?= __('Heading3') ?></h6>
            <td><p><?= h($property->heading3) ?></p>
            <tr><td><h6 class="subheader"><?= __('Property Subtype') ?></h6>
            <td><p><?= $property->has('property_subtype') ? $this->Html->link($property->property_subtype->name, ['controller' => 'PropertySubtypes', 'action' => 'view', $property->property_subtype->id]) : '' ?></p>
            <tr><td><h6 class="subheader"><?= __('Location Text') ?></h6>
            <td><p><?= h($property->location_text) ?></p>
            <tr><td><h6 class="subheader"><?= __('Project Status') ?></h6>
            <td><p><?= h($property->project_status) ?></p>
            <tr><td><h6 class="subheader"><?= __('Tabs') ?></h6>
            <td><p><?= h($property->tabs) ?></p>
            <tr><td><h6 class="subheader"><?= __('Area') ?></h6>
            <td><p><?= h($property->area) ?></p>
            <tr><td><h6 class="subheader"><?= __('Availability') ?></h6>
            <td><p><?= h($property->availability) ?></p>
            <tr><td><h6 class="subheader"><?= __('Price') ?></h6>
            <td><p><?= h($property->price) ?></p>
            <tr><td><h6 class="subheader"><?= __('Completion') ?></h6>
            <td><p><?= h($property->completion) ?></p>
            <tr><td><h6 class="subheader"><?= __('Sector') ?></h6>
            <td><p><?= $property->has('sector') ? $this->Html->link($property->sector->name, ['controller' => 'Sectors', 'action' => 'view', $property->sector->id]) : '' ?></p>
            <tr><td><h6 class="subheader"><?= __('Property Logo') ?></h6>
            <td><p><?= h($property->property_logo) ?></p>
            <tr><td><h6 class="subheader"><?= __('Property Logo Alt Tag') ?></h6>
            <td><p><?= h($property->property_logo_alt_tag) ?></p>
            <tr><td><h6 class="subheader"><?= __('Property Image') ?></h6>
            <td><p><?= h($property->property_image) ?></p>
            <tr><td><h6 class="subheader"><?= __('Property Image Alt Tag') ?></h6>
            <td><p><?= h($property->property_image_alt_tag) ?></p>
            <tr><td><h6 class="subheader"><?= __('Location Heading') ?></h6>
            <td><p><?= h($property->location_heading) ?></p>
            <tr><td><h6 class="subheader"><?= __('Location Image') ?></h6>
            <td><p><?= h($property->location_image) ?></p>
            <tr><td><h6 class="subheader"><?= __('Location Alt Tag') ?></h6>
            <td><p><?= h($property->location_alt_tag) ?></p>
            <tr><td><h6 class="subheader"><?= __('Master Heading') ?></h6>
            <td><p><?= h($property->master_heading) ?></p>
            <tr><td><h6 class="subheader"><?= __('Master Image') ?></h6>
            <td><p><?= h($property->master_image) ?></p>
            <tr><td><h6 class="subheader"><?= __('Master Alt Tag') ?></h6>
            <td><p><?= h($property->master_alt_tag) ?></p>
            <tr><td><h6 class="subheader"><?= __('Site Heading') ?></h6>
            <td><p><?= h($property->site_heading) ?></p>
            <tr><td><h6 class="subheader"><?= __('Site Image') ?></h6>
            <td><p><?= h($property->site_image) ?></p>
            <tr><td><h6 class="subheader"><?= __('Site Alt Tag') ?></h6>
            <td><p><?= h($property->site_alt_tag) ?></p>
            <tr><td><h6 class="subheader"><?= __('Numbering Heading') ?></h6>
            <td><p><?= h($property->numbering_heading) ?></p>
            <tr><td><h6 class="subheader"><?= __('Numbering Image') ?></h6>
            <td><p><?= h($property->numbering_image) ?></p>
            <tr><td><h6 class="subheader"><?= __('Numbering Alt Tag') ?></h6>
            <td><p><?= h($property->numbering_alt_tag) ?></p>
            <tr><td><h6 class="subheader"><?= __('Ebrochure Image') ?></h6>
            <td><p><?= h($property->ebrochure_image) ?></p>
            <tr><td><h6 class="subheader"><?= __('Overview Heading') ?></h6>
            <td><p><?= h($property->overview_heading) ?></p>
            <tr><td><h6 class="subheader"><?= __('Features Desc Heading') ?></h6>
            <td><p><?= h($property->features_desc_heading) ?></p>
            <tr><td><h6 class="subheader"><?= __('Amenities Heading') ?></h6>
            <td><p><?= h($property->amenities_heading) ?></p>
            <tr><td><h6 class="subheader"><?= __('Specification Heading') ?></h6>
            <td><p><?= h($property->specification_heading) ?></p>
            <tr><td><h6 class="subheader"><?= __('Ebrochure Heading') ?></h6>
            <td><p><?= h($property->ebrochure_heading) ?></p>
            <tr><td><h6 class="subheader"><?= __('Pricelist Heading') ?></h6>
            <td><p><?= h($property->pricelist_heading) ?></p>
            <tr><td><h6 class="subheader"><?= __('Application Heading') ?></h6>
            <td><p><?= h($property->application_heading) ?></p>
            <tr><td><h6 class="subheader"><?= __('Application Pdf') ?></h6>
            <td><p><?= h($property->application_pdf) ?></p>
            <tr><td><h6 class="subheader"><?= __('Application Image') ?></h6>
            <td><p><?= h($property->application_image) ?></p>
            <tr><td><h6 class="subheader"><?= __('Gallery Heading') ?></h6>
            <td><p><?= h($property->gallery_heading) ?></p>
            <tr><td><h6 class="subheader"><?= __('Layout Heading') ?></h6>
            <td><p><?= h($property->layout_heading) ?></p>
            <tr><td><h6 class="subheader"><?= __('Layout Image') ?></h6>
            <td><p><?= h($property->layout_image) ?></p>
            <tr><td><h6 class="subheader"><?= __('Layout Image Alt') ?></h6>
            <td><p><?= h($property->layout_image_alt) ?></p>
       
            <tr><td><h6 class="subheader"><?= __('Id') ?></h6>
            <td><p><?= $this->Number->format($property->id) ?></p>
            <tr><td><h6 class="subheader"><?= __('Budgetmin') ?></h6>
            <td><p><?= $this->Number->format($property->budgetmin) ?></p>
            <tr><td><h6 class="subheader"><?= __('Budgetmax') ?></h6>
            <td><p><?= $this->Number->format($property->budgetmax) ?></p>
            <tr><td><h6 class="subheader"><?= __('Upcoming Priority') ?></h6>
            <td><p><?= $this->Number->format($property->upcoming_priority) ?></p>
            <tr><td><h6 class="subheader"><?= __('Recent Priority') ?></h6>
            <td><p><?= $this->Number->format($property->recent_priority) ?></p>
            <tr><td><h6 class="subheader"><?= __('Luxury Priority') ?></h6>
            <td><p><?= $this->Number->format($property->luxury_priority) ?></p>
            <tr><td><h6 class="subheader"><?= __('Affordable Priority') ?></h6>
            <td><p><?= $this->Number->format($property->affordable_priority) ?></p>
            <tr><td><h6 class="subheader"><?= __('Recommended Priority') ?></h6>
            <td><p><?= $this->Number->format($property->recommended_priority) ?></p>
            <tr><td><h6 class="subheader"><?= __('Hot Priority') ?></h6>
            <td><p><?= $this->Number->format($property->hot_priority) ?></p>
            <tr><td><h6 class="subheader"><?= __('Nri Priority') ?></h6>
            <td><p><?= $this->Number->format($property->nri_priority) ?></p>
            <tr><td><h6 class="subheader"><?= __('Subvention Priority') ?></h6>
            <td><p><?= $this->Number->format($property->subvention_priority) ?></p>
            <tr><td><h6 class="subheader"><?= __('Plp Priority') ?></h6>
            <td><p><?= $this->Number->format($property->plp_priority) ?></p>
            <tr><td><h6 class="subheader"><?= __('Builderwise Priority') ?></h6>
            <td><p><?= $this->Number->format($property->builderwise_priority) ?></p>
            <tr><td><h6 class="subheader"><?= __('Ptypewise') ?></h6>
            <td><p><?= $this->Number->format($property->ptypewise) ?></p>
      
            <tr><td><h6 class="subheader"><?= __('Posted Date') ?></h6>
            <td><p><?= h($property->posted_date) ?></p>
            <tr><td><h6 class="subheader"><?= __('Update Date') ?></h6>
            <td><p><?= h($property->update_date) ?></p>
       
            <tr><td><h6 class="subheader"><?= __('Recommended Property') ?></h6>
            <td><?= $this->Text->autoParagraph(h($property->recommended_property)); ?>

       
            <tr><td><h6 class="subheader"><?= __('Bhk') ?></h6>
            <td><?= $this->Text->autoParagraph(h($property->bhk)); ?>

            <tr><td><h6 class="subheader"><?= __('Location Detail') ?></h6>
            <td><?= $this->Text->autoParagraph(h($property->location_detail)); ?>

      
            <tr><td><h6 class="subheader"><?= __('Overview') ?></h6>
            <td><?= $this->Text->autoParagraph(h($property->overview)); ?>

      
            <tr><td><h6 class="subheader"><?= __('Small Description') ?></h6>
            <td><?= $this->Text->autoParagraph(h($property->small_description)); ?>

       
            <tr><td><h6 class="subheader"><?= __('Features') ?></h6>
            <td><?= $this->Text->autoParagraph(h($property->features)); ?>

      
            <tr><td><h6 class="subheader"><?= __('Amenities') ?></h6>
            <td><?= $this->Text->autoParagraph(h($property->amenities)); ?>

       
            <tr><td><h6 class="subheader"><?= __('Specification') ?></h6>
            <td><?= $this->Text->autoParagraph(h($property->specification)); ?>

            <tr><td><h6 class="subheader"><?= __('Ebrochure Pdf') ?></h6>
            <td><?= $this->Text->autoParagraph(h($property->ebrochure_pdf)); ?>

       
            <tr><td><h6 class="subheader"><?= __('Ebrochure Desc') ?></h6>
            <td><?= $this->Text->autoParagraph(h($property->ebrochure_desc)); ?>

            <tr><td><h6 class="subheader"><?= __('Price List Desc') ?></h6>
            <td><?= $this->Text->autoParagraph(h($property->price_list_desc)); ?>

      
            <tr><td><h6 class="subheader"><?= __('Application Desc') ?></h6>
            <td><?= $this->Text->autoParagraph(h($property->application_desc)); ?>

      
            <tr><td><h6 class="subheader"><?= __('Youtube Url') ?></h6>
            <td><?= $this->Text->autoParagraph(h($property->youtube_url)); ?>

        
            <tr><td><h6 class="subheader"><?= __('Status') ?></h6>
            <td><?= $this->Text->autoParagraph(h($property->status)); ?>

            <tr><td><h6 class="subheader"><?= __('Seo Title') ?></h6>
            <td><?= $this->Text->autoParagraph(h($property->seo_title)); ?>

      
            <tr><td><h6 class="subheader"><?= __('Seo Description') ?></h6>
            <td><?= $this->Text->autoParagraph(h($property->seo_description)); ?>

            <tr><td><h6 class="subheader"><?= __('Seo Keyword') ?></h6>
            <td><?= $this->Text->autoParagraph(h($property->seo_keyword)); ?>

            <tr><td><h6 class="subheader"><?= __('Open Graph Tags') ?></h6>
            <td><?= $this->Text->autoParagraph(h($property->open_graph_tags)); ?>

     
            <tr><td><h6 class="subheader"><?= __('Open Graph Status') ?></h6>
            <td><?= $this->Text->autoParagraph(h($property->open_graph_status)); ?>

            <tr><td><h6 class="subheader"><?= __('Upcoming Property') ?></h6>
            <td><?= $this->Text->autoParagraph(h($property->upcoming_property)); ?>

   
            <tr><td><h6 class="subheader"><?= __('Recent Launches') ?></h6>
            <td><?= $this->Text->autoParagraph(h($property->recent_launches)); ?>

            <tr><td><h6 class="subheader"><?= __('Luxury Home') ?></h6>
            <td><?= $this->Text->autoParagraph(h($property->luxury_home)); ?>

            <tr><td><h6 class="subheader"><?= __('Affordable Home') ?></h6>
            <td><?= $this->Text->autoParagraph(h($property->affordable_home)); ?>

       
            <tr><td><h6 class="subheader"><?= __('Recommended') ?></h6>
            <td><?= $this->Text->autoParagraph(h($property->recommended)); ?>

       
            <tr><td><h6 class="subheader"><?= __('Hot Property') ?></h6>
            <td><?= $this->Text->autoParagraph(h($property->hot_property)); ?>

      
            <tr><td><h6 class="subheader"><?= __('Nri') ?></h6>
            <td><?= $this->Text->autoParagraph(h($property->nri)); ?>

      
            <tr><td><h6 class="subheader"><?= __('Subvention') ?></h6>
            <td><?= $this->Text->autoParagraph(h($property->subvention)); ?>

      
            <tr><td><h6 class="subheader"><?= __('Plp') ?></h6>
            <td><?= $this->Text->autoParagraph(h($property->plp)); ?>

       </table>
</div>




