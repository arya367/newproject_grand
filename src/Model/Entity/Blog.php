<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Blog Entity.
 */
class Blog extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'name' => true,
        'cat' => true,
        'url' => true,
        'short_post' => true,
        'post' => true,
        'seo_title' => true,
        'seo_keyword' => true,
        'seo_description' => true,
        'status' => true,
        'author_id' => true,
        'author' => true,
        'tag_relations' => true,
	'image' => true,
	'more_images' => true,
    ];
}
