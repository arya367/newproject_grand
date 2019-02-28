<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Enquery Entity.
 */
class Enquery extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'name' => true,
        'email' => true,
        'phone' => true,
        'project' => true,
        'comment' => true,
        'posted_date' => true,
    ];
}
