<?php
/**

 @package NewsBlue
 */
    function NewsBlue_enqueue_scripts(){
    wp_enqueue_style('NewsBlue-main', get_template_directory_uri().'/css/main.css', array(), '1.1.3.7.27', 'all');
    wp_enqueue_script('NewsBlue-main',get_template_directory_uri().'/js/main.js',array(),'1.125',true);


        if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
            wp_enqueue_script( 'comment-reply' );
        }
}
add_action('wp_enqueue_scripts', 'NewsBlue_enqueue_scripts');

    $logo_width = 206;
    $logo_height = 60;
add_theme_support(
    'custom-logo',
    array(
        'height'               => $logo_height,
        'width'                => $logo_width,
        'flex-width'           => true,
        'flex-height'          => true,
        'unlink-homepage-logo' => true,
    )
);

//Registrate menu location
 function newsblue_register_menu(){
     register_nav_menus(array(
         'header__navbar' =>    'Header navigation',
         'footer__navbar' =>    'Footer navigation',
     ));
 }
// удаляем url в комментариях
function true_remove_url_field( $fields ) {
    unset( $fields['url'] );
    return $fields;
}

add_filter( 'comment_form_default_fields', 'true_remove_url_field');
 add_action('after_setup_theme', 'newsblue_register_menu', 0);
//custom classes ul->li-link

//change id navbar - li
add_filter('nav_menu_item_id', 'filter_menu_item_css_id', 10, 4);
function filter_menu_item_css_id($menu_id, $item, $args, $depth)
{
    return $args->theme_location === "header__navbar" ? '' : $menu_id;

}

//change classname - li
add_filter('nav_menu_css_class', 'filter_nav_menu_css_classes', 10, 4);
function filter_nav_menu_css_classes($classes, $item, $args, $depth)
{
    if ($args->theme_location === 'header__navbar') {
        $classes = [
            'header__item'
        ];

        if ($item->current) {
            $classes[] = 'header__item-active';
        }

    }
    return $classes;
}
//change links header
add_filter('nav_menu_link_attributes', 'filter_nav_menu_link_attributes', 10, 4);
function filter_nav_menu_link_attributes($atts, $item, $args, $depth)
{
    if ($args->theme_location === 'header__navbar') {
        $atts['class'] = 'header__link';
        if ($item->current) {
            $atts['class'] = 'header__link-active';
        }
    }
    return $atts;
}
//Connecting svg sprite
require get_template_directory() . '/inc/class-newsblue-svg-icons.php';
/**
 * Gets the SVG code for a given icon.
 *
 * @since newsblue 1.0
 *
 * @param string $group The icon group.
 * @param string $icon  The icon.
 * @param int    $size  The icon size in pixels.
 * @return string
 */
function newsblue_get_icon_svg( $group, $icon, $size = 24 ) {
    return Newsblue_SVG_Icons::get_svg( $group, $icon, $size );
}
if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function newsblue_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on NewsBlue, use a find and replace
		* to change 'newsblue' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'newsblue', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'newsblue_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'newsblue_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function newsblue_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'newsblue_content_width', 640 );
}
add_action( 'after_setup_theme', 'newsblue_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function newsblue_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'newsblue' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'newsblue' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'newsblue_widgets_init' );

/**
 * Enqueue scripts and styles.
 */

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}
// ACF_OPTION_PAGE Setups
require get_template_directory() . '/inc/acf-option-page.php';
//APPEND-TEXT FUNCTION
require get_template_directory() . '/inc/append-text.php';

// удаление [] в конце публикации, обрезка текста до 30 слов

add_filter('excerpt_more', function($more) {
    return '&nbsp;...';
});
add_filter( 'excerpt_length', function(){
    return 30;
} );

// стилизация ссылки на автора
add_filter( 'the_author_posts_link', function( $link )
{
    return str_replace( 'rel="author"', 'rel="author" class="author grid__author "', $link );
});
//Подсчет количества посещений/просмотров страницы
add_action('wp_head', 'newsblue_postviews' );
/**
 *
 * @param array @args
 *
 * @return null
 */
