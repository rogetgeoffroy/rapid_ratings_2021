<div class="container marketing">
  
    <div id="carouselExampleSlidesOne" class="carousel slide clients-carousel" data-ride="carousel">
    <?php if (has_post_thumbnail( $post->ID ) ): ?>  
        <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
        <div class="carousel-inner" style="background-image: url('<?php echo $image[0]; ?>')">
            <div class="carousel-item active">
                <div class="row">
                    <div class="col-sm-6 col-sm-offset-3 rate-suppliers-banner-text">
                        <h1><?php the_field('clients_banner_header'); ?></h1>
                        <p><?php the_field('clients_banner_subtitle'); ?></p>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>

<!-- START THE FEATURETTES -->
    <div class="row featurette clients-row">   
        <?php
            $clients_header_1 = get_field('clients_featured_header_1');
            $clients_quote_1 = get_field('clients_featured_quote_1');
            $clients_name_1 = get_field('clients_featured_name_1');
            $clients_position_1 = get_field('clients_featured_position_1');
        ?>
        <div class="col-md-6">
            <?php 
                $image1 = get_field('clients_featured_image_1');
                if( !empty( $image1 ) ): ?>
                    <img class="featurette-image img-fluid mx-auto" data-src="holder.js/500x500/auto" src="<?php echo esc_url($image1['url']); ?>" alt="<?php echo esc_attr($image1['alt']); ?>" data-holder-rendered="true" width="100%" height="auto" />
            <?php endif; ?>
        </div>
        <div class="col-md-6">
            <div id="clients">
                <h2><?php echo $clients_header_1 ?></h2>
                <p><?php echo $clients_quote_1 ?></p>
                <span><strong><?php echo '- ' . $clients_name_1 ?></strong> <?php echo ', ' . $clients_position_1 ?></span>
            </div>          
        </div>
    </div><!-- /.row -->
    
    <!-- Six columns of text below for icons -->
    <div class="row featurette clients-row clients-grid">
            <?php if( have_rows('clients_thumbnails') ): ?>

                <?php while( have_rows('clients_thumbnails') ): the_row();
                    $image = get_sub_field('thumbnail_image');
                    $link = get_sub_field('thumbnail_link');
                    ?>
                    <div id="clients-thumbs" class="col-xs-2 col-sm-4 col-md-2">
                      <?php if( !empty( $image ) ): ?>
                        <a href="<?php echo $link; ?>"><img class="clients-thumbnails" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" width="100%" height="auto" /></a>
                      <?php endif; ?>
                    </div>
                <?php endwhile; ?>
                
            <?php endif; ?>
    </div><!-- /.row -->

    <div class="row featurette clients-row">   
        <?php
            $clients_header_2 = get_field('clients_featured_header_2');
            $clients_quote_2 = get_field('clients_featured_quote_2');
            $clients_name_2 = get_field('clients_featured_name_2');
            $clients_position_2 = get_field('clients_featured_position_2');
        ?>
        <div class="col-md-6">
            <div id="clients">
                <h2><?php echo $clients_header_2 ?></h2>
                <p><?php echo $clients_quote_2 ?></p>
                <span><strong><?php echo '- ' . $clients_name_2 ?></strong> <?php echo ', ' . $clients_position_2 ?></span>
            </div>          
        </div>
        <div class="col-md-6">
            <?php 
                $image2 = get_field('clients_featured_image_2');
                if( !empty( $image2 ) ): ?>
                    <img class="featurette-image img-fluid mx-auto" data-src="holder.js/500x500/auto" src="<?php echo esc_url($image2['url']); ?>" alt="<?php echo esc_attr($image2['alt']); ?>" data-holder-rendered="true" width="100%" height="auto" />
            <?php endif; ?>
        </div>
        
    </div><!-- /.row -->

</div>
