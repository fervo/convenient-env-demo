<?php

namespace AppBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Definition;

class AppExtension extends Extension
{
    /**
     * {@inheritdoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $username = isset($config['username']['expression']) ? $config['username']['expression'] : $config['username']['scalar'];
        $password = isset($config['password']['expression']) ? $config['password']['expression'] : $config['password']['scalar'];

        $def = new Definition('AppBundle\\Foo', [$config['dsn_expression'], $username, $password]);
        $container->setDefinition('foo', $def);
    }

    /**
     * {@inheritdoc}
     */
    public function getXsdValidationBasePath()
    {
        return __DIR__ . '/../Resources/config/schema';
    }

    /**
     * {@inheritdoc}
     */
    public function getNamespace()
    {
        return 'http://symfony.com/schema/dic/app';
    }
}
