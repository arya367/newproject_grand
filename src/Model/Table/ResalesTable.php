<?php
namespace App\Model\Table;

use App\Model\Entity\Resale;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Resales Model
 */
class ResalesTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('resales');
        $this->displayField('id');
        $this->primaryKey('id');
        $this->belongsTo('Builders', [
            'foreignKey' => 'builder_id',
            'joinType' => 'LEFT'
        ]);
        $this->belongsTo('Properties', [
            'foreignKey' => 'property_id',
            'joinType' => 'LEFT'
        ]);
        $this->belongsTo('Locations', [
            'foreignKey' => 'location_id',
            'joinType' => 'LEFT'
        ]);
        $this->belongsTo('PropertyTypes', [
            'foreignKey' => 'property_type_id',
            'joinType' => 'LEFT'
        ]);
        $this->belongsTo('PropertySubtypes', [
            'foreignKey' => 'property_subtype_id',
            'joinType' => 'LEFT'
        ]);
        $this->belongsTo('Sectors', [
            'foreignKey' => 'sector_id',
            'joinType' => 'LEFT'
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
            ->add('id', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('id', 'create')
            ->notEmpty('total_booking_price')
            ->notEmpty('total_demand_price');
            

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
        //$rules->add($rules->isUnique(['email']));
        $rules->add($rules->existsIn(['builder_id'], 'Builders'));
        $rules->add($rules->existsIn(['property_id'], 'Properties'));
        //$rules->add($rules->existsIn(['location_id'], 'Locations'));
        $rules->add($rules->existsIn(['property_type_id'], 'PropertyTypes'));
        $rules->add($rules->existsIn(['property_subtype_id'], 'PropertySubtypes'));
        //$rules->add($rules->existsIn(['sector_id'], 'Sectors'));
        return $rules;
    }
}
