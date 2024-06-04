<?php
use Migrations\AbstractMigration;

class CreatePermissions extends AbstractMigration
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
        $table = $this->table('permissions');

        $table->addColumn('user_id', 'integer', [
            'null' => false,
        ]);
        $table->addColumn('role_id', 'integer', [
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

    public function down()
    {
        $this->table('permissions')->drop()->save();
    }
}
