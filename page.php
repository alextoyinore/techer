<?php get_header(); ?>  
  <br><br>
    <article class="content">

    <?php
        if(have_posts()) {
            while(have_posts()){
                the_post();
                the_content();
            }
        }
    ?>

    </article>
    <br><br>

<?php get_footer(); ?> 