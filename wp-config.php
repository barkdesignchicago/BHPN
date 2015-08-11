<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */
 
// Include local configuration
if (file_exists(dirname(__FILE__) . '/local-config.php')) {
	include(dirname(__FILE__) . '/local-config.php');
}

// Global DB config
if (!defined('DB_NAME')) {
	define('DB_NAME', 'bhpn');
}
if (!defined('DB_USER')) {
	define('DB_USER', 'root');
}
if (!defined('DB_PASSWORD')) {
	define('DB_PASSWORD', 'root');
}
if (!defined('DB_HOST')) {
	define('DB_HOST', 'localhost');
}

/** Database Charset to use in creating database tables. */
if (!defined('DB_CHARSET')) {
	define('DB_CHARSET', 'utf8');
}

/** The Database Collate type. Don't change this if in doubt. */
if (!defined('DB_COLLATE')) {
	define('DB_COLLATE', '');
}

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'Oz4qb67B(yfHz$lLxkHI8w/b+vV!d>C-k`||&4$_eRpRt$K]i%5W9j6|I]o-w%^8');
define('SECURE_AUTH_KEY',  '$W3(Z5Jy++7ib73.dLd5ln|O#|a:sG@_M8e=[9C~[}e+fg?m|7J!*l+<>T4&jh:6');
define('LOGGED_IN_KEY',    'RsM^NW+P7CGf&&k<QUNl] d>^ha$o|0glYf$]Ya|JYhC34JpAuF=%sJj|KH~2e`~');
define('NONCE_KEY',        '&D+|,_pzmp!!d}@7=Nx+G{7Xp[8GY&]k%aQXNs-3|2T}I SM{0kSp20h-#]h@SUL');
define('AUTH_SALT',        '|38;v~+}+L7j;-Ev]MAf<`C_PVH.(?;XBOYX&cH6[j[f8SmfQHHm$<u_dS)OwYDI');
define('SECURE_AUTH_SALT', '0!vRm5QHFfChNUTmzYpvPWZzYl-#q(!Xo%p1Q5>0QH}SOZk%=]aY&Am>>4$X9@A7');
define('LOGGED_IN_SALT',   'mOH4ncg+0=GwD)j-r?2V7::#t#E44+l|Y![=AZgDhi9~{|uKW=9zsQrGq$OTj6Om');
define('NONCE_SALT',       'ULUSt02Mtte9uiDi&dNA>DACKAMaS2UK=GV-<q#j~!(#7-N3.!bU5hq855&ny/!C');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_bhpn_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');


/**
 * Set custom paths
 *
 * These are required because wordpress is installed in a subdirectory.
 */
if (!defined('WP_SITEURL')) {
	define('WP_SITEURL', 'http://' . $_SERVER['SERVER_NAME'] . ':8888/wordpress');
}
if (!defined('WP_HOME')) {
	define('WP_HOME',    'http://' . $_SERVER['SERVER_NAME'] . ':8888');
}
if (!defined('WP_CONTENT_DIR')) {
	define('WP_CONTENT_DIR', dirname(__FILE__) . '/content');
}
if (!defined('WP_CONTENT_URL')) {
	define('WP_CONTENT_URL', 'http://' . $_SERVER['SERVER_NAME'] . ':8888/content');
}


/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
if (!defined('WP_DEBUG')) {
	define('WP_DEBUG', false);
}

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
