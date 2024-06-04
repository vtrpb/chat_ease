<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ValidatedUserState Entity
 *
 * @property int $id
 * @property string $name
 * @property string $alias
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\ValidatedUser[] $validated_users
 */
class ValidatedUserState extends Entity
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
        'created' => true,
        'modified' => true,
        'validated_users' => true
    ];
}
