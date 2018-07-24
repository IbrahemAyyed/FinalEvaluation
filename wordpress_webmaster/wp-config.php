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
define('DB_NAME', 'wordpress_webmaster');

/** MySQL database username */
define('DB_USER', 'wordpress_webmaster');

/** MySQL database password */
define('DB_PASSWORD', 'wf3');

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
define('AUTH_KEY',         'OXSfN~87>C+#:+E:I^RjEiX[nxfl}(&`eyo4;StutL1^FBwE~fHB,`Ll5)Q*Jw69');
define('SECURE_AUTH_KEY',  'AJ_*5`~luc`Ga8nL7b(t<5Rv0r_LaAs_On3:TV~`lM)Yz?:|]5pE;Kk~6H]:ERB2');
define('LOGGED_IN_KEY',    '+@djRh9l{]:x*mzxJf`dhY|gI*s+bC<+iS`p,cR>sV5m9AQ8wmUs(36QjtO&7F(~');
define('NONCE_KEY',        'lfH6&W:IBs,*xXXm[R?J>hinD?E]}(nSIGc>h>EhW,b|mjB6##]Dg/|h{+LdUt}E');
define('AUTH_SALT',        'I2 P~KLFjv>bWWh4Zv_+7.LF-eb)H9wj4x!MDcO#AJauLB?53<eoab2o;ErD>XTW');
define('SECURE_AUTH_SALT', 'n^A{Ky|!4fXdAP+n)?EDtm>}IZzezR3);913-|rSl!M6310*F1RYg*>1+!F9!i-0');
define('LOGGED_IN_SALT',   'X<Qd-B0lks<?Rj5jnR?W,NJK]8UxD6~[^fn{L<z<2y{Ug]T+ND(XXF;NICws_GBF');
define('NONCE_SALT',       'oZGYK8o-J!QY]75x@<^5WolPJE~~JSNB(22VZ.L#/Np]FA1CvXHc9us&^B;SfF1 ');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wf3_';

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
