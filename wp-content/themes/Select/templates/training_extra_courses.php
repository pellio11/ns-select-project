<div class="other_courses"><h2>Other courses</h2>
<p><?php the_field('extra_courses_intro', 16); ?></p>
<ul>
<?php if( have_rows('extra_courses', 16) ): ?>
            <?php while( have_rows('extra_courses', 16) ): the_row(); ?>
                <li><?php the_sub_field('course_title', 16); ?></li>             
            <?php endwhile; ?>
<?php endif; ?>
</ul>
</div>

  
