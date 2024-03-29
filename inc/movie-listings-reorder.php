<?php

function ml_add_submenu_page() {
	add_submenu_page(
		'edit.php?post_type=movie_listing',
		__('Custom Order'),
		__('Custom Order'),
		'manage_options',
		'custom-order',
		'ml_reorder_movies_callback'
	);
}

add_action('admin_menu', 'ml_add_submenu_page');

function ml_reorder_movies_callback() {
	$args = array(
		'post_type'					=> 'movie_listing',
		'orderby'					=> 'menu_order',
		'order'						=> 'ASC',
		'post_status'				=> 'publish',
		'no_found_rows'				=> true,
		'update_post_term_cache'	=> false,
		'posts_per_page'			=> 50
	);

	$movie_listing = new WP_Query($args);

	?>
	<div id="movie-sort" class="wrap">
		<h2><?php esc_html_e('Sort Movie Listings', 'ml-domain'); ?><img src="<?php echo esc_url(admin_url() . '/images/loading.gif'); ?>" class="loading"></h2>
		<div class="order-save-msg updated"><?php esc_html_e('Listing Order Saved'); ?></div>
		<div class="order-save-err error"><?php esc_html_e('Something Went Wrong'); ?></div>
		<?php if($movie_listing->have_posts()) : $movie_listing->the_post(); ?>
			<ul class="movie-sort-list">
				<?php while ($movie_listing->have_posts()) : $movie_listing->the_post(); ?>
					<li id="<?php esc_attr(the_id()); ?>">
						<?php esc_html(the_title()); ?>
					</li>
				<?php endwhile; ?>
			</ul>
		<?php else : ?>
			<p><?php esc_html_e('No Movies To List'); ?></p>
		<?php endif; ?>
	</div>
	<?php
}