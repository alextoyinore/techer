    <br><br>
    <?php dynamic_sidebar(); ?>
    <article class="content">

        <!-- 3 Column widget -->

        <div class="tc-3-col-widget">

        <!-- Front page top left column -->
                
                <?php the_widget( 'Techer_Column_Block', $instance=array(
                    'title' => '',
                    'terms' => '',
                    'number_of_posts' => 4,
                    'offset' => 2
                )); ?>
        
        <!-- Front page top middle column -->

                <?php the_widget( 'Techer_List_Block', $instance=array(
                    'title' => '',
                    'terms' => '',
                    'number_of_posts' => 2,
                    'offset' => 0
                )); ?>
            
        <!-- Front page top Right column -->

                <?php the_widget( 'Techer_Column_Block', $instance=array(
                    'title' => '',
                    'terms' => '',
                    'number_of_posts' => 4,
                    'offset' => 6
                )); ?>
        </div>

        
        <!-- Front page Row Block 1 -->

        <?php the_widget( 'Techer_Row_Block_1', $instance=array(
                    'title' => 'Technueve',
                    'terms' => 'default',
                    'number_of_posts' => 5,
                    'offset' => 0
                )); ?>

        
        <?php the_widget( 'Techer_Row_Block_1', $instance=array(
                    'title' => 'Design',
                    'terms' => 'default',
                    'number_of_posts' => 5,
                    'offset' => 0
                )); ?>

        <br>

        <!-- Row thumbnail block -->

        <?php the_widget( 'Techer_Row_Block_2', $instance=array(
                    'title' => 'Business',
                    'terms' => 'default',
                    'number_of_posts' => 4,
                    'offset' => 0
                )); ?>

        <br>

        <br>
        <!-- Row thumbnail block -->

        <?php the_widget( 'Techer_Row_Block_2', $instance=array(
                    'title' => 'Agriculture',
                    'terms' => 'default',
                    'number_of_posts' => 4,
                    'offset' => 0
                )); ?>

        <br><br><br>
        
        <!-- 3 Column block -->

        <div class="tc-3-column-block">

            <!-- 1 Column list -->

            <?php the_widget( 'Techer_Column_Block', $instance=array(
                    'title' => 'News',
                    'terms' => 'default',
                    'number_of_posts' => 4,
                    'offset' => 0
                )); ?>

            <!-- 1 Column list -->

            <?php the_widget( 'Techer_Column_Block', $instance=array(
                    'title' => 'Review',
                    'terms' => 'default',
                    'number_of_posts' => 4,
                    'offset' => 0
                )); ?>

            <!-- 1 Column list -->

            <?php the_widget( 'Techer_Column_Block', $instance=array(
                    'title' => 'Apps',
                    'terms' => 'default',
                    'number_of_posts' => 4,
                    'offset' => 0
                )); ?>

            <!-- 1 Column list -->

            <?php the_widget( 'Techer_Column_Block', $instance=array(
                    'title' => 'Firms',
                    'terms' => 'default',
                    'number_of_posts' => 4,
                    'offset' => 0
                )); ?>
        </div>

        <br><br><br>

        <!-- Big thumbnail block 1 -->
        
        <?php the_widget( 'Techer_Featured_Block_2', $instance=array(
                    'title' => 'Featured',
                    'terms' => '',
                    'number_of_posts' => 2,
                    'offset' => 5
                )); ?>

        <!-- End of Big thumbnail block 1 -->

        <br><br><br>

        <?php the_widget( 'Techer_Row_Block_1', $instance=array(
                    'title' => 'Market',
                    'terms' => 'default',
                    'number_of_posts' => 5,
                    'offset' => 0
                )); ?>

        
        <?php the_widget( 'Techer_Row_Block_1', $instance=array(
                    'title' => 'Auto',
                    'terms' => 'default',
                    'number_of_posts' => 5,
                    'offset' => 0
                )); ?>
        <br><br><br>
        <!-- Row thumbnail block -->

        <!-- Row thumbnail block -->

        <?php the_widget( 'Techer_Row_Block_2', $instance=array(
                    'title' => 'Environment',
                    'terms' => 'default',
                    'number_of_posts' => 4,
                    'offset' => 0
                )); ?>

        <br>

        <br>
        <!-- Row thumbnail block -->

        <?php the_widget( 'Techer_Row_Block_2', $instance=array(
                    'title' => 'Science',
                    'terms' => 'default',
                    'number_of_posts' => 4,
                    'offset' => 0
                )); ?>


        <br><br><br>

        <?php the_widget( 'Techer_Row_Block_1', $instance=array(
                    'title' => 'Crypto',
                    'terms' => 'default',
                    'number_of_posts' => 5,
                    'offset' => 0
                )); ?>

        
        <?php the_widget( 'Techer_Row_Block_1', $instance=array(
                    'title' => 'World',
                    'terms' => 'default',
                    'number_of_posts' => 5,
                    'offset' => 0
                )); ?>
        
        <br><br><br>
        <!-- Row thumbnail block -->
    </article>
    <br><br>