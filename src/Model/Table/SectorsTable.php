<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Sectors Model
 *
 * @property \App\Model\Table\ReportTemplatesTable|\Cake\ORM\Association\HasMany $ReportTemplates
 * @property \App\Model\Table\SubsectorsTable|\Cake\ORM\Association\HasMany $Subsectors
 * @property \App\Model\Table\WorkplacesTable|\Cake\ORM\Association\HasMany $Workplaces
 *
 * @method \App\Model\Entity\Sector get($primaryKey, $options = [])
 * @method \App\Model\Entity\Sector newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Sector[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Sector|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Sector|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Sector patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Sector[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Sector findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class SectorsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('sectors');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('ReportTemplates', [
            'foreignKey' => 'sector_id'
        ]);
        $this->hasMany('Subsectors', [
            'foreignKey' => 'sector_id'
        ]);
        $this->hasMany('Workplaces', [
            'foreignKey' => 'sector_id'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('name')
            ->maxLength('name', 255)
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->scalar('alias')
            ->maxLength('alias', 255)
            ->requirePresence('alias', 'create')
            ->notEmpty('alias');

        return $validator;
    }
}
