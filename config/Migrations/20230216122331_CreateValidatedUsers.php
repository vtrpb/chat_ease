<?php
use Migrations\AbstractMigration;

class CreateValidatedUsers extends AbstractMigration
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
        $table = $this->table('validated_users');

        $table->addColumn('user_id', 'integer', [
        'null' => false,
        ]);

        $table->addColumn('validated_user_state_id', 'integer', [
            'null' => false,
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
        ]);*/

        //$table->addPrimaryKey('id');

        $table->create();
    }

    public function down()  {
         $this->table('validated_users')->drop()->save();
    }
}
