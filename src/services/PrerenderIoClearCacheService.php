<?php
/**
 * Prerender Io Clear Cache plugin for Craft CMS 3.x
 *
 * Clear the cache on entries save from prerender.io
 *
 * @link      https://kffein.com
 * @copyright Copyright (c) 2021 Kffein
 */

namespace kffein\prerenderioclearcache\services;

use kffein\prerenderioclearcache\PrerenderIoClearCache;

use Craft;
use craft\base\Component;
use craft\elements\Entry;
use kffein\prerenderioclearcache\PrerenderioClearCache as PrerenderioclearcachePrerenderioClearCache;

/**
 * PrerenderIoClearCacheService Service
 *
 * All of your plugin’s business logic should go in services, including saving data,
 * retrieving data, etc. They provide APIs that your controllers, template variables,
 * and other plugins can interact with.
 *
 * https://craftcms.com/docs/plugins/services
 *
 * @author    Kffein
 * @package   PrerenderIoClearCache
 * @since     1.0.0
 */
class PrerenderIoClearCacheService extends Component
{
    // Public Methods
    // =========================================================================
    public function clearCache(array $urls) : void
    {
        $token = PrerenderioclearcachePrerenderioClearCache::$plugin->getSettings()->prerenderToken;
        $ch = curl_init('https://api.prerender.io/recache');
        $key = count($urls) == 1 ? 'url' : 'urls';
        curl_setopt_array($ch, [
            CURLOPT_POST => TRUE,
            CURLOPT_RETURNTRANSFER => TRUE,
            CURLOPT_HTTPHEADER => [
                'Content-Type: application/json'
            ],
            CURLOPT_POSTFIELDS => json_encode([
                'prerenderToken' => $token,
                $key => $urls,
            ])
        ]);
        curl_exec($ch);
    }
}
