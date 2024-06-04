<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TruckTypesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TruckTypesTable Test Case
 */
class TruckTypesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TruckTypesTable
     */
    public $TruckTypes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.truck_types',
        'app.trucks'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('TruckTypes') ? [] : ['className' => TruckTypesTable::class];
        $this->TruckTypes = TableRegistry::getTableLocator()->get('TruckTypes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->TruckTypes);

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
