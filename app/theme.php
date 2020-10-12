<?php


use Timber\Site;
use Timber\Menu;

use Carbon_Fields\Container;
use Carbon_Fields\Field;

/**
 * Based on timber starter-theme
 * https://github.com/timber/starter-theme
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since   Timber 0.1
 */
class Theme extends Site
{
    /** Add timber support. */
    public function __construct()
    {
        add_action('after_setup_theme', [$this, 'theme_supports']);
        add_filter('timber/context', [$this, 'add_to_context']);
        add_filter('timber/twig', [$this, 'add_to_twig']);
        add_action('init', [$this, 'register_post_types']);
        add_action('init', [$this, 'register_taxonomies']);
        add_action('carbon_fields_register_fields', [$this, 'register_fields']);
        parent::__construct();
    }

    /** This is where you can register custom post types. */
    public function register_post_types()
    {

    }

    /** This is where you can register custom taxonomies. */
    public function register_taxonomies()
    {

    }

    /** Here you can register custom carbon fields */
    public function register_fields()
    {
        Container::make('theme_options', 'Global Settings')
            ->add_fields([
                Field::make_text('my_field', 'My Field'),
            ]);
    }

    /** This is where you add some context
     *
     * @param array $context context['this'] Being the Twig's {{ this }}.
     */
    public function add_to_context($context)
    {
        $context['menu'] = new Menu();
        $context['site'] = $this;
        return $context;
    }

    public function theme_supports()
    {
        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support('title-tag');

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
        add_theme_support('post-thumbnails');

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support(
            'html5',
            array(
                'comment-form',
                'comment-list',
                'gallery',
                'caption',
            )
        );

        /*
         * Enable support for Post Formats.
         *
         * See: https://codex.wordpress.org/Post_Formats
         */
        add_theme_support(
            'post-formats',
            array(
                'aside',
                'image',
                'video',
                'quote',
                'link',
                'gallery',
                'audio',
            )
        );

        add_theme_support('menus');
    }

    /** This is where you can add your own functions to twig.
     *
     * @param Twig\Environment $twig get extension.
     */
    public function add_to_twig($twig)
    {
//        $twig->addExtension(new Twig\Extension\StringLoaderExtension());
//        $twig->addFilter(new Twig\TwigFilter('myfoo', array($this, 'myfoo')));
        return $twig;
    }

}
