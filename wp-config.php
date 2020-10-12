<?php

// Autoload everything
require_once __DIR__ . '/vendor/autoload.php';

// Load external libs and create the environment for WP
require_once __DIR__ . '/bootstrap/environment.php';

// Load application config.php (actually wp-config.php)
if (file_exists(__DIR__ . '/app/config.php')) {
    require_once __DIR__ . '/app/config.php';
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . '/wp-includes/plugin.php';

// Install WP extensions
require_once __DIR__ . '/bootstrap/framework.php';

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';