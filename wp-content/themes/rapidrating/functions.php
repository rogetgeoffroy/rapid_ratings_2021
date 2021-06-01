<?php

/**
 * @category Genesis
 * @package  Templates
 * @author   Usama Fayyaz
 * @link     https://www.fiverr.com/usamafayyaz99
 */

// Start the engine
require_once( get_template_directory() . '/lib/init.php' );
add_theme_support( 'html5' );
add_theme_support( 'genesis-responsive-viewport' );


//Scripts & Styles
function wpdocs_theme_name_scripts() {
  if (!is_admin()) {	
        //JS Files  
        wp_enqueue_script( 'Combined-JS', get_stylesheet_directory_uri() .'/js/combinedjs.js', array( 'jquery' ),null, true );
        //Font Awesome
        wp_enqueue_style( 'Font-Awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css',array(),null,'all');
        //Google Fonts
        wp_enqueue_style( 'Google-Fonts', 'https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600&display=swap',array(),null,'all');
        
        //Slick Slider
        wp_enqueue_style('slick_stylesheet', get_theme_file_uri('/slick/slick.css'), array(), NULL, false);
        wp_enqueue_style('slick_theme', get_theme_file_uri('/slick/slick-theme.css'), array('slick_stylesheet'), NULL, false);
        
        //Google jQuery Library
        wp_deregister_script('jquery');
        wp_register_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js',array(),null, false);
        wp_enqueue_script('jquery');
        wp_enqueue_script( 'custom-script', get_stylesheet_directory_uri(). '/js/custom.js', array('jquery'), null, true );

        wp_enqueue_script('slick_script', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', array('jquery'), '1.8.1', true);
        wp_enqueue_script('slick_init', get_theme_file_uri('/js/slick-init.js'), array('slick_script'), NULL, true);

        wp_enqueue_script('angular_script', 'https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.3.14/angular.min.js', array(), null, true);

        //Bootstrap Script
        wp_enqueue_style( 'bootstrap-cdn-css', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' );
        wp_enqueue_script( 'bootstrap-cdn-js', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js' );    
    }
}
add_action( 'wp_enqueue_scripts', 'wpdocs_theme_name_scripts' );


//Login Logo URL
add_filter( 'login_headerurl', 'custom_loginlogo_url' );
function custom_loginlogo_url($url) {
	return home_url();
}

//Change the Read More on an excerpt for a post
function genesischild_read_more_link() {
	return '...<a href="' . get_permalink() . '" class="more-link" title="Read More" >Read More <i class="fa fa-chevron-circle-right" aria-hidden="true"></i></a>';
}

add_filter( 'excerpt_more', 'genesischild_read_more_link' );

//Read More Button for Manual Exerpt
function manual_excerpt_more( $excerpt ) {
	$excerpt_more = '';
	if( has_excerpt() ) {
    	$excerpt_more = '...<a href="' . get_permalink() . '" class="more-link" title="Read More" >Read More <i class="fa fa-chevron-circle-right" aria-hidden="true"></i></a>';
	}
	return $excerpt . $excerpt_more;
}
add_filter( 'get_the_excerpt', 'manual_excerpt_more' );

//* Modify the length of post excerpts
add_filter( 'excerpt_length', 'sp_excerpt_length' );
function sp_excerpt_length( $length ) {
	return 30; // pull first 50 words
}

//* Add support for 4-column footer widgets
add_theme_support( 'genesis-footer-widgets', 4 );

//Extra Widget Area[footer]
function genesischild_footerwidgetheader() {
	genesis_register_sidebar( array(
	'id' => 'footerwidgetheader',
	'name' => __( 'Footer Widget Header', 'genesis' ),
	'description' => __( 'This is for the Footer Widget Headline', 'genesis' ),
	) );

}

add_action ('widgets_init','genesischild_footerwidgetheader');

//Position Footer Widget Header
function genesischild_footerwidgetheader_position ()  {
	echo '<div class="footerwidgetheader-container"><div class="wrap">';
	genesis_widget_area ('footerwidgetheader');
	echo '</div></div>';

}

add_action ('genesis_before_footer','genesischild_footerwidgetheader_position', 5 );

// Add To Top button
add_action( 'genesis_before', 'genesis_to_top');
	function genesis_to_top() {
	 echo '<a href="#" class="to-top" title="Back To Top"><i class="top-icon fa fa-chevron-up" aria-hidden="true"></i></a>';
}
//Next-Previous Posts
function custom_post_navigation(){
if( is_single( '' ) ) {	
?>

    <div class="adjacent-entry-pagination pagination">
        <div class="pagination-previous alignleft">
		<?php
$previous_post = get_previous_post();
if (!empty( $previous_post )): ?>
		 <p class="pag-prev">Previous Post</p>
		 <?php endif; ?>
		 
		 <?php previous_post_link('%link', '%title'); ?>
         </div>
        <div class="pagination-next alignright">
		<?php
$next_post = get_next_post();
if (!empty( $next_post )): ?>
            <p class="pag-next">Next Post</p>
			<?php endif; ?>
			
			<?php next_post_link('%link', '%title'); ?>
        </div>
    </div>
<?php
}
}

add_action('genesis_after_entry_content', 'custom_post_navigation',2);

//Hide Login Errors
add_filter('login_errors',create_function('$a', "return null;"));



/*Custom Login Logo*/
function custom_loginlogo() {

echo '<style type="text/css">
h1 a 
{
	background-image: url('.get_bloginfo('stylesheet_directory').'/images/logo.png) !important;
    background-size: contain !important;
    width: 100% !important;
    height: 100px !important;
    border-radius: 5px;

	}
body, html {
 background: url('.get_bloginfo('stylesheet_directory').'/images/background.png) #333; !important;
 background-size:cover !important;
}
   .login form {
    background: transparent !important;
    -webkit-box-shadow: none !important;
    box-shadow: none !important;
	border:0px !important;
}
.login h1 a{
	    background-position: center !important;
    background-repeat: no-repeat !important;
    color: #444 !important;
    text-indent: -9999px !important;
    display: block !important;
}
#login {
    padding: 20% 0 0 !important;
}
.wp-core-ui .button-primary {
    background: #000 !important;
    border-color: #000 !important;
    -webkit-box-shadow: none !important;
    box-shadow: none !important;
    color: #fff !important;
    text-decoration: none !important;
    text-shadow: none !important;
	-webkit-transition-property: background color; -webkit-transition-duration: 0.3s; -webkit-transition-timing-function: ease-out; 
-moz-transition-property: background color; -moz-transition-duration: 0.3s; -moz-transition-timing-function: ease-out; 
-o-transition-property: background color; -o-transition-duration: 0.3s; -o-transition-timing-function: ease-out; 
transition-property: background color; transition-duration: 0.3s; transition-timing-function: ease-out; 
}
.wp-core-ui .button-primary.focus, .wp-core-ui .button-primary.hover, .wp-core-ui .button-primary:focus, .wp-core-ui .button-primary:hover {
    background: #00838f !important;
    border-color: #00838f !important;
    color: #fff !important;
}
input[type=checkbox]:checked:before {
    color: #2c3644 !important;
}
.login label {
    color: #fff;
}
.login #backtoblog a:hover, .login #nav a:hover, .login h1 a:hover {
    color: #00838f;
}
.wp-core-ui .button, .wp-core-ui .button-secondary {
    color: #00838f;
}
</style>';
}
add_action('login_head', 'custom_loginlogo');

/*Remove Wordpress Version*/
remove_action('wp_head', 'wp_generator');


//Author Avatar(Image) in Entry Meta
function wpsites_post_author_avatars() {
  if (!is_page()) {
    echo get_avatar(get_the_author_meta('ID'), 45);
  }
}

add_action('genesis_entry_header', 'wpsites_post_author_avatars');


//Socialisng author box

//Change Default Method Contacts in User Profile
function themeprefix_modify_user_contact_methods( $user_contact ){
  /* Add user contact methods */
  $user_contact['pinterest'] = __( 'Pinterest URL' );
  $user_contact['linkedin'] = __( 'LinkedIn URL' );
  $user_contact['instagram'] = __( 'Instagram URL' );
  $user_contact['youtube'] = __( 'Youtube URL' ); 
  $user_contact['github'] = __( 'Github URL' ); 
  $user_contact['contact'] = __( 'Contact URL' ); 
  /* Remove user contact methods */
  unset($user_contact['aim']);
  unset($user_contact['jabber']);
  unset($user_contact['yim']);
  return $user_contact;
}
add_filter( 'user_contactmethods', 'themeprefix_modify_user_contact_methods' );
//Create New Author Box
function themeprefix_alt_author_box() {
    if( is_single( '' ) ) {
//author box code goes here
			?>
	   		<div class="author-box"><?php echo get_avatar( get_the_author_meta( 'ID' ), '100' ); ?> 
                <div class="about-author"><h4>About <a rel="author" href="<?php echo get_author_posts_url(  get_the_author_meta( 'ID' )); ?>"><?php echo  get_the_author(); ?></a>
				</h4><p><?php echo get_the_author_meta( 'description' ); ?> 
            </div>
                <ul class="social-links">
                <?php if ( get_the_author_meta( 'facebook' ) != '' ): ?>
                    <li><a rel="nofollow" target="_blank" href="<?php echo get_the_author_meta( 'facebook' ); ?>"><i class="fa fa-facebook fa-fw" aria-hidden="true"></i></a></li>
                <?php endif; ?>
                
                <?php if ( get_the_author_meta( 'twitter' ) != '' ): ?>
                    <li><a rel="nofollow" target="_blank" href="https://twitter.com/<?php echo get_the_author_meta( 'twitter' ); ?>"><i class="fa fa-twitter fa-fw" aria-hidden="true"></i></a></li>
                <?php endif; ?>
                
				
				<?php if ( get_the_author_meta( 'youtube' ) != '' ): ?>
                    <li><a rel="nofollow" target="_blank" href="<?php echo get_the_author_meta( 'youtube' ); ?>"><i class="fa fa-youtube-play fa-fw" aria-hidden="true"></i></a></li>
                <?php endif; ?>
				
				<?php if ( get_the_author_meta( 'instagram' ) != '' ): ?>
                    <li><a rel="nofollow" target="_blank" href="<?php echo get_the_author_meta( 'instagram' ); ?>"><i class="fa fa-instagram fa-fw" aria-hidden="true"></i></a></li>
                <?php endif; ?>
				
				<?php if ( get_the_author_meta( 'pinterest' ) != '' ): ?>
                    <li><a rel="nofollow" target="_blank" href="<?php echo get_the_author_meta( 'pinterest' ); ?>"><i class="fa fa-pinterest-p fa-fw" aria-hidden="true"></i></a></li>
                <?php endif; ?>
				
				<?php if ( get_the_author_meta( 'linkedin' ) != '' ): ?>
                    <li><a rel="nofollow" target="_blank" href="<?php echo get_the_author_meta( 'linkedin' ); ?>"><i class="fa fa-linkedin fa-fw" aria-hidden="true"></i></a></li>
                <?php endif; ?>
                
                
                <?php if ( get_the_author_meta( 'github' ) != '' ): ?>
                    <li><a rel="nofollow" target="_blank" href="<?php echo get_the_author_meta( 'github' ); ?>"><i class="fa fa-github fa-fw" aria-hidden="true"></i></a></li>
                <?php endif; ?>
                
                <?php if ( get_the_author_meta( 'contact' ) != '' ): ?>
                    <li><a target="_blank" href="<?php echo get_the_author_meta( 'contact' ); ?>"><i class="fa fa-envelope-o fa-fw" aria-hidden="true"></i></a></li>
				<?php endif; ?>
                </ul>
         </div>
    <?php 
    }
}
remove_action( 'genesis_after_entry', 'genesis_do_author_box_single', 8 );
add_action( 'genesis_after_entry', 'themeprefix_alt_author_box', 8);



//Sharing Plugin for Bottom Posts
function shareplugin2($content){	
if (is_single()) {   
    $content .= '
	<div class="postshare">
	<li>
	<p class="oop"><span class="poo"><i id="share" class="fa fa-share-alt" aria-hidden="true"></i>Share On</span></p>
    <!--Facebook-->
    <a rel="nofollow" href="https://www.facebook.com/sharer.php?u='.get_permalink( $post->ID).'&amp;t='.get_the_title( $post->ID).'" onclick="window.open(this.href, \'sharer\', \'toolbar=0, scrollbars,status=0,  width=626,height=436\');  return false;" target="_blank" title="Share on Facebook!" class="facebook"><i class="fa fa-facebook fa-fw fa-lg"></i></a>
	
   <!--Twitter-->
    <a rel="nofollow" href="https://twitter.com/intent/tweet?text='.get_the_title( $post->ID).'&#45;&amp;url='.get_permalink( $post->ID).'&amp;&via=probloggingways" onclick="window.open(this.href, \'sharer\', \'toolbar=0, scrollbars,status=0,  width=626,height=436\');  return false;" target="_blank" title="Share on Twitter!" class="twitter"><i class="fa fa-twitter fa-fw fa-lg"></i></a>
	
	
	<!--Linkedin-->
	<a rel="nofollow" href="https://www.linkedin.com/shareArticle?mini=true&amp;title='.get_the_title( $post->ID).'&amp;url='.get_permalink( $post->ID).'" onclick="window.open(this.href, \'sharer\', \'toolbar=0, scrollbars,status=0,  width=626,height=436\');  return false;" target="_blank" title="Share on Linkedin!" class="linkedin"><i class="fa fa-linkedin fa-fw fa-lg"></i></a>

	
	<!--Pinterest-->
	<a rel="nofollow" href="https://pinterest.com/pin/create/button/?url='.get_permalink( $post->ID).'&media='.wp_get_attachment_url( get_post_thumbnail_id($post->ID) ).'&description='.get_the_title($post->ID).'" onclick="window.open(this.href, \'sharer\', \'toolbar=0, scrollbars,status=0,  width=626,height=436\');  return false;"  target="_blank" title="Pin it!" class="pinterest"><i class="fa fa-pinterest fa-fw fa-lg"></i></a>
	
	<!--Reddit-->
    <a rel="nofollow" href="https://www.reddit.com/submit?url='.get_permalink( $post->ID).'&amp;t='.get_the_title( $post->ID).'" onclick="window.open(this.href, \'sharer\', \'toolbar=0, scrollbars,status=0,  width=626,height=436\');  return false;" target="_blank" title="Share on Reddit!" class="reddit"><i class="fa fa-reddit-alien fa-fw fa-lg"></i></a>
	
	<!--WhatsApp-->    
	<a rel="nofollow" href="whatsapp://send?text='.get_the_title( $post->ID).' >> '.get_permalink( $post->ID).'" target="_blank" title="Share on Whatsapp!" class="whatsapp"><i class="fa fa-whatsapp fa-fw fa-lg"></i></a>	
	
	<!--Messenger-->    
	<!-- <a rel="nofollow" href="fb-messenger://share/?link='.get_permalink( $post->ID).'" target="_blank" title="Share on Messenger!" class="whatsapp"><i class="fa fa-whatsapp fa-fw fa-lg"></i></a> -->
	
	<!--SMS-->    
	<!-- <a rel="nofollow" href="sms:?body='.get_the_title( $post->ID).' >> '.get_permalink( $post->ID).'" target="_blank" title="Share via SMS!" class="whatsapp"><i class="fa fa-commenting fa-fw fa-lg"></i></a> -->
	
	<!--Telegram-->    
	<a rel="nofollow" href="tg://msg?text='.get_the_title( $post->ID).' >> '.get_permalink( $post->ID).'" target="_blank" title="Share on Telegram!" class="telegram"><i class="fa fa-telegram fa-fw fa-lg"></i></a>
	</li>	
</div>'; 
} 
    return $content; 
}
add_filter( "the_content", "shareplugin2");


//Related Posts
add_action( 'genesis_after_entry', 'child_related_posts',3 );

function child_related_posts() {
     
    if ( is_single ( ) ) {
         
        global $post;
 
        $count = 0;
        $postIDs = array( $post->ID );
        $related = '';
        $tags = wp_get_post_tags( $post->ID );
        $cats = wp_get_post_categories( $post->ID );
         
        if ( $tags ) {
             
            foreach ( $tags as $tag ) {
                 
                $tagID[] = $tag->term_id;
                 
            }
             
            $args = array(
                'tag__in'               => $tagID,
                'post__not_in'          => $postIDs,
                'showposts'             => 4,
                'ignore_sticky_posts'   => 1,
                'tax_query'             => array(
                    array(
                                        'taxonomy'  => 'post_format',
                                        'field'     => 'slug',
                                        'terms'     => array( 
                                            'post-format-link', 
                                            'post-format-status', 
                                            'post-format-aside', 
                                            'post-format-quote'
                                            ),
                                        'operator'  => 'NOT IN'
                    )
                )
            );
 
            $tag_query = new WP_Query( $args );
             
            if ( $tag_query->have_posts() ) {
                 
                while ( $tag_query->have_posts() ) {
                     
                    $tag_query->the_post();
 
                    $img = genesis_get_image() ? genesis_get_image( array( 'size' => 'related' ) ) : '<img src="' . get_bloginfo( 'stylesheet_directory' ) . '/images/related.png" alt="' . get_the_title() . '" />';
 
                    $related .= '<div><a href="' . get_permalink() . '" rel="bookmark" title="Permanent Link to' . get_the_title() . '">' . $img . get_the_title() . '</a></div>';
                     
                    $postIDs[] = $post->ID;
 
                    $count++;
                }
            }
        }
 
        if ( $count <= 4 ) {
             
            $catIDs = array( );
 
            foreach ( $cats as $cat ) {
                 
                if ( 3 == $cat )
                    continue;
                $catIDs[] = $cat;
                 
            }
             
            $showposts = 4 - $count;
 
            $args = array(
                'category__in'          => $catIDs,
                'post__not_in'          => $postIDs,
                'showposts'             => $showposts,
                'ignore_sticky_posts'   => 1,
                'orderby'               => 'rand',
                'tax_query'             => array(
                                    array(
                                        'taxonomy'  => 'post_format',
                                        'field'     => 'slug',
                                        'terms'     => array( 
                                            'post-format-link', 
                                            'post-format-status', 
                                            'post-format-aside', 
                                            'post-format-quote' ),
                                        'operator' => 'NOT IN'
                                    )
                )
            );
 
            $cat_query = new WP_Query( $args );
             
            if ( $cat_query->have_posts() ) {
                 
                while ( $cat_query->have_posts() ) {
                     
                    $cat_query->the_post();
 
                    $img = genesis_get_image() ? genesis_get_image( array( 'size' => 'related' ) ) : '<img src="' . get_bloginfo( 'stylesheet_directory' ) . '/images/related.png" alt="' . get_the_title() . '" />';
 
                    $related .= '<div><a href="' . get_permalink() . '" rel="bookmark" title="Lets Make ' . get_the_title() . '">' . $img . get_the_title() . '</a></div>';
                }
            }
        }
 
        if ( $related ) {
             
            printf( '<div class="related-posts"><p class="oop"><span class="poo"><i id="rpico" class="fa fa-heart" aria-hidden="true"></i>You Might Also Like</span></p><div class="related-list">%s</div></div>', $related );
         
        }
         
        wp_reset_query();
         
    }
}


//Remove Query Strings
function remove_cssjs_ver( $src ) {
 if( strpos( $src, '?ver=' ) )
 $src = remove_query_arg( 'ver', $src );
 return $src;
}
add_filter( 'style_loader_src', 'remove_cssjs_ver', 10, 2 );
add_filter( 'script_loader_src', 'remove_cssjs_ver', 10, 2 );


// Remove WP embed script
function speed_stop_loading_wp_embed() {
if (!is_admin()) {
wp_deregister_script('wp-embed');
}
}
add_action('init', 'speed_stop_loading_wp_embed');

//Disable WP Core Emoji
function disable_wp_emojicons() {
  // all actions related to emojis
  remove_action( 'admin_print_styles', 'print_emoji_styles' );
  remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
  remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
  remove_action( 'wp_print_styles', 'print_emoji_styles' );
  remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
  remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
  remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
  // filter to remove TinyMCE emojis
  add_filter( 'tiny_mce_plugins', 'disable_emojicons_tinymce' );
}
add_action( 'init', 'disable_wp_emojicons' );
function disable_emojicons_tinymce( $plugins ) {
  if ( is_array( $plugins ) ) {
    return array_diff( $plugins, array( 'wpemoji' ) );
  } else {
    return array();
  }
}
add_filter( 'emoji_svg_url', '__return_false' );

//Post Entry Meta Modification
remove_action( 'genesis_entry_footer', 'genesis_post_meta' );
add_filter( 'genesis_post_info', 'sp_post_info_filter', 12 );
function sp_post_info_filter($post_info) {
	$post_info = '[post_author_posts_link] / [post_date] / [post_categories before=""] / [post_comments] [post_edit]';
	return $post_info;
}


//Change Comment Avatar Size
add_filter( 'genesis_comment_list_args', 'childtheme_comment_list_args' );
function childtheme_comment_list_args( $args ) {
    $args['avatar_size'] = 70;
	return $args;
}

//Change Comments Heading
//* Modify comments title text in comments
add_filter( 'genesis_title_comments', 'sp_genesis_title_comments' );
function sp_genesis_title_comments() {
	$title = '<h3><i class="fa fa-comments-o" aria-hidden="true"></i>&nbsp;Comments</h3><a class="leave-reply" href="#respond"><i class="fa fa-reply-all" aria-hidden="true"></i>&nbsp;Leave A Reply</a>';
	return $title;
}



//Homepage Widget Area
genesis_register_sidebar( array(
	'id'          => 'after-home',
	'name'        => __( 'Home After Content', 'wpsites' ),
	'description' => __( 'Displays After Content On Home Page.', 'wpsites' ),
) );
add_action( 'genesis_after_loop', 'wpsites_widget_after_home' );
function wpsites_widget_after_home() {
if ( is_home() && is_active_sidebar('after-home') ) {
	genesis_widget_area( 'after-home', array(
		'before' => '<div class="after-home" class="widget-area">',
		'after'  => '</div>',
	) );
    }
}


// Add support for custom logo.
add_theme_support( 'custom-logo', array() );

add_filter( 'genesis_seo_title', 'custom_header_inline_logo', 10, 3 );

function custom_header_inline_logo( $title, $inside, $wrap ) {
	// If the custom logo function and custom logo exist, set the logo image element inside the wrapping tags.
	if ( function_exists( 'has_custom_logo' ) && has_custom_logo() ) {
		$inside = sprintf( '<span class="screen-reader-text">%s</span>%s', esc_html( get_bloginfo( 'name' ) ), get_custom_logo() );
	} else {
		// If no custom logo, wrap around the site name.
		$inside	= sprintf( '<a href="%s">%s</a>', trailingslashit( home_url() ), esc_html( get_bloginfo( 'name' ) ) );
	}

	// Build the title.
	$title = genesis_markup( array(
		'open'    => sprintf( "<{$wrap} %s>", genesis_attr( 'site-title' ) ),
		'close'   => "</{$wrap}>",
		'content' => $inside,
		'context' => 'site-title',
		'echo'    => false,
		'params'  => array(
			'wrap' => $wrap,
		),
	) );

	return $title;
}

// Add featured image on single post
add_action( 'genesis_entry_content', 'themeprefix_featured_image', 1 );
function themeprefix_featured_image() {
	$image = genesis_get_image( array( // more options here -> genesis/lib/functions/image.php
			'format'  => 'html',
			'size'    => 'large',// add in your image size large, medium or thumbnail - for custom see the post
			'context' => '',
			'attr'    => array ( 'class' => 'aligncenter' ), // set a default WP image class

		) );
	if ( is_singular()) {
		if ( $image ) {
			printf( '<div class="featured-image-class">%s</div>', $image ); // wraps the featured image in a div with css class you can control
		}
	}
}

//Mobile Menu Toggle
function mobile_menu(){
	echo"<i class='fa fa-bars mobile-toggle'></i>";
}
add_action('genesis_header','mobile_menu', 9);



function more_post_ajax(){

    $ppp = (isset($_POST["ppp"])) ? $_POST["ppp"] : 3;
    $page = (isset($_POST['pageNumber'])) ? $_POST['pageNumber'] : 0;

    header("Content-Type: text/html");

    $args = array(
        'suppress_filters' => true,
        'post_type' => 'post',
        'posts_per_page' => $ppp,
        'cat' => 8,
        'paged'    => $page,
    );

    $loop = new WP_Query($args);

    $out = '';

    if ($loop -> have_posts()) :  while ($loop -> have_posts()) : $loop -> the_post();
        $out .= '<div class="small-12 large-4 columns">
                <h1>'.get_the_title().'</h1>
                <p>'.get_the_content().'</p>
         </div>';

    endwhile;
    endif;
    wp_reset_postdata();
    die($out);
}
add_action('wp_ajax_nopriv_more_post_ajax', 'more_post_ajax');
add_action('wp_ajax_more_post_ajax', 'more_post_ajax');


/**
* Rapid Ratings Custom Taxonomies
*
* Additional custom taxonomies can be defined here
* http://codex.wordpress.org/Function_Reference/register_taxonomy
*/

defined('ABSPATH') or die('Oops something went wrong!');

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
            add_action( 'init', array( $this, 'thoughtLeadership' ) );
            add_action('init', array( $this, 'cw_post_type_mediapress' ));
            add_action('init', array( $this, 'cw_post_type_thought_leadership' ));
			
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

        /*** Thought Leadership Custom Taxonomy ***/
		function thoughtLeadership(){

			$singular = 'Thought Leadership Taxonomy';
			$plural = 'Thought Leadership Taxonomy';

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
				'rewrite'		=> array('slug' => 'thought_leadership_type'),
				'hierarchical' 			=> true
			);

			register_taxonomy('thought_leadership_type', array('post'), $args);
		}

        /* Media & Press Custom Post type start*/
        function cw_post_type_mediapress() {
            $supports = array(
            'title', // post title
            'editor', // post content
            'author', // post author
            'thumbnail', // featured images
            'excerpt', // post excerpt
            'custom-fields', // custom fields
            'comments', // post comments
            'revisions', // post revisions
            'post-formats', // post formats
            );
            $labels = array(
            'name' => _x('Media & Press', 'plural'),
            'singular_name' => _x('Media & Press', 'singular'),
            'menu_name' => _x('Media & Press', 'admin menu'),
            'name_admin_bar' => _x('Media & Press', 'admin bar'),
            'add_new' => _x('Add New', 'add new'),
            'add_new_item' => __('Add New Media & Press'),
            'new_item' => __('New Media & Press'),
            'edit_item' => __('Edit Media & Press'),
            'view_item' => __('View Media & Press'),
            'all_items' => __('All Media & Press'),
            'search_items' => __('Search Media & Press'),
            'not_found' => __('No news found.'),
            );
            $args = array(
            'supports' => $supports,
            'labels' => $labels,
            'public' => true,
            'query_var' => true,
            'rewrite' => array('slug' => 'mediapress'),
            'has_archive' => true,
            'hierarchical' => false,
            );
            register_post_type('mediapress', $args);
        }
            

        

        /*** Thought Leadership Custom Taxonomy ***/
		function cw_post_type_thought_leadership(){

			$supports = array(
                'title', // post title
                'editor', // post content
                'author', // post author
                'thumbnail', // featured images
                'excerpt', // post excerpt
                'custom-fields', // custom fields
                'comments', // post comments
                'revisions', // post revisions
                'post-formats', // post formats
                );
                $labels = array(
                'name' => _x('Thought Leadership', 'plural'),
                'singular_name' => _x('Thought Leadership', 'singular'),
                'menu_name' => _x('Thought Leadership', 'admin menu'),
                'name_admin_bar' => _x('Thought Leadership', 'admin bar'),
                'add_new' => _x('Add New', 'add new'),
                'add_new_item' => __('Add New Thought Leadership'),
                'new_item' => __('New Thought Leadership'),
                'edit_item' => __('Edit Thought Leadership'),
                'view_item' => __('View Thought Leadership'),
                'all_items' => __('All Thought Leadership'),
                'search_items' => __('Search Thought Leadership'),
                'not_found' => __('No news found.'),
                );
                $args = array(
                'supports' => $supports,
                'labels' => $labels,
                'public' => true,
                'query_var' => true,
                'rewrite' => array('slug' => 'thought_leadership'),
                'has_archive' => true,
                'hierarchical' => false,
                );
                register_post_type('thought_leadership', $args);
		}
            
    



	}//ParentTaxonomyClass
	$parentTaxonomyClass = new ParentTaxonomyClass();
	$parentTaxonomyClass->register();
}

/** Global Options **/
function new_excerpt_more($more) {
    $post = get_post();
   return '… <a href="'. get_permalink($post->ID) . '">' . 'Continue Reading &rsaquo;' . '</a>';
}
add_filter('excerpt_more', 'new_excerpt_more');

if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Theme General Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Theme Header Settings',
		'menu_title'	=> 'Header',
		'parent_slug'	=> 'theme-general-settings',
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Theme Footer Settings',
		'menu_title'	=> 'Footer',
		'parent_slug'	=> 'theme-general-settings',
	));
	
}

add_action('init','custom_login');
function custom_login(){
 global $pagenow;
 //  URL for the HomePage. You can set this to the URL of any page you wish to redirect to.
 $blogHomePage = get_bloginfo('url');
 //  Redirect to the Homepage, if if it is login page. Make sure it is not called to logout or for lost password feature
 if( 'wp-login.php' == $pagenow && $_GET['action']!="logout" && $_GET['action']!="lostpassword") {
     wp_redirect($blogHomePage);
     exit();
 }
}

?>

