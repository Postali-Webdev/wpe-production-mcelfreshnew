<?php
/**
 *
 * Template Name: About
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

<section id="about">
    <div class="container">
        <div class="columns">
            <div class="column-50 block">
                <?php the_field('body_copy'); ?>
                <div class="testimonial">
                    <p class="large-quote">
                        <?php $testimonial_group = get_field('testimonial'); ?>
                        <?php echo esc_html( $testimonial_group['copy'] ); ?>
                    </p>
                    <a href="<?php echo $testimonial_group['author']['url']; ?>" class="author"><?php echo $testimonial_group['author']['title']; ?></a>
                </div>
            </div>
            <div class="column-50 block">
                <?php if( get_field('attorney_headshot') ) { echo wp_get_attachment_image( get_field('attorney_headshot')['id'], 'full', "", ["class" => "ignore-lazy attorney-img"]); } ?>
                <?php if( have_rows('accordions') ) : ?>
                    <?php while( have_rows('accordions') ) : the_row(); ?>
                        <div class="accordions">
                            <h3 class="accordions_title">
                                <?php echo get_sub_field('accordion_title'); ?>
                            </h3>
                            <div class="accordions_content">
                                <?php echo get_sub_field('accordion_copy'); ?>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<section id="benefits" class="blue-bg">
    <div class="container">
        <div class="columns">
            <div class="column-75 block center">
                <h3><?php the_field('benefits_section_title'); ?></h3>
                <?php the_field('benefits_copy'); ?>
                <?php if( have_rows('benefits') ) : ?>
                    <div class="benefits-wrapper">
                        <?php while( have_rows('benefits') ) : the_row(); ?>
                            <div class="benefit">
                                <?php if( get_sub_field('icon') ) { echo wp_get_attachment_image( get_sub_field('icon')['id'], 'full', "", ["class" => "ignore-lazy benefit-icon"]); } ?>
                                <p><?php echo get_sub_field('title'); ?></p>
                            </div>
                        <?php endwhile; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<section id="services">
    <div class="container">
        <div class="columns">
            <div class="column-full block">
                <h4><?php the_field('services_section_title'); ?></h4>
                <?php the_field('services_copy'); ?>
            </div>
        </div>
    </div>
</section>

<section id="efforts" class="grey-bg">
    <div class="container">
        <div class="columns">
            <div class="column-50 block">
                <?php if( get_field('efforts_section_image') ) { echo wp_get_attachment_image( get_field('efforts_section_image')['id'], 'full', "", ["class" => "ignore-lazy"]); } ?>
            </div>
            <div class="column-50 block">
                <h3><?php the_field('efforts_section_title'); ?></h3>
                <?php the_field('efforts_copy'); ?>
            </div>
        </div>
    </div>
</section>

<section id="media">
    <div class="container">
        <div class="columns">
            <div class="column-full block">
                <!-- Get Recent Media Coverage -->
                <?php 
                $args = array(
                    'post_type' => 'post',
                    'posts_per_page' => 4,
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'category',
                            'field' => 'slug',
                            'terms' => 'media-coverage'
                        )
                    )
                );
                $query = new WP_Query($args);
                if ($query->have_posts()) {
                    echo "<div class='media-coverage'><h3>Media Coverage</h3>";
                    while ($query->have_posts()) {
                        $query->the_post();
                        
                        $blog_img = get_post_thumbnail_id();
                        echo '<div class="post">';
                        echo '<div class="post-copy"><h4>' . get_the_title() . '</h4>';
                        echo '<a class="post-link" href="' . get_the_permalink() . '"></a>';
                        $date = get_the_date('F j Y');
                        $fname = get_the_author_meta('first_name') ? get_the_author_meta('first_name') : 'Jessica';
                        $lname = get_the_author_meta('last_name') ? get_the_author_meta('last_name') : 'McElfresh';
                        $categories = get_the_category();
                        $category_links = array();
                        foreach ($categories as $category) {
                            $category_links[] = '<a href="' . get_category_link($category->term_id) . '">' . $category->name . '</a>';
                        }
                        
                        $clean_string = strip_tags(get_the_content());
                        $truncated_string = substr($clean_string, 0, 175) . "...";
                        echo '<p>' . $date . ' - ' . $truncated_string . '</p>';
                        echo '</div></div>';         
                    }
                    echo '</div>';
                }
                wp_reset_postdata();


                // Get Recent Posts
                $args = array(
                    'post_type' => 'post',
                    'posts_per_page' => 4,
                );
                $query = new WP_Query($args);
                if ($query->have_posts()) {
                    echo "<div class='blog-posts'><h3>Cannabis Industry Blog</h3>";
                    while ($query->have_posts()) {
                        $query->the_post();
                        
                        $blog_img = get_post_thumbnail_id();
                        echo '<div class="post">';
                        echo '<div class="post-copy"><h4>' . get_the_title() . '</h4>';
                        echo '<a class="post-link" href="' . get_the_permalink() . '"></a>';
                        $date = get_the_date('F j Y');
                        $fname = get_the_author_meta('first_name') ? get_the_author_meta('first_name') : 'Jessica';
                        $lname = get_the_author_meta('last_name') ? get_the_author_meta('last_name') : 'McElfresh';
                        $categories = get_the_category();
                        $category_links = array();
                        foreach ($categories as $category) {
                            $category_links[] = '<a href="' . get_category_link($category->term_id) . '">' . $category->name . '</a>';
                        }
                        
                        $clean_string = strip_tags(get_the_content());
                        $truncated_string = substr($clean_string, 0, 175) . "...";
                        echo '<p>' . $date . ' - ' . $truncated_string . '</p>';
                        echo '</div></div>';         
                    }
                    echo '</div>';
                }
                wp_reset_postdata();
                the_field('extra_copy'); ?>


            </div>
        </div>
    </div>
</section>

<?php get_template_part('block', 'awards');?>
	
<?php get_footer(); ?>