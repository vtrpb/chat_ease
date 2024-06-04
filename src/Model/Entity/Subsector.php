<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Subsector Entity
 *
 * @property int $id
 * @property int $sector_id
 * @property string $name
 * @property string $alias
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\Sector $sector
 * @property \App\Model\Entity\Core[] $cores
 * @property \App\Model\Entity\ReportTemplate[] $report_templates
 * @property \App\Model\Entity\Workplace[] $workplaces
 */
class Subsector extends Entity
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
        'sector_id' => true,
        'name' => true,
        'alias' => true,
        'created' => true,
        'modified' => true,
        'sector' => true,
        'cores' => true,
        'report_templates' => true,
        'workplaces' => true
    ];
}
