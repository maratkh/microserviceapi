<?php
namespace Mercury\Api\Services;

use Mercury\Api\MicroserviceAbstract;

/**
 * Tokenizer class
 *
 * @author Igor Manturov Jr. <igor.manturov.jr@gmail.com>
 */
class Tokenizer extends MicroserviceAbstract
{
    protected $uris = [
        'issue'   => '/issue',
        'verify'  => '/verify',
        'reissue' => '/reissue'
    ];

    protected $url = 'https://tokenizer.mercurypos.online';
}
