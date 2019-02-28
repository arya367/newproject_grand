<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * PropertypeSublocation Entity.
 */
class PropertypeSublocation extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'location_id' => true,
        'heading1' => true,
        'url' => true,
        'name' => true,
        'heading2' => true,
        'seo_title' => true,
        'seo_keyword' => true,
        'seo_description' => true,
        'description' => true,
        'status' => true,
        'issublocation' => true,
        'location' => true,
        //'sector' => true,
    ];
}
