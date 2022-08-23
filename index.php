<?php get_header(); ?>

<br><br>

    <?php 

        if(is_page() || is_category() || is_tag()){ ?>
        
            <article class="content">

    <?php }else { ?>

            <article class="tc-article">

    <?php } ?>

    <h1>
        <?php 
            if(is_category()): single_cat_title();
            elseif(is_tag()): single_tag_title();
            elseif(is_date()): the_date();
            elseif(is_author()): the_author();
            elseif(is_time()): the_time();
            endif;
        ?>
        <hr>
    </h1>
        <?php the_content(); ?>
        </article>

<br><br>

<?php get_footer(); ?>