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
    'settings__title' => 'Configurations',
    'settings__clear_cache_on_save__label' => 'Supression de la cache automatique lors d\'une sauvegarde?',
    'settings__clear_cache_on_save__instructions' => 'Lors d\'une sauvegarde d\'entrée, oulez-vous que la cache se supprime automatiquement pour cette entrée?',
    'settings__prerender_token__instructions' => 'Entrer le token de Prerender.io',
    'utilities__button' => 'Supprimer la cache de toutes les entrées',
    'added-to-queue-success' => 'Suppression de la cache ajouté à la queue avec succès'
];
