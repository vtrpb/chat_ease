<?php
use Migrations\AbstractMigration;

class CreateCountries extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $table = $this->table('countries');
        $table->addColumn('name', 'string', ['limit' => 255, 'null' => false])
            ->addColumn('alias', 'string', ['limit' => 40, 'null' => true])            
            ->addColumn('created', 'timestamp', ['default' => null])
            ->addColumn('modified', 'timestamp', ['default' => null])
            ->addIndex(['name'])            
            ->create();
    }
}
