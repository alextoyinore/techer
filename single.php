<?php get_header(); ?>  
  <br><br>
    <article class="content">

    <?php
        if(have_posts()) {
            while(have_posts()){
                the_post();
                get_template_part( 'template-parts/content', 'article');
            }
        }
    ?>

    </article>
    <br><br>

<?php get_footer(); ?> 