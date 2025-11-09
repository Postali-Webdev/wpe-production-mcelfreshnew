<?php
/**
 *
 * Template Name: Sitemap
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
                 <?php if (have_posts()) :  ?>
                    <div class="columns">
                        <?php while (have_posts()) : the_post(); ?>
                        <div class="column-50 block">
                            <h2>Pages</h2> 
                            <ul class="sitemap">
                                <?php wp_list_pages("title_li=" ); ?>
                            </ul> 
                        </div>
                        <div class="column-50 block">
                            <h2>Blogs</h2> 
                            <ul class="sitemap">
                                <?php wp_get_archives('type=postbypost'); ?>
                            </ul>
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