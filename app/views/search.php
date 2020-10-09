<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package theme
 */

get_header();
?>
<?php if (have_posts()) : ?>
    <?php the_search_query(); ?>
    <?php
    /* Start the Loop */
    while (have_posts()) :
        the_post();
    endwhile;
    the_posts_navigation();
else :
endif;
?>
<?php
get_sidebar();
get_footer();
