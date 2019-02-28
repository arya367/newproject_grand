<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Author Entity.
 */
class Author extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'user_name' => true,
        'password' => true,
        'name' => true,
        'email' => true,
        'status' => true,
        'occupation' => true,
        'about_user' => true,
        'facebook' => true,
        'twitter' => true,
        'googleplus' => true,
        'pintrest' => true,
        'linkedin' => true,
        'flicker' => true,
        'photo' => true,
        'blogs' => true,
    ];
}
