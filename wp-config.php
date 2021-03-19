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
define( 'DB_NAME', 'portfolio' );

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
define( 'AUTH_KEY',         'eDr!QHc@C@ bB+lj0`~ :ixeR(0)i)>SJd*oRr@N&q2YO%)KHe<I^pKzf1iC*[9E' );
define( 'SECURE_AUTH_KEY',  '&uMhbRgm1&4(nk))LY8ZOFh,P1vF]}<h$7 M~}Q`03DZ* e^;-55ELtI!(88BF38' );
define( 'LOGGED_IN_KEY',    'YrsRB&NdFh.g~j d?,c3c]L_3bP;z(1Jw3WVO]f}e`6d%@Z[=YsBK>)U=%3}iiD}' );
define( 'NONCE_KEY',        'kzcM`5IG0aZ6^PXM}A}U<~Rg.R[#i<}Du0)~LjeJ/RSI0k6m^d%q?m+1BSkoGTi*' );
define( 'AUTH_SALT',        'Np3ek*Ea]UiG12*usFiQw?sb0`pG.1%#}[cCH-e19g@R@w<,M=#=RZ6`&W5i%Z}L' );
define( 'SECURE_AUTH_SALT', 'Zg9,G$2WplO `Q*T(=|tx+76HRt1s|#FYq?^nsa6kRfS;K&*Ai,r}ajC_]XXmmL_' );
define( 'LOGGED_IN_SALT',   '/)rbRZZzGreh57LNJuYH0MBF}05Lw&DtOw%06Cwi h)#)1Ug=kic#C<>I-[V(25e' );
define( 'NONCE_SALT',       'R ^@*Gl6D:w+,x?FXzjC=OI2_W-lkD{.S_}*tl?:qh67yZcLtXhApFK#eFsN-t`s' );

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
