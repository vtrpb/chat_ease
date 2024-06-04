<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TruckModels Model
 *
 * @property \App\Model\Table\TruckBrandsTable|\Cake\ORM\Association\BelongsTo $TruckBrands
 * @property \App\Model\Table\TruckTypesTable|\Cake\ORM\Association\BelongsTo $TruckTypes
 * @property \App\Model\Table\ExternalsTable|\Cake\ORM\Association\BelongsTo $Externals
 * @property \App\Model\Table\TruckYearsTable|\Cake\ORM\Association\HasMany $TruckYears
 *
 * @method \App\Model\Entity\TruckModel get($primaryKey, $options = [])
 * @method \App\Model\Entity\TruckModel newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\TruckModel[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TruckModel|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TruckModel|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TruckModel patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\TruckModel[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\TruckModel findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class TruckModelsTable extends Table
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

        $this->setTable('truck_models');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('TruckBrands', [
            'foreignKey' => 'truck_brand_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('TruckTypes', [
            'foreignKey' => 'truck_type_id'
        ]);
        
        $this->hasMany('TruckYears', [
            'foreignKey' => 'truck_model_id'
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
        $rules->add($rules->existsIn(['truck_brand_id'], 'TruckBrands'));
        $rules->add($rules->existsIn(['truck_type_id'], 'TruckTypes'));

        return $rules;
    }
}
