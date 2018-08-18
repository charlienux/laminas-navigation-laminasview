<?php
/**
 * @see       https://github.com/zendframework/zend-navigation-zendview for the canonical source repository
 * @copyright Copyright (c) 2018 Zend Technologies USA Inc. (https://www.zend.com)
 * @license   https://github.com/zendframework/zend-navigation-zendview/blob/master/LICENSE.md New BSD License
 */

namespace ZendTest\Navigation\ZendView;

use PHPUnit\Framework\TestCase;
use Zend\Navigation\View\ViewHelperManagerDelegatorFactory;
use Zend\Navigation\ZendView\ConfigProvider;
use Zend\View\HelperPluginManager;

class ConfigProviderTest extends TestCase
{
    private $config = [
        'delegators' => [
            HelperPluginManager::class => [
                ViewHelperManagerDelegatorFactory::class,
            ],
        ],
    ];

    public function testProvidesExpectedConfiguration()
    {
        $provider = new ConfigProvider();
        $this->assertEquals($this->config, $provider->getDependencyConfig());

        return $provider;
    }

    /**
     * @depends testProvidesExpectedConfiguration
     * @param ConfigProvider $provider
     */
    public function testInvocationProvidesDependencyConfiguration(
        ConfigProvider $provider
    ) {
        $this->assertEquals(
            [
                'dependencies' => $provider->getDependencyConfig(),
            ],
            $provider()
        );
    }
}
