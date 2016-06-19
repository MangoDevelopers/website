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
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'u879802749_db');

/** MySQL database username */
define('DB_USER', 'u879802749_db');

/** MySQL database password */
define('DB_PASSWORD', 'discovery3001');

/** MySQL hostname */
define('DB_HOST', 'mysql.hostinger.in');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         '8cBqGRa$?KG#2[4V-Zp`2mE<S9)`YPp!5&<cm.U5#[ Dp`BP[$GZ,DvI@:D_9tV=');
define('SECURE_AUTH_KEY',  '$`dy9c!cH*ZQWl]yJwYgvVW%wJtzRl`aEh.%b Ps{#[8q bZ-aVLc;+&oIqcf^:+');
define('LOGGED_IN_KEY',    '8lYmBjnx[a6H<z}oL+;!+(G|}WT$Op_}7J._v5tK!0p3Og:UV7z{a)jeCaGH~|#d');
define('NONCE_KEY',        'CK+?U6,5$lv4sMR$l5V:Q9zc~/^dX?/I@&)1N!=99-CzF-}*7>yIH),%Qi,yBMPa');
define('AUTH_SALT',        'x`Z|-vl%0MwH>^`lN9a@Lc$Gdy(EwpJt-*Ird/o^&/Ic<)It7?#8dL|8%[MCb%ci');
define('SECURE_AUTH_SALT', ',c2? $tJ_PHQM+A#W/emj?nTzAznD<p3w@u(]#AT++2h-x:rRm8*-pB+he:n#i=y');
define('LOGGED_IN_SALT',   'n8a7X`N`2)4+8Z0reJNQR2eFQtyn~w6HLM:gr:!k42Q,mUh{G55tbaI!$Rx1Bt=^');
define('NONCE_SALT',       'vF$>.,*w4.|o*Lx?ys(WcNjXBV#rz9<E,(/NENa@ .M Fnn${S:.Qnpn]xs-E:=0');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_users';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
