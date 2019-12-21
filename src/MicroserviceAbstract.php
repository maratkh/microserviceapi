<?php
namespace Mercury\Api;

use Mercury\Api\Exceptions\MethodNotExists;
use Mercury\Api\Interfaces\IMicroservice;

/**
 * MicroserviceAbstract class
 *
 * @author Igor Manturov Jr. <igor.manturov.jr@gmail.com>
 */
abstract class MicroserviceAbstract implements IMicroservice
{

    /**
     * @var string Microservice node secret.
     */
    protected $secret;

    /**
     * @var string Microservice endpoint url.
     */
    protected $url;

    /**
     * @var string Microservice alias name.
     */
    protected $alias;

    /**
     * @var array Microservice method URIs.
     */
    protected $uris = [];


    /**
     * MicroserviceAbstract constructor.
     *
     * @param string $secret
     * @param string $url
     */
    public function __construct(string $secret, string $url = '')
    {
        $this->secret = $secret;
        $this->url    = empty($url) ? $this->url : $url;
        $reflection   = new \ReflectionClass($this);
        $this->alias  = strtolower($reflection->getShortName());
    }


    /**
     * @param string $method
     * @param $params
     * @return array
     * @throws MethodNotExists
     */
    public function call(string $method, $params) : array
    {
        if (!isset($this->uris[ $method ])) {
            throw new MethodNotExists();
        }

        $url = $this->url . $this->uris[ $method ];

        return $this->request($url, $params);
    }


    /**
     * @return string
     */
    public function getAlias() : string
    {
        return $this->alias;
    }


    /**
     * @param string $url
     * @param $params
     * @return array
     */
    protected function request(string $url, $params)
    {
        $query = is_array($params) ? $params : [ 'id' => $params ];
        $query = json_encode($query);

        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $query);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $this->getHttpHeaders());
        $result        = curl_exec($curl);
        $errorMessage  = curl_error($curl);
        $errorCode     = curl_errno($curl);
        $code          = curl_getinfo($curl, CURLINFO_RESPONSE_CODE);
        curl_close($curl);

        if ($result == false) {
            return [ 'status' => 'error', 'error' => [ 'code' => $errorCode, 'message' => $errorMessage ] ];
        }

        $response = json_decode($result, true);
        if (is_null($response)) {
            return [ 'status' => 'error', 'error' => [ 'code' => $code, 'message' => 'HTTP error' ]];
        }

        return $response;
    }


    /**
     * @return array
     */
    protected function getHttpHeaders()
    {
        return [
            'Content-Type: application/json',
            'Authorization: Bearer ' . $this->secret
        ];
    }


    /**
     * @param string $url
     */
    public function setUrl(string $url)
    {
        $this->url = $url;
    }
}
