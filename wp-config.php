<?php
/** Enable W3 Total Cache Edge Mode */
define('W3TC_EDGE_MODE', true); // Added by W3 Total Cache



/** 
 * Configuración básica de WordPress.
 *
 * Este archivo contiene las siguientes configuraciones: ajustes de MySQL, prefijo de tablas,
 * claves secretas, idioma de WordPress y ABSPATH. Para obtener más información,
 * visita la página del Codex{@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} . Los ajustes de MySQL te los proporcionará tu proveedor de alojamiento web.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */
define(‘FS_METHOD’,’direct’);
// ** Ajustes de MySQL. Solicita estos datos a tu proveedor de alojamiento web. ** //
/** El nombre de tu base de datos de WordPress */
define('DB_NAME', 'yogobierno3.0');

/** Tu nombre de usuario de MySQL */
define('DB_USER', 'root');

/** Tu contraseña de MySQL */
define('DB_PASSWORD', 'Mm0925163347');

/** Host de MySQL (es muy probable que no necesites cambiarlo) */
define('DB_HOST', 'localhost');

/** Codificación de caracteres para la base de datos. */
define('DB_CHARSET', 'utf8');

/** Cotejamiento de la base de datos. No lo modifiques si tienes dudas. */
define('DB_COLLATE', '');

/**#@+
 * Claves únicas de autentificación.
 *
 * Define cada clave secreta con una frase aleatoria distinta.
 * Puedes generarlas usando el {@link https://api.wordpress.org/secret-key/1.1/salt/ servicio de claves secretas de WordPress}
 * Puedes cambiar las claves en cualquier momento para invalidar todas las cookies existentes. Esto forzará a todos los usuarios a volver a hacer login.
 *
 * @since 2.6.0
 */
define('AUTH_KEY', ' #EU}.;q5&-l(:|G9itD9705taf*rZyydW!D/)P|Zd~+o`X..Hp^GOn|Wx0+7>2V'); // Cambia esto por tu frase aleatoria.
define('SECURE_AUTH_KEY', 'YK.6CfDN+u ;|)EsB(})bPsI6>-sAmTcx.UyUpa;wCQ#l4~aoqOa>GlZIJ,_vs|G'); // Cambia esto por tu frase aleatoria.
define('LOGGED_IN_KEY', 'W^#;PXi:a+UG*d[RC0Ntg)_tm/k,`)U!g+&fy=|7h[WHdJ-?&iG}YX>lY9wKj^i;'); // Cambia esto por tu frase aleatoria.
define('NONCE_KEY', '^kN42x+mh35B|R=Nraq[D3ItAg-B6!VV15->-.L#lW_dCI8r@Ys=i2WF 4S(XYP5'); // Cambia esto por tu frase aleatoria.
define('AUTH_SALT', 'O!fK_&Dg2R}.s-O#Gw>6ar6w6d#GCi.-4hA:#S[WTv:+g3tOdjeu2+j}Y_mmB{-%'); // Cambia esto por tu frase aleatoria.
define('SECURE_AUTH_SALT', 'r/T7W2N]G~!<RXVT?6A?P,WC*^+4HwJ1-o}Yk_Ahs2dw@Ayen.@k*E_J>Rk?&Xb-'); // Cambia esto por tu frase aleatoria.
define('LOGGED_IN_SALT', '9^5ozYXCheWRoBy &Mi#+Fmxr2.E(CPv1U @Xnv8`W|`;oHN]gr})ptsi?APOwdv'); // Cambia esto por tu frase aleatoria.
define('NONCE_SALT', 'R,utbkS~dA{qO3D9TbY#zR|H<-xpA+hR[Y8HJCA2XFb#7j4)q:Iw %E|~jGm?s!F'); // Cambia esto por tu frase aleatoria.

/**#@-*/

/**
 * Prefijo de la base de datos de WordPress.
 *
 * Cambia el prefijo si deseas instalar multiples blogs en una sola base de datos.
 * Emplea solo números, letras y guión bajo.
 */
$table_prefix  = 'wp_';

/**
 * Idioma de WordPress.
 *
 * Cambia lo siguiente para tener WordPress en tu idioma. El correspondiente archivo MO
 * del lenguaje elegido debe encontrarse en wp-content/languages.
 * Por ejemplo, instala ca_ES.mo copiándolo a wp-content/languages y define WPLANG como 'ca_ES'
 * para traducir WordPress al catalán.
 */
define('WPLANG', 'es_ES');

/**
 * Para desarrolladores: modo debug de WordPress.
 *
 * Cambia esto a true para activar la muestra de avisos durante el desarrollo.
 * Se recomienda encarecidamente a los desarrolladores de temas y plugins que usen WP_DEBUG
 * en sus entornos de desarrollo.
 */
define('WP_DEBUG', false);

/* ¡Eso es todo, deja de editar! Feliz blogging */

/** WordPress absolute path to the Wordpress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

