<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Cores Model
 *
 * @property \App\Model\Table\SubsectorsTable|\Cake\ORM\Association\BelongsTo $Subsectors
 * @property \App\Model\Table\ReportTemplatesTable|\Cake\ORM\Association\HasMany $ReportTemplates
 * @property \App\Model\Table\WorkplacesTable|\Cake\ORM\Association\HasMany $Workplaces
 *
 * @method \App\Model\Entity\Core get($primaryKey, $options = [])
 * @method \App\Model\Entity\Core newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Core[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Core|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Core|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Core patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Core[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Core findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class CoresTable extends Table
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

        $this->setTable('cores');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Subsectors', [
            'foreignKey' => 'subsector_id'
        ]);
        $this->hasMany('ReportTemplates', [
            'foreignKey' => 'core_id'
        ]);
        $this->hasMany('Workplaces', [
            'foreignKey' => 'core_id'
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

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['subsector_id'], 'Subsectors'));

        return $rules;
    }
}
