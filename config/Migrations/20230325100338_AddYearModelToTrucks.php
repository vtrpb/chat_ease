<?php
use Migrations\AbstractMigration;

class AddYearModelToTrucks extends AbstractMigration
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
        $table = $this->table('trucks');
        $table->addColumn('year_model', 'integer', [
            'default' => null,
            'null' => true,
            'after' => 'year' // ou coloque o nome da coluna onde deseja que fique
        ]);
        $table->update();
    }

    public function down()
    {
        $table = $this->table('trucks');
        $table->removeColumn('year_model');
        $table->update();
    }
}
