<?php

// add_action('admin_enqueue_scripts', function () {
//   // ?? Styles for WP Admin-panel
//   f_add_style('admin-style', 1);
// });

add_action('wp_enqueue_scripts', function () {
  // ?? Styles for Site (Header)
  // if (gV('critical') == true) f_add_style('critical', 1);
  f_add_style('main', gV('dev'));
});

add_action('get_footer', function () {
  // ?? Styles for Site (Footer)
  // f_add_style('simplebar', 0);

  // wp_enqueue_style('jquery-scrollbar', get_tUrl() . '/css/jquery.scrollbar.css', NULL, gV('ver'));
  // wp_enqueue_script('jquery-scrollbar', get_tUrl() . '/js/jquery.scrollbar.min.js', NULL, gV('ver'), true);
});

add_action('wp_enqueue_scripts', function () {
  // wp_dequeue_style('wp-block-library'); // WordPress core
  wp_dequeue_style('wp-block-library-theme'); // WordPress core
  wp_dequeue_style('wc-block-style'); // WooCommerce
  wp_dequeue_style('storefront-gutenberg-blocks'); // Storefront theme
}, 100);

add_action('wp_head', function () {
  if (is_admin_bar_showing()) :
?>
    <style type="text/css">
      #wpadminbar {
        top: 90px;
        left: 10px;
        min-width: auto;
        max-width: 220px;
      }

      #wpadminbar:not(:hover) {
        opacity: 0.1;
      }

      #wpadminbar .quicklinks>ul>li>a {
        font-size: 0;
        padding-right: 1px;
      }

      #wpadminbar .quicklinks>ul>li#wp-admin-bar-my-account>a {
        padding-right: 7px;
        padding-left: 1px;
      }

      #wp-admin-bar-search,
      #wp-admin-bar-wp-logo,
      #wp-admin-bar-my-account .display-name,
      #wp-admin-bar-new-content .ab-label {
        display: none;
      }

      #wp-admin-bar-clearfy-menu .wbcr-clearfy-admin-bar-menu-title {
        display: none !important;
      }
    </style>
<?php endif;
});
// add_action('admin_head', 'override_admin_bar_css_function'); // on backend area

add_action('get_header', function () {
  remove_action('wp_head', '_admin_bar_bump_cb');
});
