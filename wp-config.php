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
define('DB_NAME', 'dsoPrinting');

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
define('AUTH_KEY',         '~usc#P6xP].d4h1=@YzPbo:;  lZk0Mycw}p{7a;X($[^XNKTh?<yKU_v(XT5tZH');
define('SECURE_AUTH_KEY',  '`.PSxoZ}KXK,<^2!h_@Z3)VR3uLw{!j~6V6i4#oo0hw*}k=GOT07y+)&q&@?a6zY');
define('LOGGED_IN_KEY',    'B/l;xAD7k?bZnj;=qLLZi![yVf4WZ(5N4</[>Ehl#y&n8n(CmJ#u?ap^?^](yj+:');
define('NONCE_KEY',        'I&m5AWpIcx`Y-0Y-JNld/N][q6FRwQ2cNpzCH%j~WeSb1^q7.}2P+z2-D|3oc<yN');
define('AUTH_SALT',        '<;cJ@ N#kueh0kUlL8ASvNk;h%>?N/W$yok+ZXKDbB3#96m,m_#IaL,n,j8~B7+c');
define('SECURE_AUTH_SALT', 'Rss0e=lb-0yr|Z>?@/hY8LHZs*;5&{R(C?eH7s+e9,7P)BGWN2;/;p.!](}Pi0-q');
define('LOGGED_IN_SALT',   'w#G=pIg7ShumS;g`,/G%.A=.{7zD~RhMb!Tg7vj?13V:~MG@0QeSeK?%Ufb/e%-!');
define('NONCE_SALT',       'G-I7[(pQViG6iz`*7[Sm=pUHfG)~a ]s)Ax}d.wG@SwU&Mx.$XEIY8 sOT*R~Bv,');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'dso_';

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
