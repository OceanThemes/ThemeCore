

<!-- Note: change otcore_get_option() -> theme-name_get_option()  -->
<?php if ( otcore_get_option('social_switch') != false ){  ?>
	<!-- social icons -->
	<div class="social">
		<?php $socials = otcore_get_option( 'header_socials', array() ); ?>
		<?php foreach ( $socials as $social ) { ?>                                  
			<a href="<?php echo esc_url($social['social_link']); ?>" target="<?php echo esc_attr( otcore_get_option( 'social_target_link' ) ); ?>" ><i class="fa fa-<?php echo esc_attr($social['social_icon']); ?>"></i></a>                            
		<?php } ?> 
	</div>
	<!-- social icons close -->
<?php } ?>
