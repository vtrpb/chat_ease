<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * AdStates Model
 *
 * @property \App\Model\Table\AdsTable|\Cake\ORM\Association\HasMany $Ads
 *
 * @method \App\Model\Entity\AdState get($primaryKey, $options = [])
 * @method \App\Model\Entity\AdState newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\AdState[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\AdState|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AdState|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AdState patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\AdState[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\AdState findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class AdStatesTable extends Table
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

        $this->setTable('ad_states');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Ads', [
            'foreignKey' => 'ad_state_id'
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
            ->maxLength('alias', 127)
            ->requirePresence('alias', 'create')
            ->notEmpty('alias');

        return $validator;
    }
}
