<ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="<?=SITE_PATH?>admin/users/welcome/">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Properties Type Location View</li>
          </ol>
<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Propertype Location'), ['action' => 'edit', $propertypeLocation->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Propertype Location'), ['action' => 'delete', $propertypeLocation->id], ['confirm' => __('Are you sure you want to delete # {0}?', $propertypeLocation->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Propertype Locations'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Propertype Location'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Property Types'), ['controller' => 'PropertyTypes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Property Type'), ['controller' => 'PropertyTypes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Property Subtypes'), ['controller' => 'PropertySubtypes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Property Subtype'), ['controller' => 'PropertySubtypes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Locations'), ['controller' => 'Locations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Location'), ['controller' => 'Locations', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Properties'), ['controller' => 'Properties', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Property'), ['controller' => 'Properties', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="propertypeLocations view large-10 medium-9 columns">
    <h2><?= h($propertypeLocation->name) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Property Type') ?></h6>
            <p><?= $propertypeLocation->has('property_type') ? $this->Html->link($propertypeLocation->property_type->name, ['controller' => 'PropertyTypes', 'action' => 'view', $propertypeLocation->property_type->id]) : '' ?></p>
            <h6 class="subheader"><?= __('Property Subtype') ?></h6>
            <p><?= $propertypeLocation->has('property_subtype') ? $this->Html->link($propertypeLocation->property_subtype->name, ['controller' => 'PropertySubtypes', 'action' => 'view', $propertypeLocation->property_subtype->id]) : '' ?></p>
            <h6 class="subheader"><?= __('Location') ?></h6>
            <p><?= $propertypeLocation->has('location') ? $this->Html->link($propertypeLocation->location->name, ['controller' => 'Locations', 'action' => 'view', $propertypeLocation->location->id]) : '' ?></p>
            <h6 class="subheader"><?= __('Url') ?></h6>
            <p><?= h($propertypeLocation->url) ?></p>
            <h6 class="subheader"><?= __('Name') ?></h6>
            <p><?= h($propertypeLocation->name) ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($propertypeLocation->id) ?></p>
        </div>
        <div class="large-2 columns dates end">
            <h6 class="subheader"><?= __('Created') ?></h6>
            <p><?= h($propertypeLocation->created) ?></p>
            <h6 class="subheader"><?= __('Updated') ?></h6>
            <p><?= h($propertypeLocation->updated) ?></p>
        </div>
    </div>
    <div class="row texts">
        <div class="columns large-9">
            <h6 class="subheader"><?= __('Seo Title') ?></h6>
            <?= $this->Text->autoParagraph(h($propertypeLocation->seo_title)); ?>

        </div>
    </div>
    <div class="row texts">
        <div class="columns large-9">
            <h6 class="subheader"><?= __('Seo Keyword') ?></h6>
            <?= $this->Text->autoParagraph(h($propertypeLocation->seo_keyword)); ?>

        </div>
    </div>
    <div class="row texts">
        <div class="columns large-9">
            <h6 class="subheader"><?= __('Seo Description') ?></h6>
            <?= $this->Text->autoParagraph(h($propertypeLocation->seo_description)); ?>

        </div>
    </div>
    <div class="row texts">
        <div class="columns large-9">
            <h6 class="subheader"><?= __('Description') ?></h6>
            <?= $this->Text->autoParagraph(h($propertypeLocation->description)); ?>

        </div>
    </div>
    <div class="row texts">
        <div class="columns large-9">
            <h6 class="subheader"><?= __('Status') ?></h6>
            <?= $this->Text->autoParagraph(h($propertypeLocation->status)); ?>

        </div>
    </div>
    <div class="row texts">
        <div class="columns large-9">
            <h6 class="subheader"><?= __('Issublocation') ?></h6>
            <?= $this->Text->autoParagraph(h($propertypeLocation->issublocation)); ?>

        </div>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related Properties') ?></h4>
    <?php if (!empty($propertypeLocation->properties)): ?>
    <table class="table table-bordered">
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
        <?php foreach ($propertypeLocation->properties as $properties): ?>
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
