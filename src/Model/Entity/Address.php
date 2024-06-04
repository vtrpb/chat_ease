<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Address Entity
 *
 * @property int $id
 * @property int $user_id
 * @property int|null $state_id
 * @property int|null $city_id
 * @property string|null $address_street
 * @property string|null $address_number
 * @property string|null $address_complement
 * @property string|null $address_district
 * @property string|null $address_zip_code
 * @property string|null $phone_number1
 * @property string|null $phone_number2
 * @property string|null $mobile_number
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\State $state
 * @property \App\Model\Entity\City $city
 */
class Address extends Entity
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
        'user_id' => true,
        'state_id' => true,
        'city_id' => true,
        'address_street' => true,
        'address_number' => true,
        'address_complement' => true,
        'address_district' => true,
        'address_zip_code' => true,
        'phone_number1' => true,
        'phone_number2' => true,
        'mobile_number' => true,
        'created' => true,
        'modified' => true,
        'user' => true,
        'state' => true,
        'city' => true
    ];
}
