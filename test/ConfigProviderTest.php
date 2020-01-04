<?php
/**
 * @see       https://github.com/laminas/laminas-navigation-laminasview for the canonical source repository
 * @copyright https://github.com/laminas/laminas-navigation-laminasview/blob/master/COPYRIGHT.md
 * @license   https://github.com/laminas/laminas-navigation-laminasview/blob/master/LICENSE.md New BSD License
 */

namespace LaminasTest\Navigation\LaminasView;

use PHPUnit\Framework\TestCase;
use Laminas\Navigation\View\ViewHelperManagerDelegatorFactory;
use Laminas\Navigation\LaminasView\ConfigProvider;
use Laminas\View\HelperPluginManager;

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
