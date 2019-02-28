<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * TagRelation Entity.
 */
class TagRelation extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'tag_id' => true,
        'blog_id' => true,
        'tag_type' => true,
        'tag' => true,
        'blog' => true,
    ];
}
