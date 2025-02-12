<?php
namespace App\Model\Table;

use App\Model\Entity\FloorSubcategory;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * FloorSubcategories Model
 */
class FloorSubcategoriesTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('floor_subcategories');
        $this->displayField('name');
        $this->primaryKey('id');
        $this->belongsTo('FloorCategories', [
            'foreignKey' => 'floor_category_id',
            'joinType' => 'LEFT'
        ]);
        $this->hasMany('FloorPlans', [
            'foreignKey' => 'floor_subcategory_id'
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
            ->notEmpty('name');

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
        $rules->add($rules->existsIn(['floor_category_id'], 'FloorCategories'));
        return $rules;
    }
}
