<?php
/**
 * Prerender Io Clear Cache plugin for Craft CMS 3.x
 *
 * Clear the cache on entries save from prerender.io
 *
 * @link      https://kffein.com
 * @copyright Copyright (c) 2021 Kffein
 */

namespace kffein\prerenderioclearcachetests\unit;

use Codeception\Test\Unit;
use UnitTester;
use Craft;
use kffein\prerenderioclearcache\PrerenderIoClearCache;

/**
 * ExampleUnitTest
 *
 *
 * @author    Kffein
 * @package   PrerenderIoClearCache
 * @since     1.0.0
 */
class ExampleUnitTest extends Unit
{
    // Properties
    // =========================================================================

    /**
     * @var UnitTester
     */
    protected $tester;

    // Public methods
    // =========================================================================

    // Tests
    // =========================================================================

    /**
     *
     */
    public function testPluginInstance()
    {
        $this->assertInstanceOf(
            PrerenderIoClearCache::class,
            PrerenderIoClearCache::$plugin
        );
    }

    /**
     *
     */
    public function testCraftEdition()
    {
        Craft::$app->setEdition(Craft::Pro);

        $this->assertSame(
            Craft::Pro,
            Craft::$app->getEdition()
        );
    }
}
