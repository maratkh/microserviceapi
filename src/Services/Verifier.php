<?php
namespace Mercury\Api\Services;

use Mercury\Api\MicroserviceAbstract;

/**
 * Verifier class
 *
 * @author Igor Manturov Jr. <igor.manturov.jr@gmail.com>
 */
class Verifier extends MicroserviceAbstract
{
    protected $uris = [
        'create' => '/create',
        'verify' => '/verify'
    ];

    protected $url = 'https://verifier.mercurypos.online';

}
