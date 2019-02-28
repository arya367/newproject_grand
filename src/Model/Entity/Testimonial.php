<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Blog Entity.
 */
class Testimonial extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
	    
        'name' => true,
		'image' => true,
        'location' => true,
        'post' => true,
        
	
	
    ];
}
