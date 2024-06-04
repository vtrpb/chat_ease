<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * TruckModel Entity
 *
 * @property int $id
 * @property int $truck_brand_id
 * @property int|null $truck_type_id
 * @property string $name
 * @property int|null $external_id
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\TruckBrand $truck_brand
 * @property \App\Model\Entity\TruckType $truck_type
 * @property \App\Model\Entity\External $external
 * @property \App\Model\Entity\TruckYear[] $truck_years
 */
class TruckModel extends Entity
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
        'truck_brand_id' => true,
        'truck_type_id' => true,
        'name' => true,
        'external_id' => true,
        'created' => true,
        'modified' => true,
        'truck_brand' => true,
        'truck_type' => true,
        'external' => true,
        'truck_years' => true
    ];
}
