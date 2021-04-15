<?php
/**
 * Prerender Io Clear Cache plugin for Craft CMS 3.x
 *
 * Clear the cache on entries save from prerender.io
 *
 * @link      https://kffein.com
 * @copyright Copyright (c) 2021 Kffein
 */

namespace kffein\prerenderioclearcache\utilities;

use kffein\prerenderioclearcache\PrerenderIoClearCache;
use kffein\prerenderioclearcache\assetbundles\prerenderioclearcacheutilityutility\PrerenderIoClearCacheUtilityUtilityAsset;

use Craft;
use craft\base\Utility;

/**
 * Prerender Io Clear Cache Utility
 *
 * Utility is the base class for classes representing Control Panel utilities.
 *
 * https://craftcms.com/docs/plugins/utilities
 *
 * @author    Kffein
 * @package   PrerenderIoClearCache
 * @since     1.0.0
 */
class PrerenderIoClearCacheUtility extends Utility
{
    // Static
    // =========================================================================

    /**
     * Returns the display name of this utility.
     *
     * @return string The display name of this utility.
     */
    public static function displayName(): string
    {
        return Craft::t('prerender-io-clear-cache', 'Prerender.io');
    }

    /**
     * Returns the utility’s unique identifier.
     *
     * The ID should be in `kebab-case`, as it will be visible in the URL (`admin/utilities/the-handle`).
     *
     * @return string
     */
    public static function id(): string
    {
        return 'prerenderioclearcache-prerender-io-clear-cache-utility';
    }

    /**
     * Returns the path to the utility's SVG icon.
     *
     * @return string|null The path to the utility SVG icon
     */
    public static function iconPath()
    {
        return Craft::getAlias("@kffein/prerenderioclearcache/assetbundles/prerenderioclearcacheutilityutility/dist/img/PrerenderIoClearCacheUtility-icon.svg");
    }

    /**
     * Returns the number that should be shown in the utility’s nav item badge.
     *
     * If `0` is returned, no badge will be shown
     *
     * @return int
     */
    public static function badgeCount(): int
    {
        return 0;
    }

    /**
     * Returns the utility's content HTML.
     *
     * @return string
     */
    public static function contentHtml(): string
    {
        Craft::$app->getView()->registerAssetBundle(PrerenderIoClearCacheUtilityUtilityAsset::class);

        return Craft::$app->getView()->renderTemplate(
            'prerender-io-clear-cache/_components/utilities/PrerenderIoClearCacheUtility_content',
            [
                // 'someVar' => $someVar
            ]
        );
    }
}
