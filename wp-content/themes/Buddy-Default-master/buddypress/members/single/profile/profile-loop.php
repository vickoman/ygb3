<?php do_action( 'bp_before_profile_loop_content' ); ?>

<?php if ( bp_has_profile() ) : ?>

	<?php while ( bp_profile_groups() ) : bp_the_profile_group(); ?>

		<?php if ( bp_profile_group_has_fields() ) : ?>

			<?php do_action( 'bp_before_profile_field_content' ); ?>

			<div class="bp-widget <?php bp_the_profile_group_slug(); ?>">


<?php global $current_user;
get_currentuserinfo(); ?>

								<div class="row">
				<div class="col-sm-6">
					<div class="widget">
						<div class="media innerB widget-head border-bottom bg-gray">
							<h5 class="innerAll pull-left margin-none">Descripción</h5>
						</div>
												<div class="widget-body">
<?php echo $descripcion= xprofile_get_field_data( 'descripcion');?>
																	</div>
				</div>
				</div>
				<div class="col-sm-6">
						<div class="widget">
							<div class="widget-head border-bottom bg-gray">
								<h5 class="innerAll pull-left margin-none">Información Básica</h5>
								<div class="pull-right">
									<a href="" class="text-muted">
										<i class="fa fa-pencil innerL"></i>
									</a>
								</div>
							</div>
							<div class="widget-body">
								<div class="row">
									<div class="col-sm-6">Usuario:</div>
									<div class="col-sm-6 text-right">
										<span class="label label-default"><?php bp_displayed_user_mentionname(); ?></span>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-6">Nombre Completo:</div>
									<div class="col-sm-6 text-right">
										<span class="label label-default">
											<?php echo $location= xprofile_get_field_data( 'Nombres');
											//fetch the location field for the displayed user ?>
										</span>
									</div>
								</div>
								<?php $count_friends =  friends_get_total_friend_count(); ?>
								<div class="row">
									<div class="col-sm-6">Amigos:</div>
									<div class="col-sm-6 text-right">
										<span class="label label-default"><?php echo $count_friends ?></span>
									</div>
								</div>
								<div class="row">

									<div class="col-sm-6">Registro:</div>
									<div class="col-sm-6 text-right">
										<span class="label label-default"><?php echo date("d M Y", strtotime(get_userdata(get_current_user_id( ))->user_registered)); ?></span>
									</div>
								</div>
							</div>
						</div>
						<div class="widget">
							<div class="widget-head border-bottom bg-gray">
								<h5 class="innerAll pull-left margin-none">Contacto</h5>
								<div class="pull-right">
								<?php $facebook= xprofile_get_field_data( 'facebook'); ?>
								<?php if (!empty($facebook)): ?>
									<a href="http://www.facebook.com/<?php echo $facebook; ?>" class="text-muted">
										<i class="fa fa-facebook innerL"></i>
									</a>
									<?php endif ?>
								<?php $tw= xprofile_get_field_data('twitter'); ?>
								<?php if (!empty($tw)): ?>
									<a href="http://www.twitter.com/<?php echo $tw; ?>" class="text-muted">
										<i class="fa fa-twitter innerL"></i>
									</a>
									<?php endif ?>
								<?php $yt= xprofile_get_field_data('youtube'); ?>
								<?php if (!empty($yt)): ?>
									<a href="http://www.youtube.com/<?php echo $yt; ?>" class="text-muted">
										<i class="fa fa-youtube innerL"></i>
									</a>
								<?php endif ?>
								</div>
							</div>
							<div class="widget-body padding-none">
								<?php $telefono= xprofile_get_field_data( 'telefono'); ?>
								<?php if (!empty($telefono)): ?>
								<div class="innerAll">
									<p class=" margin-none">
										<i class="fa fa-phone fa-fw text-muted"></i>
										 <?php echo $telefono; ?></p>
								</div>
								<?php endif ?>
								<div class="border-top innerAll">
									<p class=" margin-none"><i class="fa fa-envelope fa-fw text-muted"></i> 
										<?php echo $current_user->user_email ?></p>
								</div>
							<?php $web= xprofile_get_field_data( 'web'); ?>
								<?php if (!empty($web)): ?>
								<div class="border-top innerAll">
									<p class=" margin-none">
										<i class="fa fa-link fa-fw text-muted"></i> 
										<a href="<?php echo $web; ?>" target="_blank">Visitar website</a></p>
								</div>
								<?php endif ?>
							</div>
						</div>
				</div>
				
			</div>








<!--

			<div class="innerT">
				<div class="widget">
					<div class="widget-head border-bottom bg-gray">
									<h5 class="pull-left margin-none innerAll">Amigos <span class="text-muted">(<?php echo $count_friends ?>)</span></h5>
								<div class="pull-right">
									<a href="" class="text-muted">
										<i class="fa fa-eye innerL"></i>
									</a>
								</div>
							</div>
				
							<div class="widget-body margin-none">
								<div class="innerAll">
										<?php do_action( 'bp_before_directory_members_list' ); ?>
				<?php while ( bp_members() ) : bp_the_member(); ?>
					<a href="<?php bp_member_permalink() ?>" title="<?php bp_member_name() ?>">
							<?php bp_member_avatar('type=full&width=105&height=105'); ?></a>
								<?php endwhile; ?>														
										
								</div>
							</div>
				
				</div>
			</div>


-->





			</div>

			<?php do_action( 'bp_after_profile_field_content' ); ?>

		<?php endif; ?>

	<?php endwhile; ?>

	<?php do_action( 'bp_profile_field_buttons' ); ?>

<?php endif; ?>

<?php do_action( 'bp_after_profile_loop_content' ); ?>
