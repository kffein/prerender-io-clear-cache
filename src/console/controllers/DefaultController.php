<?php
/**
 * Project module for Craft CMS 3.x
 *
 * Project related module
 *
 * @link      kffein.com
 * @copyright Copyright (c) 2018 Kffein
 */

namespace kffein\prerenderioclearcache\console\controllers;

use modules\projectmodule\ProjectModule;
use Craft;
use yii\console\Controller;
use yii\helpers\Console;
use kffein\prerenderioclearcache\PrerenderIoClearCache;

/**
 * Default Command
 *
 * The first line of this class docblock is displayed as the description
 * of the Console Command in ./craft help
 *
 * Craft can be invoked via commandline console by using the `./craft` command
 * from the project root.
 *
 * Console Commands are just controllers that are invoked to handle console
 * actions. The segment routing is module-name/controller-name/action-name
 *
 * The actionIndex() method is what is executed if no sub-commands are supplied, e.g.:
 *
 * ./craft project-module/default
 *
 * Actions must be in 'kebab-case' so actionDoSomething() maps to 'do-something',
 * and would be invoked via:
 *
 * ./craft project-module/default/do-something
 *
 * @author    Kffein
 * @package   ProjectModule
 * @since     1.0.0
 */
class DefaultController extends Controller
{
    // Public Methods
    // =========================================================================

    public function actionClearallcache()
    {
        PrerenderIoClearCache::$plugin->prerenderIoClearCacheService->clearEntriesCache();
    }
}
