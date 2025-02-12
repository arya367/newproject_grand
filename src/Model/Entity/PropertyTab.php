<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * PropertyTab Entity.
 */
class PropertyTab extends Entity
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
		'catid' => true,
    ];
}
