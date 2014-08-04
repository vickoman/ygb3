<?php get_header( 'buddypress' ); ?>
<?php get_sidebar( 'buddypress' ); ?>
	<div class="col-lg-9 col-md-8">
		<div class="padder">
			<!-- You are blocked! Template -->
			<div id="buddypress">
				<p>&nbsp;</p>
				<h1 style="text-align:center;"><?php _e( 'Perfil Bloqueado', 'bpblock' ); ?></h1>
				<h2 style="text-align:center;"><?php _e( 'Tu has seleccionado bloquear este perfil', 'bpblock' ); ?></h2>
				<p style="text-align:center;"><a href="<?php echo bp_loggedin_user_domain() . 'settings/blocked/'; ?>" class="button button-large"><?php _e( 'Administrar usuarios bloqueados', 'bpblock' ); ?></a><br /><br /><br /><br /><br /></p>
			</div>
		</div>
	</div>


<?php get_footer( 'buddypress' ); ?>
