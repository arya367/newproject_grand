<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Amenity Entity.
 */
class Amenity extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'name' => true,
        'class' => true,
        'priority' => true,
		'type' => true,
    ];
}
