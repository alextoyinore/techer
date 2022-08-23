<?php
/* 
Template Name: Widgetized Page 
*/

?>

<?php get_header(); ?>  

  <br><br>
    <article class="content">

    <?php
        if(is_active_sidebar( ('widgetized-page-content') )):
            dynamic_sidebar( 'widgetized-page-content' );
        endif;
    ?>

    </article>
    <br><br>

<?php get_footer(); ?> 