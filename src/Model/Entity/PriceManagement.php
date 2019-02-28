<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * PriceManagement Entity.
 */
class PriceManagement extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'property_id' => true,
        'unit_id' => true,
        'price' => true,
        'size' => true,
        'property' => true,
        'unit' => true,
    ];
}
