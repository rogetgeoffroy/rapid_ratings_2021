<div class="container marketing">

<div id="carouselExampleSlidesOne" class="carousel slide partners-intergrations-carousel" data-ride="carousel">
<?php if (has_post_thumbnail( $post->ID ) ): ?>  
  <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
  <div class="carousel-inner" style="background-image: url('<?php echo $image[0]; ?>')">
      <div class="carousel-item active">
      <!--img src="https://wordpress-567571-1831185.cloudwaysapps.com/wp-content/uploads/2021/04/rate_suppliers_bg.png" width="100%" height="auto" /-->
      <div class="row">
      <div class="col-sm-6 rate-suppliers-banner-text">
        <h1><?php the_field('partners_integrations_banner_header'); ?></h1>
        <p><?php the_field('partners_integrations_banner_subtitle'); ?></p>
      </div>
    </div>
      </div>
  </div>
<?php endif; ?>

<div class="row featurette rs-section">
    <div class="col-md-12">
        <h2>Our Partnerships</h2>
    </div>
    <?php $i = 0; ?>
    <?php if( have_rows('partners_integrations_thumbnails')): ?>
        
        <?php while( have_rows('partners_integrations_thumbnails')): the_row();
          $pi_image = get_sub_field('pi_image');
          $pi_link = get_sub_field('pi_link');
          //$tr_heading = get_sub_field('tr_heading_3');
          //$tr_text = get_sub_field('tr_text_3');
        ?>
        <?php $i++; ?>
		<?php if( $i > 3 ):
			break;
		endif; ?>
            <div class="col-sm-6 col-md-4">
                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="<?php echo '#collapse' . $i ?>" aria-expanded="true" aria-controls="<?php echo 'collapse' . $i ?>">
                    <?php if( !empty( $pi_image ) ): ?>
                    <img class="pi-image" src="<?php echo esc_url($pi_image['url']); ?>" alt="<?php echo esc_attr($pi_image['alt']); ?>" width="100%" height="auto" />
                    <?php endif; ?>
                </a>
            </div>

        <?php endwhile; ?>
    <?php else :

    endif;?>
</div><!-- /.row -->

        <div class="row featurette rs-section">
            <div class="wrapper center-block col-md-12">
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                        <div class="panel panel-default">
                            <div class="panel-heading active" role="tab" id="heading3">
                                <div id="collapse1" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading1">
                                <div class="panel-body">
                                    <h2>Panel 1</h2>
                                    <p>Nulla auctor vestibulum ipsum. Nulla aliquet, nisi eget iaculis molestie, orci erat suscipit nisl, a lacinia leo dolor at tellus. Vivamus vitae nisi at ligula consequat gravida. Donec vitae ex pellentesque eros finibus commodo ut id dui. Nullam semper turpis a ultricies porttitor. Praesent diam ipsum, ornare ac semper eget, mattis id neque. Quisque lacinia ac metus non malesuada. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.</p>                                    
                                    <a href="<?php echo esc_url($pi_link) ?>" target="_blank">See More</a>
                                </div>
                            </div>
                        </div>

                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="heading2">
                                <div id="collapse2" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading2">
                                <div class="panel-body">
                                    <h2>Panel 2</h2>
                                    <p>Nulla auctor vestibulum ipsum. Nulla aliquet, nisi eget iaculis molestie, orci erat suscipit nisl, a lacinia leo dolor at tellus. Vivamus vitae nisi at ligula consequat gravida. Donec vitae ex pellentesque eros finibus commodo ut id dui. Nullam semper turpis a ultricies porttitor. Praesent diam ipsum, ornare ac semper eget, mattis id neque. Quisque lacinia ac metus non malesuada. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.</p>                                    
                                    <a href="<?php echo esc_url($pi_link) ?>" target="_blank">See More</a>
                                </div>
                            </div>
                        </div>

                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="heading3">
                                <div id="collapse3" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading3">
                                <div class="panel-body">
                                    <h2>Panel 3</h2> 
                                    <p>Nulla auctor vestibulum ipsum. Nulla aliquet, nisi eget iaculis molestie, orci erat suscipit nisl, a lacinia leo dolor at tellus. Vivamus vitae nisi at ligula consequat gravida. Donec vitae ex pellentesque eros finibus commodo ut id dui. Nullam semper turpis a ultricies porttitor. Praesent diam ipsum, ornare ac semper eget, mattis id neque. Quisque lacinia ac metus non malesuada. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.</p>                                                                       
                                    <a href="<?php echo esc_url($pi_link) ?>" target="_blank">See More</a>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
        

<div class="row featurette rs-section">
    <div class="col-md-6">
        <h2>Interested in becoming a partner?</h2>
        <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
        </p>

        <form>
            <div class="orm-group row">
            <label for="staticName" class="col-sm-2 col-form-label">Name</label>
                <div class="col">
                <input type="text" class="form-control" placeholder="Name">
                </div>
            </div>
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Business Email</label>
                <div class="col-sm-10">
                <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="email@example.com">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Contat Us</button>
        </form>
    </div>
    <div class="col-md-6" style="background">
        <?php 
        $pi_form_image = get_field('pi_form_image');
        if( !empty( $pi_form_image ) ): ?>
              <img class="pi-form-image" src="<?php echo esc_url($pi_form_image['url']); ?>" alt="<?php echo esc_attr($pi_form_image['alt']); ?>" width="100%" height="auto" />
        <?php endif; ?>
    </div>
</div><!-- /.row -->

</div>
