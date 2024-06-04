<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Workplaces Model
 *
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\SectorsTable|\Cake\ORM\Association\BelongsTo $Sectors
 * @property \App\Model\Table\SubsectorsTable|\Cake\ORM\Association\BelongsTo $Subsectors
 * @property \App\Model\Table\CoresTable|\Cake\ORM\Association\BelongsTo $Cores
 *
 * @method \App\Model\Entity\Workplace get($primaryKey, $options = [])
 * @method \App\Model\Entity\Workplace newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Workplace[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Workplace|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Workplace|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Workplace patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Workplace[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Workplace findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class WorkplacesTable extends Table
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

        $this->setTable('workplaces');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Sectors', [
            'foreignKey' => 'sector_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Subsectors', [
            'foreignKey' => 'subsector_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Cores', [
            'foreignKey' => 'core_id',
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
        $rules->add($rules->isUnique(['user_id','sector_id'],['message'=>'Essa pessoa já tem local de trabalho!']));
        $rules->add($rules->existsIn(['user_id'], 'Users'));
        $rules->add($rules->existsIn(['sector_id'], 'Sectors'));
        $rules->add($rules->existsIn(['subsector_id'], 'Subsectors'));
        $rules->add($rules->existsIn(['core_id'], 'Cores'));

        return $rules;
    }
}
