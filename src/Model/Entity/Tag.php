<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Tag Entity.
 */
class Tag extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'name' => true,
        'slug' => true,
        'group' => true,
        'tag_relations' => true,
    ];
}
