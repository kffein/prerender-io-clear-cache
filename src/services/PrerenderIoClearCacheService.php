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
use craft\base\Component;
use kffein\prerenderioclearcache\PrerenderioClearCache as PrerenderioclearcachePrerenderioClearCache;
use craft\elements\Entry;
use Craft;

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
    // Constant Properties
    // =========================================================================
    const URL_CHUNK_LIMIT = 1000;

    // Public Methods
    // =========================================================================
    public function clearCache(array $urls) : void
    {
        $token = Craft::parseEnv(PrerenderioclearcachePrerenderioClearCache::$plugin->getSettings()->prerenderToken);

        if (!strlen($token)) {
            throw new \Exception('Token is invalid');
        }

        $ch = curl_init('https://api.prerender.io/recache');
        curl_setopt_array($ch, [
            CURLOPT_POST => true,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPHEADER => [
                'Content-Type: application/json'
            ],
            CURLOPT_POSTFIELDS => json_encode([
                'prerenderToken' => $token,
                'urls' => $urls,
            ])
        ]);
        curl_exec($ch);
    }

    public function clearEntriesCache()
    {
        $entries = Entry::find()->siteId('*')->limit(null)->all();
        $urls = array_filter(array_map(function ($entry) {
            return $entry->url;
        }, $entries));
        $urls = array_filter($urls);

        $urlsChunks = array_chunk($urls, self::URL_CHUNK_LIMIT);
        foreach ($urlsChunks as $urls) {
            $this->clearCache($urls);
        }
    }
}
