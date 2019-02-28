<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * FloorCategory Entity.
 */
class FloorCategory extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'name' => true,
        'floor_plan' => true,
        'floor_subcategory' => true,
    ];
}
