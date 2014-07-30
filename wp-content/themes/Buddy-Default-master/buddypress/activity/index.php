 <?php
 /** 
 * 
 * 3rd-party plugins should use this template to easily add template
 * support to their plugins for the members component.
 *
 * @package BuddyPress
 * @subpackage bp-legacy
 */
?>
<?php do_action( 'bp_before_directory_activity' ); ?>

<div id="buddypress">
	
	<!-- modificado por Victor foto portada-->			
			<div class="timeline-cover">
				<div class="cover">
					<div class="top">
						<img src="<?php echo bloginfo('template_directory'); ?>/images/photodune-2755655-party-time-s.png" class="img-responsive" />
					</div>
					<div class="item-list-tabs no-ajax" id="object-nav" role="navigation">
<ul class="list-unstyled">
						<li id="home-li">
							<a id="user-activity" href="<?php bloginfo('url'); ?>">Inicio</a>
						</li>

						<li id="activity-personal-li">
							<a id="user-activity" href="<?php bloginfo('url'); ?>/members/<?php echo bp_core_get_username( bp_loggedin_user_id() ); ?>/activity/">Actividad</a>
						</li>
						<li id="xprofile-personal-li">
							<a id="user-xprofile" href="<?php bloginfo('url'); ?>/members/<?php echo bp_core_get_username( bp_loggedin_user_id() ); ?>/profile/">Perfil</a>
						</li>
						<?php $count_notification = bp_notifications_get_unread_notification_count( bp_displayed_user_id() ); ?>
						<li id="notifications-personal-li">
							<a id="user-notifications" href="<?php bloginfo('url'); ?>/members/<?php echo bp_core_get_username( bp_loggedin_user_id() ); ?>/notifications/">Notificaciones <span class="no-count"><?php echo $count_notification; ?></span></a>
						</li>
						<?php $count_message = bp_get_total_unread_messages_count(); ?>
						<li id="messages-personal-li">
							<a id="user-messages" href="<?php bloginfo('url'); ?>/members/<?php echo bp_core_get_username( bp_loggedin_user_id() ); ?>/messages/">Mensajes <span class="no-count"><?php echo $count_message; ?></span>
							</a>
						</li>
						<?php $count_friends =  friends_get_total_friend_count(); ?>
						<li id="friends-personal-li">
							<a id="user-friends" href="<?php bloginfo('url'); ?>/members/<?php echo bp_core_get_username( bp_loggedin_user_id() ); ?>/friends/">Amigos <span class="no-count"><?php echo $count_friends; ?></span>
							</a>
						</li>
						<?php $count_groups  = bp_get_total_group_count_for_user(); ?>			
						<li id="groups-personal-li">
							<a id="user-groups" href="<?php bloginfo('url'); ?>/members/<?php echo bp_core_get_username( bp_loggedin_user_id() ); ?>/groups/">Grupos <span class="count"><?php echo $count_groups; ?></span>
							</a>
						</li>
						<?php $count_media  = get_rtmedia_like(); ?>						
						<li id="media-personal-li">
							<a id="user-media" href="<?php bloginfo('url'); ?>/members/<?php echo bp_core_get_username( bp_loggedin_user_id() ); ?>/media/">Multimedia<span><?php echo $count_media; ?></span>
							</a>
						</li>
					</ul>
					</div>
				</div>
			</div>			

