<?php
/**
* Rapid Ratings Custom Taxonomies
*
* Additional custom taxonomies can be defined here
* http://codex.wordpress.org/Function_Reference/register_taxonomy
*/


if(!function_exists('add_action')){
	echo 'Unable to access file';
	exit;
}

if ( !class_exists( 'ParentTaxonomyClass' ) ) {


	class ParentTaxonomyClass{

		/* Store all add_action functions */
		function __construct() {
			add_action( 'admin_enqueue_scripts', array( $this, 'register' ) );
		}

		function register() {
			add_action( 'init', array( $this, 'mediaPress' ) );
			
		}

		/*** Media Press Custom Taxonomy ***/
		function mediaPress(){

			$singular = 'Media Press Taxonomy';
			$plural = 'Media Press Taxonomy';

			$labels = array(
				'name'              => _x( $plural, 'taxonomy general name' ),
				'singular_name'     => _x( $singular, 'taxonomy singular name' ),
				'search_items'      => __( 'Search' . $plural ),
				'all_items'         => __( 'All ' . $plural ),
				'parent_item'       => __( 'Parent' . $singular ),
				'parent_item_colon' => __( 'Parent' . $singular . ':' ),
				'edit_item'         => __( 'Edit' . $plural ),
				'update_item'       => __( 'Update' . $plural),
				'add_new_item'      => __( 'Add New' . $singular ),
				'new_item_name'     => __( 'New' . $singular ),
				'menu_name'         => __( $singular ),
			);

			$args = array(
				'label' 				=> $singular,
				'description' 			=> $plural . 'Section',
				'labels' 				=> $labels,
				'query_var' 			=> true,
				'show_ui'				=> true,
				'show_admin_column'		=> true,
				'rewrite'		=> array('slug' => 'media_press_type'),
				'hierarchical' 			=> true
			);

			register_taxonomy('media_press_type', array('post'), $args);
		}



	}//ParentTaxonomyClass
	$parentTaxonomyClass = new ParentTaxonomyClass();
	$parentTaxonomyClass->register();
}

?>