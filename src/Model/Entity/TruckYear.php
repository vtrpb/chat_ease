<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * TruckYear Entity
 *
 * @property int $id
 * @property int $truck_model_id
 * @property string $name
 * @property int|null $external_id
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\TruckModel $truck_model
 * @property \App\Model\Entity\External $external
 */
class TruckYear extends Entity
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
        'truck_model_id' => true,
        'name' => true,
        'external_id' => true,
        'created' => true,
        'modified' => true,
        'truck_model' => true,
        'external' => true
    ];
}