<!-- fin modificado por Victor foto portada-->

	<?php do_action( 'bp_before_directory_activity_content' ); ?>

	<?php if ( is_user_logged_in() ) : ?>
		
		<?php bp_get_template_part( 'activity/post-form' ); ?>

	<?php endif; ?>

	<?php do_action( 'template_notices' ); ?>

	<div class="item-list-tabs activity-type-tabs" role="navigation">
		<ul>
			<?php do_action( 'bp_before_activity_type_tab_all' ); ?>

			<li class="selected" id="activity-all"><a href="<?php bp_activity_directory_permalink(); ?>" title="<?php esc_attr_e( 'The public activity for everyone on this site.', 'buddypress' ); ?>"><?php printf( __( 'All Members <span>%s</span>', 'buddypress' ), bp_get_total_member_count() ); ?></a></li>

			<?php if ( is_user_logged_in() ) : ?>

				<?php do_action( 'bp_before_activity_type_tab_friends' ); ?>

				<?php if ( bp_is_active( 'friends' ) ) : ?>

					<?php if ( bp_get_total_friend_count( bp_loggedin_user_id() ) ) : ?>

						<li id="activity-friends"><a href="<?php echo bp_loggedin_user_domain() . bp_get_activity_slug() . '/' . bp_get_friends_slug() . '/'; ?>" title="<?php esc_attr_e( 'The activity of my friends only.', 'buddypress' ); ?>"><?php printf( __( 'My Friends <span>%s</span>', 'buddypress' ), bp_get_total_friend_count( bp_loggedin_user_id() ) ); ?></a></li>

					<?php endif; ?>

				<?php endif; ?>

				<?php do_action( 'bp_before_activity_type_tab_groups' ); ?>

				<?php if ( bp_is_active( 'groups' ) ) : ?>

					<?php if ( bp_get_total_group_count_for_user( bp_loggedin_user_id() ) ) : ?>

						<li id="activity-groups"><a href="<?php echo bp_loggedin_user_domain() . bp_get_activity_slug() . '/' . bp_get_groups_slug() . '/'; ?>" title="<?php esc_attr_e( 'The activity of groups I am a member of.', 'buddypress' ); ?>"><?php printf( __( 'My Groups <span>%s</span>', 'buddypress' ), bp_get_total_group_count_for_user( bp_loggedin_user_id() ) ); ?></a></li>

					<?php endif; ?>

				<?php endif; ?>

				<?php do_action( 'bp_before_activity_type_tab_favorites' ); ?>

				<?php if ( bp_get_total_favorite_count_for_user( bp_loggedin_user_id() ) ) : ?>

					<li id="activity-favorites"><a href="<?php echo bp_loggedin_user_domain() . bp_get_activity_slug() . '/favorites/'; ?>" title="<?php esc_attr_e( "The activity I've marked as a favorite.", 'buddypress' ); ?>"><?php printf( __( 'My Favorites <span>%s</span>', 'buddypress' ), bp_get_total_favorite_count_for_user( bp_loggedin_user_id() ) ); ?></a></li>

				<?php endif; ?>

				<?php if ( bp_activity_do_mentions() ) : ?>

					<?php do_action( 'bp_before_activity_type_tab_mentions' ); ?>

					<li id="activity-mentions"><a href="<?php echo bp_loggedin_user_domain() . bp_get_activity_slug() . '/mentions/'; ?>" title="<?php esc_attr_e( 'Activity that I have been mentioned in.', 'buddypress' ); ?>"><?php _e( 'Mentions', 'buddypress' ); ?><?php if ( bp_get_total_mention_count_for_user( bp_loggedin_user_id() ) ) : ?> <strong><span><?php printf( _nx( '%s new', '%s new', bp_get_total_mention_count_for_user( bp_loggedin_user_id() ), 'Number of new activity mentions', 'buddypress' ), bp_get_total_mention_count_for_user( bp_loggedin_user_id() ) ); ?></span></strong><?php endif; ?></a></li>

				<?php endif; ?>

			<?php endif; ?>

			<?php do_action( 'bp_activity_type_tabs' ); ?>
		</ul>
	</div><!-- .item-list-tabs -->

	<div class="item-list-tabs no-ajax" id="subnav" role="navigation">
		<ul>
			<!-- <li class="feed"><a href="<?php bp_sitewide_activity_feed_link(); ?>" title="<?php esc_attr_e( 'RSS Feed', 'buddypress' ); ?>"><?php _e( 'RSS', 'buddypress' ); ?></a></li> -->

			<?php do_action( 'bp_activity_syndication_options' ); ?>

			<!-- <li id="activity-filter-select" class="last">
				<label for="activity-filter-by"><?php _e( 'Show:', 'buddypress' ); ?></label>
				<select id="activity-filter-by">
					<option value="-1"><?php _e( 'Everything', 'buddypress' ); ?></option>
					<option value="activity_update"><?php _e( 'Updates', 'buddypress' ); ?></option>

					<?php if ( bp_is_active( 'blogs' ) ) : ?>

						<option value="new_blog_post"><?php _e( 'Posts', 'buddypress' ); ?></option>
						<option value="new_blog_comment"><?php _e( 'Comments', 'buddypress' ); ?></option>

					<?php endif; ?>

					<?php if ( bp_is_active( 'forums' ) ) : ?>

						<option value="new_forum_topic"><?php _e( 'Forum Topics', 'buddypress' ); ?></option>
						<option value="new_forum_post"><?php _e( 'Forum Replies', 'buddypress' ); ?></option>

					<?php endif; ?>

					<?php if ( bp_is_active( 'groups' ) ) : ?>

						<option value="created_group"><?php _e( 'New Groups', 'buddypress' ); ?></option>
						<option value="joined_group"><?php _e( 'Group Memberships', 'buddypress' ); ?></option>

					<?php endif; ?>

					<?php if ( bp_is_active( 'friends' ) ) : ?>

						<option value="friendship_accepted,friendship_created"><?php _e( 'Friendships', 'buddypress' ); ?></option>

					<?php endif; ?>

					<option value="new_member"><?php _e( 'New Members', 'buddypress' ); ?></option>

					<?php do_action( 'bp_activity_filter_options' ); ?>

				</select>
			</li> -->
		</ul>
	</div><!-- .item-list-tabs -->

	<?php do_action( 'bp_before_directory_activity_list' ); ?>

	<div class="activity" role="main">

		<?php bp_get_template_part( 'activity/activity-loop' ); ?>

	</div><!-- .activity -->

	<?php do_action( 'bp_after_directory_activity_list' ); ?>

	<?php do_action( 'bp_directory_activity_content' ); ?>

	<?php do_action( 'bp_after_directory_activity_content' ); ?>

	<?php do_action( 'bp_after_directory_activity' ); ?>

</div>
