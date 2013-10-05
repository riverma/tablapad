<?php 
	/*
	Plugin Name: TablaPad
	Plugin URI: http://www.rishiverma.com/software/tablapad
	Description: Plugin to transform your WordPress blog into an intuitive Tabla Notebook
	Author: Rishi Verma
	Version: 0.1
	Author URI: http://www.rishiverma.com
	*/

	define( 'WPS_BASE_URL', plugin_dir_url( __FILE__ ) );


	add_shortcode('tabla', 'tabla_shortcode_handler');

	wp_enqueue_style('tabla-styles', WPS_BASE_URL . 'css/tabla-styles.css');
	
	function tabla_shortcode_handler($attributes, $content) {

		// set/gather attributes
		$attributes = shortcode_atts( array(
			'hindi' => 'false'), $attributes);

		// clean up content
		$content = preg_replace('/<[^>]*>/', '', $content); //remove HTML
		
		if ($attributes['hindi'] == 'true') {
			// do hindi replacement
		} else {

			// identify boles
			$content = preg_replace('/\./', ' | ', $content); // convert end of line markers
			$boles = explode(' ', $content); 

			// transform boles
			$transformed_boles = array();
			foreach ($boles as &$bole) {
				error_log($bole);

				// capitalize each bole
				$bole = ucwords($bole);

				// add transformed bole to array
				array_push($transformed_boles, $bole);
			}
			
			// re-combine transformed boles to a single string
			$content = implode(' ', $transformed_boles);
		}

		// add HTML <p> and <br> markers
		$content = wpautop($content, true);

		$content = "<div class='tabla_composition'>" . $content . "</div>";
		error_log("Content: [" . $content . "]");

		return $content;
	}
?>