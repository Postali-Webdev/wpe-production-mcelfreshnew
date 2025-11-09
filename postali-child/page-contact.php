<?php
/**
 *
 * Template Name: Contact
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
            <div class="column-full">
                <p class="large-text"><?php the_field('body_intro_copy'); ?></p>
            </div>
        </div>
        <div class="columns">
            <div class="column-50 block">
                <?php the_field('body_copy'); ?>
                <div class="contact-wrapper">
                    <div class="contact-row">
                        <h5>Call</h5>
                        <a href="tel:<?php the_field('global_phone', 'options'); ?>"><?php the_field('global_phone', 'options'); ?></a>
                    </div>
                    <div class="contact-row">
                        <h5>Email</h5>
                        <a href="mailto:<?php the_field('global_email', 'options'); ?>" class="email"><?php the_field('global_email', 'options'); ?></a>
                    </div>
                    <div class="contact-row">
                        <h5>Office Location</h5>
                        <p>McElfresh Law, Inc.<br><?php the_field('global_address', 'options'); ?></p>
                        <a href="<?php the_field('global_directions_link', 'options'); ?>" target="_blank">Directions</a>
                    </div>
                </div>
            </div>
            <div class="column-50 block">
                <div class="form-wrapper">
                    <h5>Contact Us Today</h5>
                    <?php echo do_shortcode( get_field('sidebar_form') ); ?>
                </div>
            </div>
        </div>
    </div>
</section>

	
	
<?php get_template_part('block', 'awards');?>
	
<?php get_footer(); ?>