<?php

if  (trunck_check_theme_setup()) 
{
    Timber::$dirname = array('views');

    class TrunckSite extends TimberSite {

        function __construct() {
            add_theme_support( 'post-formats' );
            add_theme_support( 'post-thumbnails' );
            add_theme_support( 'menus' );
            add_filter( 'timber_context', array( $this, 'add_to_context' ) );
            add_filter( 'get_twig', array( $this, 'add_to_twig' ) );
            add_action( 'init', array( $this, 'register_post_types' ) );
            add_action( 'init', array( $this, 'register_taxonomies' ) );
            parent::__construct();
        }

        function register_post_types() {
            //this is where you can register custom post types
        }

        function register_taxonomies() {
            //this is where you can register custom taxonomies
        }

        function add_to_context( $context ) {
            $context['foo'] = 'bar';
            $context['stuff'] = 'I am a value set in your functions.php file';
            $context['notes'] = 'These values are available everytime you call Timber::get_context();';
            $context['menu'] = new TimberMenu();
            $context['site'] = $this;
            $context['sidebar_widget'] = Timber::get_widgets('sidebar-widget-area');
            $context['footer_widget'] = Timber::get_widgets('footer-widget-area');
            $context['options'] = get_fields('options');
            return $context;
        }

        function add_to_twig( $twig ) {
            /* this is where you can add your own fuctions to twig */
            $twig->addExtension( new Twig_Extension_StringLoader() );
            $twig->addFilter( new Twig_SimpleFilter( 'esc_attr', 'trunck_esc_attr' ) );
            $twig->addFilter( new Twig_SimpleFilter( 'intl', 'trunck_internationalization' ) );
            return $twig;
        }

    }
    new TrunckSite();

}
else
{
     switch_theme( get_option('theme_switched') );
     return;
}

function trunck_esc_attr ($text) {

    return esc_attr($text);
}

function trunck_internationalization ($text) {

    return __($text, "trunck");
}

// Check for theme requirements
function trunck_check_theme_setup () {
    $success = true;
    // Check for ACF and at least PHP v5.3.0
    if ( !function_exists('get_field'))
    {
        add_action( 'admin_notices', function () {
            // theme not activated info message
            _e( '<div class="error"><p>You need to install and activate<a href="https://wordpress.org/plugins/advanced-custom-fields/">Advanced Custom Fields</a> to activate the Trunck theme.</p></div>', 'trunck' );
        });

        $success = false;
    }

    if (version_compare(PHP_VERSION, '5.3.0') < 0 )
    {
        add_action( 'admin_notices', function () {
            // theme not activated info message
            _e( '<div class="error"><p>You need to update your PHP version to at least 5.3.0 plugin to activate Trunck Theme.</p></div>', 'trunck' );
        });

        $success = false;
    }

    if ( ! class_exists( 'Timber' ) ) {
        add_action( 'admin_notices', function() {
                echo '<div class="error"><p>You need to install and activate <a href="https://wordpress.org/plugins/timber-library/">Timber</a> to activate the Trunck theme.</p></div>';
        });

        $success = false;
    }

    return $success;

}
add_action( 'after_switch_theme', 'trunck_check_theme_setup' );

// Set environment
if (strpos(get_site_url(),'livesite.com') !== true) {
    // if not on live site, set ENVIRONMENT to development
    define(ENVIRONMENT, "development");
}
else
{
    define(ENVIRONMENT, "production");
}

// Theme support
if (function_exists('add_theme_support'))
{

    // Add Thumbnail Theme Support
    add_theme_support('post-thumbnails');
    add_image_size('large', 700, '', true); // Large Thumbnail
    add_image_size('large-square', 700, '', true); // Large Thumbnail
    add_image_size('medium', 250, '', true); // Medium Thumbnail
    add_image_size('small', 120, '', true); // Small Thumbnail
   
    // Enables post and comment RSS feed links to head
    add_theme_support('automatic-feed-links');

    // Localization Support
    load_theme_textdomain('trunck', get_template_directory() . '/lang');

    // Tell the TinyMCE editor to use a custom stylesheet
    add_editor_style('/css/screen.min.css');
}

// Add page slug to body class
function trunck_add_slug_to_body_class($classes)
{
    global $post;
    if (is_home()) {
        $key = array_search('blog', $classes);
        if ($key > -1) {
            unset($classes[$key]);
        }
    } elseif (is_page()) {
        $classes[] = sanitize_html_class($post->post_name);
    } elseif (is_singular()) {
        $classes[] = sanitize_html_class($post->post_name);
    }

    return $classes;
}

add_filter('body_class', 'trunck_add_slug_to_body_class'); // Add slug to body class (Starkers build)

// Pagination for paged posts, Page 1, Page 2, Page 3, with Next and Previous Links, No plugin
function trunck_pagination()
{
    global $wp_query;
    $big = 999999999;
    echo paginate_links(array(
        'base' => str_replace($big, '%#%', get_pagenum_link($big)),
        'format' => '?paged=%#%',
        'current' => max(1, get_query_var('paged')),
        'total' => $wp_query->max_num_pages

    ));

}

// Remove Admin bar
function trunck_remove_admin_bar()
{
    return false;
}
add_filter('show_admin_bar', 'trunck_remove_admin_bar'); // Remove Admin bar
remove_filter('the_excerpt', 'wpautop'); // Remove <p> tags from Excerpt altogether
?>