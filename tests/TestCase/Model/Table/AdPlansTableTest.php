<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AdPlansTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AdPlansTable Test Case
 */
class AdPlansTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\AdPlansTable
     */
    public $AdPlans;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.ad_plans'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('AdPlans') ? [] : ['className' => AdPlansTable::class];
        $this->AdPlans = TableRegistry::getTableLocator()->get('AdPlans', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->AdPlans);

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
