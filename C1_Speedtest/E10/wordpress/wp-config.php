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
define('DB_NAME', 'wsc_seleksi');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

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
define('AUTH_KEY',         '[dLo^wArL-xvdrZX0P~Bu {7wQ !P%_E<E#aO!k7aMa,($MNu56E^U{f6Vchg;lP');
define('SECURE_AUTH_KEY',  '},DsG*4u/1hP}eK%2-;rl(/X {`T<C:ZE0T7dWB/DMxEk?cy|FCPq>K_L/R<T4gt');
define('LOGGED_IN_KEY',    '$Ap{DA]dnKoD0kD@bYfCuOOUFNF&]Y%TFZ+6H=V[unSQJeyShw4R;`)2`MLL9;_$');
define('NONCE_KEY',        '`@Q&KdnT+,hcKv(LCA4S3z#N9uSl~n/XzN{6,{c}APII+5(IX9:O~{IDJ3q`7B6=');
define('AUTH_SALT',        'SZ04c[aos5e>bei1]weHpqvEs)K 4RTQp+q|Jp;F)`|*_; eb<Y)xf IV]?.#?if');
define('SECURE_AUTH_SALT', 'WDu@dHW/ 3%J7a|w}n5HAm47,+`{NaiZY{p?id5c0<2pMPa=^x|JHWe[rG0KeUB^');
define('LOGGED_IN_SALT',   'n8s1=SGvj&b5!,EE@^y2@gQkfq4lbjZ}Ix6X1!+TW50O3B8JqjV$7t0<7e[,`|y^');
define('NONCE_SALT',       '6`xj5S[uibYD)jF4+,+1 c4@HAUAOg/NUk2qES4@|m{+W~TY]3:e=%Q$g6 B:yeY');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'e10';

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
