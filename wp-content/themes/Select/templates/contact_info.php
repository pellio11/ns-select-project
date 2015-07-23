<div class="panel-padding-md">
<div class="wrap container" role="document">
    <div class="row">
      <div class="contact_panel">
        <h2>Get in touch</h2>
        <?php while (have_posts()) : the_post(); ?>
          <?php the_content(); ?>
        <?php endwhile; ?>
        <span class="divider"></span>
        <?php echo do_shortcode( '[widget id="text-2"]' ); ?>
        <span class="divider"></span>
        <?php echo do_shortcode( '[widget id="text-3"]' ); ?>
      </div>
      <div class="contact_panel">
        <div class="video-container">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3166.5889984781575!2d-3.210816516095989!3d55.860644170270426!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4887c0f016136c6b%3A0x9d43adfeac726c52!2sSelect!5e0!3m2!1sen!2suk!4v1437493313082" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
        </div>
      </div>
    </div>   
</div>
</div>





