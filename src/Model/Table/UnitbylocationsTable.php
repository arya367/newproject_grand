<?php
namespace App\Model\Table;

use App\Model\Entity\Unitbylocation;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Unitbylocations Model
 */
class UnitbylocationsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('unitbylocations');
        $this->displayField('name');
        $this->primaryKey('id');
        $this->addBehavior('Timestamp');
        $this->belongsTo('Locations', [
            'foreignKey' => 'location_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Units', [
            'foreignKey' => 'unit_id',
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
            ->requirePresence('url', 'create')
            ->notEmpty('url')
            ->requirePresence('name', 'create')
            ->notEmpty('name')
            ->requirePresence('heading1', 'create')
            ->notEmpty('heading1')
            ->requirePresence('heading2', 'create')
            ->notEmpty('heading2')
            ->requirePresence('seo_title', 'create')
            ->notEmpty('seo_title')
            ->requirePresence('seo_description', 'create')
            ->notEmpty('seo_description')
            ->requirePresence('description', 'create')
            ->notEmpty('description')
            ->requirePresence('status', 'create')
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
        $rules->add($rules->existsIn(['location_id'], 'Locations'));
        $rules->add($rules->existsIn(['unit_id'], 'Units'));
        return $rules;
    }
}
