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
define( 'DB_NAME', 'PersonalWebsite' );

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
define( 'AUTH_KEY',         'IuxOd[^Gb3]f7XZZ6A08wl#W<!&@d,{K0G=NRPas[Uxt,Z(#S8o42]^=)W1AH3L0' );
define( 'SECURE_AUTH_KEY',  'QwsM GDQDRnIB<5PfG z@G{LwhKH|Ks,4COZwBbk$[f:j?+t)s^AZ=%`)d/vg_Ev' );
define( 'LOGGED_IN_KEY',    'I VkHADW(A$&)xb%E70TSq08n?UJdSk?s:Tcvd|8&~{DHOeT)Ekdfm.|&d#[?wN2' );
define( 'NONCE_KEY',        '$Q]$nNaB4{%k1j{s`wQ={6h@iUAvr8R Z|ELQ>_kBEQ2p<H!ADT,Nko{Mwpk8d~F' );
define( 'AUTH_SALT',        '>:]|NiyvAz@<PHLu%*[a#@TDY]0-s)JlymYJCX{{{8q&kT95KPC;q+{*yH:#dI)Z' );
define( 'SECURE_AUTH_SALT', 'ZLGI92<8lV&phsGM):BKv+RAe6O(<CFHbw,utA+pP$}CC??Fp$gL6CZP(D9?:+ao' );
define( 'LOGGED_IN_SALT',   'KdxXM+>!I=^rXk6#m4:42Cna:{wXhnX3{U@pfI=]*.>DOjq-q|xf:|FaP~yN9V[/' );
define( 'NONCE_SALT',       ',izsAd;<aK_67wN/jUI]/#7:a^eI~)s?uw_) }DSCmIv4B]/e9#i|6Tl-(AU>`|(' );

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
