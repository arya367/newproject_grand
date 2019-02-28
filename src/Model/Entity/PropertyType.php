<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * PropertyType Entity.
 */
class PropertyType extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'name' => true,
        'url' => true,
        'priority' => true,
        'status' => true,
        'properties' => true,
        'property_subtype' => true,
        'propertype_locations' => true,
    ];
}
