<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Trucks Model
 *
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\TruckTypesTable|\Cake\ORM\Association\BelongsTo $TruckTypes
 * @property \App\Model\Table\StatesTable|\Cake\ORM\Association\BelongsTo $States
 * @property \App\Model\Table\CitiesTable|\Cake\ORM\Association\BelongsTo $Cities
 * @property \App\Model\Table\AdsTable|\Cake\ORM\Association\HasMany $Ads
 *
 * @method \App\Model\Entity\Truck get($primaryKey, $options = [])
 * @method \App\Model\Entity\Truck newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Truck[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Truck|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Truck|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Truck patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Truck[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Truck findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class TrucksTable extends Table
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

        $this->setTable('trucks');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);

        $this->belongsTo('TruckTypes', [
            'foreignKey' => 'truck_type_id',
            'joinType' => 'INNER',            
        ]);

        $this->belongsTo('States', [
            'foreignKey' => 'state_id'
        ]);
        $this->belongsTo('Cities', [
            'foreignKey' => 'city_id'
        ]);
        $this->hasMany('Ads', [
            'foreignKey' => 'truck_id'
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
            ->scalar('year')
            ->allowEmpty('year');

        $validator
            ->scalar('mileage')
            ->allowEmpty('mileage');

        $validator
            ->scalar('condition')
            ->maxLength('condition', 255)
            ->allowEmpty('condition');

        $validator
            ->scalar('brand')
            ->maxLength('brand', 255)
            ->allowEmpty('brand');

        $validator
            ->scalar('model')
            ->maxLength('model', 255)
            ->allowEmpty('model');

        $validator
            ->scalar('traction')
            ->maxLength('traction', 255)
            ->allowEmpty('traction');

        $validator
            ->scalar('transmission')
            ->maxLength('transmission', 255)
            ->allowEmpty('transmission');

        $validator
            ->scalar('implement')
            ->maxLength('implement', 255)
            ->allowEmpty('implement');

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
        $rules->add($rules->existsIn(['truck_type_id'], 'TruckTypes'));
        $rules->add($rules->existsIn(['state_id'], 'States'));
        $rules->add($rules->existsIn(['city_id'], 'Cities'));

        return $rules;
    }
}
