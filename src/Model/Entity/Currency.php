<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Currency Entity
 *
 * @property int $id
 * @property string $name
 * @property string $abbreviation
 *
 * @property \App\Model\Entity\CurrencyValue[] $currency_values
 * @property \App\Model\Entity\UserCurrencyTracking[] $user_currency_tracking
 */
class Currency extends Entity
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
        'name' => true,
        'abbreviation' => true,
        'currency_values' => true,
        'user_currency_tracking' => true
    ];
}
