<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package theme
 */

get_header();
?>
<?php if (have_posts()) : ?>
    <?php
    the_archive_title();
    the_archive_description();
    ?>
    <?php
    /* Start the Loop */
    while (have_posts()) :
        the_post();

        /*
         * Include the Post-Type-specific template for the content.
         * If you want to override this in a child theme, then include a file
         * called content-___.php (where ___ is the Post Type name) and that will be used instead.
         */
    endwhile;
    the_posts_navigation();
else :
endif;
?>


<?php
get_sidebar();
get_footer();
