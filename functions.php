<?php

function lightbox_for_images() {
    wp_enqueue_script( 'fancybox', get_template_directory_uri() . '/lightbox/js/jquery.fancybox.pack.js', array( 'jquery' ), false, true );
    wp_enqueue_script( 'lightbox', get_template_directory_uri() . '/lightbox/js/lightbox.js', array( 'fancybox' ), false, true );
    wp_enqueue_style( 'lightbox-style', get_template_directory_uri() . '/lightbox/css/jquery.fancybox.css' );
}
add_action( 'wp_enqueue_scripts', 'lightbox_for_images' );

add_action('add_meta_boxes', 'custom_add_meta_box');

function custom_add_meta_box() {
	add_meta_box(
		'portfolio_details',		
		'Portfolio Entry Details',	
		'custom_display_meta_box',	
		'post',						
		'normal'					
	);
}

function custom_display_meta_box($post) {
	$portfolio_description = get_post_meta($post->ID, 'portfolio_description', true);
	
	wp_nonce_field('portfolio_meta_nonce', 'portfolio_nonce');
		
	?>
	
	<p>
		<label for="portfolio_description">Project Description:</label>
		<textarea class="widefat" name="portfolio_description" id="portfolio_description" cols="30" rows="10"><?php echo $portfolio_description; ?></textarea>
	</p>	
	
	<?php
}

add_action('save_post', 'custom_save_portfolio_details');

function custom_save_portfolio_details($post_id) {
	
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;	
	
	if (!isset($_POST['portfolio_nonce']) || !wp_verify_nonce($_POST['portfolio_nonce'], 'portfolio_meta_nonce')) return;
		
	if (isset($_POST['portfolio_description']) && $_POST['portfolio_description'] != '') {
		update_post_meta($post_id, 'portfolio_description', esc_html($_POST['portfolio_description']));
	}
	if (isset($_POST['portfolio_link']) && $_POST['portfolio_link'] != '') {
		update_post_meta($post_id, 'portfolio_link', esc_url($_POST['portfolio_link']));
	}
	if (isset($_POST['portfolio_quote']) && $_POST['portfolio_quote'] != '') {
		update_post_meta($post_id, 'portfolio_quote', esc_html($_POST['portfolio_quote']));
	}
	if (isset($_POST['portfolio_quote_author']) && $_POST['portfolio_quote_author'] != '') {
		update_post_meta($post_id, 'portfolio_quote_author', esc_html($_POST['portfolio_quote_author']));
	}
}
?>








