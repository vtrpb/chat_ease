<?php
use Migrations\AbstractMigration;

class CreateCities extends AbstractMigration
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
        $table = $this->table('cities');
        $table->addColumn('name', 'string', ['limit' => 255, 'null' => false])
            ->addColumn('alias', 'string', ['limit' => 40, 'null' => true])
            ->addColumn('state_id', 'integer', ['null' => false])
            ->addColumn('created', 'timestamp', ['default' => null])
            ->addColumn('modified', 'timestamp', ['default' => null])
            ->addIndex(['name'])
            ->addIndex(['state_id'])
            ->addForeignKey('state_id', 'states', 'id', ['delete' => 'CASCADE'])
            ->create();
    }
    
}
