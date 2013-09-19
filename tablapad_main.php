<?php 
	/*
	Plugin Name: TablaPad
	Plugin URI: http://www.rishiverma.com/software/tablapad
	Description: Plugin to transform your WordPress blog into an intuitive Tabla Notebook
	Author: Rishi Verma
	Version: 0.1
	Author URI: http://www.rishiverma.com
	*/

	add_action('admin_menu', 'tablapad_admin_actions');

	function tablapad_admin_actions() {
		add_posts_page("TablaPad Composition", "New Tabla Composition", 1, 
			"tablapad_new_composition.php", "tablapad_new_composition");
	}

	function tablapad_new_composition() {
		include('tablapad_new_composition.php');
	}

?>