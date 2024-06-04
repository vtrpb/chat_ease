<?php

namespace App\View\Helper;

use Cake\View\Helper;
use Cake\View\View;

class AppHelper extends Helper {    

    public $helpers = ['Html'];

    protected function _getStateNameWithColor($name) {
        switch ($name) {
            case 'Ativo':
                $color = 'success';
                break;
            case 'Pausado':
                $color = 'warning';
                break;
            case 'Expirado':
                $color = 'danger';
                break;
            case 'Pendente':
                $color = 'info';
                break;
            default:
                $color = 'secondary';
        }
        return '<span class="badge badge-' . $color . '">' . $name . '</span>';
    }

    public function getStateNameWithColor($id) {
        $adStateModel = ClassRegistry::init('AdState');
        $state = $adStateModel->findById($id);
        if (!$state) {
            return '';
        }
        return $this->_getStateNameWithColor($state['AdState']['name']);
    }

}
