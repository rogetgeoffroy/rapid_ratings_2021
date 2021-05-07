<div class="container marketing join-network">

<div id="carouselExampleSlidesOne" class="carousel slide enterprise-solutions-carousel" data-ride="carousel">
<?php if (has_post_thumbnail( $post->ID ) ): ?>  
  <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
  <div class="carousel-inner" style="background-image: url('<?php echo $image[0]; ?>')">
      <div class="carousel-item active">
      <!--img src="https://wordpress-567571-1831185.cloudwaysapps.com/wp-content/uploads/2021/04/rate_suppliers_bg.png" width="100%" height="auto" /-->
      <div class="row">
      <div class="col-sm-6 col-sm-offset-3 rate-suppliers-banner-text">
        <h1><?php the_field('join_network_banner_header'); ?></h1>
        <p><?php the_field('join_network_banner_subtitle'); ?></p>
      </div>
    </div>
      </div>
  </div>
<?php endif; ?>

  <div class="row featurette rs-section">

  <div class="row featurette rs-section">
    <?php if( have_rows('join_network_thumbnail_row_right_3')): ?>
      <?php while( have_rows('join_network_thumbnail_row_right_3')): the_row();
          $tr_image = get_sub_field('tr_image_3');
          $tr_heading = get_sub_field('tr_heading_3');
          $tr_text = get_sub_field('tr_text_3');
          ?>
          <div class="col-md-6">
            <h2><?php echo $tr_heading ?></h2>
            <p><?php echo $tr_text ?></p>
          </div>
          <div class="col-md-6">
            <?php if( !empty( $tr_image ) ): ?>
              <img class="tr-image" src="<?php echo esc_url($tr_image['url']); ?>" alt="<?php echo esc_attr($tr_image['alt']); ?>" width="100%" height="auto" />
            <?php endif; ?>
          </div>
        <?php endwhile; ?>
      <?php endif; ?>
  </div><!-- /.row -->

    <?php if( have_rows('join_network_thumbnail_row_left_1') ): ?>
      <?php while( have_rows('join_network_thumbnail_row_left_1') ): the_row();
          $tl_image = get_sub_field('tl_image');
          $tl_heading = get_sub_field('tl_heading');
          $tl_text = get_sub_field('tl_text');
          ?>
          <div class="col-md-6">
            <?php if( !empty( $tl_image ) ): ?>
              <img class="tr-image" src="<?php echo esc_url($tl_image['url']); ?>" alt="<?php echo esc_attr($tl_image['alt']); ?>" width="100%" height="auto" />
            <?php endif; ?>
          </div>
          <div class="col-md-6">
            <h2><?php echo $tl_heading ?></h2>
            <p><?php echo $tl_text ?></p>
          </div>
      <?php endwhile; ?>
    <?php endif; ?>
  </div><!-- /.row -->
  
  <div class="row featurette rs-section">
    <?php if( have_rows('join_network_thumbnail_row_right_1')): ?>
      <?php while( have_rows('join_network_thumbnail_row_right_1')): the_row();
          $tr_image = get_sub_field('tr_image');
          $tr_heading = get_sub_field('tr_heading');
          $tr_text = get_sub_field('tr_text');
          ?>
          <div class="col-md-6">
            <h2><?php echo $tr_heading ?></h2>
            <p><?php echo $tr_text ?></p>
          </div>
          <div class="col-md-6">
            <?php if( !empty( $tr_image ) ): ?>
              <img class="tr-image" src="<?php echo esc_url($tr_image['url']); ?>" alt="<?php echo esc_attr($tr_image['alt']); ?>" width="100%" height="auto" />
            <?php endif; ?>
          </div>
        <?php endwhile; ?>
      <?php endif; ?>
  </div><!-- /.row -->

  <div class="row featurette rs-section">
  <?php if( have_rows('join_network_thumbnail_row_left_2') ): ?>
      <?php while( have_rows('join_network_thumbnail_row_left_2') ): the_row();
          $tl_image = get_sub_field('tl_image_2');
          $tl_heading = get_sub_field('tl_heading_2');
          $tl_text = get_sub_field('tl_text_2');
          ?>
          <div class="col-md-6">
            <?php if( !empty( $tl_image ) ): ?>
              <img class="tr-image" src="<?php echo esc_url($tl_image['url']); ?>" alt="<?php echo esc_attr($tl_image['alt']); ?>" width="100%" height="auto" />
            <?php endif; ?>
          </div>
          <div class="col-md-6">
            <h2><?php echo $tl_heading ?></h2>
            <p><?php echo $tl_text ?></p>
          </div>
      <?php endwhile; ?>
    <?php endif; ?>
  </div><!-- /.row -->

  <div class="row featurette rs-section">
    <?php if( have_rows('join_network_thumbnail_row_right_2')): ?>
      <?php while( have_rows('join_network_thumbnail_row_right_2')): the_row();
          $tr_image = get_sub_field('tr_image_2');
          $tr_heading = get_sub_field('tr_heading_2');
          $tr_text = get_sub_field('tr_text_2');
          ?>
          <div class="col-md-6">
            <h2><?php echo $tr_heading ?></h2>
            <p><?php echo $tr_text ?></p>
          </div>
          <div class="col-md-6">
            <?php if( !empty( $tr_image ) ): ?>
              <img class="tr-image" src="<?php echo esc_url($tr_image['url']); ?>" alt="<?php echo esc_attr($tr_image['alt']); ?>" width="100%" height="auto" />
            <?php endif; ?>
          </div>
        <?php endwhile; ?>
      <?php endif; ?>
  </div><!-- /.row -->

  <div class="row featurette rs-section">
  <?php if( have_rows('join_network_thumbnail_row_left_3') ): ?>
      <?php while( have_rows('join_network_thumbnail_row_left_3') ): the_row();
          $tl_image = get_sub_field('tl_image_3');
          $tl_heading = get_sub_field('tl_heading_3');
          $tl_text = get_sub_field('tl_text_3');
          ?>
          <div class="col-md-6">
            <?php if( !empty( $tl_image ) ): ?>
              <img class="tr-image" src="<?php echo esc_url($tl_image['url']); ?>" alt="<?php echo esc_attr($tl_image['alt']); ?>" width="100%" height="auto" />
            <?php endif; ?>
          </div>
          <div class="col-md-6">
            <h2><?php echo $tl_heading ?></h2>
            <p><?php echo $tl_text ?></p>
          </div>
      <?php endwhile; ?>
    <?php endif; ?>
  </div><!-- /.row -->


</div>