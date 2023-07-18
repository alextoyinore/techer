<?php
 
class Techer_Column_Block extends WP_Widget {
 
    /**
     * Register widget with WordPress.
     */

    public function __construct() {
        $widget_options = array(
            'classname' => 'techer-column-block',
            'description' => 'A single column list of posts'
        );
        // actual widget processes
        parent::__construct(
            'techer_column_block',
            'Techer Column Block',
            $widget_options
        );

        add_action( 'widgets_init', function() {
            register_widget( 'Techer_Column_Block' );
        });
    }

    
    public $args = array(
        'before_title'  => '<h3>',
        'after_title'   => '</h3>',
        'before_widget' => '<section>',
        'after_widget'  => '</section>'
    );
 

    public function widget( $args, $instance ) {
        // outputs the content of the widget
        echo $args['before_widget'];

        $terms = ''; $number_of_posts = 0; $offset = 0;

        if( ! empty($instance['terms'])){
            $terms = $instance['terms'];
        }

        if( ! empty($instance['number_of_posts'])){
            $number_of_posts = (int)$instance['number_of_posts'];
        }

        if( ! empty($instance['offset'])){
            $offset = (int)$instance['offset'];
        }

        //echo $number_of_posts; echo $offset; echo $terms;

        //The Query
        $the_query = new WP_Query( array('category_name' => $terms, 'posts_per_page' => $number_of_posts, 'offset' => $offset) );


        // The Loop
        if ( $the_query->have_posts() ) {

            if ( ! empty( $instance['title'] ) ) {
                echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'] . '<hr>';
            }

            while ( $the_query->have_posts() ) {
                $the_query->the_post(); ?>

                <article><p>

                <?php
                $categories = get_the_category();
                if(!empty($categories)){
                    ?>
                    <a class="tc-category" href="<?php echo site_url().'/category/'.strtolower($categories[0]->name); ?> "><?php echo $categories[0]->name; ?></a><br>
                <?php } ?>
                
                <a href="<?php the_permalink(); ?>" class="tc-title"><?php the_title(); ?></a>
                </p></article><hr>
            
            <?php
            } ?>

            <section class="more"> MORE FROM
                <a class="tc-category" href="<?php echo site_url().'/category/'.strtolower($categories[0]->name); ?> "><?php echo strtoupper($categories[0]->name); ?></a>
            </section>

        <?php    
        } else {
            echo _e( 'No post matches your query', 'techer' );
        }
        /* Restore original Post Data */
        wp_reset_postdata();

 
        echo $args['after_widget'];
    }
 
    public function form( $instance ) {
        // outputs the options form in the admin
        if(!empty($instance)) {
            $title = $instance['title'];
            $terms = $instance['terms'];
            $number_of_posts = $instance['number_of_posts'];
            $offset = $instance['offset'];
        }else{
            $title = '';
            $terms = '';
            $number_of_posts = 0;
            $offset = 0;
        }

        ?>

        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>">Title</label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $title; ?>" type="text" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('terms'); ?>">Terms</label>
            <input class="widefat" id="<?php echo $this->get_field_id('terms'); ?>" name="<?php echo $this->get_field_name('terms'); ?>" value="<?php echo $terms; ?>" type="text" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('number_of_posts'); ?>">Number of posts</label>
            <input class="widefat" id="<?php echo $this->get_field_id('number_of_posts'); ?>" name="<?php echo $this->get_field_name('number_of_posts'); ?>" value="<?php echo $number_of_posts; ?>" type="text" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('offset'); ?>">Posts offset</label>
            <input class="widefat" id="<?php echo $this->get_field_id('offset'); ?>" name="<?php echo $this->get_field_name('offset'); ?>" value="<?php echo $offset; ?>" type="text" />
        </p>
        <?php
    }
 
    public function update( $new_instance, $old_instance ) {
        // processes widget options to be saved
        $instance = $old_instance;
        $instance['title'] = $new_instance['title'];
        $instance['terms'] = $new_instance['terms'];
        $instance['number_of_posts'] = $new_instance['number_of_posts'];
        $instance['offset'] = $new_instance['offset'];
        return $instance;
    }
}
 
$techer_column_block = new Techer_Column_Block();


