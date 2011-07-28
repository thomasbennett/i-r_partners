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

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'iandr');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         'rcu(h~e:Xx@VSqNq~CI$Fuc?nmm}Q$]k]ZPS@jjNRl* cWm}7*qd,<BIt$I4xjF3');
define('SECURE_AUTH_KEY',  '-Z=4.D43N7gtp-c/w#tnR6.kBG@JjeW[[z4nPZ|vtGJLh*q0k`S}okJ%fyw+.vx@');
define('LOGGED_IN_KEY',    'X2t(A.;{-}wI.6(QwedQo#g;`)V$$PWq~P>7Wr^?Qm}%wEb?rttv@)s`i>/sJ)~w');
define('NONCE_KEY',        '0v:K/aWD>wVWb#V`]@FB-Jz%M_(<VdB5ya;.16T|{in%6xMb{(3TkP$-*985Z&{V');
define('AUTH_SALT',        '<SPhu^<Z>Mx8@K8[#IK1^$_]``DOL+4S?-y$r<e7gu313OH#xz3/9%-op?WI~WzS');
define('SECURE_AUTH_SALT', ';Be?u?r,/oKkt `]t;&p}aLS2=&meofFJ[:~Ny*y3wiX|P:{V%Zv;(+!g0]v!RXT');
define('LOGGED_IN_SALT',   'QO/FKzrI]@X%%axq-9Oz=|ztZtkh8ymu-qj9-osy!A`)x1X[zh}EU>Nkn,.zD-C@');
define('NONCE_SALT',       '`L4)qbXY k[DwN]R!N6Qc-0)5aE#/ >}T>@U_^gfm?p],HJSll]t^d7HP^JyylVq');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
