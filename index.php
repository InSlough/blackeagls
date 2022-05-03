<?php

if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly.
}

get_header();

if (is_page('for-page')) {
  //
  get_template_part('template-parts/for-page');
  //
// } elseif (is_singular('products')) {
//   //
//   get_template_part('template-parts/products/single');
//   //
} elseif (is_singular('persons')) {
  //
  get_template_part('template-parts/persons');
  //
// } elseif (is_post_type_archive('products')) {
//   //
//   get_template_part('template-parts/products/archive');
//   //
} elseif (is_singular()) {
  //
  get_template_part('template-parts/single');
  //
// } elseif (is_post_type_archive('products')) {
//   //
//   get_template_part('template-parts/products/archive');
//   //
} elseif (is_archive()) {
  //
  get_template_part('template-parts/archive');
  //
} else {
  get_template_part('template-parts/404');
}

get_footer();
