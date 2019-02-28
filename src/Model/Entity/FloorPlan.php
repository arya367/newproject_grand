<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * FloorPlan Entity.
 */
class FloorPlan extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'property_id' => true,
        'floor_category_id' => true,
        'floor_subcategory_id' => true,
        'name' => true,
		'carpet' => true,
		'balcony' => true,
		'saleable' => true,
		'photo' => true,
	    'status' => true,
        
    ];
}
