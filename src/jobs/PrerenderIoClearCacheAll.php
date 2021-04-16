<?php
/**
 * Prerender Io Clear Cache plugin for Craft CMS 3.x
 *
 * Clear the cache on entries save from prerender.io
 *
 * @link      https://kffein.com
 * @copyright Copyright (c) 2021 Kffein
 */

namespace kffein\prerenderioclearcache\jobs;

use kffein\prerenderioclearcache\PrerenderIoClearCache;
use Craft;
use craft\queue\BaseJob;

/**
 * PrerenderIoClearCacheTask job
 *
 * Jobs are run in separate process via a Queue of pending jobs. This allows
 * you to spin lengthy processing off into a separate PHP process that does not
 * block the main process.
 *
 * You can use it like this:
 *
 * use kffein\prerenderioclearcache\jobs\PrerenderIoClearCacheTask as PrerenderIoClearCacheTaskJob;
 *
 * $queue = Craft::$app->getQueue();
 * $jobId = $queue->push(new PrerenderIoClearCacheTaskJob([
 *     'description' => Craft::t('prerender-io-clear-cache', 'This overrides the default description'),
 *     'someAttribute' => 'someValue',
 * ]));
 *
 * The key/value pairs that you pass in to the job will set the public properties
 * for that object. Thus whatever you set 'someAttribute' to will cause the
 * public property $someAttribute to be set in the job.
 *
 * Passing in 'description' is optional, and only if you want to override the default
 * description.
 *
 * More info: https://github.com/yiisoft/yii2-queue
 *
 * @author    Kffein
 * @package   PrerenderIoClearCache
 * @since     1.0.0
 */
class PrerenderIoClearCacheAll extends BaseJob
{
    // Public Properties
    // =========================================================================

    // Public Methods
    // =========================================================================

    public function execute($queue)
    {
        PrerenderIoClearCache::$plugin->prerenderIoClearCacheService->clearEntriesCache();
    }

    // Protected Methods
    // =========================================================================

    protected function defaultDescription(): string
    {
        return Craft::t('prerender-io-clear-cache', 'PrerenderIoClearCacheTask');
    }
}
