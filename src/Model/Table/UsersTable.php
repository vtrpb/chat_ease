<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Users Model
 *
 * @property |\Cake\ORM\Association\HasMany $Addresses
 * @property |\Cake\ORM\Association\HasMany $Ads
 * @property |\Cake\ORM\Association\HasMany $Files
 * @property \App\Model\Table\PermissionsTable|\Cake\ORM\Association\HasMany $Permissions
 * @property |\Cake\ORM\Association\HasMany $Trucks
 * @property |\Cake\ORM\Association\HasMany $ValidatedUsers
 *
 * @method \App\Model\Entity\User get($primaryKey, $options = [])
 * @method \App\Model\Entity\User newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\User[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\User[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\User findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class UsersTable extends Table
{
    protected function _getDateOfBirth() {
        return $this->_getFormattedDate($this->_properties['date_of_birth']);
    }

    protected function _setDateOfBirth($value) {
        $this->_properties['date_of_birth'] = $this->_setFormattedDate($value);
    }

    protected function _getFormattedDate($value) {
        return date('d/m/Y', strtotime($value));
    }

    protected function _setFormattedDate($value) {
        return date('Y-m-d', strtotime(str_replace('/', '-', $value)));
    }

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('users');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Addresses', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Ads', [
            'foreignKey' => 'user_id'
        ]);
        
        $this->hasMany('Files', [
            'foreignKey' => 'table_pk',
            'conditions' => ['Files.table_name' => 'users'],
        ]);

        $this->hasMany('Permissions', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Trucks', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('ValidatedUsers', [
            'foreignKey' => 'user_id'
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

       /* $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmpty('email')
            ->add('email', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);*/

        $validator
            ->email('email', false, 'E-mail já cadastrado!')
            ->requirePresence('email', 'create', 'O email é obrigatório')
            ->notEmpty('email', 'O email não pode ser vazio')
            ->add('email', 'unique', [
                'rule' => 'validateUnique',
                'provider' => 'table',
                'message' => 'Este email já está cadastrado'
            ]);

        $validator
            ->scalar('password')
            ->maxLength('password', 255)
            ->requirePresence('password', 'create')
            ->notEmpty('password');

        $validator
            ->scalar('name')
            ->maxLength('name', 255)
            ->notEmpty('name');

        $validator
            ->scalar('corporate_name')
            ->maxLength('corporate_name', 255)
            ->allowEmpty('corporate_name');

        $validator
            ->scalar('mobile_number')
            ->maxLength('mobile_number', 255)
            ->requirePresence('mobile_number', 'create')
            ->notEmpty('mobile_number');

        $validator
            ->scalar('commercial_number')
            ->maxLength('commercial_number', 255)
            ->requirePresence('commercial_number', 'create')
            ->allowEmpty('commercial_number');

        $validator
            //->date('date_of_birth')
            ->requirePresence('date_of_birth', 'create')
            ->notEmpty('date_of_birth');

        $validator
            ->scalar('cpf')
            ->maxLength('cpf', 127)
            ->notEmpty('cpf');

        $validator
            ->scalar('cnpj')
            ->maxLength('cnpj', 127)
            ->allowEmpty('cnpj');

        $validator
            ->boolean('active')
            ->requirePresence('active', 'create')
            ->notEmpty('active');

        $validator
            ->scalar('otp')
            ->maxLength('otp', 50)
            ->requirePresence('otp', 'create')
            ->notEmpty('otp');

        $validator
            ->scalar('status')
            ->maxLength('status', 50)
            ->requirePresence('status', 'create')
            ->notEmpty('status');

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
        $rules->add($rules->isUnique(['email']));

        return $rules;
    }
}
