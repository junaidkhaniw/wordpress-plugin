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
define( 'DB_NAME', 'gravity' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

if ( !defined('WP_CLI') ) {
    define( 'WP_SITEURL', $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] );
    define( 'WP_HOME',    $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] );
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
define( 'AUTH_KEY',         'Zvk8v4MUGbVc69UWb7Psl3eVoaFZ2zUStKSgVcGDAaMZvpEeAokthju3T6l3xGaL' );
define( 'SECURE_AUTH_KEY',  'DlmAgGBQlpOWpXJKlqQy3WahJHs3pcbkRnjTYDniA6kHXgu9ClaAcz5wolvDlkR5' );
define( 'LOGGED_IN_KEY',    '4VVOZuu3k3xAZfo0LUGSoGP1eEKA9U0Uz9PqUyTYDWUHPfe37xeAUSSR2p9Yk4d5' );
define( 'NONCE_KEY',        'n2tPxmRBaI6rgSmFQbR7iOHbecHnu18j3qKpEFQiHIUZsWlzLbkaS7B8VbVWeCpc' );
define( 'AUTH_SALT',        'kHQf306m5vudVS1GVA8I9qmtztgLV0qdMrJHjyE2NDlHpWZvaPpe6A8uJB7JSDlT' );
define( 'SECURE_AUTH_SALT', 'HbFAKngSFPZJCJGNRhz9SoFT6wYFfWqxSLmI7FXkWcxQMR21MvVu9MzrIDkMs4hL' );
define( 'LOGGED_IN_SALT',   'l8yy2p3hK53BfyswRDZSWdh17NINEypoHrPnse1I6Zq8UGVzOPh1peeBVz9WcZHh' );
define( 'NONCE_SALT',       'b4EDCCTR4B2UgvI0497jy0H0kldvSAfj6jWdmTgLOBAdsDuAzE9jtIzTkwO49sCF' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

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
