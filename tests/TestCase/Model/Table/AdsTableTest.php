<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AdsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AdsTable Test Case
 */
class AdsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\AdsTable
     */
    public $Ads;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.ads',
        'app.users',
        'app.trucks',
        'app.ad_states',
        'app.representative_users',
        'app.transactions',
        'app.ad_images'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Ads') ? [] : ['className' => AdsTable::class];
        $this->Ads = TableRegistry::getTableLocator()->get('Ads', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Ads);

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
