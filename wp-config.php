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
define( 'DB_NAME', 'mywordpress' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'PusPus' );

/** MySQL hostname */
define( 'DB_HOST', 'l.mywordpress.com' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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
define('AUTH_KEY',         '<x~hM5(|r7o7!h21ChTO:~z&{OcWS[W/Egzbp#b]%(O]z:Jl?$+Ro4&LtP%Hoj]a');
define('SECURE_AUTH_KEY',  'rME($*[saKtqfnw p!1>M&-G.Q`W_17r!)5y+1cGP},R,430evjgwJ?=-o-/lP$^');
define('LOGGED_IN_KEY',    '+|,+:g4#<BSG`ZLDUZc=*FTke*FJI]ObETlZo-Jc/I:|cqtk$V%.Z:=3/f#7Fd-&');
define('NONCE_KEY',        '!UpH|s4#px$;Nvgfi$-gN$PIej#+3+ZLpF]f` cNLqlsk*A9pvm,SXX h}4nhh7t');
define('AUTH_SALT',        'VWcYLv&pfc7W+Z>1jJAJ~+WmZJ7~8-{Z+IH(R,n=w1e@h`NQmsJ5DkRzmRl=|7jS');
define('SECURE_AUTH_SALT', '|n=p>%D7H3%Q~ug@*-_+Q3FlF1esk:a#%58a8-+$>ugP-vC~tH/Dp-ROOe7Q}Kn#');
define('LOGGED_IN_SALT',   'b-FqdUBS)K*uLD+PFgp4+>D^P~y}TdOGi<]W{iff:Tg47LG-S]UG:%?pEDj6<b>k');
define('NONCE_SALT',       'i;KlU6]gqaz+ABfKSIgHtlZd+z<L^lf7>Zs-f>]Y&)u-kQTK?YgF<=Q+;(4$|>=d');

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

define( 'WP_SITEURL', 'http://l.mywordpress.com/' );
define( 'WP_HOME', 'http://l.mywordpress.com' );

define('COOKIE_DOMAIN', $_SERVER['HTTP_HOST'] );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';

