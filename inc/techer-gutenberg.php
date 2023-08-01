<?php

/**
 * Custom gutenberg functions
 */

 function techer_gutenberg_default_colors(){
     add_theme_support( 'editor-color-palette', array(
         array(
             'name' => 'white',
             'slug' => 'white',
             'color' => '#fff'
         ),

         array(
            'name' => 'black',
            'slug' => 'black',
            'color' => '#000'
         ),

         array(
            'name' => 'yellow',
            'slug' => 'yellow',
            'color' => '#ffd300'
        )
     ));

     add_theme_support( 'editor-font-sizes', array(
        array(
            'name' => 'Normal',
            'slug' => 'normal',
            'size' => 16
        ),

        array(
            'name' => 'Large',
            'slug' => 'large',
            'size' => 32
        )
     ) );
 }

 add_action( 'init', 'techer_gutenberg_default_colors');


/* Techer Column Block */
 function techer_column_block(){
     wp_enqueue_script(
         'techer-column-block-js',
         get_template_directory_uri()."/build/index.js",
         array('wp-blocks', 'wp-components', 'wp-block-editor', 'wp-editor'),
         filemtime(get_template_directory().'/build/index.js'));

     register_block_type(
         'techer/tc-column-block',
         [
             'editor-script' => 'techer-column-block-js',
             'render_callback' => 'techer_column_block_render',

             //custom-attributes
             'attributes' => [
                    'title' => [ 'type' => 'string', 'default' => ''],

                    'terms' => [ 'type' => 'array', 'default' => []],

                    'numberOfPosts' => [ 'type' => 'number', 'default' => 0],

                    'offset' => [ 'type' => 'number', 'default' => 0],

                    'backgroundColor' => ['type' => 'string', 'default' => '#FFFFFFFF']
             ]
         ]
     );
 }

 add_action('init', 'techer_column_block');

 function techer_column_block_render ($attr): string
 {
     $content = '';

     $title = $attr['title'];
     $terms = $attr['terms'];
     $number_of_posts = $attr['numberOfPosts'];
     $offset = $attr['offset'];
     $background_color = $attr['backgroundColor'];


     //The Query
     $the_query = new WP_Query( array('category_name' => $terms, 'posts_per_page' => $number_of_posts, 'offset' => $offset) );

     $content  .= '<section class="techer-column-block">';

     if(!empty($title)){
         $content .= '<h3>' . $title . '</h3><hr>';
     }

     $count = $number_of_posts;

     // The Loop
     if ( $the_query->have_posts() ) {

         while ( $the_query->have_posts()) {

            $count -= 1;

             $the_query->the_post();

             $content .= '<article><p>';

             $categories = get_the_category();
             if(!empty($categories)){
                 $content .= '<a class="tc-category more" href="'. site_url().'/category/'.strtolower($categories[0]->name) .'">'. strtoupper($categories[0]->name) .'</a>';
             }
			 
			 $content .= '<div class="tc-column-block-row">';
			 
			 $content .= '<a id="tc-column-block-thumbnail" href="'.get_the_permalink().'">'.get_the_post_thumbnail($post_id, 'thumbnail').'</a>';

             $content .= '<a class="tc-title" href="'.get_the_permalink().'">'.get_the_title().'</a></div>';

             /* if($count != 0){
				 $content .= '<br><hr>';
			 } */
			 
			 $content .= '<br><hr>';
         }

         $content .= '<section style="margin-top:1rem;" class="more"><a class="tc-category" href="'. site_url().'/category/'.strtolower($categories[0]->name) .'">MORE FROM '. strtoupper($categories[0]->name) .'</a> </section>';

     }else {
         $content .= 'No post matches your query';
     }

     /* Restore original Post Data */
     wp_reset_postdata();

     $content .= '</section><br><br>';

     return $content;
 }


/* Techer List Block */
function techer_list_block(){
    wp_enqueue_script(
        'techer-list-block-js',
        get_template_directory_uri()."/build/index.js",
        array('wp-blocks', 'wp-components', 'wp-block-editor', 'wp-editor'),
        filemtime(get_template_directory().'/build/index.js'));

    register_block_type(
        'techer/tc-list-block',
        [
            'editor-script' => 'techer-list-block-js',
            'render_callback' => 'techer_list_block_render',

            //custom-attributes
            'attributes' => [
                'title' => [ 'type' => 'string', 'default' => ''],

                'terms' => [ 'type' => 'array', 'default' => []],

                'numberOfPosts' => [ 'type' => 'number', 'default' => 0],

                'offset' => [ 'type' => 'number', 'default' => 0],

                'backgroundColor' => ['type' => 'string', 'default' => '#FFFFFFFF']
            ]
        ]
    );
}