/**
 * Techer Column Block 2
 */

 class Techer_Column_Block_2 extends WP_Widget {
 
    /**
     * Register widget with WordPress.
     */

    public function __construct() {
        $widget_options = array(
            'classname' => 'techer-column-block-2',
            'description' => 'A single column list of posts with thumbnail'
        );
        // actual widget processes
        parent::__construct(
            'techer_column_block_2',
            'Techer Column Block 2',
            $widget_options
        );

        add_action( 'widgets_init', function() {
            register_widget( 'Techer_Column_Block_2' );
        });
    }

    
    public $args = array(
        'before_title'  => '<h3>',
        'after_title'   => '</h3>',
        'before_widget' => '<section>',
        'after_widget'  => '</section>'
    );
 

    public function widget( $args, $instance ) {
        // outputs the content of the widget
        echo $args['before_widget'];

        $terms = ''; $number_of_posts = 0; $offset = 0;

        if( ! empty($instance['terms'])){
            $terms = $instance['terms'];
        }

        if( ! empty($instance['number_of_posts'])){
            $number_of_posts = (int)$instance['number_of_posts'];
        }

        if( ! empty($instance['offset'])){
            $offset = (int)$instance['offset'];
        }

        //echo $number_of_posts; echo $offset; echo $terms;

        //The Query
        $the_query = new WP_Query( array('category_name' => $terms, 'posts_per_page' => $number_of_posts, 'offset' => $offset) );


        // The Loop
        if ( $the_query->have_posts() ) {

            if ( ! empty( $instance['title'] ) ) {
                echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'] . '<hr>';
            }

            while ( $the_query->have_posts() ) {
                $the_query->the_post(); ?>

                <article><p>

                <?php
                $categories = get_the_category();
                if(!empty($categories)){
                    ?>
                    <a class="tc-category" href="<?php echo site_url().'/category/'.strtolower($categories[0]->name); ?> "><?php echo $categories[0]->name; ?></a><br>
                <?php } ?>

                <div class="tc-column-block-row">
                    <a href="<?php the_permalink(); ?>" class="tc-column-block-thumbnail"><?php the_post_thumbnail(); ?></a>
                    <a href="<?php the_permalink(); ?>" class="tc-title"><?php the_title(); ?></a>
                </div>
                
                </p></article><hr>
            
            <?php
            } ?>

            <section class="more"> MORE FROM
                <a class="tc-category" href="<?php echo site_url().'/category/'.strtolower($categories[0]->name); ?> "><?php echo strtoupper($categories[0]->name); ?></a>
            </section>

        <?php    
        } else {
            echo _e( 'No post matches your query', 'techer' );
        }
        /* Restore original Post Data */
        wp_reset_postdata();

 
        echo $args['after_widget'];
    }
 
    public function form( $instance ) {
        // outputs the options form in the admin
        if(!empty($instance)) {
            $title = $instance['title'];
            $terms = $instance['terms'];
            $number_of_posts = $instance['number_of_posts'];
            $offset = $instance['offset'];
        }else{
            $title = '';
            $terms = '';
            $number_of_posts = 0;
            $offset = 0;
        }

        ?>

        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>">Title</label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $title; ?>" type="text" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('terms'); ?>">Terms</label>
            <input class="widefat" id="<?php echo $this->get_field_id('terms'); ?>" name="<?php echo $this->get_field_name('terms'); ?>" value="<?php echo $terms; ?>" type="text" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('number_of_posts'); ?>">Number of posts</label>
            <input class="widefat" id="<?php echo $this->get_field_id('number_of_posts'); ?>" name="<?php echo $this->get_field_name('number_of_posts'); ?>" value="<?php echo $number_of_posts; ?>" type="text" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('offset'); ?>">Posts offset</label>
            <input class="widefat" id="<?php echo $this->get_field_id('offset'); ?>" name="<?php echo $this->get_field_name('offset'); ?>" value="<?php echo $offset; ?>" type="text" />
        </p>
        <?php
    }
 
    public function update( $new_instance, $old_instance ) {
        // processes widget options to be saved
        $instance = $old_instance;
        $instance['title'] = $new_instance['title'];
        $instance['terms'] = $new_instance['terms'];
        $instance['number_of_posts'] = $new_instance['number_of_posts'];
        $instance['offset'] = $new_instance['offset'];
        return $instance;
    }
}
 
