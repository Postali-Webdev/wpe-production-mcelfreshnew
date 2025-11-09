<?php
/**
 *
 * Template Name: Practice Area Interior
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
                <?php the_field('body_copy'); ?>
            </div>
            <div class="column-33 block">
                <?php get_template_part('block', 'sidebar'); ?>
            </div>
        </div>
    </div>
</section>

	
	
<?php get_template_part('block', 'awards');?>
	
<?php get_footer(); ?>