<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ValidatedUser Entity
 *
 * @property int $id
 * @property int $user_id
 * @property int $validated_user_state_id
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\ValidatedUserState $validated_user_state
 */
class ValidatedUser extends Entity
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
        'validated_user_state_id' => true,
        'created' => true,
        'modified' => true,
        'user' => true,
        'validated_user_state' => true
    ];
}
