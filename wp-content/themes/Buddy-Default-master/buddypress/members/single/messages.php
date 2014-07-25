<?php

/**
 * BuddyPress - Users Messages
 *
 * @package BuddyPress
 * @subpackage bp-legacy
 */

?>

<div class="item-list-tabs no-ajax" id="subnav" role="navigation">
	<ul>

		<?php bp_get_options_nav(); ?>

	</ul>

	<?php if ( bp_is_messages_inbox() || bp_is_messages_sentbox() ) : ?>

		<div class="message-search"><?php bp_message_search_form(); ?></div>

	<?php endif; ?>

</div><!-- .item-list-tabs -->

<!-- Messages-->
			<!-- <div class="layout-app">  -->
			<div class="innerAll">
	<!-- Widget -->
	<div class="widget widget-messages widget-heading-simple widget-body-white">
		<div class="widget-body padding-none margin-none">

			<div class="row row-merge borders">
				<div class="col-md-4 listWrapper">
					<div class="innerAll">
						<form autocomplete="off" class="form-inline margin-none">
							<div class="input-group input-group-sm">
								<input type="text" class="form-control" placeholder="Find messages .." />
								<span class="input-group-btn">
									<button type="button" class="btn btn-primary btn-xs pull-right"><i class="fa fa-search"></i></button>
								</span>
							</div>
						</form>
					</div>



		<?php do_action( 'bp_before_member_messages_content' ); ?>
					<ul class="list-unstyled">

			<?php bp_get_template_part( 'members/single/messages/messages-loop' ); ?>
<!-- .messages -->

		<?php do_action( 'bp_after_member_messages_content' ); ?>

					</ul>
				</div>
				<div class="col-md-8 detailsWrapper">




					<div class="widget border-top padding-none margin-none">
<!-- Messages-->



<?php
switch ( bp_current_action() ) :

	// Single Message View
	case 'view' :
		bp_get_template_part( 'members/single/messages/single' );
		break;

	// Compose
	case 'compose' :
		bp_get_template_part( 'members/single/messages/compose' );
		break;

	// Sitewide Notices
	case 'notices' :
		do_action( 'bp_before_member_messages_content' ); ?>

		<div class="messages" role="main">
			<?php bp_get_template_part( 'members/single/messages/notices-loop' ); ?>
		</div><!-- .messages -->

		<?php do_action( 'bp_after_member_messages_content' );
		break;

	// Any other
	default :
		bp_get_template_part( 'members/single/plugins' );
		break;
endswitch;
?>




						<!--  Message -->
						<div class="media margin-none innerAll">
							<a href="" class="pull-left hidden-xs">
								<img src="../assets//images/people/100/16.jpg" width="60" class="media-object">
							</a>
							<div class="media-body innerTB">
								<div class="row">
									<div class="col-sm-6">
										<div class="innerT half">
											<div class="media">
												<div class="pull-left">
													<a href="" class="strong text-inverse ">Mr. Awesome</a>
													<span class="innerR text-muted visible-xs">Jan 15th, 2014 </span>
												</div>
												<div class="media-body">
													Lorem ipsum dolor sit amet, consectetur adipisicing elit.
												</div>
											</div>
										</div>
									</div>
									<div class="col-sm-6 hidden-xs">
										<i class="icon-time-clock pull-right text-muted innerT half fa fa-2x"></i>
										<span class="pull-right innerR innerT text-right  text-muted">
										Jan 15th, 2014
										</span>
									</div>
								</div>
							</div>

						</div>

						<!--  Message -->
						<div class="media margin-none bg-gray border-top innerAll">
							<a href="" class="pull-left hidden-xs">
								<img src="../assets//images/people/100/13.jpg" width="60" class="media-object">
							</a>
							<div class="media-body innerTB">
								<div class="row">
									<div class="col-sm-6">
										<div class="innerT half">
											<div class="media">
												<div class="pull-left">
													<a href="" class="strong text-inverse ">Joanne Smith</a>
													<span class="innerR text-muted visible-xs">Jan 15th, 2014 </span>
												</div>
												<div class="media-body">
													Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus, in.
												</div>
											</div>
										</div>
									</div>
									<div class="col-sm-6 hidden-xs">
										<i class="icon-time-clock pull-right text-muted innerT half fa fa-2x"></i>
										<span class="pull-right innerR innerT text-right  text-muted">
										Jan 15th, 2014
										</span>
									</div>
								</div>
							</div>

						</div>

						<!--  Message -->
						<div class="media margin-none border-top innerAll">
							<a href="" class="pull-left hidden-xs">
								<img src="../assets//images/people/100/16.jpg" width="60" class="media-object">
							</a>
							<div class="media-body innerTB">
								<div class="row">
									<div class="col-sm-6">
										<div class="innerT half">
											<div class="media">
												<div class="pull-left">
													<a href="" class="strong text-inverse ">Mr. Awesome</a>
													<span class="innerR text-muted visible-xs">Jan 15th, 2014 </span>
												</div>
												<div class="media-body">
													Hello World!
												</div>
											</div>
										</div>
									</div>
									<div class="col-sm-6 hidden-xs">
										<i class="icon-time-clock pull-right text-muted innerT half fa fa-2x"></i>
										<span class="pull-right innerR innerT text-right  text-muted">
										Jan 15th, 2014
										</span>
									</div>
								</div>
							</div>

						</div>


						<!--  Message -->
						<div class="media margin-none bg-gray border-top innerAll">
							<a href="" class="pull-left hidden-xs">
								<img src="../assets//images/people/100/13.jpg" width="60" class="media-object">
							</a>
							<div class="media-body innerTB">
								<div class="row">
									<div class="col-sm-6">
										<div class="innerT half">
											<div class="media">
												<div class="pull-left">
													<a href="" class="strong text-inverse ">Joanne Smith</a>
													<span class="innerR text-muted visible-xs">Jan 15th, 2014 </span>
												</div>
												<div class="media-body">
													Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus, in.
												</div>
											</div>
										</div>
									</div>
									<div class="col-sm-6 hidden-xs">
										<i class="icon-time-clock pull-right text-muted innerT half fa fa-2x"></i>
										<span class="pull-right innerR innerT text-right  text-muted">
										Jan 15th, 2014
										</span>
									</div>
								</div>
							</div>

						</div>

						<!--  Message -->
						<div class="media margin-none border-top innerAll">
							<a href="" class="pull-left hidden-xs">
								<img src="../assets//images/people/100/16.jpg" width="60" class="media-object">
							</a>
							<div class="media-body innerTB">
								<div class="row">
									<div class="col-sm-6">
										<div class="innerT half">
											<div class="media">
												<div class="pull-left">
													<a href="" class="strong text-inverse ">Joanne Smith</a>
													<span class="innerR text-muted visible-xs">Jan 15th, 2014 </span>
												</div>
												<div class="media-body">
													Hello World!
												</div>
											</div>
										</div>
									</div>
									<div class="col-sm-6 hidden-xs">
										<i class="icon-time-clock pull-right text-muted innerT half fa fa-2x"></i>
										<span class="pull-right innerR innerT text-right  text-muted">
										Jan 15th, 2014
										</span>
									</div>
								</div>
							</div>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- // Widget END -->
</div>



