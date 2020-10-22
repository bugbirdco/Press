<?php

/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

define('APP_AUTOLOAD_PLUGINS', true);
define('APP_AUTOLOAD_PLUGINS_EXCLUDE', [
//    's3-uploads/s3-uploads' // Forget about s3-uploads
]);
define('APP_DEFAULT_THEME', 'theme');
define('APP_AUTO_DEACTIVATE_PLUGINS', false);

// ** MySQL settings - You can get this info from your web host ** //
define('DB_NAME', $_ENV['DB_DATABASE']);
define('DB_USER', $_ENV['DB_USERNAME']);
define('DB_PASSWORD', $_ENV['DB_PASSWORD']);
define('DB_HOST', $_ENV['DB_HOSTNAME'] ?? 'localhost');
define('DB_CHARSET', $_ENV['DB_CHARSET'] ?? 'utf8');
define('DB_COLLATE', $_ENV['DB_COLLATE'] ?? '');
/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

if ($_ENV['APP_STORE_ON_S3'] != 'false') {
    if ($_ENV['AWS_KEY']) {
        define('S3_UPLOADS_KEY', $_ENV['AWS_KEY']);
        define('S3_UPLOADS_SECRET', $_ENV['AWS_SECRET']);
        define('S3_UPLOADS_BUCKET', $_ENV['AWS_BUCKET']);
        define('S3_UPLOADS_REGION', $_ENV['AWS_REGION']);
    } else {
        define('S3_UPLOADS_USE_INSTANCE_PROFILE', true);
    }
} else {
    define('S3_UPLOADS_AUTOENABLE', false);
}
