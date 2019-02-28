<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Unitbylocation Entity.
 */
class Unitbylocation extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'location_id' => true,
        'unit_id' => true,
        'url' => true,
        'name' => true,
        'heading1' => true,
        'heading2' => true,
        'seo_title' => true,
        'seo_keyword' => true,
        'seo_description' => true,
        'description' => true,
        'status' => true,
        'issublocation' => true,
        'location' => true,
        'sector' => true,
    ];
}
