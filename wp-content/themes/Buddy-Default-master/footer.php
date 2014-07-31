		</div> <!-- #container -->
	</div>	
</div>

		<?php do_action( 'bp_after_container' ); ?>
		<?php do_action( 'bp_before_footer'   ); ?>
</div>
		<div id="footer">
<a href="<?php bloginfo('url'); ?>" alt="Home" title="Inicio">Yogobierno 2014</a>
			<?php if ( is_active_sidebar( 'first-footer-widget-area' ) || is_active_sidebar( 'second-footer-widget-area' ) || is_active_sidebar( 'third-footer-widget-area' ) || is_active_sidebar( 'fourth-footer-widget-area' ) ) : ?>
				<div id="footer-widgets">
					<?php get_sidebar( 'footer' ); ?>
				</div>
			<?php endif; ?>

			<div id="site-generator" role="contentinfo">
				<?php do_action( 'bp_dtheme_credits' ); ?>

			</div>

			<?php do_action( 'bp_footer' ); ?>

		</div><!-- #footer -->

		<?php do_action( 'bp_after_footer' ); ?>

		<?php wp_footer(); ?>

		<script src="<?php echo get_stylesheet_directory_uri(); ?>/library/bootstrap/js/bootstrap.min.js?v=v2.0.0-rc8&sv=v0.0.1.2"></script>
		<script src="<?php echo get_stylesheet_directory_uri(); ?>/plugins/core_nicescroll/jquery.nicescroll.min.js?v=v2.0.0-rc8&sv=v0.0.1.2"></script>
		<script src="<?php echo get_stylesheet_directory_uri(); ?>/plugins/core_breakpoints/breakpoints.js?v=v2.0.0-rc8&sv=v0.0.1.2"></script>
		<script src="<?php echo get_stylesheet_directory_uri(); ?>/plugins/core_preload/pace.min.js?v=v2.0.0-rc8&sv=v0.0.1.2"></script>
		<script src="<?php echo get_stylesheet_directory_uri(); ?>/components/core_preload/preload.pace.init.js?v=v2.0.0-rc8&sv=v0.0.1.2"></script>
		<script src="<?php echo get_stylesheet_directory_uri(); ?>/plugins/menu_sidr/jquery.sidr.js?v=v2.0.0-rc8"></script>
		<script src="<?php echo get_stylesheet_directory_uri(); ?>/components/widget_twitter/twitter.init.js?v=v2.0.0-rc8&sv=v0.0.1.2"></script>
		<script src="<?php echo get_stylesheet_directory_uri(); ?>/plugins/media_holder/holder.js?v=v2.0.0-rc8&sv=v0.0.1.2"></script>
		<script src="<?php echo get_stylesheet_directory_uri(); ?>/plugins/media_gridalicious/jquery.gridalicious.min.js?v=v2.0.0-rc8&sv=v0.0.1.2"></script>
		<script src="<?php echo get_stylesheet_directory_uri(); ?>/components/media_gridalicious/gridalicious.init.js?v=v2.0.0-rc8"></script>
		<script src="<?php echo get_stylesheet_directory_uri(); ?>/components/maps_google/maps-google.init.js?v=v2.0.0-rc8&sv=v0.0.1.2"></script>
		<!--<script src="http://maps.googleapis.com/maps/api/js?v=3&sensor=false&callback=initGoogleMaps"></script>-->
		<script src="<?php echo get_stylesheet_directory_uri(); ?>/plugins/ui_modals/bootbox.min.js?v=v2.0.0-rc8&sv=v0.0.1.2"></script>
		<script src="<?php echo get_stylesheet_directory_uri(); ?>/components/menus/sidebar.main.init.js?v=v2.0.0-rc8"></script>
		<script src="<?php echo get_stylesheet_directory_uri(); ?>/components/menus/sidebar.collapse.init.js?v=v2.0.0-rc8"></script>
		<script src="<?php echo get_stylesheet_directory_uri(); ?>/components/menus/menus.sidebar.chat.init.js?v=v2.0.0-rc8"></script>
		<script src="<?php echo get_stylesheet_directory_uri(); ?>/plugins/other_mixitup/jquery.mixitup.min.js?v=v2.0.0-rc8&sv=v0.0.1.2"></script>
		<script src="<?php echo get_stylesheet_directory_uri(); ?>/plugins/other_mixitup/mixitup.init.js?v=v2.0.0-rc8&sv=v0.0.1.2"></script>
		<script src="<?php echo get_stylesheet_directory_uri(); ?>/components/core/core.init.js?v=v2.0.0-rc8"></script>
	</body>

</html>
