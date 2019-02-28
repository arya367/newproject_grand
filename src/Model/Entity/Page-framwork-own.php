<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Page Entity.
 */
class Page extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'menu_heading' => true,
        'url_display' => true,
        'title' => true,
        'short_description' => true,
        'description' => true,
        'location_id' => true,
        'status' => true,
        'navid' => true,
        'top' => true,
        'right' => true,
        'left' => true,
        'bottom' => true,
        'meta_title' => true,
        'meta_keyword' => true,
        'meta_description' => true,
        'searchby' => true,
        'location' => true,
    ];
}
