<?php

/**
 * BuddyPress - Members Loop
 *
 * Querystring is set via AJAX in _inc/ajax.php - bp_legacy_theme_object_filter()
 *
 * @package BuddyPress
 * @subpackage bp-legacy
 */

?>

<?php do_action( 'bp_before_members_loop' ); ?>

<?php if ( bp_has_members( bp_ajax_querystring( 'members' ) ) ) : ?>

	<div id="pag-top" class="pagination">

		<div class="pag-count" id="member-dir-count-top">

			<?php bp_members_pagination_count(); ?>

		</div>

		<div class="pagination-links" id="member-dir-pag-top">

			<?php bp_members_pagination_links(); ?>

		</div>

	</div>

	<?php do_action( 'bp_before_directory_members_list' ); ?>

	<ul id="members-list" class="item-list" role="main">

<div class="row row-merge">
	<?php while ( bp_members() ) : bp_the_member(); ?>

		<div class="col-md-12 col-lg-6 bg-white border-bottom">
		<div class="row">

			<div class="col-sm-8">
				<div class="media">
					<a class="pull-left margin-none" href="<?php bp_member_permalink(); ?>">
					<?php bp_member_avatar('type=full&width=105&height=105'); ?>
					</a>
					<div class="media-body innerAll inner-2x padding-right-none padding-bottom-none">
						 <h4 class="media-heading"><a href="<?php bp_member_permalink(); ?>" class="text-inverse"><?php bp_member_name(); ?></a></h4>
						 <p>
						 	<!-- <span class="text-success strong"><i class="fa fa-check"></i> Friend</span> &nbsp;  -->
						 	<i class="fa fa-fw fa-map-marker text-muted"></i> <?php bp_member_last_active(); ?></p>
						 	<?php if ( bp_get_member_latest_update() ) : ?>
<!-- ultima actualizacion escondida
						<span class="update"> <?php bp_member_latest_update(); ?></span>
-->
					<?php endif; ?>

				<?php 	 ?>

				<?php
				 /***
				  * If you want to show specific profile fields here you can,
				  * but it'll add an extra query for each member in the loop
				  * (only one regardless of the number of fields you show):
				  *
				  * bp_member_profile_data( 'field=the field name' );
				  */
				?>
					</div>
				</div>
			</div>
			<div class="col-sm-4">
				<div class="innerAll text-right">

					<div class="action">
						<?php do_action( 'bp_directory_members_actions' );
						do_action( 'bp_directory_members_item' ); ?>
						</div>
				</div>
			</div>
		</div>

	</div>


	<?php endwhile; ?>
</div>
	</ul>

	<?php do_action( 'bp_after_directory_members_list' ); ?>

	<?php bp_member_hidden_fields(); ?>

	<div id="pag-bottom" class="pagination">

		<div class="pag-count" id="member-dir-count-bottom">

			<?php bp_members_pagination_count(); ?>

		</div>

		<div class="pagination-links" id="member-dir-pag-bottom">

			<?php bp_members_pagination_links(); ?>

		</div>

	</div>

<?php else: ?>

	<div id="message" class="info">
		<p><?php _e( "Sorry, no members were found.", 'buddypress' ); ?></p>
	</div>

<?php endif; ?>

<?php do_action( 'bp_after_members_loop' ); ?>
