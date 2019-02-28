<?php
namespace App\Model\Table;

use App\Model\Entity\Menuheader;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Menuheaders Model
 */
class MenuheadersTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('menuheaders');
        $this->displayField('name');
        $this->primaryKey('id');
        $this->hasMany('Menus', [
            'foreignKey' => 'menuheader_id'
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
            ->requirePresence('controller', 'create')
            ->notEmpty('controller')
            //->requirePresence('action', 'create')
            //->notEmpty('action')
            //->add('navid', 'valid', ['rule' => 'numeric'])
            //->requirePresence('navid', 'create')
            //->notEmpty('navid')
            ->requirePresence('status', 'create')
            ->notEmpty('status');

        return $validator;
    }
}
