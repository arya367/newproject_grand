<?php
namespace App\Model\Table;

use App\Model\Entity\Location;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Locations Model
 */
class LocationsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('locations');
        $this->displayField('name');
        $this->primaryKey('id');
		
        /*$this->hasMany('Pages', [
            'foreignKey' => 'location_id'
        ]);
        $this->hasMany('Properties', [
            'foreignKey' => 'location_id'
        ]);*/
		
		
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
            ->notEmpty('name','Name should not be empty.','update')
			->add('name', [
        'maxlength' => [
            'rule' => ['maxLength', 50],
            'message' => 'Name need to be at least 10 characters long.',
        ],
		'unique' => [
            'rule' => 'validateUnique',
			'provider' =>'table',
            'message' => 'Name already exist.',
        ],
		'custom' => [
		
		'rule' => [$this,"checkChars"],
		'message' => 'Already taken .Try another.',
		]
    ])
			->notEmpty('state','State should not be empty')
            ->notEmpty('url','Url should not be empty')
			->add('url',[
			'unique' => [
			'rule' => 'validateUnique',
			'provider' => 'table',
			'message' => 'Url already exist.',
		]
	])
           // ->notEmpty('photo','Image should not be empty')
            ->add('navid', 'valid', ['rule' => 'numeric'])
            ;

        return $validator;
    }
	
public function validateUnique($value, array $options, array $context = NULL)
{    
    //print_r($context);
    return parent::validateUnique($value, $options);
}

public function checkChars($value,$context)
{   //var_dump($context);
   
   
   $result = $this->find('all')->where(['name' => $value]);
   
   $row=$result->count();
  
	if($row<=1)
	{
		return true;
		}
		else {
			return false;
			}
	
	}	
}
