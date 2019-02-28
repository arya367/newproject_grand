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
            <li class="breadcrumb-item active">Property Subtypes View</li>
          </ol>


    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Property Subtype'), ['action' => 'edit', $propertySubtype->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Property Subtype'), ['action' => 'delete', $propertySubtype->id], ['confirm' => __('Are you sure you want to delete # {0}?', $propertySubtype->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Property Subtypes'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Property Subtype'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Property Types'), ['controller' => 'PropertyTypes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Property Type'), ['controller' => 'PropertyTypes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Properties'), ['controller' => 'Properties', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Property'), ['controller' => 'Properties', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Propertype Locations'), ['controller' => 'PropertypeLocations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Propertype Location'), ['controller' => 'PropertypeLocations', 'action' => 'add']) ?> </li>
    </ul>

<div class="form-group container">
    <h2><?= h($propertySubtype->name) ?></h2>
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <tr><td><h6 class="subheader"><?= __('Property Type') ?></h6></td>
           <td> <p><?= $propertySubtype->has('property_type') ? $this->Html->link($propertySubtype->property_type->name, ['controller' => 'PropertyTypes', 'action' => 'view', $propertySubtype->property_type->id]) : '' ?></p>
             <tr><td><h6 class="subheader"><?= __('Name') ?></h6></td>
            <td><p><?= h($propertySubtype->name) ?></p></td></tr>
       
            <tr><td> <h6 class="subheader"><?= __('Id') ?></h6></td>
           <td>  <p><?= $this->Number->format($propertySubtype->id) ?></p></td></tr>
            <tr><td> <h6 class="subheader"><?= __('Priority') ?></h6></td>
           <td>  <p><?= $this->Number->format($propertySubtype->priority) ?></p></td></tr>
    </table>
    <h4 class="subheader"><?= __('Related Properties') ?></h4>
    <?php if (!empty($propertySubtype->properties)): ?>
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <tr>
            <th><?= __('Id') ?></th>
            <th><?= __('Builder Id') ?></th>
            <th><?= __('Property Type Id') ?></th>
            <th><?= __('Location Id') ?></th>
            <th><?= __('Propertype Location Id') ?></th>
            <th><?= __('Name') ?></th>
            <th><?= __('Url') ?></th>
            <th><?= __('Small Info') ?></th>
            <th><?= __('Heading2') ?></th>
            <th><?= __('Heading3') ?></th>
            <th><?= __('Property Subtype Id') ?></th>
            <th><?= __('Location Text') ?></th>
            <th><?= __('Project Status') ?></th>
            <th><?= __('Tabs') ?></th>
            <th><?= __('Recommended Property') ?></th>
            <th><?= __('Area') ?></th>
            <th><?= __('Availability') ?></th>
            <th><?= __('Bhk') ?></th>
            <th><?= __('Price') ?></th>
            <th><?= __('Budgetmin') ?></th>
            <th><?= __('Budgetmax') ?></th>
            <th><?= __('Completion') ?></th>
            <th><?= __('Sector Id') ?></th>
            <th><?= __('Property Logo') ?></th>
            <th><?= __('Property Logo Alt Tag') ?></th>
            <th><?= __('Property Image') ?></th>
            <th><?= __('Property Image Alt Tag') ?></th>
            <th><?= __('Location Heading') ?></th>
            <th><?= __('Location Image') ?></th>
            <th><?= __('Location Detail') ?></th>
            <th><?= __('Location Alt Tag') ?></th>
            <th><?= __('Master Heading') ?></th>
            <th><?= __('Master Image') ?></th>
            <th><?= __('Master Alt Tag') ?></th>
            <th><?= __('Site Heading') ?></th>
            <th><?= __('Site Image') ?></th>
            <th><?= __('Site Alt Tag') ?></th>
            <th><?= __('Numbering Heading') ?></th>
            <th><?= __('Numbering Image') ?></th>
            <th><?= __('Numbering Alt Tag') ?></th>
            <th><?= __('Overview') ?></th>
            <th><?= __('Ebrochure Image') ?></th>
            <th><?= __('Small Description') ?></th>
            <th><?= __('Features') ?></th>
            <th><?= __('Amenities') ?></th>
            <th><?= __('Specification') ?></th>
            <th><?= __('Ebrochure Pdf') ?></th>
            <th><?= __('Ebrochure Desc') ?></th>
            <th><?= __('Overview Heading') ?></th>
            <th><?= __('Features Desc Heading') ?></th>
            <th><?= __('Amenities Heading') ?></th>
            <th><?= __('Specification Heading') ?></th>
            <th><?= __('Ebrochure Heading') ?></th>
            <th><?= __('Pricelist Heading') ?></th>
            <th><?= __('Price List Desc') ?></th>
            <th><?= __('Application Heading') ?></th>
            <th><?= __('Application Pdf') ?></th>
            <th><?= __('Application Image') ?></th>
            <th><?= __('Application Desc') ?></th>
            <th><?= __('Gallery Heading') ?></th>
            <th><?= __('Youtube Url') ?></th>
            <th><?= __('Layout Heading') ?></th>
            <th><?= __('Layout Image') ?></th>
            <th><?= __('Layout Image Alt') ?></th>
            <th><?= __('Posted Date') ?></th>
            <th><?= __('Update Date') ?></th>
            <th><?= __('Status') ?></th>
            <th><?= __('Seo Title') ?></th>
            <th><?= __('Seo Description') ?></th>
            <th><?= __('Seo Keyword') ?></th>
            <th><?= __('Open Graph Tags') ?></th>
            <th><?= __('Open Graph Status') ?></th>
            <th><?= __('Upcoming Property') ?></th>
            <th><?= __('Upcoming Priority') ?></th>
            <th><?= __('Recent Launches') ?></th>
            <th><?= __('Recent Priority') ?></th>
            <th><?= __('Luxury Home') ?></th>
            <th><?= __('Luxury Priority') ?></th>
            <th><?= __('Affordable Home') ?></th>
            <th><?= __('Affordable Priority') ?></th>
            <th><?= __('Recommended') ?></th>
            <th><?= __('Recommended Priority') ?></th>
            <th><?= __('Hot Property') ?></th>
            <th><?= __('Hot Priority') ?></th>
            <th><?= __('Nri') ?></th>
            <th><?= __('Nri Priority') ?></th>
            <th><?= __('Subvention') ?></th>
            <th><?= __('Subvention Priority') ?></th>
            <th><?= __('Plp') ?></th>
            <th><?= __('Plp Priority') ?></th>
            <th><?= __('Builderwise Priority') ?></th>
            <th><?= __('Ptypewise') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($propertySubtype->properties as $properties): ?>
        <tr>
            <td><?= h($properties->id) ?></td>
            <td><?= h($properties->builder_id) ?></td>
            <td><?= h($properties->property_type_id) ?></td>
            <td><?= h($properties->location_id) ?></td>
            <td><?= h($properties->propertype_location_id) ?></td>
            <td><?= h($properties->name) ?></td>
            <td><?= h($properties->url) ?></td>
            <td><?= h($properties->small_info) ?></td>
            <td><?= h($properties->heading2) ?></td>
            <td><?= h($properties->heading3) ?></td>
            <td><?= h($properties->property_subtype_id) ?></td>
            <td><?= h($properties->location_text) ?></td>
            <td><?= h($properties->project_status) ?></td>
            <td><?= h($properties->tabs) ?></td>
            <td><?= h($properties->recommended_property) ?></td>
            <td><?= h($properties->area) ?></td>
            <td><?= h($properties->availability) ?></td>
            <td><?= h($properties->bhk) ?></td>
            <td><?= h($properties->price) ?></td>
            <td><?= h($properties->budgetmin) ?></td>
            <td><?= h($properties->budgetmax) ?></td>
            <td><?= h($properties->completion) ?></td>
            <td><?= h($properties->sector_id) ?></td>
            <td><?= h($properties->property_logo) ?></td>
            <td><?= h($properties->property_logo_alt_tag) ?></td>
            <td><?= h($properties->property_image) ?></td>
            <td><?= h($properties->property_image_alt_tag) ?></td>
            <td><?= h($properties->location_heading) ?></td>
            <td><?= h($properties->location_image) ?></td>
            <td><?= h($properties->location_detail) ?></td>
            <td><?= h($properties->location_alt_tag) ?></td>
            <td><?= h($properties->master_heading) ?></td>
            <td><?= h($properties->master_image) ?></td>
            <td><?= h($properties->master_alt_tag) ?></td>
            <td><?= h($properties->site_heading) ?></td>
            <td><?= h($properties->site_image) ?></td>
            <td><?= h($properties->site_alt_tag) ?></td>
            <td><?= h($properties->numbering_heading) ?></td>
            <td><?= h($properties->numbering_image) ?></td>
            <td><?= h($properties->numbering_alt_tag) ?></td>
            <td><?= h($properties->overview) ?></td>
            <td><?= h($properties->ebrochure_image) ?></td>
            <td><?= h($properties->small_description) ?></td>
            <td><?= h($properties->features) ?></td>
            <td><?= h($properties->amenities) ?></td>
            <td><?= h($properties->specification) ?></td>
            <td><?= h($properties->ebrochure_pdf) ?></td>
            <td><?= h($properties->ebrochure_desc) ?></td>
            <td><?= h($properties->overview_heading) ?></td>
            <td><?= h($properties->features_desc_heading) ?></td>
            <td><?= h($properties->amenities_heading) ?></td>
            <td><?= h($properties->specification_heading) ?></td>
            <td><?= h($properties->ebrochure_heading) ?></td>
            <td><?= h($properties->pricelist_heading) ?></td>
            <td><?= h($properties->price_list_desc) ?></td>
            <td><?= h($properties->application_heading) ?></td>
            <td><?= h($properties->application_pdf) ?></td>
            <td><?= h($properties->application_image) ?></td>
            <td><?= h($properties->application_desc) ?></td>
            <td><?= h($properties->gallery_heading) ?></td>
            <td><?= h($properties->youtube_url) ?></td>
            <td><?= h($properties->layout_heading) ?></td>
            <td><?= h($properties->layout_image) ?></td>
            <td><?= h($properties->layout_image_alt) ?></td>
            <td><?= h($properties->posted_date) ?></td>
            <td><?= h($properties->update_date) ?></td>
            <td><?= h($properties->status) ?></td>
            <td><?= h($properties->seo_title) ?></td>
            <td><?= h($properties->seo_description) ?></td>
            <td><?= h($properties->seo_keyword) ?></td>
            <td><?= h($properties->open_graph_tags) ?></td>
            <td><?= h($properties->open_graph_status) ?></td>
            <td><?= h($properties->upcoming_property) ?></td>
            <td><?= h($properties->upcoming_priority) ?></td>
            <td><?= h($properties->recent_launches) ?></td>
            <td><?= h($properties->recent_priority) ?></td>
            <td><?= h($properties->luxury_home) ?></td>
            <td><?= h($properties->luxury_priority) ?></td>
            <td><?= h($properties->affordable_home) ?></td>
            <td><?= h($properties->affordable_priority) ?></td>
            <td><?= h($properties->recommended) ?></td>
            <td><?= h($properties->recommended_priority) ?></td>
            <td><?= h($properties->hot_property) ?></td>
            <td><?= h($properties->hot_priority) ?></td>
            <td><?= h($properties->nri) ?></td>
            <td><?= h($properties->nri_priority) ?></td>
            <td><?= h($properties->subvention) ?></td>
            <td><?= h($properties->subvention_priority) ?></td>
            <td><?= h($properties->plp) ?></td>
            <td><?= h($properties->plp_priority) ?></td>
            <td><?= h($properties->builderwise_priority) ?></td>
            <td><?= h($properties->ptypewise) ?></td>

            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'Properties', 'action' => 'view', $properties->id]) ?>

                <?= $this->Html->link(__('Edit'), ['controller' => 'Properties', 'action' => 'edit', $properties->id]) ?>

                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Properties', 'action' => 'delete', $properties->id], ['confirm' => __('Are you sure you want to delete # {0}?', $properties->id)]) ?>

            </td>
        </tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    </div>
