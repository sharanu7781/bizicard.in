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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'vocalfor_bizblog' );

/** MySQL database username */
define( 'DB_USER', 'vocalfor_bizblog' );

/** MySQL database password */
define( 'DB_PASSWORD', 'S]pC8Wr@50' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'cl9jnunjgciedqof4jvu3qsdrmmqvgybhuaegol9pmfjagrkd4knikakypjdsefu' );
define( 'SECURE_AUTH_KEY',  'unmajr30m5gxpp8iezkdjcngbmdle1y8qlukywh8zuxrs41zs4xgwuixxlf1pgx5' );
define( 'LOGGED_IN_KEY',    'rrgimqq6wlrxikvcsxzzfockkjp8xtbr97qncvzxyimtpvvrcpsuqu386ied8fw6' );
define( 'NONCE_KEY',        'jbmsrr44xvstxgwculpftfuaac6pqc2q8ru7aacvy7qryv9ptqrnnruurabjjihn' );
define( 'AUTH_SALT',        'jfj3uim9gycoeku0kfisoh18kkcdv6edklewjoptrxrxsqt2crumepxgoargdg6m' );
define( 'SECURE_AUTH_SALT', 'v6v5ckwbngwhvdtb69mbv1za4xky3pcp9ykm5r0rpeekrbgvcixmf6hjba7gb3s5' );
define( 'LOGGED_IN_SALT',   'a9bq7bxwgt3awbzrtyivivhtfz9icpx9ls8vt0xtp7ilo128hntl8lt88ogubnym' );
define( 'NONCE_SALT',       'vhv4w1h0srzb1pfyht16gxo8mxzjo5nx2aytxjanwbz3sfgbn6rhnlelaziddfsj' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_bz_';

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

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
