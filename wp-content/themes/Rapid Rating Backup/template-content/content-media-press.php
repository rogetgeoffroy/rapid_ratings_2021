<div class="container media-press">
    <div class="row">
        <div class="col-sm-6 col-sm-offset-3">
            <h1><?php single_post_title(); ?></h1>
            <p><?php the_field('media_press_subtitle_text'); ?></p>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 col-sm-offset-3">
            <h4><?php the_field('media_press_section_header'); ?></h4>
        </div>
    </div>
    <div class="row">
        <?php if( have_rows('media_press_card_container') ): ?>
            <?php while( have_rows('media_press_card_container') ): the_row();
                $card_title = get_sub_field('card_title');
                $card_text = get_sub_field('card_text');
                $card_link = get_sub_field('card_link');
            ?>
            
                <div class="col-xs-12 col-sm-6 col-md-4">
                    <div class="card">
                        <div class="card-header">
                            Featured
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">
                                <!--?php echo $card_title ?-->
                                <?php 
                                $args = array('cat'=>5);
                                // The Query
                                $query = new WP_Query( $args );
                                // The Loop
                                if ( $query->have_posts() ) {
                                    while ( $query->have_posts() ) {
                                        $query->the_post();
                                        echo get_the_title();
                                    }
                                } else {
                                    // no posts found
                                }
                                /* Restore original Post Data */
                                wp_reset_postdata(); 
                                
                                ?>
                            </h5>
                            <p class="card-text">
                                <?php echo $card_text ?>
                            </p>
                            <?php 
                            if( $card_link ): 
                                $card_link_url = $card_link['url'];
                                $card_link_title = $card_link['title'];
                                $card_link_target = $card_link['target'] ? $card_link['target'] : '_self';
                                ?>
                                <a class="btn btn-primary" href="<?php echo esc_url( $card_link_url ); ?>" target="<?php echo esc_attr( $card_link_target ); ?>"><?php echo esc_html( $card_link_title ); ?></a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                
            <?php endwhile; ?>
        <?php endif; ?>

        

        <?php 


            $cat = get_query_var('cat');
            $category = get_category ($cat);
           
            //echo do_shortcode('[ajax_load_more repeater="default" acf="true" acf_field_type="repeater" acf_field_name="'.get_field('media_press_card_container').'"]');                       

            echo do_shortcode('[ajax_load_more id="9867656744" container_type="div" post_type="post" posts_per_page="1" category="'.$category->mediapress.'" category__not_in="3,4"]');                       
        ?>

    </div>
    
</div>