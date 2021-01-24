<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'fabfashn' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'sh22ee05' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

define( 'DISABLE_WP_CRON', true );

define( 'HTTP_HOST', '192.168.1.236/fabfashn' );
$protocol_to_use = "http://"; 

define('WP_SITEURL', $protocol_to_use . HTTP_HOST);
define('WP_HOME', $protocol_to_use . HTTP_HOST);

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'oTXk4:k6IdEY<R8Yqm_,pS)2&]f_MVD]J#a2d~F9i[^1i,qmd(ZcG+k^UMBKWRY$' );
define( 'SECURE_AUTH_KEY',  '3FjQiX1&KOA_gVoclK#[m|EhGYmWRX89=d@bF@1?lg-UHMx!1c7-z(LDE#C`~[8/' );
define( 'LOGGED_IN_KEY',    'DtUg]Z=vzvKw;N_TxnuF5bVsimYvKvu-!EL3{I%aRdCK|Bd[sjc7V-~% Hypx!*p' );
define( 'NONCE_KEY',        ']k4,4xF`0+7>4tWnuU54R?K+9 }v6DpzmKL0Fm0&oNqxq*JZk80+$Vn6f5d/~E({' );
define( 'AUTH_SALT',        'D[rpa$GMllPUibM/d/;pIgCxqb.(F$4dG@ O~Jf]h!?<,f!+<ym?Ld(>@w`#hwy#' );
define( 'SECURE_AUTH_SALT', 'HGI=V9M*Jgo!?Ki)S!>LKd?4Cmv!b!>1q1fV4cw)97<5Oa+Qm_nr]S`}nn3xyBi^' );
define( 'LOGGED_IN_SALT',   '@+ywWUGtD1+#/*Sc0FHG4`,%zK|.qzy8C6lV%q`ki2&TQkHJqS>uw4Zs7m48ew~I' );
define( 'NONCE_SALT',       '(H}SC>4%dN+nF8z}~$bB-70Lo@67bbhivNj^NV bFy;XV|$g7ng5+~@*R4K|TT1p' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
