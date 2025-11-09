<?php
/**
 * Template Name: Front Page
 * @package Postali Child
 * @author Postali LLC
**/
get_header();?>

<div id="front-page">

    <section id="banner">
        <?php 
        $banner_img = get_field('banner_image');
        $banner_title = get_field('banner_title');
        if( $banner_img ) {
            echo '<figure>';
            echo wp_get_attachment_image( $banner_img['id'], 'full', "", ["class" => "ignore-lazy banner-img"]); 
            echo "<figcaption>{$banner_title}</figcaption></figure>";
        }
        ?>
        <div class="container">
            <div class="columns">
                <div class="column-50 block">
                    <h1><?php echo $banner_title; ?></h1>
                    <a href="tel:<?php the_field('global_phone', 'options'); ?>" class="phone-number"><?php the_field('global_phone', 'options'); ?></a>
                    <?php if( have_rows('banner_featured_practice_areas') ) : ?>
                        <div class="featured-links-wrapper">
                            <?php while( have_rows('banner_featured_practice_areas') ) : the_row(); 
                                $practice_area_link = get_sub_field('practice_area');
                                $practice_area_copy = get_sub_field('practice_area_copy'); ?>
                                <a href="<?php echo $practice_area_link['url']; ?>" class="btn arrow">
                                    <span><?php echo $practice_area_link['title']; ?></span>
                                    <br>
                                    <?php echo $practice_area_copy; ?>
                                </a>
                            <?php endwhile; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

    <section id="panel-2">
        <div class="container">
            <div class="columns">
                <div class="column-50">
                    <?php $left_col = get_field('p2_left_column'); ?>
                    <p class="faux-title"><?php echo $left_col['section_large_title']; ?></p>
                    <?php 
                    if( $left_col['award_image'] ) { 
                        $award_img = wp_get_attachment_image( $left_col['award_image']['id'], 'full', "", ["class" => "award-img"]); 
                        if( $left_col['award_image_link'] ) {
                            $award_img = "<a href='{$left_col['award_image_link']}'>{$award_img}</a>";
                        }
                        echo $award_img;
                    } 
                        
                        ?>
                    <div class="spacer-30"></div>
                    
                </div>
                <div class="column-50">
                    <?php $right_col = get_field('p2_right_column'); ?>
                    <h2><?php echo $right_col['section_title']; ?></h2>
                    <?php echo $right_col['section_copy']; ?>
                </div>
            </div>
        </div>
    </section>

    <section id="panel-3" class="grey-bg">
        <div class="container">
            <div class="columns">
                <div class="column-full block">
                    <h2><?php the_field('p3_title'); ?></h2>
                    <?php $services_section = get_field('p3_services');
                    $services_list = $services_section['services_list'];
                    if( $services_list ) : ?>
                    <div class="services-section">
                        <h3><?php echo $services_section['services_section_title']; ?></h3>
                        <div class="inner-wrapper">
                            <?php foreach( $services_list as $service ) :
                                $service_icon =  $service['service_icon']; ?>
                                <div class="service">
                                    <?php if( $service_icon ) { echo wp_get_attachment_image( $service_icon['id'], 'full', "", ["class" => "services-icon"]); } ?>
                                    <p class="service-title"><?php echo $service['service_title']; ?></p>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="columns">
                <div class="column-33 block">
                    <?php $p3_image = get_field('p3_image'); 
                    if( $p3_image ) { echo wp_get_attachment_image( $p3_image['id'], 'full', "", ["class" => "p3-image"]); echo '<div class="spacer-30"></div>'; }?>
                </div>
                <div class="column-66 block">
                    <?php the_field('p3_copy'); 
                    if( have_rows('p3_featured_pages'   ) ) : ?>
                        <div class="pa-list">
                            <?php while( have_rows('p3_featured_pages'   ) ) : the_row(); 
                                $page_link = get_sub_field('featured_page'); ?>
                                <a href="<?php echo $page_link['url']; ?>" class="btn arrow">
                                    <?php echo $page_link['title']; ?>
                                </a>
                            <?php endwhile; ?>
                        </div>
                    <?php endif;
                    ?>
                </div>
            </div>
        </div>
    </section>

    <section id="panel-4" class="blue-bg">
        <div class="container">
            <div class="columns">
                <div class="column-full block">
                    <h2><?php the_field('p4_title'); ?></h2>
                    <div class="header-underline"></div>
                    <?php the_field('p4_copy'); ?>
                    <?php if( have_rows('global_awards', 'options') ) : ?>
                        <div class="awards-slider">
                            <?php while( have_rows('global_awards', 'options') ) : the_row(); 
                                $award = get_sub_field('award'); ?>
                                <div class="award">
                                    <?php if( $award ) { echo wp_get_attachment_image( $award['id'], 'full', "", ["class" => "award-img"]); } ?>
                                </div>
                            <?php endwhile; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

    <section id="panel-5">
        <div class="container">
            <div class="columns">
                <div class="column-66 block">
                    <?php $p5_left_col = get_field('p5_left_column'); ?>
                    <h2><?php echo $p5_left_col['title']; ?></h2>
                    <?php echo $p5_left_col['copy']; ?>
                </div>
                <div class="column-33 block">
                    <?php $p5_right_col = get_field('p5_right_column'); ?>
                    <?php if( $p5_right_col['image'] ) { echo wp_get_attachment_image( $p5_right_col['image']['id'], 'full', "", ["class" => "p5-image"]); } ?>
                </div>
            </div>
        </div>
    </section>

    <section id="panel-6">
        <div class="container">
            <div class="columns">
                <div class="column-full block">
                    <h3><?php the_field('p6_title'); ?></h3>
                    <?php if( have_rows('p6_practice_areas') ) : ?>
                        <div class="practice-areas">
                            <?php while( have_rows('p6_practice_areas') ) : the_row();
                                $practice_area_id = get_sub_field('practice_area'); ?>
                                <div class="practice-area">
                                    <a href="<?php echo get_permalink( $practice_area_id ); ?>"></a>
                                    <?php if( get_field('global_interior_featured_image', $practice_area_id) ) { 
                                        $pa_img = get_field('global_interior_featured_image', $practice_area_id);
                                        } else {
                                            $pa_img['id'] = '174';
                                        }
                                        echo wp_get_attachment_image( $pa_img['id'], 'full', "", ["class" => "practice-area-img"]); ?>
                                        <div class="copy">
                                            <p class="practice-area-title"><?php echo get_field('global_interior_short_title', $practice_area_id); ?></p>
                                            <p class="copy"><?php echo get_field('global_interior_excerpt', $practice_area_id); ?></p>
                                            <a class="pa-btn" href="<?php echo get_permalink( $practice_area_id );?>">Read more</a>
                                        </div>
                                </div>
                            <?php endwhile; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

    <section id="panel-7" class="blue-bg">
        <div class="container">
            <div class="columns">
                <div class="column-66 block">
                    <h3><?php the_field('p7_title'); ?></h3>
                    <?php the_field('p7_copy'); ?>
                </div>
                <div class="column-33 block">
                    <div class="contact-wrapper">
                        <p>Call Us At</p>
                        <a class="phone-number" href="tel:<?php the_field('global_phone', 'options'); ?>" class="phone-number"><?php the_field('global_phone', 'options'); ?></a>
                        <p>Or use the form below</p>
                        <?php echo do_shortcode( get_field('p7_form')); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="panel-8">
        <div class="container">
            <div class="columns">
                <div class="column-full center block">
                    <div class="hand-icon"></div>
                    <h2><?php the_field('p8_title'); ?></h2>
                    <?php the_field('p8_copy'); ?>
                </div>
            </div>
        </div>
    </section>

    <section id="panel-9">
        <?php $p9_image = get_field('p9_image'); if( $p9_image ) { echo wp_get_attachment_image( $p9_image['id'], 'full', "", ["class" => "p9-image"]); } ?>
        <div class="container">
            <div class="columns">
                <div class="column-50"></div>
                <div class="column-50">
                    <h3><?php the_field('p9_title'); ?></h3>
                    <?php the_field('p9_copy');
                    $p9_button = get_field('p9_attorney_link'); ?>
                    <a href="<?php echo $p9_button['url']; ?>" class="btn"><?php echo $p9_button['title']; ?></a>
                </div>
            </div>
        </div>
    </section>

    <section id="panel-10" class="blue-bg">
        <div class="container">
            <div class="columns">
                <div class="column-full block">
                    <h2><?php the_field('p10_title'); ?></h2>
                    <?php the_field('p10_copy'); ?>
                    <?php if( have_rows('p10_videos')) : ?>
                        <div class="videos">
                            <?php while( have_rows('p10_videos') ) : the_row(); ?>
                                <?php $vide_url = get_sub_field('video_embed_link'); ?>
                                <div class="responsive-iframe">
                                    <iframe width="560" height="315" src="<?php echo $vide_url; ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                                </div>
                            <?php endwhile; ?>
                        </div>
                    <?php endif; 
                    $news_image = get_field('p10_news_image'); if( $news_image ) { echo wp_get_attachment_image( $news_image['id'], 'full', "", ["class" => "news-image"]); }?>
                </div>
            </div>
        </div>
    </section>

    <section id="panel-11" class="blue-bg">
        <div class="container">
            <div class="columns">
                <div class="column-33 block">
                    <h2><?php the_field('p11_title'); ?></h2>
                    <?php the_field('p11_copy'); ?>
                </div>
                <div class="column-66 block">
                    <?php if( have_rows('global_areas_served', 'options') ) : ?>
                        <div class="areas-served">
                            <?php while( have_rows('global_areas_served', 'options') ) : the_row(); 
                                $area_title = get_sub_field('area'); 
                                $page_link = get_sub_field('page_link'); ?>
                                
                                <p class="area-title <?php echo !$page_link ? 'fake-btn' : ''; ?>">
                                <?php if( $page_link ) : ?>
                                    <a href="<?php echo $page_link; ?>" class="area">
                                <?php endif; ?>
                                    <?php echo $area_title; ?>
                                <?php if( $page_link ) : ?>
                                    </a>
                                <?php endif; ?>
                                </p>
                                
                            <?php endwhile; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

    <?php get_template_part('block', 'pre-footer'); ?>


</div><!-- #front-page -->

<?php get_footer();?>