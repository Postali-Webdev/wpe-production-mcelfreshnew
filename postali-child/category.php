<?php
/**
 *
 * Blog Template
 * @package Postali Parent
 * @author Postali LLC
 */
get_header(); ?>

<section id="banner" class="blue-bg">
    <div class="container">
        <div class="columns">
            <div class="column-full block">
                <?php 
                    $category = get_queried_object();
                    $category_name = $category->name;
                    echo '<h1>' . $category_name . '</h1>';
                ?>
                <?php if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('<p id="breadcrumbs">','</p>');} ?> 
            </div>
        </div>
    </div>
</section>

<section id="body">
    <div class="container">
        <div class="columns">
            <div class="column-66 block">
                <?php
                if( have_posts() ) : 
                                 while( have_posts() ) : 
                        the_post();
                        $blog_img = get_post_thumbnail_id();
                        echo '<div class="post">';

                        if( $blog_img ) {
                            echo '<div class="columns">
                                    <div class="column-50">';

                            echo wp_get_attachment_image( $blog_img, 'full', "", ["class" => "ignore-lazy featured-img"]);

                            echo '</div>
                            <div class="column-50">';
                        }

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
                        $tagline = '<p class="tagline">' . $date . ' in ' . implode(', ', $category_links) . '</p><div class="spacer-15"></div>';
                        echo $tagline;
                        $clean_string = strip_tags(get_the_content());
                        $truncated_string = substr($clean_string, 0, 300) . "...";
                        echo '<p>' . $truncated_string . '</p>';
                        echo '</div></div>';         
                        
                        if( $blog_img ) {
                            echo '</div></div>';

                        }
                   endwhile;

                    global $wp_query;

                    $big = 999999999; // This needs to be a large number
                    $pagination = paginate_links(array(
                        'base' => str_replace($big, '%#%', get_pagenum_link($big)),
                        'format' => '?paged=%#%',
                        'current' => max(1, get_query_var('paged')),
                        'total' => $wp_query->max_num_pages,
                        'prev_text' => '<div class="prev-arrow"></div>',
                        'next_text' => '<div class="next-arrow"></div>',
                        'type' => 'array',
                    ));

                    if (isset($pagination) && count($pagination) > 1) {
                        echo '<div class="pagination">';
                        echo '<ul>';
                        foreach ($pagination as $page) {
                            echo '<li>' . $page . '</li>';
                        }
                        echo '</ul>';
                        echo '</div>';
                    }
                    wp_reset_postdata();
                endif; ?>
            </div>
            <div class="column-33 block">
                <?php get_template_part('block', 'sidebar'); ?>
            </div>
        </div>
    </div>
</section>

	
	
<?php get_template_part('block', 'awards');?>
	
<?php get_footer(); ?>