add_action('init', 'techer_list_block');


function techer_list_block_render ($attr): string
{
    $content = '';

    $title = $attr['title'];
    $terms = $attr['terms'];
    $number_of_posts = $attr['numberOfPosts'];
    $offset = $attr['offset'];
    $background_color = $attr['backgroundColor'];


    //The Query
    $the_query = new WP_Query( array('category_name' => $terms, 'posts_per_page' => $number_of_posts, 'offset' => $offset) );

    $content  .= '<section class="techer-list-block">';

    // The Loop
    if ( $the_query->have_posts() ) {

        if(!empty($title)){
            $content .= '<h3>' . $title . '</h3><hr>';
        }

        while ( $the_query->have_posts()) {
            $the_query->the_post();

            $content .= '<article><p>';

            $content .= '<a class="tc-title" href="'.get_the_permalink().'">'.get_the_title().'</a><br><br>';

            $content .= '<span class="tc-excerpt">'.get_the_excerpt().'</span><br><br>';

            $content .= get_the_author_posts_link();

            $content .= '<span class="tc-time">&nbsp;'.get_the_date().'</span></p>';

            $content .= '<a href="'.get_the_permalink().'">'.get_the_post_thumbnail().'</a>';

            $content .= '</article>';
        }

        //$content .= '<section class="more"><a class="tc-category" href="'. site_url().'/category/'.strtolower
            //($categories[0]->name) .'">MORE FROM '. strtoupper($categories[0]->name) .'</a> </section>';

    }else {
        $content .= 'No post matches your query';
    }

    /* Restore original Post Data */
    wp_reset_postdata();

    $content .= '</section><br><br>';

    return $content;
}


/* Techer Row Block 1 */
function techer_row_block_1(){
    wp_enqueue_script(
        'techer-row-block-1-js',
        get_template_directory_uri()."/build/index.js",
        array('wp-blocks', 'wp-components', 'wp-block-editor', 'wp-editor'),
        filemtime(get_template_directory().'/build/index.js'));

    register_block_type(
        'techer/tc-row-block-1',
        [
            'editor-script' => 'techer-row-block-1-js',
            'render_callback' => 'techer_row_block_1_render',

            //custom-attributes
            'attributes' => [
                'title' => [ 'type' => 'string', 'default' => ''],

                'terms' => [ 'type' => 'array', 'default' => []],

                'numberOfPosts' => [ 'type' => 'number', 'default' => 0],

                'offset' => [ 'type' => 'number', 'default' => 0],

                'backgroundColor' => ['type' => 'string', 'default' => '#FFFFFFFF']
            ]
        ]
    );
}

add_action('init', 'techer_row_block_1');

function techer_row_block_1_render ($attr): string
{
    $content = '';

    $title = $attr['title'];
    $terms = $attr['terms'];
    $number_of_posts = $attr['numberOfPosts'];
    $offset = $attr['offset'];
    $background_color = $attr['backgroundColor'];


    //The Query
    $the_query = new WP_Query( array('category_name' => $terms, 'posts_per_page' => $number_of_posts, 'offset' => $offset) );

    $content  .= '<section class="techer-row-block-1">';

    // The Loop
    if ( $the_query->have_posts() ) {

        if(!empty($title)){
            $content .= '<h3>' . $title . '</h3><hr>';
        }

        $content .= '<article>';

        while ( $the_query->have_posts()) {
            $the_query->the_post();

            $content .= '<p>';

            $categories = get_the_category();
            if(!empty($categories)){
                $content .= '<a class="tc-category more" href="'. site_url().'/category/'.strtolower
                    ($categories[0]->name) .'">'. strtoupper($categories[0]->name) .'</a><br>';
            }

            $content .= '<a class="tc-title" href="'.get_the_permalink().'">'.get_the_title().'</a><br>';

        }
        $content .= '</article>';

        $content .= '<section class="more"><a class="tc-category" href="'. site_url().'/category/'.strtolower($categories[0]->name) .'">MORE FROM '. strtoupper($categories[0]->name) .'</a> </section>';

    }else {
        $content .= 'No post matches your query';
    }

    /* Restore original Post Data */
    wp_reset_postdata();

    $content .= '</section><br><br>';

    return $content;
}

