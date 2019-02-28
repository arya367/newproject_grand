<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Resale Entity.
 */
class Resale extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'builder_id' => true,
        'property_id' => true,
        'location_id' => true,
        'bhk_type' => true,
        'not_bhk_type' => true,
        'subtype' => true,
        'price' => true,
        'email' => true,
        'phone' => true,
        'budget1' => true,
        'budget2' => true,
        'resale_priority' => true,
        'status' => true,
        'display_name' => true,
        'first_pr' => true,
        'posted_date' => true,
        'updated_date' => true,
        'person_name' => true,
        'property_type_id' => true,
        'property_subtype_id' => true,
        'booking_rate' => true,
        'plc' => true,
        'extra' => true,
        'premium_demand' => true,
        'payment_paid' => true,
        'executive_varification' => true,
        'verified_by' => true,
        'sector_id' => true,
        'limitval' => true,
        'type_size' => true,
        'heading' => true,
        'resale_date' => true,
        'property_sub_location' => true,
        'demand_size_name' => true,
        'booking_size_name' => true,
        'size_name' => true,
        'floor' => true,
        'central_utility_corridor' => true,
        'resale_number' => true,
        'client_name' => true,
        'client_email' => true,
        'client_phone' => true,
        'extra_1' => true,
        'extra_2' => true,
        'extra_3' => true,
        'builder' => true,
        'property' => true,
        'location' => true,
        'property_type' => true,
        'property_subtype' => true,
        'sector' => true,
		'plc_price' => true,
		'tower' => true,
		'total_booking_price' => true,
		'total_demand_price' => true,
    ];
}
