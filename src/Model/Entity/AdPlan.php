<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * AdPlan Entity
 *
 * @property int $id
 * @property string $name
 * @property string $alias
 * @property string $plan_type
 * @property int $active_days
 * @property bool $free
 * @property float $value
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 */
class AdPlan extends Entity
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
        'active_days' => true,
        'free' => true,
        'value' => true,
        'max_number_cars' => true,
        'plan_type' => true,
        'created' => true,
        'modified' => true
    ];
}