$techer_column_block_2 = new Techer_Column_Block_2();

class Techer_List_Block extends WP_Widget {
 
    /**
     * Register widget with WordPress.
     */

    public function __construct() {
        $widget_options = array(
            'classname' => 'techer-list-block',
            'description' => 'Block of posts with thumbnail and excertps for displaying blog list'
        );
        // actual widget processes
        parent::__construct(
            'techer_list_block',
            'Techer List Block',
            $widget_options
        );

        add_action( 'widgets_init', function() {
            register_widget( 'Techer_List_Block' );
        });
    }


    public $args = array(
        'before_title'  => '<h3>',
        'after_title'   => '</h3>',
        'before_widget' => '<section>',
        'after_widget'  => '</section>'
    );
 

    public function widget( $args, $instance ) {
        // outputs the content of the widget
        echo $args['before_widget'];

        $terms = ''; $number_of_posts = 0; $offset = 0;

        if( ! empty($instance['terms'])){
            $terms = $instance['terms'];
        }

        if( ! empty($instance['number_of_posts'])){
            $number_of_posts = (int)$instance['number_of_posts'];
        }

        if( ! empty($instance['offset'])){
            $offset = (int)$instance['offset'];
        }

        //echo $number_of_posts; echo $offset; echo $terms;

        //The Query
        $the_query = new WP_Query( array('category_name' => $terms, 'posts_per_page' => $number_of_posts, 'offset' => $offset) );


        // The Loop
        if ( $the_query->have_posts() ) {

            if ( ! empty( $instance['title'] ) ) {
                echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'] . '<hr>';
            }

            while ( $the_query->have_posts() ) {
                $the_query->the_post(); ?>

                <article>
                        
                    <p>      
                        <a href="<?php the_permalink(); ?>" class="tc-title"> <?php the_title( ); ?></a>
                        
                        <br><br>

                        <span class="tc-excerpt"><?php echo get_the_excerpt() ?></span><br><br>

                        <?php echo get_the_author_posts_link() ?>

                        <span class="tc-time"><?php echo get_the_date(); ?></span>
                    
                    </p>
                    
                    <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('medium') ?></a>
                        
                </article>
                
        <?php

            }
        } else {
            echo __( 'No post matches your query', 'techer' );
        }
        /* Restore original Post Data */
        wp_reset_postdata();

 
        echo $args['after_widget'];
    }
 
    public function form( $instance ) {
        // outputs the options form in the admin
        if(!empty($instance)) {
            $title = $instance['title'];
            $terms = $instance['terms'];
            $number_of_posts = $instance['number_of_posts'];
            $offset = $instance['offset'];
        }else{
            $title = '';
            $terms = '';
            $number_of_posts = 0;
            $offset = 0;
        }

        ?>

        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>">Title</label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $title; ?>" type="text" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('terms'); ?>">Terms</label>
            <input class="widefat" id="<?php echo $this->get_field_id('terms'); ?>" name="<?php echo $this->get_field_name('terms'); ?>" value="<?php echo $terms; ?>" type="text" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('number_of_posts'); ?>">Number of posts</label>
            <input class="widefat" id="<?php echo $this->get_field_id('number_of_posts'); ?>" name="<?php echo $this->get_field_name('number_of_posts'); ?>" value="<?php echo $number_of_posts; ?>" type="text" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('offset'); ?>">Posts offset</label>
            <input class="widefat" id="<?php echo $this->get_field_id('offset'); ?>" name="<?php echo $this->get_field_name('offset'); ?>" value="<?php echo $offset; ?>" type="text" />
        </p>
        <?php
    }
 
    public function update( $new_instance, $old_instance ) {
        // processes widget options to be saved
        $instance = $old_instance;
        $instance['title'] = $new_instance['title'];
        $instance['terms'] = $new_instance['terms'];
        $instance['number_of_posts'] = $new_instance['number_of_posts'];
        $instance['offset'] = $new_instance['offset'];
        return $instance;
    }
}

$techer_list_block = new Techer_List_Block();


class Techer_Row_Block_1 extends WP_Widget {
 
    /**
     * Register widget with WordPress.
     */

