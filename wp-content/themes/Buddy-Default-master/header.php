<?php
			if (! is_user_logged_in() ) {
				wp_redirect( home_url() . '/acceso');
			}
		?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
	<head profile="http://gmpg.org/xfn/11">
		<meta http-equiv="Content-Type" content="<?php bloginfo( 'html_type' ); ?>; charset=<?php bloginfo( 'charset' ); ?>" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
		<title><?php wp_title( '|', true, 'right' ); bloginfo( 'name' ); ?></title>

		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
		<!--
		**********************************************************
		In development, use the LESS files and the less.js compiler
		instead of the minified CSS loaded by default.
		**********************************************************
		<link rel="stylesheet/less" href="../assets/less/admin/module.admin.stylesheet-complete.less" />
		-->

			<!--[if lt IE 9]><link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/components/library/bootstrap/css/bootstrap.min.css" /><![endif]-->

			<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/module.admin.stylesheet-complete.layout_fixed.true.min.css" />


		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	    <!--[if lt IE 9]>
	      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
	    <![endif]-->
		<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/module.admin.stylesheet-complete.layout_fixed.true.min.css" />
		<script src="<?php echo get_stylesheet_directory_uri(); ?>/library/jquery/jquery.min.js?v=v2.0.0-rc8&sv=v0.0.1.2"></script>
		<script src="<?php echo get_stylesheet_directory_uri(); ?>/library/jquery/jquery-migrate.min.js?v=v2.0.0-rc8&sv=v0.0.1.2"></script>
		<script src="<?php echo get_stylesheet_directory_uri(); ?>/library/modernizr/modernizr.js?v=v2.0.0-rc8&sv=v0.0.1.2"></script>
		<script src="<?php echo get_stylesheet_directory_uri(); ?>/plugins/core_less-js/less.min.js?v=v2.0.0-rc8&sv=v0.0.1.2"></script>
		<script src="<?php echo get_stylesheet_directory_uri(); ?>/plugins/charts_flot/excanvas.js?v=v2.0.0-rc8&sv=v0.0.1.2"></script>
		<script src="<?php echo get_stylesheet_directory_uri(); ?>/plugins/core_browser/ie/ie.prototype.polyfill.js?v=v2.0.0-rc8&sv=v0.0.1.2"></script>
		<?php bp_head(); ?>
		<?php wp_head(); ?>
		<?php global $bp;
		global $current_user;
        get_currentuserinfo();
		?>
	</head>

	<body id="bp-default" style="padding-top:60px;">
		<?php do_action( 'bp_before_header' ); ?>

		<!-- Navbar -->
		<div>
			<div class="navbar hidden-print navbar-default navbar-fixed-top box main" role="navigation">
				<div class="user-action  pull-right">
					<a href="<?php echo home_url(); ?>" alt="<?php _ex( 'Home', 'Yogobieno 3.0 Inicio', 'buddypress' ); ?>" title="<?php _ex( 'Inicio', 'Yogobieno 3.0 Inicio', 'buddypress' ); ?>"><?php bp_site_name(); ?></a>
				</div>
				<!-- <div class="user-action user-action-btn-navbar pull-left">
					<a href="#menu" class="btn btn-sm btn-navbar btn-open-left"><i class="fa fa-bars fa-2x"></i></a>
				</div> -->

				<ul class="notifications pull-left hidden-xs">
					<li class="dropdown notif">
						<a href="" class="dropdown-toggle"  data-toggle="dropdown"><i class="notif-block icon-envelope-1"></i><?php if (messages_get_unread_count() > 0): ?><span class="fa fa-star"></span><?php endif; ?></a>
						<ul class="dropdown-menu chat media-list">
							<?php if (messages_get_unread_count() > 0): ?>
							<?php if ( bp_has_message_threads() ) : ?>
							<?php global $messages_template;?>
								<?php $x=1; while ( bp_message_threads() ) : bp_message_thread(); ?>
		 							<?php if ($x <= 3): ?>
			 							<?php if (bp_message_thread_has_unread()): ?>
			 							<li class="media">
								        	<a class="pull-left" href="<?php echo bp_get_message_thread_view_link(); ?>"><img class="media-object thumb" src="<?php echo bp_core_fetch_avatar(array('item_id'=> $messages_template->thread->last_sender_id, 'type' => $type, 'html' => $html, 'alt' => $alt));?>" alt="50x50" width="50"/></a>
											<div class="media-body">
									        	<span class="label label-default pull-right"><?php bp_message_thread_last_post_date();?></span>
									            <h5 class="media-heading"><?php echo bp_get_message_thread_from(); ?></h5>
									            <p class="margin-none"><?php echo bp_get_message_thread_excerpt();?></p>
									            <span><a href="<?php echo bp_get_message_thread_view_link(); ?>">Ver</a></span>
									        </div>
										</li>
										<?php endif; ?>
		 							<?php endif; ?>

							      <?php //bp_message_thread_id() ?>
							      <?php //bp_message_thread_has_unread() ?>
							      <?php //bp_message_thread_unread_count() ?>
							      <?php //bp_message_thread_avatar() ?>
							      <?php //bp_message_thread_from() ?>
							      <?php //bp_message_thread_last_post_date() ?>
							      <?php //bp_message_thread_view_link() ?>
							      <?php //bp_message_thread_subject() ?>
							      <?php //bp_message_thread_excerpt() ?>
							      <?php //bp_message_thread_delete_link() ?>

							  <?php $x++; endwhile; ?>

							<?php endif; ?>
							<?php else: ?>
							<li class="media">
								<div class="media-body">
						            <p class="margin-none">No tienes mensajes nuevos :(</p>
						        </div>
							</li>
							<?php endif; ?>
				      	</ul>
					</li>
				</ul>

				<div class="user-action pull-left menu-right-hidden-xs menu-left-hidden-xs border-left">
					<div class="dropdown username pull-left">
						<a class="dropdown-toggle" data-toggle="dropdown" href="#">
							<span class="media margin-none">
								<span class="pull-left"><img src="<?php echo bp_core_fetch_avatar(array( 'item_id' => $bp->loggedin_user->id, 'type' => $type, 'html' => $html, 'alt' => $alt));?>" alt="user" class="img-circle"></span>
								<?php //echo bp_get_displayed_user_avatar(); ?>


								<span class="media-body"><?php echo $bp->loggedin_user->fullname;?> <span class="caret"></span></span>
							</span>
						</a>
						<ul class="dropdown-menu">
							<li><a href="<?php echo home_url(); ?>/members/<?php echo $current_user->user_login;?>/profile" >Mi peril </a></li>
							<li><a href="<?php echo home_url(); ?>/members/<?php echo $current_user->user_login;?>/messages">Mensajes (<?php echo messages_get_unread_count();?>)</a></li>
						 	<li><a href="<?php echo home_url(); ?>/members/<?php echo $current_user->user_login;?>/settings">Configuración</a></li>
							<li><a href="<?php echo wp_logout_url( wp_guess_url() ); ?>">Salir</a></li>
					    </ul>
					</div>
				</div>
				<div class="input-group hidden-xs pull-left">
					<form action="<?php echo bp_search_form_action(); ?>" method="post" id="search-form">
				  	<span class="input-group-addon"><i class="icon-search"></i></span>
				  	<input type="text" id="search-terms" name="search-terms" class="form-control" placeholder="Buscar Amigo" value="<?php echo isset( $_REQUEST['s'] ) ? esc_attr( $_REQUEST['s'] ) : ''; ?>" />
				  </form>
				</div>
			</div>
			<?php do_action( 'bp_header' ); ?>
		</div>
		<?php do_action( 'bp_after_header'     ); ?>

		<?php do_action( 'bp_before_container' ); ?>
		<div id="content ">
			<div class="container">
			<div class="innerAll"">