/* Techer Row Block 2 */
function techer_row_block_2(){
    wp_enqueue_script(
        'techer-list-row-2-js',
        get_template_directory_uri()."/build/index.js",
        array('wp-blocks', 'wp-components', 'wp-block-editor', 'wp-editor'),
        filemtime(get_template_directory().'/build/index.js'));

    register_block_type(
        'techer/tc-row-block-2',
        [
            'editor-script' => 'techer-row-block-2-js',
            'render_callback' => 'techer_row_block_2_render',

            //custom-attributes
            'attributes' => [
                'title' => [ 'type' => 'string', 'default' => ''],

                'terms' => [ 'type' => 'array', 'default' => []],

                'numberOfPosts' => [ 'type' => 'number', 'default' => 0],

                'offset' => [ 'type' => 'number', 'default' => 0],

                'backgroundColor' => ['type' => 'string', 'default' => '#FFFFFFFF']
            ]
        ]
    );
}

add_action('init', 'techer_row_block_2');

function techer_row_block_2_render ($attr): string
{
    $content = '';

    $title = $attr['title'];
    $terms = $attr['terms'];
    $number_of_posts = $attr['numberOfPosts'];
    $offset = $attr['offset'];
    $background_color = $attr['backgroundColor'];


    //The Query
    $the_query = new WP_Query( array('category_name' => $terms, 'posts_per_page' => $number_of_posts, 'offset' => $offset) );

    $content  .= '<section class="techer-row-block-2">';

    // The Loop
    if ( $the_query->have_posts() ) {

        if(!empty($title)){
            $content .= '<h3>' . $title . '</h3><hr>';
        }

        $content .= '<article>';

        while ( $the_query->have_posts()) {
			
            $the_query->the_post();

            $content .= '<p>';

            $content .= get_the_post_thumbnail($post_id, 'thumbnail') . '<br>';

            $categories = get_the_category();

            if(!empty($categories)){
                $content .= '<a class="tc-category more" href="'. site_url().'/category/'.strtolower
                    ($categories[0]->name) .'">'. strtoupper($categories[0]->name) .'</a><br>';
            }

            $content .= '<a class="tc-title" href="'.get_the_permalink().'">'.get_the_title().'</a><br><br>';
			
			$content .= '<a style="color:#757575; font-size: .8rem;" class="tc-excerpt" href="'
				.get_the_permalink().'">'.get_the_excerpt().'</a><br>';

        }
        $content .= '</article>';

        $content .= '<section class="more"><a class="tc-category" href="'. site_url().'/category/'.strtolower($categories[0]->name) .'">MORE FROM '. strtoupper($categories[0]->name) .'</a> </section>';

    }else {
        $content .= 'No post matches your query';
    }

    /* Restore original Post Data */
    wp_reset_postdata();

    $content .= '</section><br><br>';

    return $content;
}


/* Techer Featured Block */
function techer_featured_block(){
    wp_enqueue_script(
        'techer-featured-block-js',
        get_template_directory_uri()."/build/index.js",
        array('wp-blocks', 'wp-components', 'wp-block-editor', 'wp-editor'),
        filemtime(get_template_directory().'/build/index.js'));

    register_block_type(
        'techer/tc-featured-block',
        [
            'editor-script' => 'techer-featured-block-js',
            'render_callback' => 'techer_featured_block_render',

            //custom-attributes
            'attributes' => [
                'title' => [ 'type' => 'string', 'default' => ''],

                'terms' => [ 'type' => 'array', 'default' => []],

                'numberOfPosts' => [ 'type' => 'number', 'default' => 0],

                'offset' => [ 'type' => 'number', 'default' => 0],

                'backgroundColor' => ['type' => 'string', 'default' => '#FFFFFFFF']
            ]
        ]
    );
}

add_action('init', 'techer_featured_block');

