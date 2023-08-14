<?php

$rid = $args['rid']; // Review ID

// Used in [affiliates_table]
$logo_aff_link         = true; // Say if the logo has the affiliate link or not
$show_counter          = true;
$show_rating           = true;
$show_table_sorting    = false;
$css_class             = '';
$data_sort_atts_output = '';

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

<div class="review-box" <?php echo wp_kses_post( $data_sort_atts_output ); ?> style="--theme-color: <?php echo esc_attr( poka_get_field( 'affiliate_background_color', $rid ) ); ?>">
	<div class="review-box-wrap">
		<?php
		$review_box_thumb_class = 'review-box-thumb';

		if ( $show_counter ) {
			$review_box_thumb_class .= ' review-box-thumb--counter';
		}

		?>
		<div class="<?php echo esc_attr( $review_box_thumb_class ); ?>">
			<?php echo wp_kses_post( poka_affiliate_thumb( $rid, array( 'link_review' ), $review_logo_class ) ); ?>
		</div><!-- /.review-box-thumb -->
		<div class="review-box-info">
			<div class="review-box-meta">
				<h3 class="review-box-name"><?php echo esc_attr( get_the_title( $rid ) ); ?></h3><!-- /.review-box-name -->
				<?php echo wp_kses_post( poka_affiliate_tag( $rid ) ); ?>

				<?php if ( $show_rating ) : ?>
				<div class="review-box-rating">
					<?php echo wp_kses_post( poka_affiliate_rating( $rid, array( 'rating_num' ) ) ); ?>
				</div><!-- /.review-box-rating -->
				<?php endif; ?>
			</div><!-- /.review-box-meta -->
			<div class="review-pros-cons">
				<ul class="review-pros">
					<?php
					poka_loop_field(
						'affiliate_pros',
						function( $sub ) {
							?>
						<li class="review-pro-item"><?php echo esc_attr( $sub['item'] ); ?></li>
							<?php
						},
						$rid
					);
					?>
				</ul>
				<ul class="review-cons">
					<?php
					poka_loop_field(
						'affiliate_cons',
						function( $sub ) {
							?>
						<li class="review-con-item"><?php echo esc_attr( $sub['item'] ); ?></li>
							<?php
						},
						$rid
					);
					?>
				</ul>
			</div>
		</div><!-- /.review-box-info -->
		<div class="review-box-actions review-box-actions--rounded">
			<?php echo wp_kses_post( poka_affiliate_bonus( $rid ) ); ?>
			<?php echo wp_kses_post( poka_affiliate_button( $rid, 'btn--full' ) ); ?>
			<div class="review-extra-links">
					<?php echo wp_kses_post( poka_affiliate_terms( $rid, 'review-extra-links-item' ) ); ?>
				<div class="review-extra-links-item">
				<?php echo wp_kses_post( poka_review_single_link( $rid ) ); ?>
				</div>
			</div>
		</div><!-- /.review-box-actions -->
	</div><!-- /.review-box-wrap -->
	<?php echo wp_kses_post( poka_affiliate_terms_text( $rid, 'review-box-disclaimer text-center' ) ); ?>
</div><!-- /.review-box -->
