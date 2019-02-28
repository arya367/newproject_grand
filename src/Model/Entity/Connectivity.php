<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Connectivity Entity.
 */
class Connectivity extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'property_id' => true,
        'amenity_id' => true,
        'description' => true,
        'property' => true,
        'amenity' => true,
    ];
}
