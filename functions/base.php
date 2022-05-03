<?php

// ? add localization for this theme
// load_theme_textdomain(gV('slug'), get_stylesheet_directory() . '/lang');

// add_action('after_setup_theme', function () {
//   add_theme_support('woocommerce');
// });

add_action('after_setup_theme', function () {
  // ?? Register Navigation Menus
  register_nav_menus(array(
    'main_menu' => __('Main menu', gV('slug')),
    'link_menu' => __('Link menu', gV('slug')),
  ));
});

add_filter('get_the_archive_title', function ($title) {
  // ?? Change Archive Title
  if (is_category()) {
    $title = single_cat_title('', false);
  } elseif (is_tag()) {
    $title = single_tag_title('', false);
  } elseif (is_author()) {
    $title = '<span class="vcard">' . get_the_author() . '</span>';
  } elseif (is_tax()) { // for custom post types
    $title = sprintf(__('%1$s'), single_term_title('', false));
  } elseif (is_post_type_archive()) {
    $title = post_type_archive_title('', false);
  }
  return $title;
});


/**
 * @return string
 * @f echo get_stylesheet_directory_uri();
 */
function tUrl()
{
  echo get_stylesheet_directory_uri();
}
/**
 * @return function
 * @f return get_stylesheet_directory_uri();
 */
function get_tUrl()
{
  return get_stylesheet_directory_uri();
}

/**
 * @param string  $name  File name
 * @param integer $dev   File has [.min] true/false
 * @return function
 * @f wp_enqueue_style("$name-style",get_tUrl()."/css/$name".($dev?"":".min").".css",NULL,gV('ver'));
 */
function f_add_style($name, $dev)
{
  wp_enqueue_style("$name-style", get_tUrl() . "/css/$name" . ($dev ? "" : ".min") . ".css", NULL, gV('ver'));
}
/**
 * @param string  $name    File name
 * @param integer $dev     File has [.min] true/false
 * @param integer $footer  Insert into Footer true/false
 * @return function
 * @f wp_enqueue_script("$name-script",get_tUrl()."/js/$name".($dev?"":".min").".css",NULL,gV('ver'),$footer);
 */
function f_add_script($name, $dev, $footer)
{
  wp_enqueue_script("$name-script", get_tUrl() . "/js/$name" . ($dev ? "" : ".min") . ".js", NULL, gV('ver'), $footer);
}
/**
 * @param string  $name    File name
 * @param integer $url     File link
 * @param integer $footer  Insert into Footer true/false
 * @return function
 * @f wp_enqueue_script("$name-script", get_tUrl() . $url, NULL, gV('ver'), $footer);
 */
function f_add_c_script($name, $url, $footer)
{
  wp_enqueue_script("$name-script", get_tUrl() . $url, NULL, gV('ver'), $footer);
}

add_theme_support( 'custom-logo', [
	'height'      => '100%',
	'width'       => 'auto',
	'flex-width'  => true,
	'flex-height' => true,
	'header-text' => 'ECO',
	'unlink-homepage-logo' => false, // WP 5.5
] );


 if ( function_exists( 'add_theme_support' ) ) {
  add_theme_support( 'post-thumbnails' );
  set_post_thumbnail_size( 200, 200, true );
}
