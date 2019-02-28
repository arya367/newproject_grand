<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * PropertypeLocation Entity.
 */
class PropertypeLocation extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'property_type_id' => true,
        'property_subtype_id' => true,
        'location_id' => true,
        'url' => true,
        'name' => true,
		'heading2' => true,
        'seo_title' => true,
        'seo_keyword' => true,
        'seo_description' => true,
        'description' => true,
        'status' => true,
        'issublocation' => true,
        'property_type' => true,
        'property_subtype' => true,
        'location' => true,
        'properties' => true,
    ];
}
