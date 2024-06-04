<?php
use Migrations\AbstractMigration;

class AddMaxNumberCarsToAdPlans extends AbstractMigration
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
        $table->addColumn('max_number_cars', 'integer', [
                'default' => null,
                'null' => true,
            ])
              ->update();
    }

    public function down()
    {
        $table = $this->table('ad_plans');
        $table->removeColumn('max_number_cars')
              ->update();
    }


}
