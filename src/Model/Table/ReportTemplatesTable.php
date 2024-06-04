<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ReportTemplates Model
 *
 * @property \App\Model\Table\CoresTable|\Cake\ORM\Association\BelongsTo $Cores
 * @property \App\Model\Table\SectorsTable|\Cake\ORM\Association\BelongsTo $Sectors
 * @property \App\Model\Table\SubsectorsTable|\Cake\ORM\Association\BelongsTo $Subsectors
 * @property \App\Model\Table\ReportTypesTable|\Cake\ORM\Association\BelongsTo $ReportTypes
 *
 * @method \App\Model\Entity\ReportTemplate get($primaryKey, $options = [])
 * @method \App\Model\Entity\ReportTemplate newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ReportTemplate[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ReportTemplate|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ReportTemplate|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ReportTemplate patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ReportTemplate[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ReportTemplate findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ReportTemplatesTable extends Table
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

        $this->setTable('report_templates');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Cores', [
            'foreignKey' => 'core_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Sectors', [
            'foreignKey' => 'sector_id'
        ]);
        $this->belongsTo('Subsectors', [
            'foreignKey' => 'subsector_id'
        ]);
        $this->belongsTo('ReportTypes', [
            'foreignKey' => 'report_type_id'
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
            ->scalar('template')
            ->requirePresence('template', 'create')
            ->notEmpty('template');

        $validator
            ->boolean('locked')
            ->requirePresence('locked', 'create')
            ->notEmpty('locked');

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
        $rules->add($rules->existsIn(['core_id'], 'Cores'));
        $rules->add($rules->existsIn(['sector_id'], 'Sectors'));
        $rules->add($rules->existsIn(['subsector_id'], 'Subsectors'));
        $rules->add($rules->existsIn(['report_type_id'], 'ReportTypes'));

        return $rules;
    }
}
