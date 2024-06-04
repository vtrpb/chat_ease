<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

use NumberFormatter;

/**
 * Ad Entity
 *
 * @property int $id
 * @property int $user_id
 * @property int $truck_id
 * @property int $ad_state_id
 * @property int $ad_plan_id
 * @property boll $paid
 * @property int|null $representative_user_id
 * @property string $title
 * @property string $content
 * @property \Cake\I18n\FrozenDate $initial_date
 * @property \Cake\I18n\FrozenDate $final_date
 * @property int $number_of_photos
 * @property bool $free
 * @property float $payment_value
 * @property string|null $transaction_id
 * @property string|null $reference
 * @property int|null $payment_received_code
 * @property int|null $number_of_views
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Truck $truck
 * @property \App\Model\Entity\AdState $ad_state
 * @property \App\Model\Entity\RepresentativeUser $representative_user
 * @property \App\Model\Entity\Transaction $transaction
 * @property \App\Model\Entity\AdImage[] $ad_images
 */
class Ad extends Entity
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
        'truck_id' => true,
        'ad_state_id' => true,
        'ad_plan_id' => true,
        'paid'=>true,
        'representative_user_id' => true,
        'title' => true,
        'content' => true,
        'initial_date' => true,
        'final_date' => true,
        'number_of_photos' => true,
        'free' => true,
        'payment_value' => true,
        'transaction_id' => true,
        'reference' => true,
        'payment_received_code' => true,
        'number_of_views' => true,
        'created' => true,
        'modified' => true,
        'user' => true,
        'truck' => true,
        'truck_price' => true,
        'ad_state' => true,
        'representative_user' => true,
        'transaction' => true,
        'ad_images' => true
    ];

    protected function _setInitialDate($value)
    {
        if (is_string($value)) {
            return FrozenDate::parseDate($value, 'dd/MM/yyyy');
        }
        else if (is_null($value))  {
            return null;   
        }
        return $value;
    }

    protected function _getInitialDate($value)
    {
            if ($value instanceof FrozenDate) {
                return $value->format('d/m/Y');
            }
            return $value;
    }

    protected function _setFinalDate($value)
      {
            if (is_string($value)) {
                return FrozenDate::parseDate($value, 'dd/MM/yyyy');
            }
            else if (is_null($value))  {
                return null;   
            }
            return $value;
      }

    protected function _getFinalDate($value)
      {
            if ($value instanceof FrozenDate) {
                return $value->format('d/m/Y');
            }
            return $value;
      }

   // Getter personalizado para truck_price
   /* protected function _getTruckPriceDisplay()
    {
        $formatter = new NumberFormatter('pt_BR', NumberFormatter::CURRENCY);
        return $formatter->format($this->_properties['truck_price']);
    }*/
    public function _getTruckPriceDisplay()
    {
        $truckPrice = $this->_properties['truck_price'];
        $formattedPrice = 'R$ ' . number_format($truckPrice, 2, ',', '.');
        if ($truckPrice == 0)  {
            return "(preço sob consulta)";
        }
        return $formattedPrice;
    }


    // Setter personalizado para truck_price
  /*protected function _setTruckPrice($value)
    {
        // Converte o valor para float antes de armazenar
        $floatValue = (float)str_replace(['R$', ' ', '.', ','], ['', '', ',', '.'], $value);
        $this->set('truck_price', $floatValue);
        return $floatValue;
    }*/

     protected function _getStateNameWithColor() {
        $adStateModel = TableRegistry::getTableLocator()->get('AdStates');
        $state = $adStateModel->findById($this->ad_state_id);
        if (!$state) {
            return '';
        }
        switch ($state['name']) {
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
        return '<span class="badge badge-' . $color . '">' . $state['name'] . '</span>';
    }


}
