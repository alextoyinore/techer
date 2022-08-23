<?php
/*
Template Name: Narrow Page
*/

?>

<?php get_header(); ?>

<br><br>
<article class="tc-article">

    <?php
    if(is_page()):
        the_content();
    endif;
    ?>

</article>
<br><br>

<?php get_footer(); ?>