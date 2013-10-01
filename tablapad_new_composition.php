<?php

	// THROW AWAY CODE
	$test_post_array = array(
		'post_content' => 'This is a test post 2',
		'post_status' => 'publish',
		'post_title' => 'Auto created post 2 title',
		'post_type' => 'post');
  // --

	// gather categories and tag information
	$taal_category_id = term_exists('Rupak');
	$tags = 'rupak, kaida, deri';

	// insert tablapad post
	$post_id = wp_insert_post($test_post_array, $wp_error);
	wp_set_post_terms($post_id, $tags);
	wp_set_post_terms($post_id, array($taal_category_id));

	if (empty($wp_error)) {
		echo "Post [" . $test_post_array['post_title'] . "] successfully reached " . 
			$test_post_array['post_status'] . " status.";
	} else {
		echo "ERROR: " . $wp_error;
	}

?>