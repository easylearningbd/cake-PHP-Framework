<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Patient Entity
 *
 * @property int $id
 * @property int $carrier_id
 * @property string $name
 * @property string $phone
 * @property string $address
 * @property string $city
 * @property string $zipcode
 * @property \Cake\I18n\FrozenTime $created
 *
 * @property \App\Model\Entity\Carrier $carrier
 * @property \App\Model\Entity\Appointment[] $appointments
 * @property \App\Model\Entity\Invoice[] $invoices
 */
class Patient extends Entity
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
        'carrier_id' => true,
        'name' => true,
        'phone' => true,
        'address' => true,
        'city' => true,
        'zipcode' => true,
        'created' => true,
        'carrier' => true,
        'appointments' => true,
        'invoices' => true
    ];
}
