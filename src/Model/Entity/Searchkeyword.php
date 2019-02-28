<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Searchkeyword Entity.
 */
class Searchkeyword extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'name' => true,
        'url' => true,
        'status' => true,
        'category' => true,
    ];
}
