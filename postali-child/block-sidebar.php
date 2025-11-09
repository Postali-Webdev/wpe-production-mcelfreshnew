<div class="sidebar">
    <div class="featured-pages">
        <?php if( have_rows('sidebar_featured_pages') ) : ?>
            <?php while( have_rows('sidebar_featured_pages') ) : the_row(); 
            $banner = get_sub_field('banner'); 
            $icon = get_sub_field('icon');
            $link = get_sub_field('link'); ?>
                <a class="featured-link" href="<?php echo $link['url']; ?>">
                    <?php if( $icon ) { 
                        echo '<div class="inner-wrapper">';
                            echo wp_get_attachment_image( $icon['id'], 'full', "", ["class" => "featured-icon"]); 
                    } ?>
                        <p><?php echo $link['title']; ?></p>
                    <?php if( $icon ) { 
                        echo "</div>";
                    }
                    if( $banner ) { echo wp_get_attachment_image( $banner['id'], 'full', "", ["class" => "practice-area-img"]); } ?>
                </a>
            <?php endwhile; ?>

            <?php else : $default_featured_page = get_field('global_sidebar_featured_page', 'options'); ?>
                <a href="<?php echo $default_featured_page['page_link']; ?>">
                    <?php if( $default_featured_page['banner'] ) { echo wp_get_attachment_image( $default_featured_page['banner']['id'], 'full', "", ["class" => "practice-area-img"]); } ?>
                </a>
        <?php endif; ?>
    </div>

    <?php 
    
    if( is_home() || is_single() || is_category() ) {
        // Get Recent Posts
        $args = array(
            'post_type' => 'post',
            'posts_per_page' => 4,
            'post__not_in' => array($post->ID),
            'orderby' => 'title',
            'order' => 'ASC'
        );

        $query = new WP_Query($args);

        if ($query->have_posts()) {
            echo "<div class='spacer-30'></div>";
            echo "<h5>Recent Posts</h5>";
            echo '<ul class="pa-menu">';
            while ($query->have_posts()) {
                $query->the_post();
                echo '<li><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></li>';
            }
            echo '</ul>';
        }

        wp_reset_postdata();
        ?>

        <!-- Get Recent Media Coverage -->
            <?php 
        $args = array(
            'post_type' => 'post',
            'posts_per_page' => 4,
            'orderby' => 'title',
            'order' => 'ASC',
            'post__not_in' => array($post->ID),
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
            echo "<h5>Latest Media Coverage</h5>";
            echo '<ul class="pa-menu">';
            while ($query->have_posts()) {
                $query->the_post();
                echo '<li><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></li>';
            }
            echo '</ul>';
        }

        wp_reset_postdata();
                    
    } else {

        global $post;
        $child_pages = count( get_children($post->ID));
        // Check if current page is top level and has children
        if ($child_pages != 0) {
            $args = array(
                'post_parent' => $post->ID,
                'post_type' => 'page',
                'orderby' => 'title',
                'order' => 'ASC',
                'post__not_in' => array($post->ID)
            );
            $title = get_field('global_interior_short_title', $post->ID) ? get_field('global_interior_short_title', $post->ID) : get_the_title($post->ID);
        } elseif( $post->post_parent != 0 ) {
            $args = array(
                'post_parent' => $post->post_parent,
                'post_type' => 'page',
                'orderby' => 'title',
                'order' => 'ASC',
                'post__not_in' => array($post->ID)
            );
            $title = get_field('global_interior_short_title', $post->post_parent) ? get_field('global_interior_short_title', $post->post_parent) : get_the_title($post->post_parent);
        }

        $query = new WP_Query($args);

        if ($query->have_posts()) {
            if( get_field('global_interior_short_title') ) {

            }
            
            echo "<h5>{$title}</h5>";
            echo '<ul class="pa-menu">';
            while ($query->have_posts()) {
                $query->the_post();
                echo '<li><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></li>';
            }
            echo '</ul>';
        }

        wp_reset_postdata(); 

    }
    
    ?>

    <h5>Contact Us Today</h5>
    <?php 
    
    $form = get_field('sidebar_form') ? get_field('sidebar_form') : get_field('global_sidebar_form', 'options');
    
    echo do_shortcode( $form ); ?>
</div>