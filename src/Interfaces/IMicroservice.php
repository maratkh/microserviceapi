<?php
namespace Mercury\Api\Interfaces;

/**
 * IMicroservice interface
 *
 * @author Igor Manturov Jr. <igor.manturov.jr@gmail.com>
 */
interface IMicroservice
{

    /**
     * Constructor.
     * @param string $secret Node secret.
     * @param string $url Microservice endpoint URL.
     */
    public function __construct(string $secret, string $url = '');


    /**
     * Returns microservice alias name.
     * @return string Microservice alias (name, identifier)
     */
    public function getAlias() : string;


    /**
     * Invokes the given method with the given parameters in Microservice API.
     * @param string $method
     * @param $params
     * @return array Associative array with the following keys:
     *  - status, possible values are: 'ok' and 'error'
     *  - data (if status value is 'ok')
     *  - error, associative array with keys: code and message
     */
    public function call(string $method, $params) : array ;


    /**
     * @param string $url Microservice endpoint URL.
     */
    public function setUrl(string $url);
}