    public function __construct() {
        $widget_options = array(
            'classname' => 'techer-row-block-1',
            'description' => 'Block of posts with thumbnail and excertps for displaying blog list'
        );
        // actual widget processes
        parent::__construct(
            'techer_row_block_1',
            'Techer Row Block 1',
            $widget_options
        );

        add_action( 'widgets_init', function() {
            register_widget( 'Techer_Row_Block_1' );
        });
    }

    
    public $args = array(
        'before_title'  => '<h3>',
        'after_title'   => '</h3>',
        'before_widget' => '<section>',
        'after_widget'  => '</section>'
    );
 

    public function widget( $args, $instance ) {
        // outputs the content of the widget
        echo $args['before_widget'];

        $terms = ''; $number_of_posts = 0; $offset = 0;

        if( ! empty($instance['terms'])){
            $terms = $instance['terms'];
        }

        if( ! empty($instance['number_of_posts'])){
            $number_of_posts = (int)$instance['number_of_posts'];
        }

        if( ! empty($instance['offset'])){
            $offset = (int)$instance['offset'];
        }

        //echo $number_of_posts; echo $offset; echo $terms;

        //The Query
        $the_query = new WP_Query( array('category_name' => $terms, 'posts_per_page' => $number_of_posts, 'offset' => $offset) );

        // The Loop
        if ( $the_query->have_posts() ) { 
            
            if ( ! empty( $instance['title'] ) ) {
                echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
                echo '<hr>';
            }

            ?>
            
            <article>

            <?php
            while ( $the_query->have_posts() ) {
                $the_query->the_post(); 
                $categories = get_the_category(); ?>
            <p>
            <?php
                if(!empty($categories)){ ?>
                    <a class="tc-category" href="<?php echo site_url().'/category/'.strtolower($categories[0] -> name); ?>"><?php echo $categories[0] -> name;?></a><br>
            <?php
                } ?>
                <a href="<?php the_permalink() ?>" class="tc-title"><?php the_title(); ?></a></p>
            <?php
            } ?>

            </article>

            <section class="more">
            <a class="tc-category" href="<?php echo site_url().'/category/'.strtolower($categories[0]->name); ?>
"><?php echo 'MORE FROM ' . strtoupper($categories[0]->name); ?></a>
            </section>

            <?php
        } else {
            echo _e( 'No post matches your query', 'techer' );
        }
        
        /* Restore original Post Data */
        wp_reset_postdata();

 
        echo $args['after_widget'];
    }
 
    public function form( $instance ) {
        // outputs the options form in the admin
        if(!empty($instance)) {
            $title = $instance['title'];
            $terms = $instance['terms'];
            $number_of_posts = $instance['number_of_posts'];
            $offset = $instance['offset'];
        }else{
            $title = '';
            $terms = '';
            $number_of_posts = 0;
            $offset = 0;
        }

        ?>

        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>">Title</label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $title; ?>" type="text" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('terms'); ?>">Terms</label>
            <input class="widefat" id="<?php echo $this->get_field_id('terms'); ?>" name="<?php echo $this->get_field_name('terms'); ?>" value="<?php echo $terms; ?>" type="text" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('number_of_posts'); ?>">Number of posts</label>
            <input class="widefat" id="<?php echo $this->get_field_id('number_of_posts'); ?>" name="<?php echo $this->get_field_name('number_of_posts'); ?>" value="<?php echo $number_of_posts; ?>" type="text" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('offset'); ?>">Posts offset</label>
            <input class="widefat" id="<?php echo $this->get_field_id('offset'); ?>" name="<?php echo $this->get_field_name('offset'); ?>" value="<?php echo $offset; ?>" type="text" />
        </p>
        <?php
    }
 
    public function update( $new_instance, $old_instance ) {
        // processes widget options to be saved
        $instance = $old_instance;
        $instance['title'] = $new_instance['title'];
        $instance['terms'] = $new_instance['terms'];
        $instance['number_of_posts'] = $new_instance['number_of_posts'];
        $instance['offset'] = $new_instance['offset'];
        return $instance;
    }
}

$techer_row_block_1 = new Techer_Row_Block_1();

class Techer_Row_Block_2 extends WP_Widget {
 
    /**
     * Register widget with WordPress.
     */

