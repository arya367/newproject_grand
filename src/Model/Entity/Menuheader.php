<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Menuheader Entity.
 */
class Menuheader extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'name' => true,
        'controller' => true,
        'action' => true,
        'navid' => true,
        'status' => true,
        'menus' => true,
    ];
}
