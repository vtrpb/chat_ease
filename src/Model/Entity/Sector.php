<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Sector Entity
 *
 * @property int $id
 * @property string $name
 * @property string $alias
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\ReportTemplate[] $report_templates
 * @property \App\Model\Entity\Subsector[] $subsectors
 * @property \App\Model\Entity\Workplace[] $workplaces
 */
class Sector extends Entity
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
        'report_templates' => true,
        'subsectors' => true,
        'workplaces' => true
    ];
}
