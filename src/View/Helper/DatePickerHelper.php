<?php

namespace App\View\Helper;

use Cake\View\Helper;
use Cake\View\View;

class DatePickerHelper extends Helper
{
    public $helpers = ['Html'];

    public function input($fieldName, $labelName, $options = [])
    {
        $options += [
            'class' => 'form-control',
            'name' => $fieldName,
            'id' => $fieldName,
            'type' => 'text',
            'data-provide' => 'datepicker',
            'data-date-format' => 'dd/mm/yyyy',
            'data-date-autoclose' => 'true',
        ];

        $input = $this->Html->tag('input', '', $options);

        $icon = $this->Html->tag('span', ' <i class="fa fa-calendar"></i>', [
            'class' => 'input-group-addon',
        ]);

        $group = $this->Html->tag('div', $input . $icon, [
            'class' => 'input-group date',
        ]);

        $label = $this->Html->tag('label', $labelName, [
            'for' => $fieldName,
        ]);

        $groupWrapper = $this->Html->tag('div', $group, [
            'class' => 'form-group',
        ]);

        return $label . $groupWrapper;
    }
}
