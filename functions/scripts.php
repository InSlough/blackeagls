<?php

add_action('wp_enqueue_scripts', function () {
  // ?? Scripts for Site (Header)
  // f_add_script('script_file_name', 0||1, false);

  // ?? Scripts for Site (Footer)
  // f_add_script('simplebar', 0, true);
  // f_add_script('jquery.fancybox', 0, true);
  // f_add_script('bootstrap.bundle', 0, true);
f_add_script('swiper-bundle', 0, true);
  // f_add_script('js.cookie', 0, true);

  // global $wp_query;
  wp_register_script("main-script", get_tUrl() . "/js/main" . (gV('dev') ? "" : ".min") . ".js", array('jquery'), gV('ver'), 1);
  wp_enqueue_script('main-script');
  // ?? свои параметры для файла "main-script"
  wp_localize_script('main-script', 'siteVars', array(
    // 'query' => array(
    //   'raw_vars' => $wp_query->query_vars,
    //   'vars' => json_encode($wp_query->query_vars), // everything about your loop is here
    //   'current_page' => get_query_var('paged') ? get_query_var('paged') : 1,
    //   'max_page' => $wp_query->max_num_pages,
    // ),
    'site' => array(
      'url' => site_url(),
      'ajax' => admin_url('admin-ajax.php'),
    ),
    // 'translate' => array(
    //   'wl_add_text' => __("Added to the wish list", gV('slug')),
    //   'wl_remove_text' => __("Removed from the wish list", gV('slug')),
    // ),
  ));
});

add_filter('script_loader_tag', function ($url) {
  // ?? Scripts loaded "defer"
  if (is_user_logged_in()) return $url; // don't break WP Admin
  if (FALSE === strpos($url, '.js')) return $url;
  if (strpos($url, 'jquery.js') || strpos($url, 'jquery-3.5.1.min.js')) return $url;
  return str_replace(' src', ' defer src', $url);
});
