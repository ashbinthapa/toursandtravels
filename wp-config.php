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
define( 'DB_NAME', 'toursandtravels' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

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
define( 'AUTH_KEY',         'yn?Z)V b@8~,OjUCa;&%Vi/X^fffwp$6twpO>I|`r11{m5FxzXH~DL+aE`F]VVJN' );
define( 'SECURE_AUTH_KEY',  'K)Y8L:wTv?YV/)2*a~Xo_TMPM vS|ykw])>M)0oZ&fTHK_>cCI_aw4_WP/L:9)RJ' );
define( 'LOGGED_IN_KEY',    'O3y]cd2?25VUDZk0F>&}^{8WzXia!BzUejRtwy-/JbTAW*XiUY2$Sk}`/#1--Q]E' );
define( 'NONCE_KEY',        '#F}6xo9?0T[k$RS&^!(9OEv}]X!s8` A<h~&A~h&[_V_.`:-8/2>eXX-Zu 2=?Ri' );
define( 'AUTH_SALT',        '7kpsYm:3y#L>z5%sqrTv~g9i3P=KVbo)`~QdN:Y1HU2l0SPhMZ7*ihn9O4IMC~*M' );
define( 'SECURE_AUTH_SALT', 'L]@M(k3`u):/2Mo/jxK!5OmUYt;3U+JYEX%cn-eDi<x5Y7 5<2F#Hqu!kCvRZ%ov' );
define( 'LOGGED_IN_SALT',   ']5T/N.znDqnf)].p)CgtNuTIeDmX6.lKt3:`*^MRt4 |iIWx3A}K2%i^uC(1a^r(' );
define( 'NONCE_SALT',       'G$3BB8J#QwmQ9v4jrI@n#DY>a~|j4FU.DVh:J6{`nzIsqF6_NfhPA_c{38B:NS[1' );

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
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
