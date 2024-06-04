<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TruckTypes Model
 *
 * @property \App\Model\Table\TrucksTable|\Cake\ORM\Association\HasMany $Trucks
 *
 * @method \App\Model\Entity\TruckType get($primaryKey, $options = [])
 * @method \App\Model\Entity\TruckType newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\TruckType[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TruckType|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TruckType|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TruckType patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\TruckType[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\TruckType findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class TruckTypesTable extends Table
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

        $this->setTable('truck_types');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Trucks', [
            'foreignKey' => 'truck_type_id',            
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
