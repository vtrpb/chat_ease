<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ValidatedUserStates Model
 *
 * @property \App\Model\Table\ValidatedUsersTable|\Cake\ORM\Association\HasMany $ValidatedUsers
 *
 * @method \App\Model\Entity\ValidatedUserState get($primaryKey, $options = [])
 * @method \App\Model\Entity\ValidatedUserState newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ValidatedUserState[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ValidatedUserState|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ValidatedUserState|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ValidatedUserState patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ValidatedUserState[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ValidatedUserState findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ValidatedUserStatesTable extends Table
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

        $this->setTable('validated_user_states');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('ValidatedUsers', [
            'foreignKey' => 'validated_user_state_id'
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
