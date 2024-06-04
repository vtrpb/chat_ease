<?php
use Migrations\AbstractMigration;

class CreateValidatedUserStates extends AbstractMigration
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
        $table = $this->table('validated_user_states');

        $table->addColumn('name', 'string', ['limit' => 255, 'null' => false])
          ->addColumn('alias', 'string', ['limit' => 127, 'null' => false])
          ->addColumn('created', 'timestamp', ['default' => null, 'null' => true])
          ->addColumn('modified', 'timestamp', ['default' => null, 'null' => true])
          ->create();
    }
    public function down()  {
         $this->table('validated_user_states')->drop()->save();
    }
}
