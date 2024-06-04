<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Operation Entity
 *
 * @property int $id
 * @property string $name
 * @property string $alias
 * @property \Cake\I18n\FrozenDate|null $initial_date
 * @property \Cake\I18n\FrozenDate|null $final_date
 * @property string $status
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 */
class Operation extends Entity
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
        'initial_date' => true,
        'final_date' => true,
        'status' => true,
        'created' => true,
        'modified' => true
    ];
}
