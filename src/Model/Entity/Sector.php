<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Sector Entity.
 */
class Sector extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'name' => true,
        'url' => true,
		'heading1' => true,
		'heading2' => true,
		'seo_title' => true,
		'seo_keyword' => true,
		'seo_description' => true,
		'description' => true,
		'created' => true,
		'updated' => true,
		'status' => true,
        'priority' => true,
        'location_id' => true,
        'location' => true,
    ];
}
