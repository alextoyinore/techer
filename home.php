<?php
    get_header( );
?>

<br><br>
    <article class="content tc-article">

        <div class="tc-archive-grid">
            
            <?php
                if(have_posts()):
                    while(have_posts()):the_post(); ?>
                    <article class="techer-list-block">
                        
                        <article>
                        
                        <p>      
                            <a href="<?php the_permalink(); ?>" class="tc-title"> <?php the_title(); ?></a>
                            
                            <br><br>

                            <span class="tc-excerpt"><?php echo get_the_excerpt() ?></span><br><br>

                            <?php echo get_the_author_posts_link() ?>

                            <span class="tc-time"><?php echo get_the_date(); ?></span>
                        
                        </p>
                        
                        <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('medium'); ?></a>
                        
                        </article>

                    </article>
                <?php
                    endwhile;
                else:
                    _e( 'Sorry no post match your criteria', 'techer' );
                endif;
            ?>
            </section>
        </div>

        <div class="tc-article-post-nav center-nav">
            <strong class="tc-post-nav left"><?php previous_posts_link( ) ?></strong>
            <strong class="tc-post-nav right"><?php next_posts_link( ) ?></strong>
        </div>

    </article>
    <br><br>

<?php
    get_footer();
?>