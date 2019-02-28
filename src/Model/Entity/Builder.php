<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Builder Entity.
 */
class Builder extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'name' => true,
        'heading' => true,
        'heading2' => true,
        'url' => true,
        'photo' => true,
        'short_description' => true,
        'description' => true,
        'seo_title' => true,
        'seo_keyword' => true,
        'seo_description' => true,
        'status' => true,
        'navid' => true,
        'properties' => true,
    ];
}
