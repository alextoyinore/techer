<hr>
<nav class="tc-nav" id="footer-nav">
    <div class="tc-site-brand">
        <?php
            if(function_exists('the_custom_logo')){
                $custom_logo_id = get_theme_mod('custom_logo');
                $logo = wp_get_attachment_image_src( $custom_logo_id, 'full');
            }

            if(has_custom_logo()){
                ?>
                    <!-- Site Logo -->
                <a class="tc-site-title" href="<?php echo site_url() ?>"><img src="<?php echo esc_url($logo[0]); ?>"
                                                                            alt="logo"></a>
                <?php
            }else {
                ?>
                    <!-- Site title -->
                <a class="tc-site-title" href="<?php get_bloginfo( 'url'); ?>"><?php echo bloginfo('name'); ?></a> <br>
                <?php
            }
        ?>

    </div>

    <div id="secondary-nav-links">
        
        <?php wp_nav_menu( 
            array(
                'menu' => 'footer',
                'container' => '',
                'theme_location' => 'footer',
                'items_wrap' => '<ul>%3$s</ul>'
            )
         ); ?>
    </div>
</nav>
<hr>
<br>

<div id="tc-copyright">
    &copy; <?php echo bloginfo('name'); ?>
    <?php
        $year = date('Y');
        echo $year . '. ';
    ?>
    All rights reserved.
</div>

<br>
</body>
</html>
<?php wp_footer(); ?>
</body>
</html>

