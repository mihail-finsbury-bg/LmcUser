<?php

namespace LaminasUser\Factory;

use Interop\Container\ContainerInterface;
use Laminas\ServiceManager\Factory\FactoryInterface;
use Laminas\ServiceManager\ServiceLocatorInterface;

class AuthenticationService implements FactoryInterface
{
    public function __invoke(ContainerInterface $serviceLocator, $requestedName, array $options = null)
    {
        return new \Laminas\Authentication\AuthenticationService(
            $serviceLocator->get('LaminasUser\Authentication\Storage\Db'),
            $serviceLocator->get('LaminasUser\Authentication\Adapter\AdapterChain')
        );
    }

    /**
     * Create service
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @return mixed
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        return $this->__invoke($serviceLocator, null);
    }
}