function techer_featured_block_render ($attr): string
{
    $content = '';

    $title = $attr['title'];
    $terms = $attr['terms'];
    $number_of_posts = $attr['numberOfPosts'];
    $offset = $attr['offset'];
    $background_color = $attr['backgroundColor'];


    //The Query
    $the_query = new WP_Query( array('category_name' => $terms, 'posts_per_page' => $number_of_posts, 'offset' => $offset) );

    $content  .= '<section class="techer-featured-block-2">';

    // The Loop
    if ( $the_query->have_posts() ) {

        if(!empty($title)){
            $content .= '<h3>' . $title . '</h3><hr>';
        }

        $content .= '<article>';

        while ( $the_query->have_posts()) {
            $the_query->the_post();

            $content .= '<p>';

            $categories = get_the_category();
            if(!empty($categories)){
                $content .= '<a class="tc-category more" href="'. site_url().'/category/'.strtolower
                    ($categories[0]->name) .'">'. strtoupper($categories[0]->name) .'</a><br><br>';
            }

            $content .= '<a class="tc-title title" href="'.get_the_permalink().'">'.get_the_title().'</a><br><br>';

            $content .= '<span class="tc-excerpt">'.get_the_excerpt().'</span><br><br>';

            $content .= get_the_author_posts_link();

            $content .= '<a class="tc-time"> '.get_the_date().'</a><br><br>';

            $content .= get_the_post_thumbnail() . '<br>';

        }

        $content .= '</article>';

        $content .= '<section class="more"><a class="tc-category" href="'. site_url().'/category/'.strtolower($categories[0]->name) .'">MORE FROM '. strtoupper($categories[0]->name) .'</a> </section>';

    }else {
        $content .= 'No post matches your query';
    }

    /* Restore original Post Data */
    wp_reset_postdata();

    $content .= '</section><br><br>';

    return $content;
}

/* Techer Weather */
function techer_weather(){
    wp_enqueue_script(
        'techer-weather-js',
        get_template_directory_uri()."/build/index.js",
        array('wp-blocks', 'wp-components', 'wp-block-editor', 'wp-editor'),
        filemtime(get_template_directory().'/build/index.js'));

    register_block_type(
        'techer/tc-weather',
        [
            'editor-script' => 'techer-weather-js',
            'render_callback' => 'techer_weather_render',

            //custom-attributes
            'attributes' => [
                'title' => [ 'type' => 'string', 'default' => ''],

                'city' => [ 'type' => 'string'],

                'country' => ['type' => 'string'],

                'backgroundColor' => ['type' => 'string', 'default' => '#FFFFFFFF']
            ]
        ]
    );
}

add_action('init', 'techer_weather');

function techer_weather_render ($attr): string
{
    $content = '';

    $title = $attr['title'];
    $the_city = $attr['city'];
    $the_country = $attr['country'];
    $background_color = $attr['backgroundColor'];


    $content  .= '<section class="techer-weather">';

    $city    = $the_city;
    $country = $the_country;
    $url     = 'http://api.openweathermap.org/data/2.5/forecast/daily?q=' . $city . ',' . $country . '&units=metric&cnt=7&lang=en&appid=c0c4a4b4047b97ebc5948ac9c48c0559';
    $json    = file_get_contents( $url );
    $data    = json_decode( $json, true );
    $data['city']['name'];
    // var_dump($data );

    $day_temp = array();
    $index = 0;

    foreach ( $data['list'] as $day => $value ) {
        if($index < 7){
            $day_temp[$index] = $value['temp']['max'];
        }
        $index++;
    }

    $days_of_week = array(
        'Monday' => 1,
        'Tuesday' => 2,
        'Wednesday' => 3,
        'Thursday' => 4,
        'Friday' => 5,
        'Saturday' => 6,
        'Sunday' => 7
    );

    $content .= $city .', '. $country . ' ' . date('l') . ' ' . round($day_temp[$days_of_week[date('l')]-1]) . '&deg;C';

    $content .= '</section><br><br>';

    return $content;
}

/* Techer Social Share Block */
function techer_social_share_block(){
    wp_enqueue_script(
        'techer-social-share-block-js',
        get_template_directory_uri()."/build/index.js",
        array('wp-blocks', 'wp-components', 'wp-block-editor', 'wp-editor'),
        filemtime(get_template_directory().'/build/index.js'));

    register_block_type(
        'techer/tc-social-share',
        [
            'editor-script' => 'techer-social-share-block-js',
            'render_callback' => 'techer_social_share_block_render',

            //custom-attributes
            'attributes' => [
                'title' => [ 'type' => 'string', 'default' => ''],

                'label' => [ 'type' => 'string', 'default' => ''],
            ]
        ]
    );
}

add_action('init', 'techer_social_share_block');

function techer_social_share_block_render ($attr): string
{
    $content = '';

    $title = $attr['title'];
    $label = $attr['label'];

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

        return $content;
    }else{
        // if not a post/page then don't include sharing button
        return $content;
    }

}
