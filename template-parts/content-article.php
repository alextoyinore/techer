<div class="tc-article">
        <header>
			<div id="tc-headline">
				<?php the_title( '<h1 class="tc-headline">', '</h2>'); ?>
				<p class="tc-post-meta">
					<?php echo get_the_author_posts_link(); ?> &nbsp; | &nbsp; <?php the_date( ); ?>
            			&nbsp; | &nbsp; 
					<?php
                        echo get_comments_number( );
                            if(get_comments_number() > 1){ echo ' Comments';
                        }else{
                            echo ' Comment';
                        } ?> </p>
			</div>
            
			<?php //the_excerpt('<em class="tc-excerpt">','</em>'); ?>
			<br>
            <?php the_post_thumbnail(); ?>
        </header>

        <article class="article-body">
            <?php
                the_content();
            ?>
        </article>
		<br>
        <hr>
        <br>
        <span class="tc-post-meta"><?php the_tags('<div class="tc-tags"><strong>In this article: </strong>', ', ', '</div>') ?>
        </span>
        <br>
        <hr>
        <?php 
// 			the_widget( 'Techer_Share_Block', $instance=array(
//             'title' => '',
//             'label' => 'Share to')); 
            dynamic_sidebar('after-post');
		?>
        <hr>
        <br>
        <div class="tc-article-post-nav">
			<div class="tc-article-post-nav-item">
				<em>Previous</em> <br><br>
				<?php previous_post_link('<strong class="tc-post-nav left">%link</strong>') ?>
			</div>
				
			<div class="tc-article-post-nav-item">
				<em style="float:right;">Next</em> <br><br>
				<?php next_post_link('<strong style="float:right;" class="tc-post-nav right">%link</strong>') ?>
			</div>
 
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
		
		<br><br>

    <div class="tc-comment">
        <h3 class="section-header">Discussion</h3>
        <?php if(comments_open( ) || get_comments_number(  )){
            comments_template('../comments.php');
        } ?>
    </div>
    </div>


