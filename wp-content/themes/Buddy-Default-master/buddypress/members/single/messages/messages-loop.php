<?php do_action( 'bp_before_member_messages_loop' ); ?>

<?php if ( bp_has_message_threads( bp_ajax_querystring( 'messages' ) ) ) : ?>



		<div class="bg-gray text-center strong border-top innerAll half">
				<?php bp_messages_pagination_count(); ?>
		 <i class="fa fa-circle-arrow-down"></i></div>
		<div class="pag-count" id="messages-dir-count">

		</div>
		<div class="pagination-links" id="messages-dir-pag">
			<?php bp_messages_pagination(); ?>
		</div>
	<div class="pagination no-ajax" id="user-pag">
	</div>
<!-- .pagination -->

	<?php do_action( 'bp_after_member_messages_pagination' ); ?>

	<?php do_action( 'bp_before_member_messages_threads'   ); ?>

	<table id="message-threads" class="messages-notices">
		<?php while ( bp_message_threads() ) : bp_message_thread(); ?>

			<tr id="m-<?php bp_message_thread_id(); ?>" class="<?php bp_message_css_class(); ?><?php if ( bp_message_thread_has_unread() ) : ?> unread<?php else: ?> read<?php endif; ?>">
				<td width="1%" class="thread-count">
					<span class="unread-count"><?php bp_message_thread_unread_count(); ?></span>
				</td>
				<td width="1%" class="thread-avatar"><?php bp_message_thread_avatar(); ?></td>

				<?php if ( 'sentbox' != bp_current_action() ) : ?>
					<td width="30%" class="thread-from">
						<?php bp_message_thread_from(); ?><br />
						<span class="activity">
							<p><a href="<?php bp_message_thread_view_link(); ?>" title="<?php esc_attr_e( "View Message", "buddypress" ); ?>">
							<?php bp_message_thread_subject(); ?></a>

						</p>
							<?php  bp_message_thread_last_post_date(); ?></span>
					</td>
				<?php else: ?>
					<td width="30%" class="thread-from">
						<?php _e( 'To:', 'buddypress' ); ?> <?php bp_message_thread_to(); ?><br />
						<span class="activity">
						<p><a href="<?php bp_message_thread_view_link(); ?>" title="<?php esc_attr_e( "View Message", "buddypress" ); ?>">
							<?php bp_message_thread_subject(); ?></a>
						</p>
							<?php bp_message_thread_last_post_date(); ?></span>
					</td>
				<?php endif; ?>
				<?php do_action( 'bp_messages_inbox_list_item' ); ?>

				<td width="13%" class="thread-options">
				<a href="<?php bp_message_thread_view_link(); ?>" class="pull-left btn btn-primary btn-block">
				 Ver mensaje
				</a><br>
					<a class="pull-left btn-block button confirm" href="<?php bp_message_thread_delete_link(); ?>" title="<?php esc_attr_e( "Delete Message", "buddypress" ); ?>"><?php _e( 'Delete', 'buddypress' ); ?></a> &nbsp;
				</td>
			</tr>

		<?php endwhile; ?>
	</table><!-- #message-threads -->



	<?php do_action( 'bp_after_member_messages_threads' ); ?>

	<?php do_action( 'bp_after_member_messages_options' ); ?>

<?php else: ?>

	<div id="message" class="info">
		<p><?php _e( 'Sorry, no messages were found.', 'buddypress' ); ?></p>
	</div>

<?php endif;?>

<?php do_action( 'bp_after_member_messages_loop' ); ?>
