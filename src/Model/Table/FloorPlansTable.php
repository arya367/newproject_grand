<?php
namespace App\Model\Table;

use App\Model\Entity\FloorPlan;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * FloorPlans Model
 */
class FloorPlansTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('floor_plans');
        $this->displayField('name');
        $this->primaryKey('id');
        $this->belongsTo('Properties', [
            'foreignKey' => 'property_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('FloorCategories', [
            'foreignKey' => 'floor_category_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('FloorSubcategories', [
            'foreignKey' => 'floor_subcategory_id',
            'joinType' => 'INNER'
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
            ->requirePresence('photo', 'create')
            ->notEmpty('photo')
            ->allowEmpty('floor_subcategory_id', 'create');

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
        $rules->add($rules->existsIn(['property_id'], 'Properties'));
        $rules->add($rules->existsIn(['floor_category_id'], 'FloorCategories'));
        //$rules->add($rules->existsIn(['floor_subcategory_id'], 'FloorSubcategories'));
        return $rules;
    }
}