</div>
<div class="form-group container">
    <h4 class="subheader"><?= __('Related PropertypeLocations') ?></h4>
    <?php if (!empty($propertySubtype->propertype_locations)): ?>
    <table class="table table-bordered">
        <tr>
            <th><?= __('Id') ?></th>
            <th><?= __('Property Type Id') ?></th>
            <th><?= __('Property Subtype Id') ?></th>
            <th><?= __('Location Id') ?></th>
            <th><?= __('Url') ?></th>
            <th><?= __('Name') ?></th>
            <th><?= __('Seo Title') ?></th>
            <th><?= __('Seo Keyword') ?></th>
            <th><?= __('Seo Description') ?></th>
            <th><?= __('Description') ?></th>
            <th><?= __('Created') ?></th>
            <th><?= __('Updated') ?></th>
            <th><?= __('Status') ?></th>
            <th><?= __('Issublocation') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($propertySubtype->propertype_locations as $propertypeLocations): ?>
        <tr>
            <td><?= h($propertypeLocations->id) ?></td>
            <td><?= h($propertypeLocations->property_type_id) ?></td>
            <td><?= h($propertypeLocations->property_subtype_id) ?></td>
            <td><?= h($propertypeLocations->location_id) ?></td>
            <td><?= h($propertypeLocations->url) ?></td>
            <td><?= h($propertypeLocations->name) ?></td>
            <td><?= h($propertypeLocations->seo_title) ?></td>
            <td><?= h($propertypeLocations->seo_keyword) ?></td>
            <td><?= h($propertypeLocations->seo_description) ?></td>
            <td><?= h($propertypeLocations->description) ?></td>
            <td><?= h($propertypeLocations->created) ?></td>
            <td><?= h($propertypeLocations->updated) ?></td>
            <td><?= h($propertypeLocations->status) ?></td>
            <td><?= h($propertypeLocations->issublocation) ?></td>

            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'PropertypeLocations', 'action' => 'view', $propertypeLocations->id]) ?>

                <?= $this->Html->link(__('Edit'), ['controller' => 'PropertypeLocations', 'action' => 'edit', $propertypeLocations->id]) ?>

                <?= $this->Form->postLink(__('Delete'), ['controller' => 'PropertypeLocations', 'action' => 'delete', $propertypeLocations->id], ['confirm' => __('Are you sure you want to delete # {0}?', $propertypeLocations->id)]) ?>

            </td>
        </tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    </div>
</div>
