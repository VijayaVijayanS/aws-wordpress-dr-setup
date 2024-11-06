<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'drdb' );

/** Database username */
define( 'DB_USER', 'dradmin' );

/** Database password */
define( 'DB_PASSWORD', 'dradmin123' );

/** Database hostname */
define( 'DB_HOST', 'drdb.c36ecsyo48nt.ap-southeast-2.rds.amazonaws.com' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

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
define( 'AUTH_KEY',         '%cr Np:sTaa:>ny6`_NLoeSj~Bpxhgu89MxxNYE1-?2Ohbc6]w6B=Of5^kY0sxOY' );
define( 'SECURE_AUTH_KEY',  ',gnX5w!qc[*E1{4:G$zCsh2]Hizkes|t.G@&A(vK7Eh&Im#H;Xx8=xg%`C/J[cKw' );
define( 'LOGGED_IN_KEY',    '|?6pVq:hY[}mGpM^$,8HqsuY{Ms97tC $#@E(+Va+rQJn&a/w^$YMBWC_^1Ku+By' );
define( 'NONCE_KEY',        'Cs9lt4RS$FY> G$ocw1sDZO{xcB:<e&;)^1koRgPYib<sWP-aB=^K:fsiOPNCKnO' );
define( 'AUTH_SALT',        '5po_TmC*^.hiTiXC`LfIS(hpp+CV6]C0RZH~|eW9ofA`e9b=1tJ{T8~&r~P`R%x;' );
define( 'SECURE_AUTH_SALT', 'feukq9+R2cx^Ds}+z/_[g,2it0$/8|;5Xy!TU~J`i6xuhULC]RlJj#~x36YFr(q}' );
define( 'LOGGED_IN_SALT',   'vO:L4puP*`E K>x)Xg*C:2{PwPg}K0TMjKQ>?_`2bL akJ3`fs0]mEn6Y>3BgKwO' );
define( 'NONCE_SALT',       'iG^zNG3DfKad/DjQ?#U6^py7F}1AvieID*2SV}Gc}kOFlBcX$<x{1X)GSsSRGKEE' );

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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
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
