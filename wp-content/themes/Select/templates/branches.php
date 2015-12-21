<div class="content_inner">
     <?php if( have_rows('branches') ): ?>
                <?php while( have_rows('branches') ): the_row(); ?>
                    <div class="wrap_branch">
                    <div class="branch_details">
                        <h3 class="alt"><?php the_sub_field('branch_name'); ?></h3>
                        <p>
                        <?php if(get_sub_field('branch_add_line1')) { ?><?php the_sub_field('branch_add_line1'); ?><?php } ?><br />
                        <?php if(get_sub_field('branch_add_line2')) { ?><?php the_sub_field('branch_add_line2'); ?><?php } ?><br />
                        <?php if(get_sub_field('branch_add_line3')) { ?><?php the_sub_field('branch_add_line3'); ?><?php } ?><br />
                        <?php if(get_sub_field('branch_add_line4')) { ?><?php the_sub_field('branch_add_line4'); ?><?php } ?>
                        <span class="divider"></span>
                        <?php if(get_sub_field('branch_phone')) { ?>Tel: <?php the_sub_field('branch_phone'); ?><?php } ?><br />
                        <?php if(get_sub_field('branch_fax')) { ?>Fax: <?php the_sub_field('branch_fax'); ?><?php } ?><br />
                        <?php if(get_sub_field('branch_email')) { ?>Email: <?php the_sub_field('branch_email'); ?><?php } ?>
                        </p>
                    </div>
                    <div class="branch_map">
                      <div class="map-container">
                      <?php the_sub_field('branch_map'); ?>
                      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3166.5889984781575!2d-3.210816516095989!3d55.860644170270426!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4887c0f016136c6b%3A0x9d43adfeac726c52!2sSelect!5e0!3m2!1sen!2suk!4v1437493313082" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                      </div>
                    </div>
                     <div class="clear"></div>
                     <div class="col-md-12"><span class="divider full_divider"></span></div>
                    </div>
                   
                <?php endwhile; ?>
    <?php endif; ?> 
</div>




