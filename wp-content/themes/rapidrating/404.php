<?php

//* Remove default loop
remove_action( 'genesis_loop', 'genesis_do_loop' );

add_action( 'genesis_loop', 'genesis_404' );
/**
 * This function outputs a 404 "Not Found" error message
 *
 * @since 1.6
 */
function genesis_404() {

	echo genesis_html5() ? '<article class="entry">' : '<div class="post hentry">';

		printf( '<h1 class="errors">%s</h1>', apply_filters( 'genesis_404_entry_title', __( 'OH! Looks like you are lost. Error 404', 'genesis' ) ) );
		echo '<div class="entry-content">';

			if ( genesis_html5() ) :

				echo apply_filters( 'genesis_404_entry_content', '<p>' . sprintf( __( 'The page you are looking for no longer exists or have been moved to different location. Perhaps you can return back to the site\'s <a href="%s">homepage</a> and see if you can find what you are looking for. Or, you can try finding it by using the search bar below.For further help <a href="http://www.probloggingways.com/contact-us">Contact Us</a>.', 'genesis' ), trailingslashit( home_url() ) ) . '</p>' );
					
				get_search_form();
				
//Recent Posts
echo '<br><h4>'; _e( 'Recent Posts from the Blog:', 'genesis' ); 
echo '</h4>';
echo '<ul>'; 
wp_get_archives( 'type=postbypost&limit=5' ); 
echo '</ul>';

//Categories
echo '<br><h4>'; _e( 'Site Categories:', 'genesis' ); 
echo '</h4>';
echo '<ul>'; 
wp_list_categories( 'sort_column=name&title_li=' );
echo '</ul>';
				


			else :
	?>

			<p><?php printf( __( 'The page you are looking for no longer exists or have been moved to different location. Perhaps you can return back to the site\'s <a href="%s">homepage</a> and see if you can find what you are looking for. Or, you can try finding it by using the search bar below.', 'genesis' ), trailingslashit( home_url() ) ); ?></p>
		





	<?php
			endif;

			if ( ! genesis_html5() ) {
				genesis_sitemap( 'h4' );
			} elseif ( genesis_a11y( '404-page' ) ) {
				echo '<h2>' . __( 'Sitemap', 'genesis' ) . '</h2>';
				genesis_sitemap( 'h3' );
			}

			echo '</div>';

		echo genesis_html5() ? '</article>' : '</div>';

}

genesis();
