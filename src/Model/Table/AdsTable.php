<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;



use Cake\I18n\FrozenTime;

/**
 * Ads Model
 *
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\TrucksTable|\Cake\ORM\Association\BelongsTo $Trucks
 * @property \App\Model\Table\AdStatesTable|\Cake\ORM\Association\BelongsTo $AdStates
 * @property \App\Model\Table\RepresentativeUsersTable|\Cake\ORM\Association\BelongsTo $RepresentativeUsers
 * @property \App\Model\Table\TransactionsTable|\Cake\ORM\Association\BelongsTo $Transactions
 * @property \App\Model\Table\AdImagesTable|\Cake\ORM\Association\HasMany $AdImages
 *
 * @method \App\Model\Entity\Ad get($primaryKey, $options = [])
 * @method \App\Model\Entity\Ad newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Ad[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Ad|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Ad|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Ad patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Ad[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Ad findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class AdsTable extends Table
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

        $this->setTable('ads');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Trucks', [
            'foreignKey' => 'truck_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('AdStates', [
            'foreignKey' => 'ad_state_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('AdPlans', [
            'foreignKey' => 'ad_plan_id',
            'joinType' => 'INNER'
        ]);
        /*$this->belongsTo('RepresentativeUsers', [
            'foreignKey' => 'representative_user_id'
        ]);*/
       /* $this->belongsTo('Transactions', [
            'foreignKey' => 'transaction_id'
        ]);*/
        $this->hasMany('AdImages', [
            'foreignKey' => 'ad_id'
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
            ->scalar('title')
            ->maxLength('title', 255)
            ->requirePresence('title', 'create')
            ->notEmpty('title');

        $validator
            ->scalar('content')
            ->requirePresence('content', 'create')
            ->notEmpty('content');

        $validator
            ->date('initial_date')
            ->requirePresence('initial_date', 'create')
            ->notEmpty('initial_date');

        $validator
            ->date('final_date')
            ->requirePresence('final_date', 'create')
            ->notEmpty('final_date');

        $validator
            ->integer('number_of_photos')
            ->requirePresence('number_of_photos', 'create')
            ->notEmpty('number_of_photos');

        $validator
            ->boolean('free')
            ->requirePresence('free', 'create')
            ->notEmpty('free');

        $validator
            ->numeric('payment_value')
            ->requirePresence('payment_value', 'create')
            ->notEmpty('payment_value');

        $validator
            ->scalar('reference')
            ->maxLength('reference', 200)
            ->allowEmpty('reference');

        $validator
            ->integer('payment_received_code')
            ->allowEmpty('payment_received_code');

        $validator
            ->integer('number_of_views')
            ->allowEmpty('number_of_views');

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
        $rules->add($rules->existsIn(['truck_id'], 'Trucks'));
        $rules->add($rules->existsIn(['ad_state_id'], 'AdStates'));
        //$rules->add($rules->existsIn(['representative_user_id'], 'RepresentativeUsers'));
        /*$rules->add($rules->existsIn(['transaction_id'], 'Transactions'));*/

        return $rules;
    }


}
