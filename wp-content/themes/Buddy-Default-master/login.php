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
<?php login_with_ajax(); ?>
<!-- <div class="layout-app col-fs"> -->
<!--
		<div id="content">						
				<div class="row row-app">
					<div class="col-md-12">
						<div class="col-separator col-separator-first box col-unscrollable col-fs">
							<div class="col-table">
								<div class="col-table-row">
									<div class="col-app col-unscrollable tab-content">
										<div class="col-app lock-wrapper lock-bg-1 tab-pane active animated fadeIn" id="lock-1-1">
											<h3 class="text-white innerB text-center">Account Access</h3>
											<div class="lock-container">
												<div class="innerAll text-center">
													<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/people/100/22.jpg" class="img-circle"/>
													<div class="innerLR">
														<input class="form-control text-center bg-gray" type="text" placeholder="Username"/>
														<input class="form-control text-center bg-gray" type="password" placeholder="Enter Password"/>
													</div>
													<div class="innerT">
														<a href="index.html?lang=en" class="btn btn-primary">Login <i class="fa fa-fw fa-unlock-alt"></i></a>
													</div>
													<a href="" class="btn margin-none">Forgot password?</a>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>	
						</div>
					</div>
				</div>
		</div>-->
<?php get_footer(); ?>
