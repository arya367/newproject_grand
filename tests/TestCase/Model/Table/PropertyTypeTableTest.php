<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PropertyTypeTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PropertyTypeTable Test Case
 */
class PropertyTypeTableTest extends TestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'PropertyType' => 'app.property_type',
        'Properties' => 'app.properties',
        'PropertySubtype' => 'app.property_subtype',
        'PropertyTypes' => 'app.property_types',
        'PropertypeLocations' => 'app.propertype_locations'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('PropertyType') ? [] : ['className' => 'App\Model\Table\PropertyTypeTable'];
        $this->PropertyType = TableRegistry::get('PropertyType', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->PropertyType);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
