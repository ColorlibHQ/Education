<div class="container">
	<div class="row">
		<?php 
		// Footer Widget Start

		// Footer widget 1
		if( is_active_sidebar( 'footer-1' ) ) {
			echo '<div class="col-lg-2 col-md-6 col-sm-6"><div class="single-footer-widget">';
				dynamic_sidebar( 'footer-1' );
			echo '</div></div>';
		}

		// Footer widget 2
		if( is_active_sidebar( 'footer-2' ) ) {
			echo '<div class="col-lg-2 col-md-6 col-sm-6"><div class="single-footer-widget">';
				dynamic_sidebar( 'footer-2' );
			echo '</div></div>';
		}

		// Footer widget 3
		if( is_active_sidebar( 'footer-3' ) ) {
			echo '<div class="col-lg-2 col-md-6 col-sm-6"><div class="single-footer-widget">';
				dynamic_sidebar( 'footer-3' );
			echo '</div></div>';
		}

		// Footer widget 4
		if( is_active_sidebar( 'footer-4' ) ) {
			echo '<div class="col-lg-2 col-md-6 col-sm-6"><div class="single-footer-widget">';
				dynamic_sidebar( 'footer-4' );
			echo '</div></div>';
		}
		// Footer widget 5
		if( is_active_sidebar( 'footer-5' ) ) {
			echo '<div class="col-lg-4  col-md-6 col-sm-6"><div class="single-footer-widget">';
				dynamic_sidebar( 'footer-5' );
			echo '</div></div>';
		}
				
		?>
	</div>
</div>