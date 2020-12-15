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
define('DB_NAME', 'wsc_seleksi_cms');

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
define('AUTH_KEY',         'qJcX$?}jZ! 4/*~;ORO<tzd7aaSP2SQ:f/<e;gK+p6/,m/V1!wrEGxPf1]&qquxU');
define('SECURE_AUTH_KEY',  'AK#+dz:^wXbu{yZ_yi=hovN6!5;4Ol)+.N3ikKAQ~jxl%5(-LY$Yf}~lK=GRu6>M');
define('LOGGED_IN_KEY',    '.VzKGJ}>=p?kHgZ/h<(.=sLLY}7A5lcWVEux9;,$x3dN?B717jY}yx$7UdUXCE-,');
define('NONCE_KEY',        'JJaN%in(rY~vE||rOsOq=zlfufz~O!%;8 pe52WtY#EjD:3tXZ[o3!MS|DaA[fn0');
define('AUTH_SALT',        'r1f3jBi.LcA523cI=?hyAK[Gc v&H0.`Z,tW1Gs>EHfl8kZM{.!t_@S:hwKrMT:E');
define('SECURE_AUTH_SALT', '(e<v;l>{iSS30C,WCX,2f&re5E:B)3m0ZEo%X_yP2GP@?d^rr|=%]e@}y}]%[^=L');
define('LOGGED_IN_SALT',   'yfT[+L,v<hmvn3|?^#N!Qj5Y:vy59-R)9Q}=u*~VTPrktF.x>;H 8&{>/|<rbyV!');
define('NONCE_SALT',       '({{[dz?mAm5kt^BT[|,37f#=[JtN8gu9S#&ni/[Q($S552#HQ/?lZX*W(**kON[?');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
