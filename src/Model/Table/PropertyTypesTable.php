<?php
namespace App\Model\Table;

use App\Model\Entity\PropertyType;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PropertyTypes Model
 */
class PropertyTypesTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('property_types');
        $this->displayField('name');
        $this->primaryKey('id');
        $this->hasMany('Properties', [
            'foreignKey' => 'property_type_id'
        ]);
        $this->hasMany('PropertySubtype', [
            'foreignKey' => 'property_type_id'
        ]);
        $this->hasMany('PropertypeLocations', [
            'foreignKey' => 'property_type_id'
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
            ->requirePresence('name', 'create')
            ->notEmpty('name')
            ->requirePresence('url', 'create')
            ->notEmpty('url')
            ->add('priority', 'valid', ['rule' => 'numeric'])
            ->requirePresence('priority', 'create')
            ->notEmpty('priority')
            ->requirePresence('status', 'create')
            ->notEmpty('status');

        return $validator;
    }
}
