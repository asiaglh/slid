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
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'local' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

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
define('AUTH_KEY',         '+lE845aSizKNyOKE3px6qLV/vA3PydCOZjUbSuA5uM3UOO6/9xNjtmGkTg50XFTEfTn3xIZHRwLS6hTSYQdAnQ==');
define('SECURE_AUTH_KEY',  'NfB6WFxO0xsH6gpwGWuu2ZBjHQcL5/WJOIqKomJwSH7pBnId7+Wl8P3WlGkHHo5mogiBYY354tdW4bJMcJvv1Q==');
define('LOGGED_IN_KEY',    '2zyevzzuCimAI64NvdnLSrtOiwes8FhSx1+X5EtHIa9kfR7nw0Wg5GJ33kvskDmcvvcyn1L+u2Y4CAiKgDIdNw==');
define('NONCE_KEY',        '434zQqEB2PTpuo5dQnk8YKABPHfUjTNVi4YxdQGYYzUY1o5NlGbl2xuI21QAwTZ40z4oQVpNujOxuA8B4kei3g==');
define('AUTH_SALT',        'eGUstqVY0X09fAso7JTydysOzaIM0IDrlnGh+2PBBWiPFGPlzZ0T0/2edTZMoGSXiryg0s93xZnm0bkJCyVOaw==');
define('SECURE_AUTH_SALT', '0CnH1Dgb+JJKNx7jSQB4qd6U2d+H1anQCl7qpy0AIcJDJEvb7IiyKyMsOMT29hVqJl75T3M4J5giKqUy36FcrA==');
define('LOGGED_IN_SALT',   '1xMkReFEWa4ElyXKxooJmpB5+ia5yvGr7OQODKfzQJb0v0wYd31naXG6wXvVa+mO7fvz/kuvYWMIb1F8U3GOyg==');
define('NONCE_SALT',       'Yr1O4Lafo0GRUfoX/AnJxeXh+Lsm9zMG7fyP2pjyTGbin+QXICF8lzqq+tlLIXRd5F0u6ecbZy57e0Cbvi47wg==');


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


/* Add any custom values between this line and the "stop editing" line. */



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
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}

define( 'WP_ENVIRONMENT_TYPE', 'local' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
