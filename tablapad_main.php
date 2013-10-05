<?php 
	/*
	Plugin Name: TablaPad
	Plugin URI: http://www.rishiverma.com/software/tablapad
	Description: Plugin to transform your WordPress blog into an intuitive Tabla Notebook
	Author: Rishi Verma
	Version: 0.1
	Author URI: http://www.rishiverma.com
	*/

	// CONSTANTS
	define( 'WPS_BASE_URL', plugin_dir_url( __FILE__ ) );

	// IMPORTS
	wp_enqueue_style('tablapad-styles', WPS_BASE_URL . 'css/tablapad-styles.css');
	wp_enqueue_style('google-fonts-indieflower', 
		'http://fonts.googleapis.com/css?family=Indie+Flower');

	// HANDLERS
	add_shortcode('tabla', 'tabla_shortcode_handler');

	/* Handles the [tabla] shortcode. 
		 Some key operations are listed:
		 	- capitalize each bole within the block
		 	- beautify the font within the block
		 	- add a div border and background to the block
	*/
	function tabla_shortcode_handler($attributes, $content) {

		// (todo: enable configuration from a settings page)

		// clean up content
		$content = preg_replace('/<[^>]*>/', '', $content); //remove HTML tags
		
		// identify boles
		$content = preg_replace('/\./', ' | ', $content); // convert end of line markers
		$boles = explode(' ', $content); 

		// transform boles
		$transformed_boles = array();
		foreach ($boles as &$bole) {

			$bole = ucwords($bole);

			array_push($transformed_boles, $bole);
		}
		
		$content = implode(' ', $transformed_boles);
	
		// add HTML <p> and <br> markers
		$content = wpautop($content, true);

		// for CSS styling
		$content = "<div class='tabla_composition'>" . $content . "</div>";

		return $content;
	}
?>