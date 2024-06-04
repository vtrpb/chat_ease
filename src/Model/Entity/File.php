<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * File Entity
 *
 * @property int $id
 * @property string $table_name
 * @property int $table_id
 * @property string $path
 * @property string $type
 * @property \Cake\I18n\FrozenDate $date
 * @property string $hash
 * @property string $comment
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\User $user
 */
class File extends Entity
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
        'table_name' => true,
        'table_pk' => true,
        'path' => true,
        'type' => true,
        'date' => true,
        'hash' => true,
        'comment' => true,
        'created' => true,
        'modified' => true,
        'user' => true
    ];
}
