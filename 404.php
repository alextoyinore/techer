<?php get_header( ); ?>

<br><br>

<article class="content">
    <article>
    <h2 style="font-size: 5rem;"><?php echo _e('Oops! looks like you took a wrong turn.', 'techer') ?></h2>
    <br>

    <h3 style=""><?php echo _e('Let\'s make it up to you with these articles.', 'techer') ?></h3>

    <br>

    <hr>
    <?php

        the_widget( 'Techer_Row_Block_1', $instance=array(
        'title' => 'Stay with us',
        'terms' => '',
        'number_of_posts' => 4,
        'offset' => 0
        ));
    
    ?>
    </article>
</article>

<br><br>

<?php get_footer( ); ?>