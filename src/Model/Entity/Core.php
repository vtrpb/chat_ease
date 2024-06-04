<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Core Entity
 *
 * @property int $id
 * @property string $name
 * @property string $alias
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 * @property int|null $subsector_id
 *
 * @property \App\Model\Entity\Subsector $subsector
 * @property \App\Model\Entity\ReportTemplate[] $report_templates
 * @property \App\Model\Entity\Workplace[] $workplaces
 */
class Core extends Entity
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
        'subsector_id' => true,
        'subsector' => true,
        'report_templates' => true,
        'workplaces' => true
    ];
}
