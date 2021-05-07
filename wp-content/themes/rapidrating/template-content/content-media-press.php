<!--?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
include("file_with_errors.php");
?-->
<div class="container t2corner-container">
<div class="row mb-2">
<?php 
$loop = new WP_Query( 
    array( 
        'post_type' => 'mediapress',
        'posts_per_page' => 10 
        ) 
    ); 
 
while ( $loop->have_posts() ) : $loop->the_post();
 
?>
 

  
 

    
            <?php
                /* get post title */
                //$post_title_text = the_title( '<h3 class="mb-0"><a href="' . get_permalink() . '" title="' . the_title_attribute( 'echo=0' ) . '" rel="bookmark">', '</a></h3>' ); 
                /* get post content */
                //$post_content_text = the_content();
                /* get post excerpt */
                //$post_excerpt_text = the_excerpt($post->ID , 't2corner_tags');
                /* get the url for the full size featured image */
                //$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
                /* get the url for the thumbnail featured image */
                
                //$thumbnail_img_url = the_post_thumbnail('thumbnail, card-img-right, flex-auto, d-none, d-md-block');
                /* get post tag name */
                $post_category = get_the_terms( $post->ID , 'mediapress' );
                $post_date = get_the_date();
        
            ?>
            <!--?php 
                echo '<a href="'.esc_url($featured_img_url).'" rel="lightbox">'; 
                echo $thumbnail_img_url ;
                echo '</a>';
            ?-->  
            
            
            <!--?php echo $post_title_text; ?-->
 
    
 

<?php endwhile; ?>

<?php
            $cat = get_query_var('cat');
            $category = get_category ($cat);
           
            //echo do_shortcode('[ajax_load_more repeater="default" acf="true" acf_field_type="repeater" acf_field_name="'.get_field('media_press_card_container').'"]');                       

            echo do_shortcode('[ajax_load_more css_classes="row" transition_container_classes="t2corner-container row" id="9867656744" post_type="mediapress" posts_per_page="3"]');                       
        ?>


