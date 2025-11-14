<?php
/**
 * Theme footer
 *
 * @package Postali Child
 * @author Postali LLC
**/
?>
<footer>

<div class="background-wrapper">
    <?php $footer_img = get_field('global_footer_background_image', 'options');
    if( $footer_img ) : echo wp_get_attachment_image( $footer_img['id'], 'full', "", ["class" => "footer-background"]); endif;  ?>

    <div class="container">
        <div class="columns">
            <div class="column-50 block">
                <a href="/" class="custom-logo-link" rel="home" aria-current="page">
                     <?php $footer_logo = get_field('global_footer_logo', 'options');
                        if( $footer_logo ) : echo wp_get_attachment_image( $footer_logo['id'], 'full', "", ["class" => "custom-logo"]); endif;  ?>
                </a>
                <div class="inner-wrapper">
                    <div class="address">
                        <p><?php the_field('global_address', 'options'); ?></p>
                        <a target="_blank" href="<?php the_field('global_directions_link', 'options'); ?>">Directions</a>
                    </div>
                    <div class="social">
                        <?php $socials = get_field('global_socials', 'options');
                        foreach( $socials as $id => $social) : 
                            if( $social ) :?>
                            <a class="social-icon <?php echo $id; ?>" href="<?php echo $social; ?>" target="_blank" rel="noopener noreferrer">
                            </a>    
                        <?php endif; 
                        endforeach; ?>
                    </div>
                </div>
                <div class="contact">
                    <a href="tel:<?php the_field('global_phone', 'options'); ?>">New Case, Call Today: <?php the_field('global_phone', 'options'); ?></a>
                    <a href="mailto:<?php the_field('global_email', 'options'); ?>" class="email"><?php the_field('global_email', 'options'); ?></a>
                </div>
            </div>
            <div class="column-50 block">
                <nav role="navigation">
                <?php wp_nav_menu( [ 'container' => false, 'theme_location' => 'footer-nav' ] ); ?>
                </nav>
            </div>
        </div>
    </div>

</div>

<!-- Utility Footer -->
<section id="copyright">
    <div class="container">
        <p class="copyright-year">Copyright &copy; <?php echo date('Y'); ?> <a href="/">McElfresh Law Inc</a>. Call us today: <a href="tel:<?php the_field('global_phone', 'options'); ?>"><?php the_field('global_phone', 'options'); ?></a>
        <?php if(is_page_template('front-page.php')) { ?>
        <div class="spacer-break"></div>
        <a href="https://www.postali.com" title="Site design and development by Postali" target="blank"><img src="https://www.postali.com/wp-content/themes/postali-site/img/postali-tag-reversed.png" alt="Postali | Results Driven Marketing" style="display:block; max-width:250px; margin:10px auto 10px;"></a></p>
        <?php } ?>
    </div>
</section>

</footer>
    
    <!-- callrail script -->
    <script type="text/javascript" src="//cdn.callrail.com/companies/934224983/27b361a8501f6099ec7c/12/swap.js"></script> 
    <!-- /callrail script -->
 
<?php wp_footer(); ?>
</body>
</html>