    public function __construct() {
        $widget_options = array(
            'classname' => 'techer-row-block-2',
            'description' => 'Block of posts with thumbnail and excertps for displaying blog list'
        );
        // actual widget processes
        parent::__construct(
            'techer_row_block_2',
            'Techer Row Block 2',
            $widget_options
        );

        add_action( 'widgets_init', function() {
            register_widget( 'Techer_Row_Block_2' );
        });
    }

    
    public $args = array(
        'before_title'  => '<h3>',
        'after_title'   => '</h3>',
        'before_widget' => '<section>',
        'after_widget'  => '</section>'
    );
 

    public function widget( $args, $instance ) {
        // outputs the content of the widget
        echo $args['before_widget'];

        $terms = ''; $number_of_posts = 0; $offset = 0;

        if( ! empty($instance['terms'])){
            $terms = $instance['terms'];
        }

        if( ! empty($instance['number_of_posts'])){
            $number_of_posts = (int)$instance['number_of_posts'];
        }

        if( ! empty($instance['offset'])){
            $offset = (int)$instance['offset'];
        }

        //echo $number_of_posts; echo $offset; echo $terms;

        //The Query
        $the_query = new WP_Query( array('category_name' => $terms, 'posts_per_page' => $number_of_posts, 'offset' => $offset) );

        // The Loop
        if ( $the_query->have_posts() ) { 
            
            if ( ! empty( $instance['title'] ) ) {
                echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
                echo '<hr>';
            }

            ?>
            
            <article>

            <?php
            while ( $the_query->have_posts() ) {
                $the_query->the_post(); ?>
            <p>
                <?php
                the_post_thumbnail('medium'); echo '<br>';

                $categories = get_the_category();
                if(!empty($categories)){?>
                    <a class="tc-category" href="<?php echo site_url().'/category/'.strtolower($categories[0] -> name); ?>"><?php echo $categories[0] -> name; ?></a><br>
                <?php
                } ?>

                <a href="<?php the_permalink(); ?>" class="tc-title"><?php the_title(); ?></a></p>

            <?php
            } ?>
            
        </article>

        <section class="more"> MORE FROM
            <a class="tc-category" href="<?php echo site_url().'/category/'.strtolower($categories[0]->name); ?> "><?php echo strtoupper($categories[0]->name); ?></a>
            </section>
        <?php
        } else {
            echo _e( 'No post matches your query', 'techer' );
        }
        /* Restore original Post Data */
        wp_reset_postdata();

 
        echo $args['after_widget'];
    }
 
    public function form( $instance ) {
        // outputs the options form in the admin
        if(!empty($instance)) {
            $title = $instance['title'];
            $terms = $instance['terms'];
            $number_of_posts = $instance['number_of_posts'];
            $offset = $instance['offset'];
        }else{
            $title = '';
            $terms = '';
            $number_of_posts = 0;
            $offset = 0;
        }

        ?>

        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>">Title</label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $title; ?>" type="text" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('terms'); ?>">Terms</label>
            <input class="widefat" id="<?php echo $this->get_field_id('terms'); ?>" name="<?php echo $this->get_field_name('terms'); ?>" value="<?php echo $terms; ?>" type="text" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('number_of_posts'); ?>">Number of posts</label>
            <input class="widefat" id="<?php echo $this->get_field_id('number_of_posts'); ?>" name="<?php echo $this->get_field_name('number_of_posts'); ?>" value="<?php echo $number_of_posts; ?>" type="text" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('offset'); ?>">Posts offset</label>
            <input class="widefat" id="<?php echo $this->get_field_id('offset'); ?>" name="<?php echo $this->get_field_name('offset'); ?>" value="<?php echo $offset; ?>" type="text" />
        </p>
        <?php
    }
 
    public function update( $new_instance, $old_instance ) {
        // processes widget options to be saved
        $instance = $old_instance;
        $instance['title'] = $new_instance['title'];
        $instance['terms'] = $new_instance['terms'];
        $instance['number_of_posts'] = $new_instance['number_of_posts'];
        $instance['offset'] = $new_instance['offset'];
        return $instance;
    }
}

$techer_row_block_2 = new Techer_Row_Block_2();

class Techer_Featured_Block_2 extends WP_Widget {
 
    /**
     * Register widget with WordPress.
     */

