<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'ws2022_p_media' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost:3301' );

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
define( 'AUTH_KEY',         'zkN4IIt*1wyLxLEeJQ9hP4+/geI{0b!]}uIEfj.EU e;Vx_1GZv.&6]RtU$XaL5H' );
define( 'SECURE_AUTH_KEY',  'tecN#AJk[RtWy^(u7>^nmM#b?u]siDLX}VA$<&XKJS[RsG`<`b]JWE;2{rs)LJQ3' );
define( 'LOGGED_IN_KEY',    'kU9xc4<Es#>V-b7va [!{/l]X<j9X#iLs6Qg%EB}_fM!/d;%8ODMjWh{Qb(at]]m' );
define( 'NONCE_KEY',        '|*5zn55<A[YSIvj_;gYi=6B/Yr1P1~kEpnRM8bE}4UaPa[aiEPI=RUxtvup`vEDC' );
define( 'AUTH_SALT',        'SQ?@Zk{?V! >aJr%jPu:mc?^7+ZS$OLO`i1+jYw~2Ho@7@?jg4ivc*NlHdvlY1$1' );
define( 'SECURE_AUTH_SALT', 'w<O~&z]B<~UAjgav](Z[M|f?,YzfelM:u59]l_Yq>mwc~XLx<]=;/q1`9o-i#V!0' );
define( 'LOGGED_IN_SALT',   'tZVJw5dw=U,>Z+HdV*kXR9:Csi839@,522>L?LUD)!Qoz2aR&w=Qcia7.P)aIv`B' );
define( 'NONCE_SALT',       'Cz;qI>}x,BJ%Ic!fTJ1,wsgWFcg5Y-y85F ]DMIAfl`*Kx!dZgC6x0*F3#kA{p8j' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_p_media';

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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
