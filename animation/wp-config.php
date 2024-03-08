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
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

define('WP_HTTP_BLOCK_EXTERNAL', true);

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'ws2022_animation_studio' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
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
define( 'AUTH_KEY',         '56;RBr:r56x]*^z16MUL1=u*,=a{}qS(!|[7 w@>rk%k8[[.!NZ72j{bBf3Fd&d@' );
define( 'SECURE_AUTH_KEY',  'Emmb`_zOxOWT&[`>{yTAGVk35cHb-{JyFy/bw(KdAKavSX1@qbSd,C~S0i}P `mv' );
define( 'LOGGED_IN_KEY',    'uxl*dMh_]=Z}if@b-`8$f5.pYVW=kx@Ad7oSGp~GTVmxAq F8.W2;:c~jpu!MnsD' );
define( 'NONCE_KEY',        'X,U>L7+YAwR]bH0A$of_qIjApUD}_}fWVWA^dQ|Qi;#@XS)B`RfT^FeH?$3LTUuW' );
define( 'AUTH_SALT',        'YzVDG-OMUy$[>bK}A(Va.U]B/m G_zNSeBekl MQ^l_O1GpW?&Oe6^_lgx/5*:%A' );
define( 'SECURE_AUTH_SALT', '9(kiidEIB~Bl^R)G07>fg4#2$l[#,NqI%uqWXmCyuJB;5-cN=%4<4>jZ~@O&:(EM' );
define( 'LOGGED_IN_SALT',   '7k%<Y4HOgKR<X)Rak5kT %V5|o^zdX %e}e&-x4z~:zj~iR>sYu/M6}`%2u* K>N' );
define( 'NONCE_SALT',       'tJ#mHo]|ZPL(hyXXEl8Vd=V;RM1u$Bkb?.[q%FrusJz2(*Tl>,9VZ9*~zsuF~rN<' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'animation_wp_';

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

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

// define('WP_REPAIR_DB', true);
/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
