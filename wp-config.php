<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'projectwp1' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

if ( !defined('WP_CLI') ) {
    define( 'WP_SITEURL', $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] );
    define( 'WP_HOME',    $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] );
}



/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'clEHv70lM8Y9DvtPwx5lZXqbh187yeu66A3jlzrUG9VqjFYurtg7WlhhZdnik5JH' );
define( 'SECURE_AUTH_KEY',  'lqPVOvqMs8YHJcSjUWbqG8frRQdb1GMIUsS2m79DDpvuzE5RibfWMFMoXy97YRhQ' );
define( 'LOGGED_IN_KEY',    'fRgAWJYxISQuG0oOH7SzcilR7A5DPwJxqr6Cd7ipyPU1vw9hE83Zl7KGYqVA9RJX' );
define( 'NONCE_KEY',        'gC5wExS9bfhGHZRNhTLbjYNH1S4osalhAn7hFSdEvGpN8sIbLrpWyYuoX2de3KIA' );
define( 'AUTH_SALT',        'l4zBaEt0KWv4ffM2MvMxIorggrBjZejszhxXTwx0reWJyV3jKs7QAzBNruJsj6ut' );
define( 'SECURE_AUTH_SALT', 'wX6TSHBOuBTd8ap9CkrZyqPn1puYTTgONDzcjZq1oS3neF1Ox2I0lgMgFg74EBpf' );
define( 'LOGGED_IN_SALT',   '0LMZNKoSj7CfUn4DNeHaTCeXU47N67SQ1K0E1t3OiqhjPq4go0kpCNfIIFXdjOLl' );
define( 'NONCE_SALT',       'olZqj7cX05OBjJ0ZxRtn3oNMZjyCTaaE55AVdPjUfMq7lHL15pfGcdNUqjzo2Lsn' );

/**#@-*/

/**
 * WordPress database table prefix.
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

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
