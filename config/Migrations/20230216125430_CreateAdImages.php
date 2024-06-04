<?php
use Migrations\AbstractMigration;

class CreateAdImages extends AbstractMigration
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
        $table = $this->table('ad_images');

        $table->addColumn('ad_id', 'integer', ['null' => false])
              ->addColumn('name', 'string', ['limit' => 255, 'null' => false])
              ->addColumn('created', 'timestamp', ['default' => null])
              ->addColumn('modified', 'timestamp', ['default' => null])
              ->addIndex(['ad_id'])
              ->addForeignKey('ad_id', 'ads', 'id', ['delete' => 'CASCADE'])
              ->create();
    }
}
