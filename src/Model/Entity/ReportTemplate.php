<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ReportTemplate Entity
 *
 * @property int $id
 * @property int $core_id
 * @property int|null $sector_id
 * @property int|null $subsector_id
 * @property string $name
 * @property string $template
 * @property bool $locked
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 * @property int|null $report_type_id
 *
 * @property \App\Model\Entity\Core $core
 * @property \App\Model\Entity\Sector $sector
 * @property \App\Model\Entity\Subsector $subsector
 * @property \App\Model\Entity\ReportType $report_type
 */
class ReportTemplate extends Entity
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
        'core_id' => true,
        'sector_id' => true,
        'subsector_id' => true,
        'name' => true,
        'template' => true,
        'locked' => true,
        'created' => true,
        'modified' => true,
        'report_type_id' => true,
        'core' => true,
        'sector' => true,
        'subsector' => true,
        'report_type' => true
    ];
}
