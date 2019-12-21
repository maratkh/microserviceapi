<?php
namespace Mercury\Api\Services;

use Mercury\Api\MicroserviceAbstract;

/**
 * Order class
 *
 * @author Igor Manturov Jr. <igor.manturov.jr@gmail.com>
 */
class Order extends MicroserviceAbstract
{
    protected $uris = [
        'openSession' => '/session/open',
        'listSession' => '/session/list',
        'normalizeSession' => '/session/normalize',
        'updateOrder' => '/order/update',
        'listOrder'   => '/order/list',
        'listProduct' => '/product/list',
        'timingsSession'   => '/session/timings',
        'setPaymentOrderIdentifier' => '/setPaymentOrderIdentifier',
        'unsetPaymentOrderIdentifier' => '/unsetPaymentOrderIdentifier',
        'accountsReceivable' => '/accountsReceivable',
        'accountsReceivableByContract' => '/accountsReceivableByContract'
    ];

    protected $url = 'https://order.mercurypos.online';
}
