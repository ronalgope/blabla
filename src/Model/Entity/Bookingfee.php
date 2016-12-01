<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Bookingfee Entity
 *
 * @property int $id
 * @property int $orders_id
 * @property string $statement
 * @property string $project
 * @property string $type
 * @property int $price
 * @property int $dp
 * @property string $hp
 * @property string $otherhp
 * @property int $total
 * @property string $date
 *
 * @property \App\Model\Entity\Order $order
 */
class Bookingfee extends Entity
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
