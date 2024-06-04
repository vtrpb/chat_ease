<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Workplace Entity
 *
 * @property int $id
 * @property int $user_id
 * @property int $sector_id
 * @property int $subsector_id
 * @property int $core_id
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Sector $sector
 * @property \App\Model\Entity\Subsector $subsector
 * @property \App\Model\Entity\Core $core
 */
class Workplace extends Entity
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
        'sector_id' => true,
        'subsector_id' => true,
        'core_id' => true,
        'created' => true,
        'modified' => true,
        'user' => true,
        'sector' => true,
        'subsector' => true,
        'core' => true
    ];
}
