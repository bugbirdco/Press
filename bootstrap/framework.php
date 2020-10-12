<?php

// Add the vendor themes dir
use Timber\Timber;

add_filter('setup_theme', function () {
    register_theme_directory(__DIR__ . '/../resources/vendor-themes/');
});

// Autoload all plugins
if (defined('APP_AUTOLOAD_PLUGINS') && APP_AUTOLOAD_PLUGINS != false) {
    add_action('plugins_loaded', function () {
        // We do want this all to auto load, but we need to make sure that if the plugin has a setup hook, that it
        // is handled by an admin
        if (!is_admin()) {
            return;
        }

        if (!function_exists('get_plugins')) {
            require_once ABSPATH . 'wp-admin/includes/plugin.php';
        }
        $excludes = defined('APP_AUTOLOAD_PLUGINS_EXCLUDE') ? (APP_AUTOLOAD_PLUGINS_EXCLUDE ?? []) : [];
        activate_plugins(
            array_filter(
                array_keys(get_plugins()),
                function ($plugin) use ($excludes) {
                    return !in_array($plugin, $excludes) && is_plugin_inactive($plugin);
                }
            )
        );
    });
}

// Set the theme based on the config
if (defined('APP_DEFAULT_THEME') && APP_DEFAULT_THEME) {
    add_action('plugins_loaded', function () {
        $theme = array_filter(wp_get_themes(), function (WP_Theme $theme) {
            return $theme->name == APP_DEFAULT_THEME;
        });
        if (!empty($theme)) {
            /** @var WP_Theme $theme */
            $theme = reset($theme);
            switch_theme($theme->get_stylesheet());
        }
    });

    add_filter('setup_theme', function () {
        // Load application theme.php
        if (file_exists(__DIR__ . '/../app/theme.php')) {
            require_once __DIR__ . '/../app/theme.php';

            /**
             * Initialise Timer
             */
            new Timber();

            /**
             * Sets the directories (inside your theme) to find .twig files
             */
            Timber::$dirname = '/../views/';

            /**
             * By default, Timber does NOT autoescape values. Want to enable Twig's autoescape?
             * No prob! Just set this value to true.
             * We are going to enable it though
             */
            Timber::$autoescape = true;

            new Theme();
        }

        // Load application functions.php
        if (file_exists(__DIR__ . '/../app/functions.php')) {
            require_once __DIR__ . '/../app/functions.php';
        }
    });
}

// Ensure the application never updates, as we want Composer to do this
add_filter('update_blocker_blocked', function ($blocked) {
    $blocked['core'] = true;
    return $blocked;
});