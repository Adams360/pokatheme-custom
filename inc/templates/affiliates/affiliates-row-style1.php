<?php

$rid = $args['rid']; // Review ID

// Used in [affiliates_table]
$logo_aff_link         = true; // Say if the logo has the affiliate link or not
$show_counter          = true;
$show_rating           = true;
$show_table_sorting    = false;
$css_class             = '';
$data_sort_atts_output = '';

$review_box_class = '';

if ($show_counter) {
	$review_box_class .= 'review-box--counter';
}

if ( $args && isset( $args['logo_aff_link'] ) ) {
	$logo_aff_link = $args['logo_aff_link'];
}

if ( $args && isset( $args['show_counter'] ) ) {
	$show_counter = $args['show_counter'];
}

if ( $args && isset( $args['show_rating'] ) ) {
	$show_rating = $args['show_rating'];
}

if ( $args && isset( $args['show_table_sorting'] ) ) {
	$show_table_sorting = $args['show_table_sorting'];
}

if ( $show_table_sorting ) {
	$data_sort_atts = array(
		'data-sort-name'   => get_the_title( $rid ),
		'data-sort-rating' => poka_affiliate_rating_number( $rid ),
		'data-sort-date'   => get_the_date( 'c', $rid ),
	);

	foreach ( $data_sort_atts as $key => $value ) {
		$data_sort_atts_output .= " ${key}='${value}'";
	}
}
?>


<div class="review-box <?php echo esc_attr( $review_box_class ); ?>" <?php echo wp_kses_post( $data_sort_atts_output ); ?>
		<?php
			$review_logo_class      = '';

			if ( ! $logo_aff_link ) {
				$review_logo_class = ' review-logo--disabled';
			}
		?>

		<!-- review-box__thumbnail -->
		<div class="review-box__thumbnail">
			<?php echo wp_kses_post( poka_affiliate_thumb( $rid, array( 'link_review' ), $review_logo_class ) ); ?>
		</div><!-- /.review-box__thumbnail -->

		<div class="review-box__title">
			<p><?php echo wp_kses_post( custom_affiliate_bonus( $rid ) ); ?></p>
		</div>

		<div class="review-box__cta">
			<?php echo wp_kses_post( custom_affiliate_button( $rid ) ); ?>
		</div>

		<div class="review-box__benefits">
			<ul>
				<?php
				$counter = 0; // Added a counter to keep track of the number of items
				poka_loop_field(
					'affiliate_pros',
					function( $sub ) use (&$counter) { // Used the counter by reference
						if ( $counter < 2 ) { // Checkd if the counter is less than 2
							?>
							<li><?php echo esc_attr( $sub['item'] ); ?></li>
							<?php
							$counter++; // Incremented the counter
						}
					},
					$rid
				);
			?>
			</ul>
		</div>

		<div class="review-box__info">
			<p>Withdrawal Time: <span>1 min - 7 days</span></p>
			<p>Minimum deposit: <span>Minimum deposit: €20</span></p>
		</div>

		<div class="review-box__toggle">
			<button aria-expanded="false" aria-controls="expand-content">
				<span>Show</span> T&C
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/toggle-arrow.svg" alt="">
			</button>
		</div>

		<div class="review-box__expand" id="expand-content" aria-hidden="true">
			<?php echo custom_affiliate_terms_text($rid); ?>
		</div>
		<div class="review-box__data-1">
			<span>
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/flag-il.svg" alt="">
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/icon-check.svg" alt="">
			</span>
				<h3><?php echo esc_attr( get_the_title( $rid ) ); ?></h3>

		</div>
		<div class="review-box__data-2">
			<?php if ( $show_rating ) : ?>
				<div class="review-box-rating">
					<?php echo wp_kses_post( custom_affiliate_rating( $rid, array( 'rating_num' ) ) ); ?>
				</div><!-- /.review-box-rating -->
			<?php endif; ?>
			<?php echo wp_kses_post( custom_review_single_link( $rid ) ); ?>
		</div>
</div>