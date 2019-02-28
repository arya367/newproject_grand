<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * FloorSubcategory Entity.
 */
class FloorSubcategory extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'floor_category_id' => true,
        'name' => true,
        'floor_category' => true,
        'floor_plans' => true,
    ];
}
