<?php
use Migrations\AbstractMigration;

class CreateUsers extends AbstractMigration
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
        $table = $this->table('users');

        $table->addColumn('email'            ,'string' ,['limit' => 255,'null' => false]);
        $table->addColumn('password'         ,'string' ,['limit' => 255,'null' => false]);
        $table->addColumn('name'             ,'string' ,['limit' => 255,'null' => false]);
        $table->addColumn('corporate_name'   ,'string' ,['limit' => 255,'null' => true]);
        $table->addColumn('mobile_number'    ,'string' ,['limit' => 255,'null' => false]);
        $table->addColumn('commercial_number','string' ,['limit' => 255,'null' => true]);
        $table->addColumn('date_of_birth'    ,'date'     , ['null'                => false]);
        $table->addColumn('cpf'              ,'string'   , ['limit' => 127,'null' => false]);
        $table->addColumn('cnpj'             ,'string'   , ['limit' => 127,'null' => true]);
        $table->addColumn('active'           ,'boolean'  , ['default'             => false]);
        $table->addColumn('otp'              ,'string'   , ['limit' => 50,'null'  => false]);
        $table->addColumn('status'           ,'string'   , ['limit' => 50,'null'  => false]);
        $table->addColumn('created'          ,'timestamp', ['default' => 'CURRENT_TIMESTAMP','null' => true]);
        $table->addColumn('modified'         ,'timestamp', ['default' => 'CURRENT_TIMESTAMP','null' => true]);

        $table->addIndex(['email'],['unique' => true]);

        $table->create();
    }
    public function down()
    {
        $table = $this->table('users');
        $table->drop()->save();
    }
}
