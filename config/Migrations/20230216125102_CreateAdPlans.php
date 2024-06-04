<?php
use Migrations\AbstractMigration;

class CreateAdPlans extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     * @return void
     */
    public function up()
    {
        $table = $this->table('ad_plans');
        
        $table->addColumn('name', 'string', ['limit' => 255, 'null' => false])
              ->addColumn('alias', 'string', ['limit' => 127, 'null' => false])
              ->addColumn('active_days', 'integer', ['null' => false])
              ->addColumn('free', 'boolean', ['null' => false, 'default' => false])
              ->addColumn('value', 'decimal', ['precision' => 10, 'scale' => 2, 'null' => false])
              ->addColumn('created', 'timestamp', ['default' => 'CURRENT_TIMESTAMP'])
              ->addColumn('modified', 'timestamp', ['default' => 'CURRENT_TIMESTAMP'])
              ->create();
    }
    public function down()  {
        $this->table('ad_plans')->drop()->save();
    }
}
