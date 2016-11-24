<?php
$root_dir = dirname(__DIR__);
$webroot_dir = $root_dir . '/web';

/**
 * Expose global env() function from oscatero/env
 */
Env::init();

/**
 * Load environment variables with Dotenv
 */
$dotenv = new Dotenv\Dotenv($root_dir);

if (file_exists($root_dir . '/.env')) {
    $dotenv->load($root_dir);
    $dotenv->required(array('DB_NAME', 'DB_USER', 'DB_PASSWORD', 'WP_HOME'));
}

/**
 * Environment settings
 */
define('WP_ENV', env('WP_ENV') ? env('WP_ENV') : 'production');
define('WP_HOME', env('WP_HOME'));
define('WP_SITEURL', env('WP_SITEURL') ? env('WP_SITEURL') : WP_HOME . '/wp');

$environment = __DIR__ . '/env/' . WP_ENV . '.php';

if (file_exists($environment)) {
    require_once($environment);
}

/**
 * Database settings
 */
define('DB_NAME', env('DB_NAME'));
define('DB_USER', env('DB_USER'));
define('DB_PASSWORD', env('DB_PASSWORD'));
define('DB_HOST', env('DB_HOST') ? env('DB_HOST') : 'localhost');

define('DB_CHARSET', 'utf8mb4');
define('DB_COLLATE', '');

$table_prefix = 'wp_';

/**
 * Content directory
 */
define('CONTENT_DIR', '/app');
define('WP_CONTENT_DIR', $webroot_dir . CONTENT_DIR);
define('WP_CONTENT_URL', WP_HOME . CONTENT_DIR);

/**
 * Keys and salts
 */
define('AUTH_KEY', env('AUTH_KEY'));
define('SECURE_AUTH_KEY', env('SECURE_AUTH_KEY'));
define('LOGGED_IN_KEY', env('LOGGED_IN_KEY'));
define('NONCE_KEY', env('NONCE_KEY'));
define('AUTH_SALT', env('AUTH_SALT'));
define('SECURE_AUTH_SALT', env('SECURE_AUTH_SALT'));
define('LOGGED_IN_SALT', env('LOGGED_IN_SALT'));
define('NONCE_SALT', env('NONCE_SALT'));

/**
 * Other WordPress settings
 */
define('DISALLOW_FILE_MODS', true);

/**
 * Load WordPress
 */
if (! defined('ABSPATH')) {
    define('ABSPATH', $webroot_dir . '/wp/');
}
