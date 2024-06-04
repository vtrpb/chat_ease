<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Report Entity
 *
 * @property int $id
 * @property int $user_id
 * @property string $report
 * @property string $report_number
 * @property string $report_subject
 * @property string $report_origin
 * @property string $report_difusion
 * @property string $report_number_judicial_order
 * @property \Cake\I18n\FrozenDate|null $report_date_judicial_order
 * @property \Cake\I18n\FrozenDate|null $report_date_judicial_order_previous
 * @property string $report_reference
 * @property string $report_process_number
 * @property string $report_official_license_number
 * @property string $report_court
 * @property string $report_district
 * @property string $report_judicial_order_name
 * @property string $report_attachment
 * @property string|null $report_number_of_pages
 * @property string|null $report_extra_judicial_order
 * @property \Cake\I18n\FrozenDate|null $signed_date
 * @property bool $signed
 * @property bool $cover
 * @property bool $photographic_attachment
 * @property bool $canceled
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 * @property \Cake\I18n\FrozenDate|null $fact_date
 * @property string|null $report_difusion_previous
 * @property string|null $report_number_judicial_order_previous
 * @property int|null $operation_id
 * @property int $report_type_id
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\ReportFile[] $report_files
 */
class Report extends Entity
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
        'report' => true,
        'report_number' => true,
        'report_subject' => true,
        'report_origin' => true,
        'report_difusion' => true,
        'report_number_judicial_order' => true,
        'report_date_judicial_order' => true,
        'report_date_judicial_order_previous' => true,
        'report_reference' => true,
        'report_process_number' => true,
        'report_official_license_number' => true,
        'report_court' => true,
        'report_district' => true,
        'report_judicial_order_name' => true,
        'report_attachment' => true,
        'report_number_of_pages' => true,
        'report_extra_judicial_order' => true,
        'signed_date' => true,
        'signed' => true,
        'cover' => true,
        'photographic_attachment' => true,
        'canceled' => true,
        'created' => true,
        'modified' => true,
        'fact_date' => true,
        'report_difusion_previous' => true,
        'report_number_judicial_order_previous' => true,
        'operation_id' => true,
        'report_type_id' => true,
        'user' => true,
        'report_files' => true
    ];
}
