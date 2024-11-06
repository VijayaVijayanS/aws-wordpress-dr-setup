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
define( 'DB_NAME', 'proddb' );

/** Database username */
define( 'DB_USER', 'prodadmin' );

/** Database password */
define( 'DB_PASSWORD', 'prodadmin123' );

/** Database hostname */
define( 'DB_HOST', 'proddb.c36ecsyo48nt.ap-southeast-2.rds.amazonaws.com:3306' );

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
define( 'AUTH_KEY',         '5G1N7Y?&bgJkA4ot:Bd(hZ8D]1^Q|]l@eT=^!p-S-3$s.xPMu#r{*X1GA9d^;cq]' );
define( 'SECURE_AUTH_KEY',  'xP|@(6h, qU%1X5vDXg@cK5hc;]F1V$yKUzyyj#e7%5RuliPF@Y:uo rqJ<R|S}K' );
define( 'LOGGED_IN_KEY',    '![CG[W#JGs:9dMq65!9=&VHGQBVCO-}TsO40,F]t&BVDI!HV.(vQ9*nqZdAx}#X ' );
define( 'NONCE_KEY',        '#O^j)*w#>2<F(6|<-ndYJ kz !twSBC>Xo DZo~?m&C>.j9B?C[y[H;&/V~udq{N' );
define( 'AUTH_SALT',        ' 2v%>Ak0E1}A,m+, blvG>B]<^.Zil^5S9HS%RdRnheYhj?C*&.+y$E0;w||#thD' );
define( 'SECURE_AUTH_SALT', 'SlN@XD*VQ*S=M5&d@.cI13J4wijw^}c7$z112j.AfzFh`4<7x}+T1uu z$EJFfZy' );
define( 'LOGGED_IN_SALT',   'n|J*u@-3!+Z9uk+V! bp-;RdGWQT(S3[s%(#3b}.Yn1-N}||^K[;gnj[(JG[&c8M' );
define( 'NONCE_SALT',       'bjF7r!?(-pY{rj6,MwP.f~mm+To}nkFm_q^`M#}6.MId,JqO,Swu(}V!5Z.LGgJi' );

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
