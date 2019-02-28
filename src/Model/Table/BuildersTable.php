<?php
namespace App\Model\Table;

use App\Model\Entity\Builder;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Builders Model
 */
class BuildersTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('builders');
        $this->displayField('name');
        $this->primaryKey('id');
        $this->hasMany('Properties', [
            'foreignKey' => 'builder_id'
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
            ->requirePresence('heading', 'create')
            ->notEmpty('heading')
			->requirePresence('url')
            ->notEmpty('url')
            ->requirePresence('photo', 'create')
            ->notEmpty('photo')
            ->requirePresence('short_description', 'create')
            ->notEmpty('short_description')
            ->requirePresence('description', 'create')
            ->notEmpty('description')
            ->requirePresence('seo_title', 'create')
            ->notEmpty('seo_title')
            ->notEmpty('status');

        return $validator;
    }
}
