<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PropertyTypesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PropertyTypesTable Test Case
 */
class PropertyTypesTableTest extends TestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'PropertyTypes' => 'app.property_types',
        'Properties' => 'app.properties',
        'PropertySubtype' => 'app.property_subtype',
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
        $config = TableRegistry::exists('PropertyTypes') ? [] : ['className' => 'App\Model\Table\PropertyTypesTable'];
        $this->PropertyTypes = TableRegistry::get('PropertyTypes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->PropertyTypes);

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
