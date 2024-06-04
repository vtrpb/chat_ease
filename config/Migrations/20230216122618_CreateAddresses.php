<?php
use Migrations\AbstractMigration;

class CreateAddresses extends AbstractMigration
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
        $table = $this->table('addresses');

        $table->addColumn('user_id', 'integer', [
        'null' => false,
        ]);
        $table->addColumn('state_id', 'integer', [
            'null' => true,
        ]);
        $table->addColumn('city_id', 'integer', [
            'null' => true,
        ]);
        $table->addColumn('address_street', 'string', [
            'limit' => 120,
            'null' => true,
        ]);
        $table->addColumn('address_number', 'string', [
            'limit' => 10,
            'null' => true,
        ]);
        $table->addColumn('address_complement', 'string', [
            'limit' => 70,
            'null' => true,
        ]);
        $table->addColumn('address_district', 'string', [
            'limit' => 50,
            'null' => true,
        ]);
        $table->addColumn('address_zip_code', 'string', [
            'limit' => 15,
            'null' => true,
        ]);
        $table->addColumn('phone_number1', 'string', [
            'limit' => 50,
            'null' => true,
        ]);
        $table->addColumn('phone_number2', 'string', [
            'limit' => 50,
            'null' => true,
        ]);
        $table->addColumn('mobile_number', 'string', [
            'limit' => 50,
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
        /*$table->addColumn('id', 'integer', [
            'autoIncrement' => true,
            'default' => null,
            'limit' => null,
            'null' => false,
        ]);

            $table->addPrimaryKey('id');*/

        $table->create();
    }

    public function down()  {
         $this->table('addresses')->drop()->save();
    }    
}
