<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * PropertySubtype Entity.
 */
class PropertySubtype extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'property_type_id' => true,
        'name' => true,
        'priority' => true,
        'property_type' => true,
        'properties' => true,
        'propertype_locations' => true,
    ];
}
