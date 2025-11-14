<?php
/**
 * Theme header.
 *
 * @package Postali Child
 * @author Postali LLC
**/
?><!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>
<head>

<!-- Google Fonts Preload -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

<!-- Font Preload -->
<!-- <link rel="preload" href="/wp-content/themes/postali-child/assets/fonts/opensans/opensans-regular.woff2" as="font" type="font/woff2" crossorigin="anonymous" />
<link rel="preload" href="/wp-content/themes/postali-child/assets/fonts/opensans/opensans-semibold.woff2" as="font" type="font/woff2" crossorigin="anonymous" />
<link rel="preload" href="/wp-content/themes/postali-child/assets/fonts/opensans/opensans-bold.woff2" as="font" type="font/woff2" crossorigin="anonymous" />
<link rel="preload" href="/wp-content/themes/postali-child/assets/fonts/opensans/opensans-italic.woff2" as="font" type="font/woff2" crossorigin="anonymous" />
<link rel="preload" href="/wp-content/themes/postali-child/assets/fonts/opensans/opensans-mediumitalic.woff2" as="font" type="font/woff2" crossorigin="anonymous" />
<link rel="preload" href="/wp-content/themes/postali-child/assets/fonts/opensans/opensans-bolditalic.woff2" as="font" type="font/woff2" crossorigin="anonymous" />
<link rel="preload" href="/wp-content/themes/postali-child/assets/fonts/notoserif/notoserif-regular.woff2" as="font" type="font/woff2" crossorigin="anonymous" />
<link rel="preload" href="/wp-content/themes/postali-child/assets/fonts/notoserif/notoserif-bold.woff2" as="font" type="font/woff2" crossorigin="anonymous" />

<link rel="stylesheet" href="/wp-content/themes/postali-child/assets/fonts/opensans/opensans-regular.woff2" />
<link rel="stylesheet" href="/wp-content/themes/postali-child/assets/fonts/opensans/opensans-semibold.woff2" />
<link rel="stylesheet" href="/wp-content/themes/postali-child/assets/fonts/opensans/opensans-bold.woff2" />
<link rel="stylesheet" href="/wp-content/themes/postali-child/assets/fonts/opensans/opensans-italic.woff2" />
<link rel="stylesheet" href="/wp-content/themes/postali-child/assets/fonts/opensans/opensans-mediumitalic.woff2" />
<link rel="stylesheet" href="/wp-content/themes/postali-child/assets/fonts/opensans/opensans-bolditalic.woff2" />
<link rel="stylesheet" href="/wp-content/themes/postali-child/assets/fonts/notoserif/notoserif-regular.woff2" />
<link rel="stylesheet" href="/wp-content/themes/postali-child/assets/fonts/notoserif/notoserif-bold.woff2" /> -->

<?php if( is_front_page() ) : $banner_img = get_field('banner_image'); ?>
	<link rel="preload" as="image" href="<?php echo $banner_img['url'] . '.webp' ?>">
<?php endif; ?>

<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-57S3T8');</script>
<!-- End Google Tag Manager -->

<!-- Add JSON Schema here -->
<?php 
// Global Schema
$global_schema = get_field('global_schema', 'options');
if ( !empty($global_schema) ) :
    echo '<script type="application/ld+json">' . $global_schema . '</script>';
endif;

// Single Page Schema
$single_schema = get_field('single_schema');
if ( !empty($single_schema) ) :
    echo '<script type="application/ld+json">' . $single_schema . '</script>';
endif; ?>

<meta http-equiv="Content-Type" content="text/html; charset=<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<!-- Google Tag Manager (noscript) -->
	<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-57S3T8"
	height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
	<!-- End Google Tag Manager (noscript) -->

	<header>
		<div class="contact-banner">
			<div class="wrapper">
				<div class="left-col">
					<?php
					$args = array(
						'post_type' => 'post',
						'posts_per_page' => 6,
						'tax_query' => array(
							array(
								'taxonomy' => 'category',
								'field' => 'slug',
								'terms' => 'case-results'
							)
						)
                	);
                	$case_results_query = new WP_Query($args);
					
					?>
					<p class="case-results"><strong>Case Results: </strong></p>
					<?php if( $case_results_query->have_posts()) : ?>
					<div class="case-results-slider">
						<?php while( $case_results_query->have_posts() ) : $case_results_query->the_post(); ?>
							<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="case-result"><?php the_title(); ?></a>
						<?php endwhile; ?>
					</div>
					<?php endif; wp_reset_postdata(); ?>
				</div>
				<div class="right-col">
					<a class="phone-number" href="tel:<?php  the_field('global_phone', 'options'); ?>">Call us today: <?php the_field('global_phone', 'options'); ?></a>
				</div>
			</div>
		</div>
		<div id="header-top" class="container">
			<div id="header-top_left">
				<?php the_custom_logo(); ?>
			</div>
			
			<div id="header-top_right_menu">
				<nav role="navigation">
				<?php
					$args = array(
						'container' => false,
						'theme_location' => 'header-nav'
					);
					wp_nav_menu( $args );
				?>		
                </nav>	
				<div id="header-top_mobile">
					<div id="menu-icon" class="toggle-nav">
						<span class="line line-1"></span>
						<span class="line line-2"></span>
						<span class="line line-3"></span>
					</div>
				</div>
				
			</div>
		</div>
	</header>
