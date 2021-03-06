<?php do_action( 'bp_before_sidebar' ); ?>

		<div class="col-md-4 col-lg-3" role="complementary">


	<?php do_action( 'bp_inside_before_sidebar' ); ?>

	<?php if ( is_user_logged_in() ) : ?>

		<?php 
	global $current_user;
        get_currentuserinfo();
		do_action( 'bp_before_sidebar_me' ); ?>

			<div class="widget">
				<div class="widget-body text-center">
					<a href="<?php echo bp_loggedin_user_domain(); ?>">
									<?php bp_loggedin_user_avatar( 'type=full&width=130&height=130&class=img-circle' ); ?>
					</a>
					<br>
					<h2 class="strong margin-none"><?php echo bp_core_get_userlink( bp_loggedin_user_id() ); ?></h2>
					<!-- <div class="innerB">Working at MOSAICPRO</div> -->
					<br>
					<div class="btn-group-vertical btn-block">
						<a href="javascript:;" class="btn btn-primary text-center btn-block">Servidor Público</a>
						<a href="<?php bloginfo('url'); ?>/members/<?php echo $current_user->user_login;?>/profile/edit/group/1/" class="btn btn-default"><i class="fa fa-cog pull-right"></i>Editar Cuenta</a>
						<a href="<?php echo wp_logout_url( wp_guess_url() ); ?>" class="btn btn-default"><i class="fa fa-cog pull-right"></i>Salir</a>
					</div>
				</div>
				<?php do_action( 'bp_sidebar_me' ); ?>
			</div>

		<?php do_action( 'bp_after_sidebar_me' ); ?>

		<?php if ( bp_is_active( 'messages' ) ) : ?>
			<?php bp_message_get_notices(); /* Site wide notices to all users */ ?>
		<?php endif; ?>

	<?php else : ?>

		<?php do_action( 'bp_before_sidebar_login_form' ); ?>

		<?php if ( bp_get_signup_allowed() ) : ?>

			<p id="login-text">

				<?php printf( __( 'Please <a href="%s" title="Create an account">create an account</a> to get started.', 'buddypress' ), bp_get_signup_page() ); ?>

			</p>

		<?php endif; ?>

		<form name="login-form" id="sidebar-login-form" class="standard-form" action="<?php echo site_url( 'wp-login.php', 'login_post' ); ?>" method="post">
			<label><?php _e( 'Username', 'buddypress' ); ?><br />
			<input type="text" name="log" id="sidebar-user-login" class="input" value="<?php if ( isset( $user_login) ) echo esc_attr(stripslashes($user_login)); ?>" tabindex="97" /></label>

			<label><?php _e( 'Password', 'buddypress' ); ?><br />
			<input type="password" name="pwd" id="sidebar-user-pass" class="input" value="" tabindex="98" /></label>

			<p class="forgetmenot"><label><input name="rememberme" type="checkbox" id="sidebar-rememberme" value="forever" tabindex="99" /> <?php _e( 'Remember Me', 'buddypress' ); ?></label></p>

			<input type="submit" name="wp-submit" id="sidebar-wp-submit" value="<?php esc_attr_e( 'Log In', 'buddypress' ); ?>" tabindex="100" />

			<?php do_action( 'bp_sidebar_login_form' ); ?>

		</form>

		<?php do_action( 'bp_after_sidebar_login_form' ); ?>

	<?php endif; ?>

	<?php /* Show forum tags on the forums directory */
	if ( bp_is_active( 'forums' ) && bp_is_forums_component() && bp_is_directory() ) : ?>
		<div id="forum-directory-tags" class="widget tags">
			<h3 class="widgettitle"><?php _e( 'Forum Topic Tags', 'buddypress' ); ?></h3>
			<div id="tag-text"><?php bp_forums_tag_heat_map(); ?></div>
		</div>
	<?php endif; ?>

	<?php dynamic_sidebar( 'sidebar-1' ); ?>

	<?php do_action( 'bp_inside_after_sidebar' ); ?>

	<?php wp_meta(); ?>


</div><!-- #sidebar -->

<?php do_action( 'bp_after_sidebar' ); ?>
