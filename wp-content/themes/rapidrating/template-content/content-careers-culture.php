<div class="container marketing">
  
<div id="carouselExampleSlidesOne" class="carousel slide careers-culture-carousel" data-ride="carousel">
<?php if (has_post_thumbnail( $post->ID ) ): ?>  
  <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
  <div class="carousel-inner" style="background-image: url('<?php echo $image[0]; ?>')">
      <div class="carousel-item active">
      <!--img src="https://wordpress-567571-1831185.cloudwaysapps.com/wp-content/uploads/2021/04/rate_suppliers_bg.png" width="100%" height="auto" /-->
      <div class="row">
      <div class="col-sm-6 rate-suppliers-banner-text">
        <h1><?php the_field('careers_culture_banner_header'); ?></h1>
        <p><?php the_field('careers_culture_banner_subtitle'); ?></p>
      </div>
    </div>
      </div>
  </div>
<?php endif; ?>

<div class="row featurette careers-culture-testimonial-row">

          <!-- START THE FEATURETTES -->
          <div class="col-md-6 order-md-2">
          <?php
            $testimonial = get_field('careers_culture_featured_testimonial');
            if( $testimonial ): ?>
                <div id="testimonial">
                    <h2><?php echo $testimonial['cc_testimonial_header'] ?></h2>
                    <p><?php echo $testimonial['cc_testimonial_quote'] ?></p>
                    <span><strong><?php echo '- ' . $testimonial['cc_testimonial_name'] ?></strong> <?php echo ', ' . $testimonial['cc_testimonial_position'] ?></span>
                </div>
            <?php endif; ?>

          </div>
          <div class="col-md-6 order-md-1">
            <?php 
                $image = get_field('careers_culture_featured_image');
                if( !empty( $image ) ): ?>
                    <img class="featurette-image img-fluid mx-auto" data-src="holder.js/500x500/auto" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" data-holder-rendered="true" width="100%" height="auto" />
            <?php endif; ?>
          </div>
        </div>

        <hr class="featurette-divider">
        

        <!-- Three columns of text below the carousel -->
        <div class="row featurette careers-culture-testimonial-row cct-grid">
            <?php if( have_rows('careers_culture_thumbnail_container') ): ?>

                <?php while( have_rows('careers_culture_thumbnail_container') ): the_row();
                    $image = get_sub_field('thumbnail_image');
                    $name = get_sub_field('thumbnail_name');
                    $position = get_sub_field('thumbnail_position');
                    $quote = get_sub_field('thumbnail_quote');
                    ?>
                    <div class="col-md-6">
                      <?php if( !empty( $image ) ): ?>
                        <img class="rounded-circle" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" width="100%" height="auto" />
                      <?php endif; ?>
                      <h4><strong><?php echo $name ?></strong> <?php echo $position  ?></h4>
                      <p><?php echo $quote ?></p>
                    </div>
                <?php endwhile; ?>
                
            <?php endif; ?>
        </div><!-- /.row -->


        <div class="row featurette careers-culture-testimonial-row cct-rapid-recognition">
          <div class="col-md-6 col-md-offset-3">
            <h2>Rapid Recognition</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
          </div>
          <div class="col-md-12">
              <div class="row rapid-recognition-slider" style="margin-top:20px;">
                  <?php if( have_rows('careers_culture_rapid_recognition_container') ): ?>
                    <?php while( have_rows('careers_culture_rapid_recognition_container') ): the_row();
                        $image = get_sub_field('rr_thumbnail_image');
                        $name = get_sub_field('rr_thumbnail_name');
                        $position = get_sub_field('rr_thumbnail_position');
                        $quote = get_sub_field('rr_thumbnail_quote');
                        ?>
                        <div class="col-sm-4">
                          <?php if( !empty( $image ) ): ?>
                            <img class="rounded-circle" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" width="100%" height="auto" />
                          <?php endif; ?>
                          <div class="text-box">
                            <h4><strong><?php echo $name ?></strong> <?php echo $position  ?></h4>
                            <p><?php echo $quote ?></p>
                          </div>
                        </div>
                    <?php endwhile; ?>
                  <?php endif; ?>
              </div>
          </div>
          

        </div><!-- /.row -->

      </div>

      <script type="text/javascript">
            $(document).ready(function(){
              $('.rapid-recognition-slider').slick({
                centerMode: true,
                centerPadding: '60px',
                slidesToShow: 3,
                //dots: true,
                arrows: true,
                responsive: [
                  {
                    breakpoint: 768,
                    settings: {
                      arrows: false,
                      centerMode: true,
                      centerPadding: '40px',
                      slidesToShow: 3
                    }
                  },
                  {
                    breakpoint: 480,
                    settings: {
                      arrows: false,
                      centerMode: true,
                      centerPadding: '40px',
                      slidesToShow: 1
                    }
                  }
                ]
              });
            });
          </script>