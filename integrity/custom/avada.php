<?php 
	// add the tagline next to the logo 
	add_action('avada_logo_append', 'reach_site_tagline', 10);
	function reach_site_tagline() {
		$html_out = '';
		$html_out .= '<div class="reach_site_title_wrapper">';
		$html_out .= 	'<h2 class="reach_site_title">';
		$html_out .= 		'<a href="'.site_url().'">';
		//$html_out .= 			get_bloginfo('name', 'raw');
		$html_out .= 			'<div class="title_top">Integrity</div><div class="title_bottom">Hospital Company</div>';
		$html_out .= 		'</a>';
		$html_out .= 	"</h2>";
		$html_out .= '</div>';
		echo $html_out;
	}

/*  over-ride the avada_logo function 
 *    dont logo-link to div (instead of <a>)
*/
if ( ! function_exists( 'avada_logo' ) ) {
	function avada_logo() {
		/**
		 * No need to proceed any further if no logo is set
		 */
		if ( '' == Avada()->settings->get( 'logo' ) && '' == Avada()->settings->get( 'logo_retina' ) ) {
			return;
		}
		?>

		<div class="fusion-logo" data-margin-top="<?php echo intval( Avada()->settings->get( 'margin_logo_top' ) ); ?>px" data-margin-bottom="<?php echo intval( Avada()->settings->get( 'margin_logo_bottom' ) ); ?>px" data-margin-left="<?php echo intval( Avada()->settings->get( 'margin_logo_left' ) ); ?>px" data-margin-right="<?php echo intval( Avada()->settings->get( 'margin_logo_right' ) ); ?>px">
			<?php
			/**
			 * avada_logo_prepend hook
			 */
			do_action( 'avada_logo_prepend' );
			?>
			<?php if ( Avada()->settings->get( 'logo' ) ) : ?>
				<div class="fusion-logo-link">
					<?php $logo_url = Avada_Sanitize::get_url_with_correct_scheme( Avada()->settings->get( 'logo' ) ); ?>

					<?php if ( Avada()->settings->get( 'retina_logo_width' ) && Avada()->settings->get( 'retina_logo_height' ) ) : ?>
						<?php $logo_size['width']  = fusion_strip_unit( Avada()->settings->get( 'retina_logo_width' ) ); ?>
						<?php $logo_size['height'] = fusion_strip_unit( Avada()->settings->get( 'retina_logo_height' ) ); ?>
					<?php else : ?>
						<?php $logo_size['width']  = ''; ?>
						<?php $logo_size['height'] = ''; ?>
					<?php endif; ?>

					<img src="<?php echo $logo_url; ?>" width="<?php echo $logo_size['width']; ?>" height="<?php echo $logo_size['height']; ?>" alt="<?php bloginfo( 'name' ); ?>" class="fusion-logo-1x fusion-standard-logo" />
					<?php $retina_logo = Avada()->settings->get( 'logo_retina' ); ?>
					<?php if ( $retina_logo ) : ?>
						<?php $retina_logo = Avada_Sanitize::get_url_with_correct_scheme( $retina_logo ); ?>
						<?php $style = 'style="max-height: ' . $logo_size['height'] . 'px; height: auto;"'; ?>
						<img src="<?php echo $retina_logo; ?>" width="<?php echo $logo_size['width']; ?>" height="<?php echo $logo_size['height']; ?>" alt="<?php bloginfo('name'); ?>" <?php echo $style; ?> class="fusion-standard-logo fusion-logo-2x" />
					<?php else: ?>
						<img src="<?php echo $logo_url; ?>" width="<?php echo $logo_size['width']; ?>" height="<?php echo $logo_size['height']; ?>" alt="<?php bloginfo('name'); ?>" class="fusion-standard-logo fusion-logo-2x" />
					<?php endif; ?>

					<!-- mobile logo -->
					<?php if ( Avada()->settings->get( 'mobile_logo' ) ) : ?>
						<?php $mobile_logo = Avada_Sanitize::get_url_with_correct_scheme( Avada()->settings->get( 'mobile_logo' ) ); ?>

						<img src="<?php echo $mobile_logo; ?>" alt="<?php bloginfo( 'name' ); ?>" class="fusion-logo-1x fusion-mobile-logo-1x" />

						<?php $retina_logo = Avada()->settings->get( 'mobile_logo_retina' ); ?>
						<?php if ( $retina_logo ) : ?>
							<?php $retina_logo = Avada_Sanitize::get_url_with_correct_scheme( $retina_logo ); ?>
							<?php if ( Avada()->settings->get( 'mobile_retina_logo_width' ) && Avada()->settings->get( 'mobile_retina_logo_height' ) ) : ?>
								<?php $logo_size['width']  = fusion_strip_unit( Avada()->settings->get( 'mobile_retina_logo_width' ) ); ?>
								<?php $logo_size['height'] = fusion_strip_unit( Avada()->settings->get( 'mobile_retina_logo_height' ) ); ?>
							<?php else : ?>
								<?php $logo_size['width']  = ''; ?>
								<?php $logo_size['height'] = ''; ?>
							<?php endif; ?>
							<?php $style = 'style="max-height: ' . $logo_size['height'] . 'px; height: auto;"'; ?>

							<img src="<?php echo $retina_logo; ?>" alt="<?php bloginfo('name'); ?>" <?php echo $style; ?> class="fusion-logo-2x fusion-mobile-logo-2x" />
						<?php else: ?>
							<img src="<?php echo Avada()->settings->get( 'mobile_logo' ); ?>" alt="<?php bloginfo( 'name' ); ?>" class="fusion-logo-2x fusion-mobile-logo-2x" />
						<?php endif; ?>
					<?php endif; ?>

					<!-- sticky header logo -->
					<?php if ( Avada()->settings->get( 'sticky_header_logo' ) && ( in_array( Avada()->settings->get( 'header_layout' ), array( 'v1', 'v2', 'v3' ) ) || ( ( in_array( Avada()->settings->get( 'header_layout' ), array( 'v4', 'v5' ) ) && Avada()->settings->get( 'header_sticky_type2_layout' ) == 'menu_and_logo' ) ) ) ) : ?>
						<?php $sticky_logo = Avada_Sanitize::get_url_with_correct_scheme( Avada()->settings->get( 'sticky_header_logo' ) ); ?>
						<img src="<?php echo $sticky_logo; ?>" alt="<?php bloginfo( 'name' ); ?>" class="fusion-logo-1x fusion-sticky-logo-1x" />
						<?php $retina_logo = Avada()->settings->get( 'sticky_header_logo_retina' ); ?>
						<?php if ( $retina_logo ) : ?>
							<?php $retina_logo = Avada_Sanitize::get_url_with_correct_scheme( $retina_logo ); ?>
							<?php if ( Avada()->settings->get( 'sticky_retina_logo_width' ) && Avada()->settings->get( 'sticky_retina_logo_height' ) ) : ?>
								<?php $logo_size['width']  = fusion_strip_unit( Avada()->settings->get( 'sticky_retina_logo_width' ) ); ?>
								<?php $logo_size['height'] = fusion_strip_unit( Avada()->settings->get( 'sticky_retina_logo_height' ) ); ?>
							<?php else : ?>
								<?php $logo_size['width']  = ''; ?>
								<?php $logo_size['height'] = ''; ?>
							<?php endif; ?>
							<?php $style = 'style="max-height: ' . $logo_size['height'] . 'px; height: auto;"'; ?>

							<img src="<?php echo $retina_logo; ?>" alt="<?php bloginfo('name'); ?>" <?php echo $style; ?> class="fusion-logo-2x fusion-sticky-logo-2x" />
						<?php else : ?>
							<img src="<?php echo $sticky_logo; ?>" alt="<?php bloginfo( 'name' ); ?>" class="fusion-logo-2x fusion-sticky-logo-2x" />
						<?php endif; ?>
					<?php endif; ?>
				</div>
			<?php endif; ?>
			<?php
			/**
			 * avada_logo_append hook
			 * @hooked avada_header_content_3 - 10
			 */
			do_action( 'avada_logo_append' );
			?>
		</div>
		<?php
	}
}



