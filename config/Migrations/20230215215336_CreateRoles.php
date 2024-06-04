<?php
use Migrations\AbstractMigration;

class CreateRoles extends AbstractMigration
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
        $table = $this->table('roles');

       $table
        ->addColumn('name', 'string', [
            'limit' => 255,
            'null' => false,
            
        ])
        ->addColumn('alias', 'string', [
            'limit' => 40,
            'null' => false,            
        ])
        ->addColumn('created', 'datetime', [
            'default' => null,
            'null' => true,
        ])
        ->addColumn('modified', 'datetime', [
            'default' => null,
            'null' => true,
        ])
        ->create();

        $table->addIndex(['name'], ['unique' => true]);
        $table->addIndex(['alias'], ['unique' => true]);
    }

    public function down()
    {
        $table = $this->table('files');
        $table->drop()->save();
    }
}
