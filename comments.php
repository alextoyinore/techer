<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains comments and the comment form.
 *
 * @package Techer
 * @subpackage 
 * @since 
 */
 
/*
 * If the current post is protected by a password and the visitor has not yet
 * entered the password we will return early without loading the comments.
 */
if ( post_password_required() )
    return;
?>
 
<div id="comments" class="comments-area">

    <?php if ( have_comments() ) : ?>
        <p class="comments-title">
            <?php
                printf( _nx( 'One person is discussing "%2$s"', '%1$s people are discussing "%2$s"', get_comments_number(), 'comments title', 'techer' ),
                    number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' );
            ?>
        </p>

        <section class="comment-list">
            <?php
                wp_list_comments( array(
                    'style'       => 'p',
                    'short_ping'  => true,
                    'avatar_size' => 74,
                ) );
            ?>
        </section><!-- .comment-list -->

        <?php
            // Are there comments to navigate through?
            if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
        ?>
        <nav class="navigation comment-navigation" role="navigation">
            <h1 class="screen-reader-text section-heading"><?php _e( 'Comment navigation', 'techer' ); ?></h1>
            <div class="nav-previous"><?php previous_comments_link( __( 'Older', 'techer' ) ); ?></div>
            <div class="nav-next"><?php next_comments_link( __( 'Newer', 'techer' ) ); ?></div>
        </nav><!-- .comment-navigation -->
        <?php endif; // Check for comment navigation ?>

        <?php if ( ! comments_open() && get_comments_number() ) : ?>
        <p class="no-comments"><?php _e( 'Comments are closed.' , 'techer' ); ?></p>
        <?php endif; ?>

    <?php endif; // have_comments() ?>
 
</div><!-- #comments -->
