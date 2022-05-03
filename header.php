<?php

if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly.
}
?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="profile" href="http://gmpg.org/xfn/11">
  <!-- <meta name="description" content="Mary's simple recipe for maple bacon donuts makes a sticky, sweet treat with just a hint of salt that you'll keep coming back for."> -->
  <link rel="shortcut icon" href="<?php tUrl(); ?>/img/favicon.png" />
  <script src="https://unpkg.com/current-device/umd/current-device.min.js"></script>


  <?php wp_head(); ?>


</head>


<body <?php
      $extra_classes = '';
      if (is_page('home')) $extra_classes .= " page-home";
      if (is_singular()) $extra_classes .= " page-post";
      if (is_404()) $extra_classes .= " page-404";
      if ($extra_classes) echo ' class="' . $extra_classes . '" ';

      $site_name = esc_html(get_bloginfo('name'));
      ?>>

  <div class="i-body">
    <?php
    // body_class();
    get_template_part('template-parts/header');
    ?>

    <div class="content-wrapper">

      <?php

