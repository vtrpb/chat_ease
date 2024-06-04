<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ReportFilesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ReportFilesTable Test Case
 */
class ReportFilesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ReportFilesTable
     */
    public $ReportFiles;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.report_files',
        'app.reports'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('ReportFiles') ? [] : ['className' => ReportFilesTable::class];
        $this->ReportFiles = TableRegistry::getTableLocator()->get('ReportFiles', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ReportFiles);

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
