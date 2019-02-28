<?php
namespace App\Model\Table;

use App\Model\Entity\Property;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Properties Model
 */
class PropertiesTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('properties');
        $this->displayField('name');
        $this->primaryKey('id');
        $this->belongsTo('Builders', [
            'foreignKey' => 'builder_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('PropertyTypes', [
            'foreignKey' => 'property_type_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Locations', [
            'foreignKey' => 'location_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('PropertypeLocations', [
            'foreignKey' => 'propertype_location_id',
            'joinType' => 'INNER'
        ]);
		$this->belongsTo('PropertypeSublocations', [
            'foreignKey' => 'propertype_sublocation_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('PropertySubtypes', [
            'foreignKey' => 'property_subtype_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Sectors', [
            'foreignKey' => 'sector_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Banners', [
            'foreignKey' => 'property_id'
        ]);
        $this->hasMany('FloorPlan', [
            'foreignKey' => 'property_id'
        ]);
        $this->hasMany('PriceManagement', [
            'foreignKey' => 'property_id'
        ]);
        $this->hasMany('PropertyGalleries', [
            'foreignKey' => 'property_id'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->allowEmpty('id', 'create')
            ->requirePresence('name', 'create')
            ->notEmpty('name')
            ->requirePresence('url', 'create')
            ->notEmpty('url')
            ->requirePresence('location_text', 'create')
            ->notEmpty('location_text')
			->requirePresence('tabs', 'create')
            ->notEmpty('tabs');
           

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['builder_id'], 'Builders'));
        $rules->add($rules->existsIn(['property_type_id'], 'PropertyTypes'));
        $rules->add($rules->existsIn(['location_id'], 'Locations'));
        $rules->add($rules->existsIn(['propertype_location_id'], 'PropertypeLocations'));
        //$rules->add($rules->existsIn(['property_subtype_id'], 'PropertySubtypes'));
        $rules->add($rules->existsIn(['sector_id'], 'Sectors'));
        return $rules;
    }
}
