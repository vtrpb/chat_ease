<?php
use Migrations\AbstractMigration;

class CreateAds extends AbstractMigration
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

           $table->addColumn('user_id', 'integer', [
            'null' => false,
        ]);
        $table->addColumn('truck_id', 'integer', [
            'null' => false,
        ]);
        $table->addColumn('ad_state_id', 'integer', [
            'null' => false,
        ]);
        $table->addColumn('representative_user_id', 'integer', [
            'null' => true,
        ]);
        $table->addColumn('title', 'string', [
            'limit' => 255,
            'null' => false,
        ]);
        $table->addColumn('content', 'text', [
            'null' => false,
        ]);
        $table->addColumn('initial_date', 'date', [
            'null' => true,
        ]);
        $table->addColumn('final_date', 'date', [
            'null' => true,
        ]);
        $table->addColumn('number_of_photos', 'integer', [
            'null' => false,
        ]);
        $table->addColumn('free', 'boolean', [
            'null' => false,
        ]);
        $table->addColumn('payment_value', 'float', [
            'null' => false,
        ]);
        $table->addColumn('transaction_id', 'string', [
            'limit' => 128,
            'null' => true,
        ]);
        $table->addColumn('reference', 'string', [
            'limit' => 200,
            'null' => true,
        ]);
        $table->addColumn('payment_received_code', 'integer', [
            'null' => true,
        ]);
        $table->addColumn('number_of_views', 'integer', [
            'null' => true,
        ]);
        $table->addColumn('created', 'timestamp', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('modified', 'timestamp', [
            'default' => null,
            'null' => true,
        ]);

        $table->create();
    }

    public function down()  {
         $this->table('ads')->drop()->save();
    }
}
