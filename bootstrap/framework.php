<?php

// Add the vendor themes dir
register_theme_directory(__DIR__ . '/../resources/vendor-themes/');

// Ensure the application never updates, as we want Composer to do this
add_filter('update_blocker_blocked', function ($blocked) {
    $blocked['core'] = true;
    return $blocked;
});

if(defined('APP_DEFAULT_THEME')) {
    add_action('wp', function () {
        $theme = array_filter(wp_get_themes(), function (WP_Theme $theme) {
            return $theme->name == APP_DEFAULT_THEME;
        });
        if(!empty($theme)) {
            /** @var WP_Theme $theme */
            $theme = reset($theme);
            switch_theme($theme->get_stylesheet());
        }
    });
}