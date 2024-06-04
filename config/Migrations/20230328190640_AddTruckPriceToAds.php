<?php
use Migrations\AbstractMigration;

class AddTruckPriceToAds extends AbstractMigration
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
        $table = $this->table('ads');
        $table->addColumn('truck_price', 'float', [
            'default' => null,
            'null' => true,            
        ]);
        $table->update();
    }

    public function down()
    {
        $table = $this->table('ads');
        $table->removeColumn('truck_price');
        $table->update();
    }
}
