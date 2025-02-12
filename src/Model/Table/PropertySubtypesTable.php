<?php
namespace App\Model\Table;

use App\Model\Entity\PropertySubtype;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PropertySubtypes Model
 */
class PropertySubtypesTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('property_subtypes');
        $this->displayField('name');
        $this->primaryKey('id');
        $this->belongsTo('PropertyTypes', [
            'foreignKey' => 'property_type_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Properties', [
            'foreignKey' => 'property_subtype_id'
        ]);
        $this->hasMany('PropertypeLocations', [
            'foreignKey' => 'property_subtype_id'
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
            ->requirePresence('name', 'create')
            ->notEmpty('name')
            ->add('priority', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('priority');

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
        return $rules;
    }
}
