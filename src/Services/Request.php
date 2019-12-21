<?php
namespace Mercury\Api\Services;

use Mercury\Api\MicroserviceAbstract;

/**
 * Request class
 *
 * @author Igor Manturov Jr. <igor.manturov.jr@gmail.com>
 */
class Request extends MicroserviceAbstract
{
    protected $uris = [
        'request'         => '/request',
        'status'          => '/status',
        'progress'        => '/progress',
        'processApplication' => '/processApplication',
        'setContract'     => '/setContract'
    ];

    protected $url = 'https://request.mercurypos.online';
}