    public function __construct() {
        $widget_options = array(
            'classname' => 'techer-featured-block-2',
            'description' => 'Block of posts with thumbnail and excertps for displaying blog list'
        );
        // actual widget processes
        parent::__construct(
            'techer_featured_block_2',
            'Techer Featured Block 2',
            $widget_options
        );

        add_action( 'widgets_init', function() {
            register_widget( 'Techer_Featured_Block_2' );
        });
    }

    
    public $args = array(
        'before_title'  => '<h3>',
        'after_title'   => '</h3>',
        'before_widget' => '<section>',
        'after_widget'  => '</section>'
    );
 

    public function widget( $args, $instance ) {
        // outputs the content of the widget
        echo $args['before_widget'];

        $terms = ''; $number_of_posts = 0; $offset = 0;

        if( ! empty($instance['terms'])){
            $terms = $instance['terms'];
        }

        if( ! empty($instance['number_of_posts'])){
            $number_of_posts = (int)$instance['number_of_posts'];
        }

        if( ! empty($instance['offset'])){
            $offset = (int)$instance['offset'];
        }

        //echo $number_of_posts; echo $offset; echo $terms;

        //The Query
        $the_query = new WP_Query( array('category_name' => $terms, 'posts_per_page' => $number_of_posts, 'offset' => $offset) );

        // The Loop
        if ( $the_query->have_posts() ) { 
            
            if ( ! empty( $instance['title'] ) ) {
                echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
                echo '<hr>';
            }

            ?>
            
            <article class="left">
            
            <?php
            while ( $the_query->have_posts() ) {
                $the_query->the_post(); ?>
                
                <p>

            <?php
                $categories = get_the_category();
                if(!empty($categories)){ ?>

                    <a class="tc-category" href="<?php echo site_url().'/category/'.strtolower($categories[0] -> name); ?>"><?php echo $categories[0] -> name; ?></a><br><br>
                <?php } ?>

                <a href="<?php the_permalink(); ?>" class="tc-title title"><?php the_title(); ?></a><br><br>

                <span class="tc-excerpt"><?php echo get_the_excerpt(); ?><span><br><br>

                <?php echo get_the_author_posts_link() ?> &nbsp;

                <a href="" class="tc-time"><?php the_date() ?></a><br><br>

                <?php the_post_thumbnail( ); ?>

                </p>
                
            <?php } ?>

            </article>

            <section class="more"> MORE FROM
            <a class="tc-category" href="<?php echo site_url().'/category/'.strtolower($categories[0]->name); ?> "><?php echo strtoupper($categories[0]->name); ?></a>
            </section>

        <?php
        } else {
            echo _e( 'No post matches your query', 'techer' );
        }
        /* Restore original Post Data */
        wp_reset_postdata();

 
        echo $args['after_widget'];
    }
 
    public function form( $instance ) {
        // outputs the options form in the admin
        if(!empty($instance)) {
            $title = $instance['title'];
            $terms = $instance['terms'];
            $number_of_posts = $instance['number_of_posts'];
            $offset = $instance['offset'];
        }else{
            $title = '';
            $terms = '';
            $number_of_posts = 0;
            $offset = 0;
        }

        ?>

        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>">Title</label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $title; ?>" type="text" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('terms'); ?>">Terms</label>
            <input class="widefat" id="<?php echo $this->get_field_id('terms'); ?>" name="<?php echo $this->get_field_name('terms'); ?>" value="<?php echo $terms; ?>" type="text" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('number_of_posts'); ?>">Number of posts</label>
            <input class="widefat" id="<?php echo $this->get_field_id('number_of_posts'); ?>" name="<?php echo $this->get_field_name('number_of_posts'); ?>" value="<?php echo $number_of_posts; ?>" type="text" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('offset'); ?>">Posts offset</label>
            <input class="widefat" id="<?php echo $this->get_field_id('offset'); ?>" name="<?php echo $this->get_field_name('offset'); ?>" value="<?php echo $offset; ?>" type="text" />
        </p>
        <?php
    }
 
    public function update( $new_instance, $old_instance ) {
        // processes widget options to be saved
        $instance = $old_instance;
        $instance['title'] = $new_instance['title'];
        $instance['terms'] = $new_instance['terms'];
        $instance['number_of_posts'] = $new_instance['number_of_posts'];
        $instance['offset'] = $new_instance['offset'];
        return $instance;
    }
}

