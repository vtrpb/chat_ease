<?php
use Migrations\AbstractMigration;

class CreateAdStates extends AbstractMigration
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
        $table = $this->table('ad_states');

        $table->addColumn('name', 'string', [
            'limit' => 255,
            'null' => false,
        ]);
        $table->addColumn('alias', 'string', [
            'limit' => 127,
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

        $table->create();
    }
    public function down()  {
        $this->table('ad_states')->drop()->save();
    }
}
