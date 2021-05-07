<div class="container marketing">
  <div class="row">
    <div class="col-sm-6 col-sm-offset-3">
      <h1><?php single_post_title(); ?></h1>
      <p><?php the_field('careers_culture_subtitle_text'); ?></p>
    </div>
  </div>
<div class="row featurette">

          <!-- START THE FEATURETTES -->
          <div class="col-md-7 order-md-2">
            <h2 class="featurette-heading">Oh yeah, it's that good. <span class="text-muted">See for yourself.</span></h2>
            <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
          </div>
          <div class="col-md-5 order-md-1">
            <?php 
                $image = get_field('careers_culture_featured_image');
                if( !empty( $image ) ): ?>
                    <img class="featurette-image img-fluid mx-auto" data-src="holder.js/500x500/auto" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" data-holder-rendered="true" style="width: 500px; height: 500px;">
            <?php endif; ?>
          </div>
        </div>

        <hr class="featurette-divider">
        

        <!-- Three columns of text below the carousel -->
        <div class="row">
            <?php if( have_rows('careers_culture_thumbnail_container') ): ?>

                <?php while( have_rows('careers_culture_thumbnail_container') ): the_row();
                    $image = get_sub_field('thumbnail_image');
                    $name = get_sub_field('thumbnail_name');
                    $position = get_sub_field('thumbnail_position');
                    $quote = get_sub_field('thumbnail_quote');
                    ?>
                    <div class="col-md-6">
                      <?php if( !empty( $image ) ): ?>
                        <img class="rounded-circle" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" width="140" height="140" />
                      <?php endif; ?>
                      <p><?php echo $name ?></p>
                      <p><?php echo $position  ?></p>
                      <p><?php echo $quote ?></p>
                    </div>
                <?php endwhile; ?>
                
            <?php endif; ?>
        </div><!-- /.row -->

      </div>