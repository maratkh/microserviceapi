<?php
namespace Mercury\Api\Services;

use Mercury\Api\MicroserviceAbstract;

/**
 * Postman class
 *
 * @author Igor Manturov Jr. <igor.manturov.jr@gmail.com>
 */
class Postman extends MicroserviceAbstract
{

    protected $uris = [
        'send'   => '/send',
        'status' => '/status'
    ];

    protected $url = 'https://postman.mercurypos.online';
}
