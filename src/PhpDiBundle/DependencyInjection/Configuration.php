<?php

/**
 * @author     mfris
 */

namespace PhpDiBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * DoctrineMigrationsExtension configuration structure.
 *
 * @author Lukas Kahwe Smith <smith@pooteeweet.org>
 */
class Configuration implements ConfigurationInterface
{
    /**
     * Generates the configuration tree.
     *
     * @return \Symfony\Component\Config\Definition\Builder\TreeBuilder The config tree builder
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('php_di_symfony2', 'array');

        $rootNode
            ->children()
                ->scalarNode('config')
                    ->defaultValue('%kernel.root_dir%/config/php-di.config.php')->cannotBeEmpty()->end()
            ->end()
        ;

        return $treeBuilder;
    }
}
