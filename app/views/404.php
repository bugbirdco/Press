<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package theme
 */

get_header();
?>
<?php
get_search_form();

the_widget('WP_Widget_Recent_Posts');
?>
    Most Used Categories
<?php
wp_list_categories(
    array(
        'orderby' => 'count',
        'order' => 'DESC',
        'show_count' => 1,
        'title_li' => '',
        'number' => 10,
    )
);
?>
<?php
get_footer();
