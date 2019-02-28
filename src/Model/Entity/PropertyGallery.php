<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * PropertyGallery Entity.
 */
class PropertyGallery extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'property_id' => true,
        'alt' => true,
        'image' => true,
        'type' => true,
    ];
	
}
