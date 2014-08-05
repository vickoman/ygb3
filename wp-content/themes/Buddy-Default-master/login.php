<?php
/*
Template Name: Acceso
*/
require( dirname(__FILE__) . '../../../../wp-load.php' );
if ( is_user_logged_in() ) {
	wp_redirect( home_url() );
}
?>
<title>Yogobierno 3.0 | Ingreso al sistema</title>

	

<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/module.admin.stylesheet-complete.min.css" />
<script src="<?php echo get_stylesheet_directory_uri(); ?>/library/jquery/jquery.min.js?v=v2.0.0-rc8&sv=v0.0.1.2"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/library/jquery/jquery.min.js?v=v2.0.0-rc8&sv=v0.0.1.2"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/library/jquery/jquery-migrate.min.js?v=v2.0.0-rc8&sv=v0.0.1.2"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/library/modernizr/modernizr.js?v=v2.0.0-rc8&sv=v0.0.1.2"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/plugins/core_less-js/less.min.js?v=v2.0.0-rc8&sv=v0.0.1.2"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/plugins/charts_flot/excanvas.js?v=v2.0.0-rc8&sv=v0.0.1.2"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/plugins/core_browser/ie/ie.prototype.polyfill.js?v=v2.0.0-rc8&sv=v0.0.1.2"></script>
<?php login_with_ajax(); ?>
<?php get_footer(); ?>
