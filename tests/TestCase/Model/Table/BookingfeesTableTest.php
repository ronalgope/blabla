<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\BookingfeesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\BookingfeesTable Test Case
 */
class BookingfeesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\BookingfeesTable
     */
    public $Bookingfees;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.bookingfees',
        'app.orders',
        'app.users',
        'app.units',
        'app.projects',
        'app.images',
        'app.invoices'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Bookingfees') ? [] : ['className' => 'App\Model\Table\BookingfeesTable'];
        $this->Bookingfees = TableRegistry::get('Bookingfees', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Bookingfees);

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
