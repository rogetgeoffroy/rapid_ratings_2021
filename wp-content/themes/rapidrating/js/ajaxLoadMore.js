function blog_scripts() {
  // Register the script
  wp_register_script( 'custom-script', get_stylesheet_directory_uri(). '/js/custom.js', array('jquery'), false, true );

  // Localize the script with new data
  $script_data_array = array(
      'ajaxurl' => admin_url( 'admin-ajax.php' ),
      'security' => wp_create_nonce( 'load_more_posts' ),
  );
  wp_localize_script( 'custom-script', 'blog', $script_data_array );

  // Enqueued script with localized data.
  wp_enqueue_script( 'custom-script' );
}
add_action( 'wp_enqueue_scripts', 'blog_scripts' );