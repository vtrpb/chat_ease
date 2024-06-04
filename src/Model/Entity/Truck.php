<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Truck Entity
 *
 * @property int $id
 * @property int $user_id
 * @property int $truck_type_id
 * @property string|null $color
 * @property int|null $state_id
 * @property int|null $city_id
 * @property int|null $year
 * @property int|null $year_model
 * @property int|null $mileage
 * @property string|null $condition
 * @property string|null $brand
 * @property string|null $model
 * @property string|null $traction
 * @property string|null $transmission
 * @property string|null $implement
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\TruckType $truck_type
 * @property \App\Model\Entity\State $state
 * @property \App\Model\Entity\City $city
 * @property \App\Model\Entity\Ad[] $ads
 */
class Truck extends Entity
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
        'truck_type_id' => true,
        'color' => true,
        'state_id' => true,
        'city_id' => true,
        'year' => true,
        'year_model' => true,
        'mileage' => true,
        'condition' => true,
        'brand' => true,
        'model' => true,
        'traction' => true,
        'transmission' => true,
        'implement' => true,
        'created' => true,
        'modified' => true,
        'user' => true,
        'truck_type' => true,
        'state' => true,
        'city' => true,
        'ads' => true
    ];

    protected function _setMileage($value)
    {
        return (integer) str_replace(['.', 'km'], '', $value);
    }

    protected function _getMileageDisplay($value)
    {
         return number_format($this->mileage, 0, ',', '.') . ' km';
    }
      
    protected function _getConditionDisplay()
    {
        if ($this->condition === 'seminovo') {
            return 'Seminovo';
        } elseif ($this->condition === 'novo') {
            return 'Novo';
        }        

        return $this->condition;
    }

    protected function _getTransmissionDisplay()
    {        
        $transmission = $this->transmission;

        if ($transmission === 'automatica') {
            return 'Automática';
        } elseif ($transmission === 'automatizada') {
            return 'Automatizada';
        } elseif ($transmission === 'cvt') {
            return 'CVT';
        } elseif ($transmission === 'dupla_embreagem') {
            return 'Dupla embreagem';
        } elseif ($transmission === 'manual') {
            return 'Manual';
        } elseif ($transmission === 'Semi-automática') {
            return 'Semi-automática';
        }

        return $transmission;
    }             

    protected function _getImplementDisplay()
    {
        $implement = $this->implement;

        if ($implement === '' || $implement === 'sem_implemento') {
            return 'Sem implemento';
        } elseif ($implement === 'basculante') {
            return 'Basculante';
        } elseif ($implement === 'bau_frigorifico') {
            return 'Baú frigorífico';
        } elseif ($implement === 'bau_seco') {
            return 'Baú seco';
        } elseif ($implement === 'carga_seco') {
            return 'Carga seca';
        } elseif ($implement === 'graneleiro') {
            return 'Graneleiro';
        } elseif ($implement === 'prancha') {
            return 'Prancha';
        } elseif ($implement === 'tanque') {
            return 'Tanque';
        }

        return $this->implement;
    }


}
