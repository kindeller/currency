<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * CurrencyValue Entity
 *
 * @property int $id
 * @property int $currency_id
 * @property float $value
 * @property \Cake\I18n\FrozenTime $timestamp
 *
 * @property \App\Model\Entity\Currency $currency
 */
class CurrencyValue extends Entity
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
        'currency_id' => true,
        'value' => true,
        'timestamp' => true,
        'currency' => true
    ];
}
