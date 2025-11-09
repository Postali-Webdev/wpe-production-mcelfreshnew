<?php
/**
 * Search results template.
 *
 * @package Postali Parent
 * @author Postali LLC
 */

get_header(); ?>

<section id="banner" class="blue-bg">
    <div class="container">
        <div class="columns">
            <div class="column-full block">
                <h1><?php printf( esc_html__( 'Search results for "%s"', 'postali' ), get_search_query() ); ?></h1>
                <?php if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('<p id="breadcrumbs">','</p>');} ?> 
            </div>
        </div>
    </div>
</section>

<section id="body">
    <div class="container">
        <div class="columns">
            <div class="column-66 block">
                <?php if( have_posts() ) : ?>
                    <?php while( have_posts() ) : the_post(); ?>
                        <a href="<?php echo esc_url(get_the_permalink()); ?>" class="search-item">
                            <h2><?php echo esc_html(get_the_title()); ?></h2>
                            <p><?php echo get_the_excerpt() ?></p>
                        </a>
                        <hr>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
            <div class="column-33 block">
                <?php get_template_part('block','sidebar'); ?>
            </div>
        </div>
        <div class="columns">
            <div class="column-full">
                <?php the_posts_pagination(); ?>
            </div>
        </div>
    </div>
</section>

<?php get_footer();
