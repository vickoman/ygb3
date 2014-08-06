<?php do_action( 'bp_before_activity_loop' ); ?>

<?php if ( bp_has_activities( bp_ajax_querystring( 'activity' ) ) ) : ?>

	<?php /* Show pagination if JS is not enabled, since the "Load More" link will do nothing */ ?>
	<noscript>
		<div class="pagination">
			<div class="pag-count"><?php bp_activity_pagination_count(); ?></div>
			<div class="pagination-links"><?php bp_activity_pagination_links(); ?></div>
		</div>
	</noscript>

	<?php if ( empty( $_POST['page'] ) ) : ?>

		<ul id="activity-stream" class="activity-list item-list">

	<?php endif; ?>

	<?php //$act_cont=0; while ( bp_activities() ) : bp_the_activity(); ?>
		
		<?php //bp_get_template_part( 'activity/entry' ); ?>

		<!-- Activity Cambio de Vickoman -->
		<div class="row">
			<div class="col-md-12 col-lg-12">
				<div class="gridalicious-row gridalicious" data-toggle="gridalicious" data-gridalicious-width="340" data-gridalicious-gutter="12" data-gridalicious-selector=".gridalicious-item">
					<?php do_action( 'bp_before_activity_entry' ); ?>	
					<div class="galcolumn" id="item0Do7xq" style="width: 49.22680412371135%; padding-left: 12px; padding-bottom: 12px; float: left; box-sizing: border-box;"></div>
						<div class="galcolumn" id="item1Do7xq" style="width: 49.22680412371135%; padding-left: 12px; padding-bottom: 12px; float: left; box-sizing: border-box;"></div>
						<div id="clearDo7xq" style="clear: both; height: 0px; width: 0px; display: block;"></div><div class="galcolumn" id="item0gqOq9" style="width: 49.22680412371135%; padding-left: 12px; padding-bottom: 12px; float: left; box-sizing: border-box;">					
							<!-- Widget Left -->
							<?php $act_cont=1; while ( bp_activities() ) : bp_the_activity(); ?>
							<?php if (($act_cont%2) != 0): ?>

							<div class="widget gridalicious-item not-responsive" style="margin-bottom: 12px; zoom: 1; opacity: 1;">
								<!-- Info -->
								<div class="bg-primary">
									<div class="media">
										<a href="<?php bp_activity_user_link(); ?>" class="pull-left"><?php echo  bp_get_activity_avatar(array('class'=>"avatar-activity", "type"=>"thumb")); ?><!-- <img src="../assets/images/people/50/15.jpg" width="50" class="media-object" style="width: auto; height: auto; display: block; margin-left: auto; margin-right: auto;"> --></a>
										<div class="media-body innerTB half">											
											<?php bp_activity_action(); ?>
											<!-- <a href="" class="text-white strong display-block">Joanne Smith</a>
											<span>on 15th January, 2014</span> -->

										</div>

									</div>
								</div>

								<!-- Content -->
								<?php if ( bp_activity_has_content() ) : ?>
								<div class="activity-inner" style="overflow:hidden; padding:10px">
									<?php bp_activity_content_body(); ?>
								</div>
								<?php endif; ?>
								

								<?php do_action( 'bp_activity_entry_content' ); ?>

								<!-- Comment -->
								<div class="bg-gray innerAll border-top border-bottom text-small ">

									<?php if ( is_user_logged_in() ) : ?>

										<?php if ( bp_activity_can_comment() ) : ?>

											<a href="<?php bp_activity_comment_link(); ?>" class="button acomment-reply bp-primary-action" id="acomment-comment-<?php bp_activity_id(); ?>"><?php printf( __( 'Comment <span>%s</span>', 'buddypress' ), bp_activity_get_comment_count() ); ?></a>

										<?php endif; ?>

										<?php if ( bp_activity_can_favorite() ) : ?>

											<?php if ( !bp_get_activity_is_favorite() ) : ?>

												<a href="<?php bp_activity_favorite_link(); ?>" class="button fav bp-secondary-action" title="<?php esc_attr_e( 'Mark as Favorite', 'buddypress' ); ?>"><?php _e( 'Favorite', 'buddypress' ); ?></a>

											<?php else : ?>

												<a href="<?php bp_activity_unfavorite_link(); ?>" class="button unfav bp-secondary-action" title="<?php esc_attr_e( 'Remove Favorite', 'buddypress' ); ?>"><?php _e( 'Remove Favorite', 'buddypress' ); ?></a>

											<?php endif; ?>

										<?php endif; ?>

										<?php if ( bp_activity_user_can_delete() ) bp_activity_delete_link(); ?>

										<?php do_action( 'bp_activity_entry_meta' ); ?>

									<?php endif; ?>
								</div>
								
								<!-- First Comment -->
								
									
								<?php do_action( 'bp_before_activity_entry_comments' ); ?>

								<?php if ( ( is_user_logged_in() && bp_activity_can_comment() ) || bp_is_single_activity() ) : ?>

									<div class="activity-comments">

										<?php bp_activity_comments(); ?>

										<?php if ( is_user_logged_in() ) : ?>

											<form action="<?php bp_activity_comment_form_action(); ?>" method="post" id="ac-form-<?php bp_activity_id(); ?>" class="ac-form"<?php bp_activity_comment_form_nojs_display(); ?>>					
												<div class="ac-reply-content">
													<div class="ac-textarea">
														<textarea id="ac-input-<?php bp_activity_id(); ?>" class="ac-input" name="ac_input_<?php bp_activity_id(); ?>"></textarea>
													</div>
													<input type="submit" name="ac_form_submit" value="<?php esc_attr_e( 'Post', 'buddypress' ); ?>" /> &nbsp; <a href="#" class="ac-reply-cancel"><?php _e( 'Cancel', 'buddypress' ); ?></a>
													<input type="hidden" name="comment_form_id" value="<?php bp_activity_id(); ?>" />
												</div>

												<?php do_action( 'bp_activity_entry_comments' ); ?>

												<?php wp_nonce_field( 'new_activity_comment', '_wpnonce_new_activity_comment' ); ?>

											</form>

										<?php endif; ?>

									</div>

								<?php endif; ?>

								<?php do_action( 'bp_after_activity_entry_comments' ); ?>
								<!-- <div class="media border-bottom margin-none bg-gray">
									<a href="" class="pull-left innerAll"><img src="../assets/images/people/50/18.jpg" width="50" class="media-object" style="width: auto; height: auto; display: block; margin-left: auto; margin-right: auto;"></a>
									<div class="media-body innerTB">
										<a href="#" class="pull-right innerT innerR text-muted"><i class="icon-reply-all-fill fa fa-2x "></i></a>
										<a href="" class="strong text-inverse">Adrian Demian</a> 	<small class="text-muted display-block ">on Jan 15th, 2014</small>			<a href="" class="text-small">mark it</a>
										<div>- Happy B-Day!</div>
									</div>
								</div> -->

								
							</div>
							<?php endif ?>							
							<?php $act_cont++; endwhile; ?>

							<!-- End Widget Left -->
						</div>
						<div class="galcolumn" id="item1gqOq9" style="width: 49.22680412371135%; padding-left: 12px; padding-bottom: 12px; float: left; box-sizing: border-box;">
							<!-- Widget Right -->
							<?php $act_cont2=1; while ( bp_activities() ) : bp_the_activity(); ?>
							<?php if (($act_cont2%2) == 0): ?>
							<div class="widget gridalicious-item not-responsive" style="margin-bottom: 12px; zoom: 1; opacity: 1;">
