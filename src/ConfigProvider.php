<?php
/**
 * @see       https://github.com/zendframework/zend-navigation-zendview for the canonical source repository
 * @copyright Copyright (c) 2018 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   https://github.com/zendframework/zend-navigation-zendview/blob/master/LICENSE.md New BSD License
 */

declare(strict_types=1);

namespace Zend\Navigation\ZendView;

use Zend\Navigation\View\ViewHelperManagerDelegatorFactory;
use Zend\View\HelperPluginManager;

class ConfigProvider
{
    /**
     * Return general-purpose zend-navigation configuration.
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
