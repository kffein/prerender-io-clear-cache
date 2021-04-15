<?php
/**
 * Prerender Io Clear Cache plugin for Craft CMS 3.x
 *
 * Clear the cache on entries save from prerender.io
 *
 * @link      https://kffein.com
 * @copyright Copyright (c) 2021 Kffein
 */

/**
 * Prerender Io Clear Cache en Translation
 *
 * Returns an array with the string to be translated (as passed to `Craft::t('prerender-io-clear-cache', '...')`) as
 * the key, and the translation as the value.
 *
 * http://www.yiiframework.com/doc-2.0/guide-tutorial-i18n.html
 *
 * @author    Kffein
 * @package   PrerenderIoClearCache
 * @since     1.0.0
 */
return [
    'settings__title' => 'Settings',
    'settings__clear_cache_on_save__label' => 'Clear Cache On Save?',
    'settings__clear_cache_on_save__instructions' => 'Do you want to clear the cache of an entry on save?',
    'settings__prerender_token__instructions' => 'Enter the token from Prerender.io here.',
    'utilities__button' => 'Clear all cache'
];
