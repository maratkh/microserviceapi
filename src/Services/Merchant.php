<?php
namespace Mercury\Api\Services;

use Mercury\Api\MicroserviceAbstract;

/**
 * Merchant class
 *
 * @author Igor Manturov Jr. <igor.manturov.jr@gmail.com>
 */
class Merchant extends MicroserviceAbstract
{
    protected $uris = [
        'createContract' => '/contract/create',
        'deleteContract' => '/contract/delete',
        'listContract'   => '/contract/list',
        'updateContract' => '/contract/update',

        'createMerchant' => '/merchant/create',
        'deleteMerchant' => '/merchant/delete',
        'listMerchant'   => '/merchant/list',
        'updateMerchant' => '/merchant/update',

        'listPaymentOrder' => '/paymentOrder/list',
        'createPaymentOrder' => '/createPaymentOrder',

        'createRate' => '/rate/create',
        'deleteRate' => '/rate/delete',
        'listRate'   => '/rate/list',
        'updateRate' => '/rate/update',

        'createService' => '/service/create',
        'deleteService' => '/service/delete',
        'listService'   => '/service/list',
        'updateService' => '/service/update',

        'createUser' => '/user/create',
        'deleteUser' => '/user/delete',
        'listUser'   => '/user/list',
        'updateUser' => '/user/update',

        'createOwnershipType' => '/ownership/create',
        'deleteOwnershipType' => '/ownership/delete',
        'listOwnershipType'   => '/ownership/list',
        'updateOwnershipType' => '/ownership/update',

        'signin' => '/signin'
    ];

    protected $url = 'https://merchant.mercurypos.online';
}
