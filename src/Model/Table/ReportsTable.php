<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Reports Model
 *
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 * @property |\Cake\ORM\Association\BelongsTo $Operations
 * @property |\Cake\ORM\Association\BelongsTo $ReportTypes
 * @property \App\Model\Table\ReportFilesTable|\Cake\ORM\Association\HasMany $ReportFiles
 *
 * @method \App\Model\Entity\Report get($primaryKey, $options = [])
 * @method \App\Model\Entity\Report newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Report[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Report|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Report|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Report patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Report[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Report findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ReportsTable extends Table
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

        $this->setTable('reports');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Operations', [
            'foreignKey' => 'operation_id'
        ]);
        $this->belongsTo('ReportTypes', [
            'foreignKey' => 'report_type_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('ReportFiles', [
            'foreignKey' => 'report_id'
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
            ->scalar('report')
            ->requirePresence('report', 'create')
            ->notEmpty('report');

        $validator
            ->scalar('report_number')
            ->maxLength('report_number', 255)
            ->requirePresence('report_number', 'create')
            ->notEmpty('report_number');

        $validator
            ->scalar('report_subject')
            ->maxLength('report_subject', 511)
            ->requirePresence('report_subject', 'create')
            ->notEmpty('report_subject');

        $validator
            ->scalar('report_origin')
            ->maxLength('report_origin', 255)
            ->requirePresence('report_origin', 'create')
            ->notEmpty('report_origin');

        $validator
            ->scalar('report_difusion')
            ->maxLength('report_difusion', 255)
            ->requirePresence('report_difusion', 'create')
            ->notEmpty('report_difusion');

        $validator
            ->scalar('report_number_judicial_order')
            ->maxLength('report_number_judicial_order', 255)
            //->requirePresence('report_number_judicial_order', 'create')
            ->notEmpty('report_number_judicial_order');

        $validator
            ->date('report_date_judicial_order')
            ->maxLength('report_date_judicial_order', 255)
            //->requirePresence('report_date_judicial_order', 'create')
            ->notEmpty('report_date_judicial_order');

        $validator
            ->date('report_date_judicial_order_previous')
            ->maxLength('report_date_judicial_order_previous', 255)
            //->requirePresence('report_date_judicial_order_previous', 'create')
            ->allowEmpty('report_date_judicial_order_previous');

        $validator
            ->scalar('report_reference')
            ->maxLength('report_reference', 255)
            //->requirePresence('report_reference', 'create')
            ->allowEmpty('report_reference');

        $validator
            ->scalar('report_process_number')
            ->maxLength('report_process_number', 255)
            //->requirePresence('report_process_number', 'create')
            ->notEmpty('report_process_number');

        $validator
            ->scalar('report_official_license_number')
            ->maxLength('report_official_license_number', 255)
            //->requirePresence('report_official_license_number', 'create')
            ->notEmpty('report_official_license_number');

        $validator
            ->scalar('report_court')
            ->maxLength('report_court', 255)
            //->requirePresence('report_court', 'create')
            ->notEmpty('report_court');

        $validator
            ->scalar('report_district')
            ->maxLength('report_district', 255)
            //->requirePresence('report_district', 'create')
            ->notEmpty('report_district');

        $validator
            ->scalar('report_judicial_order_name')
            ->maxLength('report_judicial_order_name', 255)
            //->requirePresence('report_judicial_order_name', 'create')
            ->notEmpty('report_judicial_order_name');

        $validator
            ->scalar('report_attachment')
            ->maxLength('report_attachment', 511)
            //->requirePresence('report_attachment', 'create')
            ->notEmpty('report_attachment');

        $validator
            ->scalar('report_number_of_pages')
            ->maxLength('report_number_of_pages', 63)
            ->allowEmpty('report_number_of_pages');

        $validator
            ->scalar('report_extra_judicial_order')
            ->maxLength('report_extra_judicial_order', 127)
            ->allowEmpty('report_extra_judicial_order');

        $validator
            ->date('signed_date')
            ->allowEmpty('signed_date');

        $validator
            ->boolean('signed')
            ->requirePresence('signed', 'create')
            ->notEmpty('signed');

        $validator
            ->boolean('cover')
            ->requirePresence('cover', 'create')
            ->notEmpty('cover');

        $validator
            ->boolean('photographic_attachment')
            ->requirePresence('photographic_attachment', 'create')
            ->notEmpty('photographic_attachment');

        $validator
            ->boolean('canceled')
            ->requirePresence('canceled', 'create')
            ->notEmpty('canceled');

        $validator
            ->date('fact_date')
            ->allowEmpty('fact_date');

        $validator
            ->scalar('report_difusion_previous')
            ->maxLength('report_difusion_previous', 256)
            ->allowEmpty('report_difusion_previous');

        $validator
            ->scalar('report_number_judicial_order_previous')
            ->maxLength('report_number_judicial_order_previous', 256)
            ->allowEmpty('report_number_judicial_order_previous');

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
        $rules->add($rules->existsIn(['user_id'], 'Users'));
        $rules->add($rules->existsIn(['operation_id'], 'Operations'));
        $rules->add($rules->existsIn(['report_type_id'], 'ReportTypes'));

        return $rules;
    }
}
