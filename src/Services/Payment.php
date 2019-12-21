<?php
namespace Mercury\Api\Services;

use Mercury\Api\MicroserviceAbstract;

/**
 * Payment class
 *
 * @author Igor Manturov Jr. <igor.manturov.jr@gmail.com>
 */
class Payment extends MicroserviceAbstract
{
    protected $uris = [
        'createCard'    => '/createCard',
        'checkCard'     => '/checkCard',
        'schedule'      => '/schedule',
        'listOperation' => '/operation/list',
        'listCard'      => '/card/list',
        'fullRepayment' => '/fullRepayment',
        'defaultCard'   => '/defaultCard'
    ];

    protected $url = 'https://payment.mercurypos.online';
}
