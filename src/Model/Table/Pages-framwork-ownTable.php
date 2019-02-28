<?php
namespace App\Model\Table;

use App\Model\Entity\Page;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Pages Model
 */
class PagesTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('pages');
        $this->displayField('title');
        $this->primaryKey('id');
        $this->belongsTo('Locations', [
            'foreignKey' => 'location_id',
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
            ->allowEmpty('menu_heading')
            ->allowEmpty('url_display')
            ->allowEmpty('title')
            ->requirePresence('short_description', 'create')
            ->notEmpty('short_description')
            ->requirePresence('description', 'create')
            ->notEmpty('description')
            ->requirePresence('status', 'create')
            ->notEmpty('status')
            ->add('navid', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('navid')
            ->requirePresence('top', 'create')
            ->notEmpty('top')
            ->requirePresence('right', 'create')
            ->notEmpty('right')
            ->requirePresence('left', 'create')
            ->notEmpty('left')
            ->requirePresence('bottom', 'create')
            ->notEmpty('bottom')
            ->requirePresence('meta_title', 'create')
            ->notEmpty('meta_title')
            ->requirePresence('meta_keyword', 'create')
            ->notEmpty('meta_keyword')
            ->requirePresence('meta_description', 'create')
            ->notEmpty('meta_description')
            ->requirePresence('searchby', 'create')
            ->notEmpty('searchby');

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
        return $rules;
    }
}
