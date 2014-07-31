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
									<?php if ( bp_is_messages_inbox() || bp_is_messages_sentbox() ) : ?>

		<div class="message-search"><?php bp_message_search_form(); ?></div>

	<?php endif; ?>

							</div>
						</form>
					</div>



		<?php do_action( 'bp_before_member_messages_content' ); ?>
					<div class="list-unstyled messages" role="main">

		<?php
			if ( bp_is_current_action( 'notices' ) )
				locate_template( array( 'members/single/messages/notices-loop.php' ), true );
			else
				locate_template( array( 'members/single/messages/messages-loop.php' ), true );

		?>
		<?php bp_get_template_part( 'members/single/messages/messages-loop' ); ?>
<!-- .messages -->

					</div>
		<?php do_action( 'bp_after_member_messages_content' ); ?>
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
		echo "<h1 class='tittle-Msj'><span>Escoja un mensaje</span></h1>";
		bp_get_template_part( 'members/single/plugins' );
		break;
endswitch;
?>





					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- // Widget END -->
</div>