$techer_featured_block_2 = new Techer_Featured_Block_2();


class Techer_Grid_Block extends WP_Widget {
 
    /**
     * Register widget with WordPress.
     */

    public function __construct() {
        $widget_options = array(
            'classname' => 'techer-grid-block',
            'description' => 'Block of posts with thumbnail and excertps for displaying blog list'
        );
        // actual widget processes
        parent::__construct(
            'techer_grid_block',
            'Techer Grid Block',
            $widget_options
        );

        add_action( 'widgets_init', function() {
            register_widget( 'Techer_Grid_Block' );
        });
    }

    
    public $args = array(
        'before_title'  => '<h3>',
        'after_title'   => '</h3>',
        'before_widget' => '<section>',
        'after_widget'  => '</section>'
    );
 

    public function widget( $args, $instance ) {
        // outputs the content of the widget
        echo $args['before_widget'];

        $terms = ''; $number_of_posts = 0; $offset = 0;

        if( ! empty($instance['terms'])){
            $terms = $instance['terms'];
        }

        if( ! empty($instance['number_of_posts'])){
            $number_of_posts = (int)$instance['number_of_posts'];
        }

        if( ! empty($instance['offset'])){
            $offset = (int)$instance['offset'];
        }

        //echo $number_of_posts; echo $offset; echo $terms;

        //The Query
        $the_query = new WP_Query( array('category_name' => $terms, 'posts_per_page' => $number_of_posts, 'offset' => $offset) );

        if ( ! empty( $instance['title'] ) ) {
            echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
            echo '<hr>';
        }

        // The Loop
        if ( $the_query->have_posts() ) {

            while ( $the_query->have_posts() ) {

                $categories = get_the_category();

                $the_query->the_post(); 
                
                echo '<article><p>';
                echo '<a href="'.get_the_permalink().'" class="tc-title">'.get_the_title( ) .'</a><br><br>';
                echo '<span class="tc-excerpt">'. get_the_excerpt() .'<span><br><br>';
                echo '<a href="" class="tc-author">'. get_the_author() .'</a>&nbsp;';
                echo '<a href="" class="tc-time">'.get_the_date().'</a>';
                echo '</p>';
                the_post_thumbnail('medium');
                echo '</article>';
                        
                
            }
            //echo '</article>';
        ?>
            <section class="more">
            <a class="tc-category" href="<?php echo site_url().'/category/'.strtolower($categories[1]->name); ?>
"><?php echo 'MORE FROM ' . strtoupper($categories[0]->name); ?></a>
            </section>
            
        <?php
        } else {
            echo __( 'No post matches your query', 'techer' );
        }
        /* Restore original Post Data */
        wp_reset_postdata();

 
        echo $args['after_widget'];
    }
 
    public function form( $instance ) {
        // outputs the options form in the admin
        if(!empty($instance)) {
            $title = $instance['title'];
            $terms = $instance['terms'];
            $number_of_posts = $instance['number_of_posts'];
            $offset = $instance['offset'];
        }else{
            $title = '';
            $terms = '';
            $number_of_posts = 0;
            $offset = 0;
        }

        ?>

        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>">Title</label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $title; ?>" type="text" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('terms'); ?>">Terms</label>
            <input class="widefat" id="<?php echo $this->get_field_id('terms'); ?>" name="<?php echo $this->get_field_name('terms'); ?>" value="<?php echo $terms; ?>" type="text" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('number_of_posts'); ?>">Number of posts</label>
            <input class="widefat" id="<?php echo $this->get_field_id('number_of_posts'); ?>" name="<?php echo $this->get_field_name('number_of_posts'); ?>" value="<?php echo $number_of_posts; ?>" type="text" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('offset'); ?>">Posts offset</label>
            <input class="widefat" id="<?php echo $this->get_field_id('offset'); ?>" name="<?php echo $this->get_field_name('offset'); ?>" value="<?php echo $offset; ?>" type="text" />
        </p>
        <?php
    }
 
