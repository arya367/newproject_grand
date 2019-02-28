<?php
namespace App\Model\Table;

use App\Model\Entity\Author;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Authors Model
 */
class AuthorsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('authors');
        $this->displayField('name');
        $this->primaryKey('id');
        $this->addBehavior('Timestamp');
        $this->hasMany('Blogs', [
            'foreignKey' => 'author_id'
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
            ->requirePresence('user_name', 'create')
            ->notEmpty('user_name')
            ->requirePresence('password', 'create')
            ->notEmpty('password')
            ->requirePresence('name', 'create')
            ->notEmpty('name')
            ->add('email', 'valid', ['rule' => 'email'])
            ->requirePresence('email', 'create')
            ->notEmpty('email')
            ->requirePresence('status', 'create')
            ->notEmpty('status')
            ->requirePresence('occupation', 'create')
            ->notEmpty('occupation')
            ->requirePresence('about_user', 'create')
            ->notEmpty('about_user')
            ->requirePresence('facebook', 'create')
            ->notEmpty('facebook')
            ->requirePresence('twitter', 'create')
            ->notEmpty('twitter')
            ->requirePresence('googleplus', 'create')
            ->notEmpty('googleplus')
            ->requirePresence('pintrest', 'create')
            ->notEmpty('pintrest')
            ->requirePresence('linkedin', 'create')
            ->notEmpty('linkedin')
            ->requirePresence('flicker', 'create')
            ->notEmpty('flicker')
            ->requirePresence('photo', 'create')
            ->notEmpty('photo');

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
        $rules->add($rules->isUnique(['email']));
        return $rules;
    }
}
