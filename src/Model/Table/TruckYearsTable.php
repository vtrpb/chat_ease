<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TruckYears Model
 *
 * @property \App\Model\Table\TruckModelsTable|\Cake\ORM\Association\BelongsTo $TruckModels
 * @property \App\Model\Table\ExternalsTable|\Cake\ORM\Association\BelongsTo $Externals
 *
 * @method \App\Model\Entity\TruckYear get($primaryKey, $options = [])
 * @method \App\Model\Entity\TruckYear newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\TruckYear[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TruckYear|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TruckYear|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TruckYear patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\TruckYear[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\TruckYear findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class TruckYearsTable extends Table
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

        $this->setTable('truck_years');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('TruckModels', [
            'foreignKey' => 'truck_model_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Externals', [
            'foreignKey' => 'external_id'
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
            ->notEmpty('name')
            ->add('name', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

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
        $rules->add($rules->isUnique(['name']));
        $rules->add($rules->existsIn(['external_id'], 'Externals'));
        $rules->add($rules->existsIn(['truck_model_id'], 'TruckModels'));

        return $rules;
    }
}
