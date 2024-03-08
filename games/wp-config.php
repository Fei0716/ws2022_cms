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
define( 'DB_NAME', 'ws2022_games' );

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
define( 'AUTH_KEY',         ':Xz]Nj0ttNlu`^u@aLn{US<=JI/YU||[EEG(pV%z^O!OqpN$#~Kx_^NP.$AYK[3J' );
define( 'SECURE_AUTH_KEY',  '`)5sq|9l{d#iha2<*1GMfknU++]DT?Ca]&*e+kkhX]j|#}H}(v.RjTyps^mVd6@e' );
define( 'LOGGED_IN_KEY',    'T>bxa&sHO`vq/aN#Tx{jQdn=2n?%^ODk~igq3tdQLqSV)fci$QZ2t4$p`l{fzY4g' );
define( 'NONCE_KEY',        'o$lR[VErJ)te8m+XW=j,6RoX_F%V=[&&M.hj~-av=b(Qt|A=M%vtnqFD@Dje|]rP' );
define( 'AUTH_SALT',        'Me/1xkE^!VZ5$If;GV,2ii|J,4/H1S8 ^xa,dF6=-bSxQqLbu2HwYal)^aU_ANFQ' );
define( 'SECURE_AUTH_SALT', '])1B<4KtFPYBv3}hc=(uDv5(UV4]Dd?Fa]#4;Syb7-]]Q,h]2az[J,-9unq~~4i6' );
define( 'LOGGED_IN_SALT',   '6>w-qC3z.WxYP8$fN:wv>0p VZwp (A^:t(tFRuXe.Sb?4frMt74Jp{z%3gJr_Dc' );
define( 'NONCE_SALT',       'SCeo8<DmB#{5b:J Kkq)]F0zXjf+06!iZ8DVE8;e.u*i~w|vnD~&hf13d1@Wp##,' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_games';

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
define( 'WP_DEBUG', true );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
