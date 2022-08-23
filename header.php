<!DOCTYPE html>
<html lang="en">
<head>
	<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
	new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
	j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
	'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
	})(window,document,'script','dataLayer','GTM-T7R8TPX');</script>
	<!-- End Google Tag Manager -->
	
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=G-30CMN3F21C"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'G-30CMN3F21C');
	</script>
	
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Google Tag Manager -->
    
	<?php wp_head(); ?>
	
	<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-9628695355238680"
     crossorigin="anonymous"></script>
</head>
<body>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-T7R8TPX"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

<div id="header">
    <nav class="tc-nav" id="techer-top-nav">
        <div class="techer-menu-toggle">
            <img id="techer-menu-icon-left" alt="techer-menu-icon" src="<?php echo get_template_directory_uri() . '/assets/images/techer-menu-icon-left.png';?>" />
        </div>
        <div class="tc-site-brand">
            <?php
                if(function_exists('the_custom_logo')){
                    $custom_logo_id = get_theme_mod('custom_logo');
                    $logo = wp_get_attachment_image_src( $custom_logo_id, 'full');
                }

                if(has_custom_logo()){
                    ?>
                        <!-- Site Logo -->
                    <a class="tc-site-title" href="<?php echo site_url( ); ?>"><img src="<?php echo $logo[0]; ?>"
                                                                                  alt="logo"></a>
                    <?php
                }else {
                    ?>
                        <!-- Site title -->
                    <a class="tc-site-title" href="<?php echo site_url(); ?>"><?php echo bloginfo('name'); ?></a> <br>
                    <!-- Site description -->
                    <span><?php echo bloginfo( 'description' ); ?></span>
                    <?php
                }
            ?>

        </div>

        <!-- Primary Navigation -->
        <div>
            <div id="primary-nav-links">
                <?php wp_nav_menu(
                    array(
                        'menu' => 'primary',
                        'container' => '',
                        'theme_location' => 'primary',
                        'items_wrap' => '<ul>%3$s</ul>'
                    )
                ); ?>
            </div>

            <div class="techer-search-icon">
                <img id="techer-search-icon" alt="techer search icon" src="<?php echo get_template_directory_uri() . '/assets/images/techer-search-icon.png';
                ?>" />
            </div>

        </div>
    </nav>
    <?php get_search_form(); ?>
    <?php get_template_part( 'template-parts/content', 'site-menu'); ?>
</div>

