<?php

namespace BjyProfiler\Db\Adapter;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use BjyProfiler\Db\Profiler\Profiler;

class ProfilingAdapterServiceFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $config = $serviceLocator->get('Config');
        $adapter = new ProfilingAdapter($config['db']);
        $adapter->setProfiler(new Profiler);
        $adapter->injectProfilingStatementPrototype();
        return $adapter;
    }
}
