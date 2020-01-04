<?php
/**
 * @see       https://github.com/laminas/laminas-navigation-laminasview for the canonical source repository
 * @copyright https://github.com/laminas/laminas-navigation-laminasview/blob/master/COPYRIGHT.md
 * @license   https://github.com/laminas/laminas-navigation-laminasview/blob/master/LICENSE.md New BSD License
 */

declare(strict_types=1);

namespace Laminas\Navigation\LaminasView;

use Laminas\Navigation\View\ViewHelperManagerDelegatorFactory;
use Laminas\View\HelperPluginManager;

class ConfigProvider
{
    /**
     * Return general-purpose laminas-navigation configuration.
     *
     * @return array
     */
    public function __invoke() : array
    {
        return [
            'dependencies' => $this->getDependencyConfig(),
        ];
    }

    /**
     * Return application-level dependency configuration.
     *
     * @return array
     */
    public function getDependencyConfig() : array
    {
        return [
            'delegators' => [
                HelperPluginManager::class => [
                    ViewHelperManagerDelegatorFactory::class,
                ],
            ],
        ];
    }
}
