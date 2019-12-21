<?php
namespace Mercury\Api;

use Mercury\Api\Exceptions\ServiceNotExists;

/**
 * Client class
 *
 * @author Igor Manturov Jr. <igor.manturov.jr@gmail.com>
 */
class Client
{

    /**
     * @var array Services.
     */
    private $services = [];

    /**
     * @var string Node secret.
     */
    private $nodeSecret;

    /**
     * @var array Endpoint URLs.
     */
    private $endpoints = [];

    /**
     * Services namespace.
     */
    const SERVICE_NAMESPACE = __NAMESPACE__ . '\Services';


    /**
     * Client constructor.
     *
     * @param string $nodeSecret Secret key to access private microservice API.
     * @param array $endpoints List of the microservices endpoint.
     */
    public function __construct(string $nodeSecret, array $endpoints = [])
    {
        $this->nodeSecret = $nodeSecret;
        $this->endpoints  = $endpoints;
        $classes          = $this->getServiceClasses();
        $this->instantiateServices($classes);
    }


    /**
     * Returns list of service classes.
     * @return array
     */
    private function getServiceClasses()
    {
        $path    = __DIR__ . '/Services';
        $classes = [];
        $scan    = array_diff(scandir($path), [ '.', '..' ]);

        foreach ($scan as $key => $value) {
            $file  = str_replace('.php', '', $value);
            $alias = strtolower($file);
            $class = self::SERVICE_NAMESPACE . '\\' . $file;
            $classes[ $alias ] = $class;
        }

        return $classes;
    }


    /**
     * @param array $classes
     * @return array
     */
    private function instantiateServices(array $classes)
    {
        /**
         * @var \Mercury\Api\Interfaces\IMicroservice $instance
         */

        $services = [];
        foreach ($classes as $alias => $class) {
            $instance = new $class($this->nodeSecret);
            $alias    = $instance->getAlias();
            !isset($this->endpoints[ $alias ]) ?: $instance->setUrl($this->endpoints[ $alias ]);
            $this->services[ $alias ] = $instance;
        }

        return $services;
    }


    /**
     * @param string $name
     * @param $arguments
     * @throws ServiceNotExists
     * @return array
     */
    public function __call($name, $arguments)
    {
        if (!isset($this->services[ $name ])) {
            throw new ServiceNotExists();
        }

        return $this->services[ $name ]->call($arguments[ 0 ], $arguments[ 1 ]);
    }
}
