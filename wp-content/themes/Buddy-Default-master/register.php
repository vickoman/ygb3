<?php
/*
Template Name: REGISTROPERSONAL
*/
?>
<title>Yogobierno 3.0 | Registro</title>
<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/module.admin.stylesheet-complete.min.css" />
<div class="content" style="background: url('<?php echo get_stylesheet_directory_uri(); ?>/images/lock-1.jpg');height:100%; min-height:1600px" >
<div class="row row-app" >
	<!-- col-separator.box -->
	<div class="col-separator col-unscrollable box">

		<!-- col-table -->
		<div class="col-table" >
				
				<h4 class="innerAll margin-none border-bottom text-center bg-primary"><i class="fa fa-pencil"></i> Crear nueva cuenta</h4>

				<!-- col-table-row -->
				<div class="col-table-row" >

					<!-- col-app -->
					<div class="col-app col-unscrollable" >

						<!-- col-app -->
						<div class="col-app" >
							<!-- Login -->
							<div class="login">								
								<div class="placeholder text-center">								
									<img style="margin:10px 0px;"src="<?php echo get_stylesheet_directory_uri(); ?>/images/logotipo.png" class="" alt="Yogobierno 3.0" title="Yogobierno3.0"/>									
								</div>
								
								<!-- PAnel -->
								<div class="panel panel-default col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">

								  	<div class="panel-body">
	
									<?php do_action( 'bp_before_register_page' ); ?>

									<div class="page" id="register-page">

									<form action="" name="signup_form" id="signup_form" class="standard-form" method="post" enctype="multipart/form-data">

									<?php if ( 'registration-disabled' == bp_get_current_signup_step() ) : ?>
										<?php do_action( 'template_notices' ); ?>
										<?php do_action( 'bp_before_registration_disabled' ); ?>

											<p><?php _e( 'User registration is currently not allowed.', 'buddypress' ); ?></p>

										<?php do_action( 'bp_after_registration_disabled' ); ?>
									<?php endif; // registration-disabled signup setp ?>

									<?php if ( 'request-details' == bp_get_current_signup_step() ) : ?>

										<?php do_action( 'template_notices' ); ?>										

										<?php do_action( 'bp_before_account_details_fields' ); ?>

										<div class="register-section" id="basic-details-section">

											<?php /***** Basic Account Details ******/ ?>

											<div class="form-group">
												<label for="signup_username"><?php _e( 'Username', 'buddypress' ); ?> <?php _e( '(required)', 'buddypress' ); ?></label>
												<?php do_action( 'bp_signup_username_errors' ); ?>
												<input type="text" class="form-control" name="signup_username" id="signup_username" value="<?php bp_signup_username_value(); ?>" placeholder="<?php _e( 'Username', 'buddypress' ); ?>" />
											</div>
											
											<div class="form-group">
												<label for="signup_email"><?php _e( 'E-mail', 'buddypress' ); ?> <?php _e( '(required)', 'buddypress' ); ?></label>
												<?php do_action( 'bp_signup_email_errors' ); ?>
												<input type="text" class="form-control" name="signup_email" id="signup_email" value="<?php bp_signup_email_value(); ?>" placeholder="<?php _e( 'E-mail', 'buddypress' ); ?>"/>
											</div>
									
											
											<div class="form-group">
												<label for="signup_password"><?php _e( 'Escribe tu clave', 'buddypress' ); ?> <?php _e( '(required)', 'buddypress' ); ?></label>
												<?php do_action( 'bp_signup_password_errors' ); ?>
												<input type="password" class="form-control" name="signup_password" id="signup_password" value="" placeholder="<?php _e( 'Escribe tu clave', 'buddypress' ); ?>" />
											</div>

											<div class="form-group">
												<label for="signup_password_confirm"><?php _e( 'Confirma tu clave', 'buddypress' ); ?> <?php _e( '(required)', 'buddypress' ); ?></label>
												<?php do_action( 'bp_signup_password_confirm_errors' ); ?>
												<input type="password" class="form-control" name="signup_password_confirm" id="signup_password_confirm" value="" placeholder="<?php _e( 'Confirma tu clave', 'buddypress' ); ?>"/>
											</div>

											<?php do_action( 'bp_account_details_fields' ); ?>

										</div><!-- #basic-details-section -->

										<?php do_action( 'bp_after_account_details_fields' ); ?>

										<?php /***** Extra Profile Details ******/ ?>

										<?php if ( bp_is_active( 'xprofile' ) ) : ?>

											<?php do_action( 'bp_before_signup_profile_fields' ); ?>

											<div class="register-section" id="profile-details-section">

												<h4><?php _e( 'Detalles del Perfil', 'buddypress' ); ?></h4>

												<?php /* Use the profile field loop to render input fields for the 'base' profile field group */ ?>
												<?php if ( bp_is_active( 'xprofile' ) ) : if ( bp_has_profile( array( 'profile_group_id' => 1, 'fetch_field_data' => false ) ) ) : while ( bp_profile_groups() ) : bp_the_profile_group(); ?>

												<?php while ( bp_profile_fields() ) : bp_the_profile_field(); ?>

													<div class="editfield">

														<?php
															
														 //$field_type = bp_xprofile_create_field_type( bp_get_the_profile_field_type() );
														 //$field_type->edit_field_html();
														 //$field = bp_get_the_profile_field_type();														
														do_action( 'bp_custom_profile_edit_fields_pre_visibility' );
														?>
														<?php if (bp_get_the_profile_field_type() == 'textbox'  and bp_get_the_profile_field_name() == 'Nombres'):?>
															<div class="form-group">
																<label for="field_<?php echo bp_get_the_profile_field_id() ?>"><?php _e( 'Nombres', 'buddypress' ); ?> <?php _e( '(required)', 'buddypress' ); ?></label>
																<input type="text" class="form-control" name="field_<?php echo bp_get_the_profile_field_id() ?>" id="field_<?php echo bp_get_the_profile_field_id() ?>" placeholder="<?php _e( 'Nombres', 'buddypress' ); ?>" />
															</div>
														<?php endif ?>

														<?php if (bp_get_the_profile_field_type() == 'number'  and bp_get_the_profile_field_name() == 'Cedula'):?>
														<div class="form-group">
																<label for="field_<?php echo bp_get_the_profile_field_id() ?>"><?php _e( 'Número de Cédula', 'buddypress' ); ?> <?php _e( '(required)', 'buddypress' ); ?></label>
																<input type="text" class="form-control" name="field_<?php echo bp_get_the_profile_field_id() ?>" id="field_<?php echo bp_get_the_profile_field_id() ?>" placeholder="<?php _e( 'Número de Cédula', 'buddypress' ); ?>" />
															</div>
														<?php endif ?>
														<?php do_action( 'bp_custom_profile_edit_fields' ); ?>

														<p class="description"><?php bp_the_profile_field_description(); ?></p>

													</div>

												<?php endwhile; ?>

												<input type="hidden" name="signup_profile_field_ids" id="signup_profile_field_ids" value="<?php bp_the_profile_group_field_ids(); ?>" />

												<?php endwhile; endif; endif; ?>

												<?php do_action( 'bp_signup_profile_fields' ); ?>

											</div><!-- #profile-details-section -->

											<?php do_action( 'bp_after_signup_profile_fields' ); ?>

										<?php endif; ?>

										<?php if ( bp_get_blog_signup_allowed() ) : ?>

											<?php do_action( 'bp_before_blog_details_fields' ); ?>

											<?php /***** Blog Creation Details ******/ ?>

											<div class="register-section" id="blog-details-section">

												<h4><?php _e( 'Blog Details', 'buddypress' ); ?></h4>

												<p><input type="checkbox" name="signup_with_blog" id="signup_with_blog" value="1"<?php if ( (int) bp_get_signup_with_blog_value() ) : ?> checked="checked"<?php endif; ?> /> <?php _e( 'Yes, I\'d like to create a new site', 'buddypress' ); ?></p>

												<div id="blog-details"<?php if ( (int) bp_get_signup_with_blog_value() ) : ?>class="show"<?php endif; ?>>

													<label for="signup_blog_url"><?php _e( 'Blog URL', 'buddypress' ); ?> <?php _e( '(required)', 'buddypress' ); ?></label>
													<?php do_action( 'bp_signup_blog_url_errors' ); ?>

													<?php if ( is_subdomain_install() ) : ?>
														http:// <input type="text" name="signup_blog_url" id="signup_blog_url" value="<?php bp_signup_blog_url_value(); ?>" /> .<?php bp_blogs_subdomain_base(); ?>
													<?php else : ?>
														<?php echo home_url( '/' ); ?> <input type="text" name="signup_blog_url" id="signup_blog_url" value="<?php bp_signup_blog_url_value(); ?>" />
													<?php endif; ?>

													<label for="signup_blog_title"><?php _e( 'Site Title', 'buddypress' ); ?> <?php _e( '(required)', 'buddypress' ); ?></label>
													<?php do_action( 'bp_signup_blog_title_errors' ); ?>
													<input type="text" name="signup_blog_title" id="signup_blog_title" value="<?php bp_signup_blog_title_value(); ?>" />

													<span class="label"><?php _e( 'I would like my site to appear in search engines, and in public listings around this network.', 'buddypress' ); ?>:</span>
													<?php do_action( 'bp_signup_blog_privacy_errors' ); ?>

													<label><input type="radio" name="signup_blog_privacy" id="signup_blog_privacy_public" value="public"<?php if ( 'public' == bp_get_signup_blog_privacy_value() || !bp_get_signup_blog_privacy_value() ) : ?> checked="checked"<?php endif; ?> /> <?php _e( 'Yes', 'buddypress' ); ?></label>
													<label><input type="radio" name="signup_blog_privacy" id="signup_blog_privacy_private" value="private"<?php if ( 'private' == bp_get_signup_blog_privacy_value() ) : ?> checked="checked"<?php endif; ?> /> <?php _e( 'No', 'buddypress' ); ?></label>

													<?php do_action( 'bp_blog_details_fields' ); ?>

												</div>

											</div><!-- #blog-details-section -->

											<?php do_action( 'bp_after_blog_details_fields' ); ?>

										<?php endif; ?>

										<?php do_action( 'bp_before_registration_submit_buttons' ); ?>

										<div class="submit">
											<input type="submit" class="btn btn-primary btn-block" name="signup_submit" id="signup_submit" value="<?php esc_attr_e( 'Complete Sign Up', 'buddypress' ); ?>" />
											<center><a class="btn margin-none" href="<?php echo get_bloginfo('url');?>/acceso" class="lwa-links-register lwa-links-modal"><?php esc_html_e('Login','login-with-ajax') ?></a> </center>
										</div>


										<?php do_action( 'bp_after_registration_submit_buttons' ); ?>

										<?php wp_nonce_field( 'bp_new_signup' ); ?>

									<?php endif; // request-details signup step ?>

									<?php if ( 'completed-confirmation' == bp_get_current_signup_step() ) : ?>

										<?php do_action( 'template_notices' ); ?>
										<?php do_action( 'bp_before_registration_confirmed' ); ?>

										<?php if ( bp_registration_needs_activation() ) : ?>
											<p><?php _e( 'You have successfully created your account! To begin using this site you will need to activate your account via the email we have just sent to your address.', 'buddypress' ); ?></p>
										<?php else : ?>
											<p><?php _e( 'You have successfully created your account! Please log in using the username and password you have just created.', 'buddypress' ); ?></p>
										<?php endif; ?>

										<?php do_action( 'bp_after_registration_confirmed' ); ?>

									<?php endif; // completed-confirmation signup step ?>

									<?php do_action( 'bp_custom_signup_steps' ); ?>

									</form>

									</div>

									<?php do_action( 'bp_after_register_page' ); ?>
								</div>
								<!-- End Panel -->
							</div>
							<!-- End Login -->
						</div>
						<!-- col-app -->
					</div>
					<!-- col-app -->
				</div>
		<div>

		<!-- End col-table -->
	</div>

</div><!-- #buddypress -->
</div>
