<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * State Entity
 *
 * @property int $id
 * @property string $name
 * @property string $alias
 * @property int $country_id
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\Country $country
 * @property \App\Model\Entity\Address[] $addresses
 * @property \App\Model\Entity\City[] $cities
 * @property \App\Model\Entity\Truck[] $trucks
 */
class State extends Entity
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
        'name' => true,
        'alias' => true,
        'country_id' => true,
        'created' => true,
        'modified' => true,
        'country' => true,
        'addresses' => true,
        'cities' => true,
        'trucks' => true
    ];
}
