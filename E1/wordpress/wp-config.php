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
define('AUTH_KEY',         ':8!Tz)02>AJYo,E;fmBo?%s&#rSyRq@`sYz@VTLnSkFeC|;Q~gA=,SeG6sQ;T%F.');
define('SECURE_AUTH_KEY',  'j)I!!5-/1q:|C{+pl&B_FrEMr8DnPY?f}w369eguUTCB!Sp%]soE0,VCBuX//Lz{');
define('LOGGED_IN_KEY',    'c|7e$Z89ge1p2$OQk>yz.#LF}Phah,<{iY#ikH%q0%|4qabR^x6F:.}HjL.@_7L}');
define('NONCE_KEY',        '8Wl{L2A.sv`5p+MJ[6SBm5^;le-NeDSEg/NP![=$F|W6@=%,d)()y9bCU7E[w%4|');
define('AUTH_SALT',        ']|/_?l8kZZ:+S;PL3qe4==[N-uTDPCWQueXomqC6wIg/!>TrvzQDbt@sJD%mW)U;');
define('SECURE_AUTH_SALT', 'NMRn]GxT$zEO7GFs^:>f?Dso_F1>Ow|Pq,/]Fun k<p+VVVAZ:_OmlzLw-+D2yVI');
define('LOGGED_IN_SALT',   'J4vD`e0S+@ pje2-0GSb)N;xO6[Eize9U#)y3`zWhD4M)$^iYCsoTrK,jD e7BVs');
define('NONCE_SALT',       'cL;jrt>y.YYse.P|$v$atjw:}`o|-xGoj<pBh^y|ARL:P;=/RNUBm5Q1[~v83}JA');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp';

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
