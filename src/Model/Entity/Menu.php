<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Menu Entity.
 */
class Menu extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'menuheader_id' => true,
        'name' => true,
        'controller' => true,
        'action' => true,
        'navid' => true,
        'status' => true,
        'menuheader' => true,
    ];
}
