<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CountriesFixture
 *
 */
class CountriesFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'name' => ['type' => 'string', 'length' => 100, 'null' => false, 'default' => '', 'comment' => '', 'precision' => null, 'fixed' => null],
        'active' => ['type' => 'string', 'fixed' => true, 'length' => 1, 'null' => false, 'default' => 'Y', 'comment' => '', 'precision' => null],
        'priority' => ['type' => 'integer', 'length' => 5, 'unsigned' => false, 'null' => false, 'default' => '20', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'code' => ['type' => 'biginteger', 'length' => 20, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        '_indexes' => [
            'con_name' => ['type' => 'index', 'columns' => ['name'], 'length' => []],
            'con_active' => ['type' => 'index', 'columns' => ['active'], 'length' => []],
            'con_priority' => ['type' => 'index', 'columns' => ['priority'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
        ],
        '_options' => [
'engine' => 'MyISAM', 'collation' => 'latin1_general_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Records
     *
     * @var array
     */
    public $records = [
        [
            'name' => 'Lorem ipsum dolor sit amet',
            'active' => 'Lorem ipsum dolor sit ame',
            'priority' => 1,
            'code' => '',
            'id' => 1
        ],
    ];
}
