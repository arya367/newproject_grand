<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Location Entity.
 */
class Location extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'name' => true,
        'state' => true,
        'url' => true,
        'photo' => true,
        'navid' => true,
        'pages' => true,
        'properties' => true,
    ];
}
