<?php
    get_header( );
?>

<br><br>
    <article class="content">
    
    <h1>
        <?php 
            if(is_category()): single_cat_title();
            elseif(is_tag()): single_tag_title();
            elseif(is_date()): the_date();
            elseif(is_author()): the_author();
            elseif(is_time()): the_time();
            endif;
        ?><br><br>
        <hr>
    </h1>

        <div class="tc-archive-grid">
            
            <?php
                if(have_posts()):
                    while(have_posts()):the_post(); ?>
                    <article class="techer-list-block">
                        
                        <article>
                        
                        <p>      
                            <a href="<?php the_permalink(); ?>" class="tc-title"> <?php the_title( ); ?></a>
                            
                            <br><br>

                            <span class="tc-excerpt"><?php echo get_the_excerpt() ?></span><br><br>

                            <?php echo get_the_author_posts_link(  ) ?>

                                <?php
                                    $archive_year = get_the_time('y');
                                    $archive_month = get_the_time('m');
                                    $archive_day = get_the_time('d'); ?>
                                    <a class="tc-time" href="<?php echo get_day_link($archive_year, $archive_month, $archive_day); ?>">
                                        <?php the_date(); ?>
                                    </a>

                        </p>
                        
                        <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('medium') ?></a>
                        
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

        <br><br>

        <div class="tc-article-post-nav center-nav">
            <strong class="tc-post-nav left"><?php previous_posts_link( ) ?></strong>
            <strong class="tc-post-nav right"><?php next_posts_link( ) ?></strong>
        </div>


    </article>
    <br><br>

<?php
    get_footer();
?>