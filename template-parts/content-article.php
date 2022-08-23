
    <div class="tc-article">
        <header>
        <span class="tc-post-meta"><?php echo get_the_author_posts_link(); ?> &nbsp; | &nbsp; <?php the_date( ); ?>
            &nbsp; | &nbsp; <?php
                        echo get_comments_number( );
                            if(get_comments_number() > 1){ echo ' Comments';
                        }else{
                            echo ' Comment';
                        } ?>
        </span>
            <?php the_title( '<h1 class="tc-headline">', '</h2>'); ?>
            <?php the_post_thumbnail(); ?>
        </header>

        <article>
            <?php
                the_content();
            ?>
        </article>
        <hr>
        <br>
        <span class="tc-post-meta"> <?php the_tags('<div class="tc-tags"><span>In this article: </span>', ', ', '</div>') ?>
        </span>
        <br>
        <hr>
        <?php the_widget( 'Techer_Share_Block', $instance=array(
            'title' => '',
            'label' => 'Share this on'
        )); ?>
        <hr>
        <br>
        <div class="tc-article-post-nav">
            <?php previous_post_link('<strong class="tc-post-nav left">%link</strong>') ?>
        
            <?php next_post_link('<strong class="tc-post-nav right">%link</strong>') ?>
        </div>
        <br>
        <hr>

        <!-- Related from same category -->
        <?php the_widget( 'Techer_Row_Block_1', $instance=array(
                    'title' => 'Related',
                    'terms' => get_the_category()[0]->name,
                    'number_of_posts' => 3,
                    'offset' => 0
                )); ?>
               
        <hr>
    </div>

    <div class="tc-comment">
        <!-- <h3>Discussion</h3> -->
        <?php if(comments_open( ) || get_comments_number(  )){
            //comments_template();
        } ?>
    </div>

