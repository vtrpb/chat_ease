<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * AdPlans Model
 *
 * @method \App\Model\Entity\AdPlan get($primaryKey, $options = [])
 * @method \App\Model\Entity\AdPlan newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\AdPlan[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\AdPlan|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AdPlan|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AdPlan patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\AdPlan[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\AdPlan findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class AdPlansTable extends Table
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

        $this->setTable('ad_plans');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
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
            ->maxLength('alias', 127)
            ->requirePresence('alias', 'create')
            ->notEmpty('alias');

        $validator
            ->integer('active_days')
            ->requirePresence('active_days', 'create')
            ->notEmpty('active_days');

        $validator
            ->boolean('free')
            ->requirePresence('free', 'create')
            ->notEmpty('free');

        $validator
            ->decimal('value')
            ->requirePresence('value', 'create')
            ->notEmpty('value');

        return $validator;
    }
}
