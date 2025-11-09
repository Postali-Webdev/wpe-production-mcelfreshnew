<?php
/**
 *
 * Template Name: Why Hire
 * @package Postali Parent
 * @author Postali LLC
 */
get_header(); ?>

<section id="banner" class="blue-bg">
    <div class="container">
        <div class="columns">
            <div class="column-full block">
                <h1><?php the_title(); ?></h1>
                <?php if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('<p id="breadcrumbs">','</p>');} ?> 
            </div>
        </div>
    </div>
</section>

<section id="body">
    <div class="container">
        <div class="columns">
            <div class="column-66 block">
                <div class="columns">
                    <div class="column-66">
                        <?php the_field('body_copy'); ?>
                    </div>
                    <div class="column-33">
                        <?php echo wp_get_attachment_image('663', 'full', '', ['class' => 'ignore-lazy attorney-img']) ?>
                    </div>
                </div>
                <?php if( have_rows('body_reasons') ) : $count = 0;?>
                    <div class="reasons">
                        <?php while( have_rows('body_reasons') ) : the_row(); $count++; ?>
                            <div class="row">
                                <div class="count"><?php echo $count; ?></div>
                                <div class="copy">
                                    <h4><?php the_sub_field('title'); ?></h4>
                                    <p><?php the_sub_field('copy'); ?></p>
                                </div>
                                <?php $icon = get_sub_field('icon'); 
                                if( $icon ) { echo wp_get_attachment_image( $icon['id'], 'full', "", ["class" => "reasons-icon"]); } ?>
                            </div>
                        <?php endwhile; ?>
                    </div>
                <?php endif; ?>
            </div>
            <div class="column-33 block">
                <?php get_template_part('block', 'sidebar'); ?>
            </div>
        </div>
    </div>
</section>

	
	
<?php get_template_part('block', 'awards');?>
	
<?php get_footer(); ?>