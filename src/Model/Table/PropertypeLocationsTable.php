<?php
namespace App\Model\Table;

use App\Model\Entity\PropertypeLocation;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PropertypeLocations Model
 */
class PropertypeLocationsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('propertype_locations');
        $this->displayField('name');
        $this->primaryKey('id');
        $this->addBehavior('Timestamp');
        $this->belongsTo('PropertyTypes', [
            'foreignKey' => 'property_type_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('PropertySubtypes', [
            'foreignKey' => 'property_subtype_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Locations', [
            'foreignKey' => 'location_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Properties', [
            'foreignKey' => 'propertype_location_id'
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
            ->requirePresence('url', 'create')
            ->notEmpty('url')
            ->requirePresence('name', 'create')
            ->notEmpty('name')
			->requirePresence('heading2', 'create')
            ->notEmpty('heading2')
            ->requirePresence('seo_title', 'create')
            ->notEmpty('seo_title')
            ->notEmpty('status');
            

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
        $rules->add($rules->existsIn(['property_type_id'], 'PropertyTypes'));
        //$rules->add($rules->existsIn(['property_subtype_id'], 'PropertySubtypes'));
        $rules->add($rules->existsIn(['location_id'], 'Locations'));
        return $rules;
    }
}