function newsblue_postviews($args = [] ){
    global $user_ID, $post, $wpdb;
    if ( ! $post || ! is_singular() )
        return;
    $rg = (object) wp_parse_args( $args, [
        // ключ мета для  публикации,  где хранятся  кол-во просмотров.
        'meta_key' => 'views',
        // выбираем чьи посещения считать: 0 все, 1 гости, 2 зарегестрированные
        'who_count' => 0,
        //исключение ботов: 0  не исключаем, 1 исключаем
        'exclude_bots'  => true,

    ]);
    $do_count = false;
    switch( $rg->who_count ){

        case 0:
            $do_count = true;
            break;
        case 1:
            if( ! $user_ID )
                $do_count = true;
            break;
        case 2:
            if( $user_ID )
                $do_count = true;
            break;
    }
    if( $do_count && $rg->exclude_bots ){

        $notbot = 'Mozilla|Opera'; // Chrome|Safari|Firefox|Netscape - все равны Mozilla
        $bot = 'Bot/|robot|Slurp/|yahoo';
        if(
            ! preg_match( "/$notbot/i", $_SERVER['HTTP_USER_AGENT'] ) ||
            preg_match( "~$bot~i", $_SERVER['HTTP_USER_AGENT'] )
        ){
            $do_count = false;
        }

    }
    if( $do_count ){

        $up = $wpdb->query( $wpdb->prepare(
            "UPDATE $wpdb->postmeta SET meta_value = (meta_value+1) WHERE post_id = %d AND meta_key = %s", $post->ID, $rg->meta_key
        ) );

        if( ! $up )
            add_post_meta( $post->ID, $rg->meta_key, 0, true );

        wp_cache_delete( $post->ID, 'post_meta' );
    }
}
function new_mywidgets() {
    register_sidebar(array(
        'name' => __( 'Поделиться', 'mywidgets' ), //mywidgets - название (папка) шаблона
        'id' => 'sidebar-5', //уникальный id виджета (обязательный параметр)
        'description' => __( 'Описание позиции виджета', 'mywidgets' ),
    ) );
}
add_action('widgets_init', 'new_mywidgets');

add_filter('comment_form_fields','newsblue_reorder_comment_fields');
function newsblue_reorder_comment_fields($fields){
    $new_fields = array();
    $myorder = array('author','email','comment');
    foreach ($myorder as $key){
        $new_fields[$key] = $fields[$key];
        unset($fields[$key]);
    }
    if ($fields)
        foreach ($fields as $key => $val)
            $new_fields[$key] = $val;
    return $new_fields;
}
require  get_template_directory() .'/inc/comment-list.php';
// удаляет H2 из шаблона пагинации
add_filter('navigation_markup_template', 'my_navigation_template', 10, 2 );
function my_navigation_template( $template, $class ){
    /*
    Вид базового шаблона:
    <nav class="navigation %1$s" role="navigation">
        <h2 class="screen-reader-text">%2$s</h2>
        <div class="nav-links">%3$s</div>
    </nav>
    */

    return '
	<div class="navigation %1$s" role="navigation">
		<div class="nav-links">%3$s</div>
	</div>
	';
}

// Удаление id у элементов li - footer__menu
add_filter('nav_menu_item_id', 'filter_menu_item_css_id_1', 10, 4);
function filter_menu_item_css_id_1($menu_id, $item,$args, $depth){
    return $args->theme_location === 'footer__navbar' ? '' : $menu_id;
}
//Изменение атрибут class li
add_filter('nav_menu_css_class', 'filter_nav_menu_css_classes_1', 10,4);
function filter_nav_menu_css_classes_1($classes,$item,$args,$depth){
    if ($args->theme_location === 'footer__navbar'){
        $classes =[
            'footer__item',

        ];
        if($item->current){
            $classes[]= 'footer__item-active';
        }
    }
    return $classes;
}
// изменяем класс у footer__link
//change links header
add_filter('nav_menu_link_attributes', 'filter_nav_menu_link_attributes_1', 10, 4);
function filter_nav_menu_link_attributes_1($atts, $item, $args, $depth)
{
    if ($args->theme_location === 'footer__navbar') {
        $atts['class'] = 'footer__link';
        if ($item->current) {
            $atts['class'] = 'footer__link-active';
        }
    }
    return $atts;
}