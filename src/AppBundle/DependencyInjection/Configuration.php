<?php

namespace AppBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('app');

        $rootNode
            ->children()
                ->expressionNode('dsn_expression')
                    ->info('An expression to get the DSN')
                    ->example("env('DATABASE_URL')")
                    ->isRequired()
                ->end()
                ->arrayNode('username')
                    ->beforeNormalization()
                        ->ifString()
                        ->then(function ($v) { return array('scalar' => $v); })
                    ->end()
                    ->children()
                        ->scalarNode('scalar')->end()
                        ->expressionNode('expression')->end()
                    ->end()
                ->end()
                ->arrayNode('password')
                    ->beforeNormalization()
                        ->ifString()
                        ->then(function ($v) { return array('scalar' => $v); })
                    ->end()
                    ->children()
                        ->scalarNode('scalar')->end()
                        ->expressionNode('expression')->end()
                    ->end()
                ->end()
            ->end()
        ;

        return $treeBuilder;
    }
}
