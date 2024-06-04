<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ReportTypesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ReportTypesTable Test Case
 */
class ReportTypesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ReportTypesTable
     */
    public $ReportTypes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.report_types'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('ReportTypes') ? [] : ['className' => ReportTypesTable::class];
        $this->ReportTypes = TableRegistry::getTableLocator()->get('ReportTypes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ReportTypes);

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

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
