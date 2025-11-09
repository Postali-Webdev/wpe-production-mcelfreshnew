<?php if( have_rows('global_awards', 'options') ) : ?>
<section id="award-slider-block" class="dk-grey-bg"> 
    <div class="awards-slider">
        <?php while( have_rows('global_awards', 'options') ) : the_row(); 
            $award = get_sub_field('award'); ?>
            <div class="award">
                <?php if( $award ) { echo wp_get_attachment_image( $award['id'], 'full', "", ["class" => "award-img"]); } ?>
            </div>
        <?php endwhile; ?>
    </div>
</section>
<?php endif; ?>