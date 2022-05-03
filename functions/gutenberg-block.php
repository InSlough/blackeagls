<?php
add_action('acf/init', 'ht_acf_init');
function ht_acf_init()
{

  $supports = array(
    'align' => array('wide', 'full'),
    'anchor' => true,
  );

  // check function exists
  if (function_exists('acf_register_block')) {
    acf_register_block(array(
      'name' => 'slider',
      'title' => __('Slider FL block'),
      'render_callback' => 'ht_acf_block_render_callback',
      'category' => 'theme-blocks',
      'icon' => 'image-flip-horizontal',
      'mode' => 'edit',
      'supports' => $supports,
      'keywords' => array('slider', 'image'),
    ));
    acf_register_block(array(
      'name' => 'about',
      'title' => __('About Block'),
      'render_callback' => 'ht_acf_block_render_callback',
      'category' => 'theme-blocks',
      'icon' => 'image-flip-horizontal',
      'mode' => 'edit',
      'supports' => $supports,
      'keywords' => array('text', 'link'),
    ));
    acf_register_block(array(
      'name' => 'review',
      'title' => __('Review Block'),
      'render_callback' => 'ht_acf_block_render_callback',
      'category' => 'theme-blocks',
      'icon' => 'image-flip-horizontal',
      'mode' => 'edit',
      'supports' => $supports,
      'keywords' => array('review', 'link'),
    ));



    // acf_register_block(array(
    // 'name' => 'ht-youtube',
    // 'title' => __('Youtube block'),
    // 'render_callback' => 'ht_acf_block_render_callback',
    // 'category' => 'fmjf_theme-blocks',
    // 'icon' => 'format-status',
    // 'mode' => 'edit',
    // 'supports' => $supports,
    // 'keywords' => array( 'youtube', 'video'),
    // ));

  }
}


function ht_acf_block_render_callback($block)
{
  // convert name ("acf/testimonial") into path friendly slug ("testimonial")
  $slug = str_replace('acf/', '', $block['name']);

  // include a template part from within the "template-parts/block" folder
  if (file_exists(get_theme_file_path("/template-parts/block/block-{$slug}.php"))) {
    include(get_theme_file_path("/template-parts/block/block-{$slug}.php"));
  }
}
