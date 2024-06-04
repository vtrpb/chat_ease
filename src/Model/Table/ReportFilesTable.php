<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ReportFiles Model
 *
 * @property \App\Model\Table\ReportsTable|\Cake\ORM\Association\BelongsTo $Reports
 *
 * @method \App\Model\Entity\ReportFile get($primaryKey, $options = [])
 * @method \App\Model\Entity\ReportFile newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ReportFile[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ReportFile|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ReportFile|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ReportFile patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ReportFile[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ReportFile findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ReportFilesTable extends Table
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

        $this->setTable('report_files');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Reports', [
            'foreignKey' => 'report_id',
            'joinType' => 'INNER'
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
            ->maxLength('name', 120)
            ->allowEmpty('name');

        $validator
            ->scalar('filename')
            ->maxLength('filename', 255)
            ->requirePresence('filename', 'create')
            ->notEmpty('filename');

        $validator
            ->boolean('locked')
            ->requirePresence('locked', 'create')
            ->notEmpty('locked');

        $validator
            ->boolean('canceled')
            ->requirePresence('canceled', 'create')
            ->notEmpty('canceled');

        $validator
            ->scalar('file_category')
            ->maxLength('file_category', 64)
            ->requirePresence('file_category', 'create')
            ->notEmpty('file_category');

        $validator
            ->date('date_of_document')
            ->requirePresence('date_of_document', 'create')
            ->notEmpty('date_of_document');

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
        $rules->add($rules->existsIn(['report_id'], 'Reports'));

        return $rules;
    }
}
