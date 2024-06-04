<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\Auth\DefaultPasswordHasher;

/**
 * User Entity
 *
 * @property int $id
 * @property string $email
 * @property string $password
 * @property string|null $name
 * @property string|null $corporate_name
 * @property string $mobile_number
 * @property string $commercial_number
 * @property \Cake\I18n\FrozenDate $date_of_birth
 * @property bool $is_reprensetative
 * @property string|null $reprensetative_code
 * @property string|null $referral_code
 * @property string|null $cnpj
 * @property bool $active
 * @property string $otp
 * @property string $status
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\Config[] $configs
 * @property \App\Model\Entity\Permission[] $permissions
 * @property \App\Model\Entity\Report[] $reports
 * @property \App\Model\Entity\Workplace[] $workplaces
 */
class User extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'email' => true,
        'password' => true,
        'name' => true,
        'corporate_name' => true,
        'mobile_number' => true,
        'commercial_number' => true,
        'date_of_birth' => true,
        'is_representative' => true,        
        'representative_code' => true,
        'referral_code'  => true,
        'cpf' => true,
        'cnpj' => true,
        'active' => true,
        'otp' => true,        
        'status' => true,
        'created' => true,
        'modified' => true,
        'configs' => true,
        'permissions' => true,
        'reports' => true,
        'workplaces' => true
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password'
    ];

    protected function _setPassword($password)
    {
        return (new DefaultPasswordHasher)->hash($password);
    }
}
