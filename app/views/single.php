<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package theme
 */

get_header();
?>
<?php
while (have_posts()) :
    the_post();

    the_post_navigation([
        'prev_text' => '%title',
        'next_text' => '%title',
    ]);

    // If comments are open or we have at least one comment, load up the comment template.
    if (comments_open() || get_comments_number()) :
        comments_template();
    endif;

endwhile; // End of the loop.
?>
<?php
get_sidebar();
get_footer();
