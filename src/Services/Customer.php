<?php
namespace Mercury\Api\Services;

use Mercury\Api\MicroserviceAbstract;

/**
 * Customer class
 *
 * @author Igor Manturov Jr. <igor.manturov.jr@gmail.com>
 */
class Customer extends MicroserviceAbstract
{
    protected $uris = [
        'createCustomer'     => '/customer/create',
        'deleteCustomer'     => '/customer/delete',
        'listCustomer'       => '/customer/list',
        'updateCustomer'     => '/customer/update',
        'signIn'             => '/signIn',
        'signedIn'           => '/signedIn',
        'signUp'             => '/signUp',
        'signedUp'           => '/signedUp',
        'checkEmail'         => '/checkEmail',
        'checkPhone'         => '/checkPhone',
        'checkPassport'      => '/checkPassport',
        'addressSuggestion'  => '/addressSuggestion',
        'increaseLoanNumber' => '/increaseLoanNumber',
        'decreaseLoanNumber' => '/decreaseLoanNumber',
        'recoveryPassword'   => '/recoveryPassword',
        'createCustomerBrainysoft' => '/createCustomerBrainysoft',
        'changePassword'     => '/changePassword'
    ];

    protected $url = 'https://customer.mercurypos.online';
}
