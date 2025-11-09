<?php
/**
 *
 * Single Post Template
 * @package Postali Parent
 * @author Postali LLC
 */
get_header(); 

$date = get_the_date('F j Y');
$fname = 'Jessica';
$lname = 'McElfresh';
$categories = get_the_category();
$category_links = array();
foreach ($categories as $category) {
    $category_links[] = '<a href="' . get_category_link($category->term_id) . '">' . $category->name . '</a>';
}
$tagline = '<p>' . $date . ', by <strong>' . $fname . ' ' . $lname . '</strong> in ' . implode(', ', $category_links) . '</p><div class="spacer-15"></div>';
?>

<section id="banner" class="blue-bg">
    <div class="container">
        <div class="columns">
            <div class="column-full block">
                <?php if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('<p id="breadcrumbs">','</p>');} ?> 
                <div class="spacer-30"></div>
                <h1><?php the_title(); ?></h1>
                <?php echo $tagline; ?>
            </div>
        </div>
    </div>
</section>

<section id="body">
    <div class="container">
        <div class="columns">
            <div class="column-66 block">
                <?php echo wp_get_attachment_image( get_post_thumbnail_id(), 'full', "", ["class" => "ignore-lazy featured-img"]);
                $content = apply_filters('the_content', get_the_content()); //formats post content
                echo $content;?>
            </div>
            <div class="column-33 block">
                <?php get_template_part('block', 'sidebar'); ?>
            </div>
        </div>
    </div>
</section>

	
	
<?php get_template_part('block', 'awards');?>
	
<?php get_footer(); ?>