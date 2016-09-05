<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Orders Entity
 *
 * @property int $id
 * @property int $productStoreID
 * @property \Cake\I18n\Time $orderDate
 * @property string $orderCustomerName
 * @property \Cake\I18n\Time $orderLastUpdated
 * @property \Cake\I18n\Time $orderShippingDate
 * @property string $orderCustomerAddress
 * @property bool $orderActive
 * @property bool $isOrderShipped
 * @property string $orderDescription
 */
class Orders extends Entity
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
        '*' => true,
        'id' => false
    ];
}