<!-- Info -->
								<div class="bg-primary">
									<div class="media">
										<a href="<?php bp_activity_user_link(); ?>" class="pull-left"><?php echo  bp_get_activity_avatar(array('class'=>"avatar-activity", "type"=>"thumb")); ?><!-- <img src="../assets/images/people/50/15.jpg" width="50" class="media-object" style="width: auto; height: auto; display: block; margin-left: auto; margin-right: auto;"> --></a>
										<div class="media-body innerTB half">											
											<?php bp_activity_action(); ?>
											<!-- <a href="" class="text-white strong display-block">Joanne Smith</a>
											<span>on 15th January, 2014</span> -->

										</div>

									</div>
								</div>

								<!-- Content -->
								<?php if ( bp_activity_has_content() ) : ?>
								<div class="activity-inner" style="overflow:hidden; padding:10px">
									<?php bp_activity_content_body(); ?>
								</div>
								<?php endif; ?>
								

								<?php do_action( 'bp_activity_entry_content' ); ?>

								<!-- Comment -->
								<div class="bg-gray innerAll border-top border-bottom text-small ">
									
									<?php if ( is_user_logged_in() ) : ?>

										<?php if ( bp_activity_can_comment() ) : ?>

											<a href="<?php bp_activity_comment_link(); ?>" class="button acomment-reply bp-primary-action" id="acomment-comment-<?php bp_activity_id(); ?>"><?php printf( __( 'Comment <span>%s</span>', 'buddypress' ), bp_activity_get_comment_count() ); ?></a>

										<?php endif; ?>

										<?php if ( bp_activity_can_favorite() ) : ?>

											<?php if ( !bp_get_activity_is_favorite() ) : ?>

												<a href="<?php bp_activity_favorite_link(); ?>" class="button fav bp-secondary-action" title="<?php esc_attr_e( 'Mark as Favorite', 'buddypress' ); ?>"><?php _e( 'Favorite', 'buddypress' ); ?></a>

											<?php else : ?>

												<a href="<?php bp_activity_unfavorite_link(); ?>" class="button unfav bp-secondary-action" title="<?php esc_attr_e( 'Remove Favorite', 'buddypress' ); ?>"><?php _e( 'Remove Favorite', 'buddypress' ); ?></a>

											<?php endif; ?>

										<?php endif; ?>

										<?php if ( bp_activity_user_can_delete() ) bp_activity_delete_link(); ?>

										<?php do_action( 'bp_activity_entry_meta' ); ?>

									<?php endif; ?>
								</div>
								
								<!-- First Comment -->
								
									
								<?php do_action( 'bp_before_activity_entry_comments' ); ?>

								<?php if ( ( is_user_logged_in() && bp_activity_can_comment() ) || bp_is_single_activity() ) : ?>

									<div class="activity-comments">

										<?php bp_activity_comments(); ?>

										<?php if ( is_user_logged_in() ) : ?>

											<form action="<?php bp_activity_comment_form_action(); ?>" method="post" id="ac-form-<?php bp_activity_id(); ?>" class="ac-form"<?php bp_activity_comment_form_nojs_display(); ?>>					
												<div class="ac-reply-content">
													<div class="ac-textarea">
														<textarea id="ac-input-<?php bp_activity_id(); ?>" class="ac-input" name="ac_input_<?php bp_activity_id(); ?>"></textarea>
													</div>
													<input type="submit" name="ac_form_submit" value="<?php esc_attr_e( 'Post', 'buddypress' ); ?>" /> &nbsp; <a href="#" class="ac-reply-cancel"><?php _e( 'Cancel', 'buddypress' ); ?></a>
													<input type="hidden" name="comment_form_id" value="<?php bp_activity_id(); ?>" />
												</div>

												<?php do_action( 'bp_activity_entry_comments' ); ?>

												<?php wp_nonce_field( 'new_activity_comment', '_wpnonce_new_activity_comment' ); ?>

											</form>

										<?php endif; ?>

									</div>

								<?php endif; ?>

								<?php do_action( 'bp_after_activity_entry_comments' ); ?>
								<!-- <div class="media border-bottom margin-none bg-gray">
									<a href="" class="pull-left innerAll"><img src="../assets/images/people/50/18.jpg" width="50" class="media-object" style="width: auto; height: auto; display: block; margin-left: auto; margin-right: auto;"></a>
									<div class="media-body innerTB">
										<a href="#" class="pull-right innerT innerR text-muted"><i class="icon-reply-all-fill fa fa-2x "></i></a>
										<a href="" class="strong text-inverse">Adrian Demian</a> 	<small class="text-muted display-block ">on Jan 15th, 2014</small>			<a href="" class="text-small">mark it</a>
										<div>- Happy B-Day!</div>
									</div>
								</div> -->

								
							</div>
							<?php endif ?>							
							<?php $act_cont2++; endwhile; ?>

							<!-- End Widget Right -->
						</div>
						<div id="cleargqOq9" style="clear: both; height: 0px; width: 0px; display: block;">
						</div>
					</div>
					<?php do_action( 'bp_after_activity_entry' ); ?>
			</div>
		</div>
		<!-- End Activitu -->

	<?php //$act_cont++; endwhile; ?>

	<?php if ( bp_activity_has_more_items() ) : ?>

		<li class="load-more">
			<a href="#more"><?php _e( 'Load More', 'buddypress' ); ?></a>
		</li>

	<?php endif; ?>

	<?php if ( empty( $_POST['page'] ) ) : ?>

		</ul>

	<?php endif; ?>

<?php else : ?>

	<div id="message" class="info">
		<p><?php _e( 'Sorry, there was no activity found. Please try a different filter.', 'buddypress' ); ?></p>
	</div>

<?php endif; ?>

<?php do_action( 'bp_after_activity_loop' ); ?>


<?php if ( empty( $_POST['page'] ) ) : ?>

	<form action="" name="activity-loop-form" id="activity-loop-form" method="post">

		<?php wp_nonce_field( 'activity_filter', '_wpnonce_activity_filter' ); ?>

	</form>

<?php endif; ?>