    public function update( $new_instance, $old_instance ) {
        // processes widget options to be saved
        $instance = $old_instance;
        $instance['title'] = $new_instance['title'];
        $instance['terms'] = $new_instance['terms'];
        $instance['number_of_posts'] = $new_instance['number_of_posts'];
        $instance['offset'] = $new_instance['offset'];
        return $instance;
    }
}

$techer_grid_block = new Techer_Grid_Block();

class Techer_Social_Share {

}

class Techer_Share_Block extends WP_Widget {

    /**
     * Register widget with WordPress.
     */

    public function __construct() {
        $widget_options = array(
            'classname' => 'techer-share-block',
            'description' => 'Block for sharing post'
        );
        // actual widget processes
        parent::__construct(
            'techer_share-block',
            'Techer Share Block',
            $widget_options
        );

        add_action( 'widgets_init', function() {
            register_widget( 'Techer_Share_Block' );
        });
    }


    public array $args = array(
        'before_title'  => '<h3>',
        'after_title'   => '</h3>',
        'before_widget' => '<section>',
        'after_widget'  => '</section>'
    );


    public function widget( $args, $instance ) {

        if(!empty($instance['label'])){
            $label = $instance['label'];
        }

        global $post;

        $content = '';
        if(is_singular() || is_home()){

            // Get current page URL
            $techerURL = urlencode(get_permalink());

            // Get current page title
            $techerTitle = htmlspecialchars(urlencode(html_entity_decode(get_the_title(), ENT_COMPAT, 'UTF-8')), ENT_COMPAT, 'UTF-8');
            // $techerTitle = str_replace( ' ', '%20', get_the_title());

            // Get Post Thumbnail for pinterest
            $techerThumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );

            // Construct sharing URL without using any script
            $twitterURL = 'https://twitter.com/intent/tweet?text='.$techerTitle.'&amp;url='.$techerURL.'&amp;via=techer';
            $facebookURL = 'https://www.facebook.com/sharer/sharer.php?u='.$techerURL;
            $bufferURL = 'https://bufferapp.com/add?url='.$techerURL.'&amp;text='.$techerTitle;
            $linkedInURL = 'https://www.linkedin.com/shareArticle?mini=true&url='.$techerURL.'&amp;title='.$techerTitle;

            // Based on popular demand added Pinterest too
            $pinterestURL = 'https://pinterest.com/pin/create/button/?url='.$techerURL.'&amp;media='.$techerThumbnail[0].'&amp;description='.$techerTitle;

            // Add sharing button at the end of page/page content
            $content .= '<div class="tc-social-share">';
            $content .= '<div class="tc-socials"><span class="tc-social-share-label">'.$label.': </span></div>';
            $content .= '<div><span><a class="tc-link tc-twitter" href="'. $twitterURL .'" target="_blank">Twitter</a></span>';
            $content .= '<span><a class="tc-link tc-facebook" href="'.$facebookURL.'" target="_blank">Facebook</a></span>';
            $content .= '<span><a class="tc-link tc-buffer" href="'.$bufferURL.'" target="_blank">Buffer</a></span>';
            $content .= '<span><a class="tc-link tc-linkedin" href="'.$linkedInURL.'" target="_blank">LinkedIn</a></span>';
            $content .= '<span><a class="tc-link tc-pinterest" href="'.$pinterestURL.'" data-pin-custom="true" target="_blank">Pin It</a></span>';
            $content .= '</div></div>';

            echo $content;
        }else{
            // if not a post/page then don't include sharing button
            echo $content;
        }

    }

    public function form( $instance ) {
        // outputs the options form in the admin
        if(!empty($instance)) {
            $title = $instance['title'];
            $label = $instance['label'];
        }else{
            $title = '';
            $label = '';
        } ?>

        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>">Title</label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $title; ?>" type="text" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('label'); ?>">Label</label>
            <input class="widefat" id="<?php echo $this->get_field_id('label'); ?>" name="<?php echo
            $this->get_field_name('label'); ?>" value="<?php echo $label; ?>" type="text" />
        </p>
        <?php
    }

    public function update( $new_instance, $old_instance ): array
    {
        // processes widget options to be saved
        $instance = $old_instance;
        $instance['title'] = $new_instance['title'];
        $instance['label'] = $new_instance['label'];
        return $instance;
    }
}

$techer_share_block= new Techer_Share_Block();
?>
