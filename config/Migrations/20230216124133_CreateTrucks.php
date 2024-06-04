<?php
use Migrations\AbstractMigration;

class CreateTrucks extends AbstractMigration
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
        $table = $this->table('trucks');

         $table->addColumn('user_id', 'integer', [
            'null' => false,
        ]);
        $table->addColumn('truck_type_id', 'integer', [
            'null' => false,
        ]);
        $table->addColumn('state_id', 'integer', [
            'null' => true,
        ]);
        $table->addColumn('city_id', 'integer', [
            'null' => true,
        ]);
        $table->addColumn('year', 'string', [
            'limit' => 4,
            'null' => true,
        ]);
        $table->addColumn('year_model', 'string', [
            'limit' => 4, 
            'null' => true,
        ]);
        $table->addColumn('mileage', 'integer', [
            'null' => true,
        ]);
        $table->addColumn('condition', 'string', [
            'limit' => 255,
            'null' => true,
        ]);
        $table->addColumn('brand', 'string', [
            'limit' => 255,
            'null' => true,
        ]);
        $table->addColumn('model', 'string', [
            'limit' => 255,
            'null' => true,
        ]);
        $table->addColumn('traction', 'string', [
            'limit' => 255,
            'null' => true,
        ]);
        $table->addColumn('transmission', 'string', [
            'limit' => 255,
            'null' => true,
        ]);
        $table->addColumn('implement', 'string', [
            'limit' => 255,
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
}
