<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// $onGae is true on production.
if (isset($_SERVER['GAE_ENV'])) {
    $onGae = true;
} else {
    $onGae = false;
}

// Cache settings
// Disable cache for now, as this does not work on App Engine for PHP 7.2
define('WP_CACHE', false);

// Disable pseudo cron behavior
define('DISABLE_WP_CRON', true);

// Determine HTTP or HTTPS, then set WP_SITEURL and WP_HOME
if ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off')
    || (isset($_SERVER['SERVER_PORT']) && $_SERVER['SERVER_PORT'] == 443)) {
    $protocol_to_use = 'https://';
} else {
    $protocol_to_use = 'http://';
}
if (isset($_SERVER['HTTP_HOST'])) {
    define('HTTP_HOST', $_SERVER['HTTP_HOST']);
} else {
    define('HTTP_HOST', 'localhost');
}
define('WP_SITEURL', $protocol_to_use . HTTP_HOST);
define('WP_HOME', $protocol_to_use . HTTP_HOST);

// ** MySQL settings - You can get this info from your web host ** //
if ($onGae) {
    /** The name of the Cloud SQL database for WordPress */
    define('DB_NAME', 'wpappdb');
    /** Production login info */
    define('DB_HOST', ':/cloudsql/mahisfashionparadise:us-central1:wpdbinst');
    define('DB_USER', 'root');
    define('DB_PASSWORD', 'sh22e');
} else {
    /** The name of the local database for WordPress */
    define('DB_NAME', 'mahisfashiondb');
    /** Local environment MySQL login info */
    define('DB_HOST', '127.0.0.1');
    define('DB_USER', 'root');
    define('DB_PASSWORD', 'root');
}

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'oZiHDNgAV6ODNiHCOKn59GHkFEkvn234wE7JH9FbO+3j7UWoa2GQ4CsLrHSUaPAoHpZf6wCWskKVT42W');
define('SECURE_AUTH_KEY',  'GBfYiWlLCNGQIHIEbOM5fob7oVkdY7VHlEVVVGrdCqZzJcVXAqCbNHLvo1Tegj80fQOuKovHFhz1AMK0');
define('LOGGED_IN_KEY',    '7NtT1pb/1AI8l+u8piVH9UEnisBfubc+yVXF66LWMyndf3zCBTfFk8bePdF8m134d6rqHY/F6MzKdXAX');
define('NONCE_KEY',        'twW7sua/VpZfrvtpSrpADWBweY9hHVVZaEfvgo2fDIcPQneBanZrszx9UEjFgQc/tsJ6toezE220uQUc');
define('AUTH_SALT',        'fi+WVpLKRjzs549jZdKl26RVV5ElANvaPzX3f6DHQh+6nc3qfAQqzZebZo+5CL4VV0UwulsiEAD+Oa40');
define('SECURE_AUTH_SALT', 'hoQbsC9rB/+E510jlt8mSBPWo+UxRZdAUi3dSWRsca/7p0wguc7QB/nVaDiR51PkJK67BkzKq8ZOn4iQ');
define('LOGGED_IN_SALT',   'e8IKfqaRM5lw22YegfP8bHMutWOb4IsP/5YVjJm5/imDdQz1LOZzmHVCp5uUJ57REN7keDhIVAZzUhPB');
define('NONCE_SALT',       'esCpnKN2DHdVxFqtU5q055BhM/fFQGI5MT6Vr/2+z/fX3aOxdNmdr7/HJuzsZPldumo3xmnzwDPx8Pit');

/**#@-*/
/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', !$onGae);

/* That's all, stop editing! Happy blogging. */
/** Absolute path to the WordPress directory. */
if (!defined('ABSPATH')) {
    define('ABSPATH', dirname(__FILE__) . '/wordpress/');
}

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
