<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'vbanx_db' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'sMf6*G7}2n%nd.m_-;hG;mpCIz]2vstJBtji=h~)*%Y>w/E;-W`bkcyAaglrdPaZ' );
define( 'SECURE_AUTH_KEY',  'zvRDHe#oU#=bTBfx+ipM/y $/?J7vn&mhC_DyW;yj)N7t7GK!DF^JVaI-}w(%K6,' );
define( 'LOGGED_IN_KEY',    'QK6ceIeDhK6R}>k^e?X)RtB]1EF1n;~E/5,en8,2iL~35tM93PE7x[pADfy,y*[L' );
define( 'NONCE_KEY',        ']*iG.Oeti.^ZCCLyBrxzYTfx.:X&T%:V<<bI/74jtCg3MzdNdUBS`S,Kt,>w6=!#' );
define( 'AUTH_SALT',        'V5Zw8ALyY~nL^rmk|7pO7w=86EF:j*yB:zt=df&={i^wr&_NXV>~:hY}1YU{ifK-' );
define( 'SECURE_AUTH_SALT', 'w-s@[J*!3n3<T)*`_R{f*eA-KW*P TWi%]*_Zhw>:s+Oq0ALw}rRuffs0DB%`>3|' );
define( 'LOGGED_IN_SALT',   'TZUh7q=g*v}DM@U}PC@dYp${IaCJ)bLEc3Wkt13SR&?DvAk^?b&DZ[*<B4&5)=5Q' );
define( 'NONCE_SALT',       ':oPpir3dN%JQ/?g(UHr8CbCKZx#o)0n`;byJ#^+VKc)hk:Nmq_@}-kuMO0m,6#Ai' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
 */
define( 'WP_DEBUG', true );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';

define('FS_METHOD', 'direct');