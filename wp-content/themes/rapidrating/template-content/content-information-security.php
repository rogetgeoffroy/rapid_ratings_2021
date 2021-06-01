<div class="container marketing">

<div id="carouselExampleSlidesOne" class="carousel slide partners-intergrations-carousel" data-ride="carousel">
<?php if (has_post_thumbnail( $post->ID ) ): ?>  
  <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
  <div class="carousel-inner" style="background-image: url('<?php echo $image[0]; ?>')">
      <div class="carousel-item active">
      <!--img src="https://wordpress-567571-1831185.cloudwaysapps.com/wp-content/uploads/2021/04/rate_suppliers_bg.png" width="100%" height="auto" /-->
      <div class="row">
      <div class="col-sm-6 rate-suppliers-banner-text">
        <h1><?php the_field('information_security_banner_header'); ?></h1>
        <p><?php the_field('information_security_banner_subtitle'); ?></p>
      </div>
    </div>
      </div>
  </div>
<?php endif; ?>

<div class="row featurette rs-section">
    <div class="col-md-12">
        <h2>Security is our highest priority</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
    </div>
    <?php $i = 0; ?>
    <?php if( have_rows('information_security_thumbnails')): ?>
        
        <?php while( have_rows('information_security_thumbnails')): the_row();
          $is_image = get_sub_field('is_image');
          $is_link = get_sub_field('is_link');
          $is_label = get_sub_field('is_label');
          //$tr_heading = get_sub_field('tr_heading_3');
          //$tr_text = get_sub_field('tr_text_3');
        ?>
        <?php $i++; ?>
		<?php if( $i > 3 ):
			break;
		endif; ?>
            <div class="col-sm-6 col-md-6 is-image-container">
                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="<?php echo '#collapse' . $i ?>" aria-expanded="true" aria-controls="<?php echo 'collapse' . $i ?>">
                    <?php if( !empty( $is_image ) ): ?>
                    <img class="pi-image" src="<?php echo esc_url($is_image['url']); ?>" alt="<?php echo esc_attr($is_image['alt']); ?>" width="100%" height="auto" />
                    <span><strong><?php echo $pi_label; ?></strong></span>
                    <?php endif; ?>
                </a>
            </div>

        <?php endwhile; ?>
    <?php else :

    endif;?>
</div><!-- /.row -->

<div class="row featurette is-section panel-container">
            <div class="wrapper center-block col-md-12">
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                        <div class="panel panel-default">
                            <div class="panel-heading active" role="tab" id="heading3">
                                <div id="collapse1" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading1">
                                <div class="panel-body">
                                    <?php
                                    $panel_1 = get_field('information_security_panel_1');
                                    if( $panel_1 ): ?>
                                        <h2><?php echo $panel_1['is_panel_title']; ?></h2>
                                        <p><?php echo $panel_1['is_panel_text']; ?></p>
                                        <a href="<?php echo esc_url($panel_1['is_panel_link']) ?>" target="_blank">Learn</a>    
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>

                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="heading2">
                                <div id="collapse2" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading2">
                                <div class="panel-body">
                                    <?php
                                    $panel_2 = get_field('information_security_panel_2');
                                    if( $panel_2 ): ?>
                                        <h2><?php echo $panel_2['is_panel_title']; ?></h2>
                                        <p><?php echo $panel_2['is_panel_text']; ?></p>
                                        <a href="<?php echo esc_url($panel_2['is_panel_link']) ?>" target="_blank">Learn</a>    
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
    </div><!-- /.row -->
        



</div>
