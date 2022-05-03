<?php

/**
 * Block template file:
 *
 * Slider Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'slider-' . $block['id'];
if (!empty($block['anchor'])) {
  $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'block-slider';
if (!empty($block['className'])) {
  $classes .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
  $classes .= ' align' . $block['align'];
}
?>

<style type="text/css">
  <?php echo '#' . $id; ?> {
    /* Add styles that use ACF values here */
  }
</style>

<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($classes); ?>">
  <?php if (have_rows('slider_repeater')) : ?>
    <div class="swiper-container main-swiper">
      <div class="swiper-wrapper">
        <?php while (have_rows('slider_repeater')) : the_row(); ?>
          <div class="swiper-slide container-fluid" style="background-image: url(<?php the_sub_field('slide_image'); ?>)">
            <div class="swiper-slide-bg" style="background-color:<?php
                                                                    the_sub_field('slide_color'); ?> ; opacity: <?php the_sub_field('slide_opacity')?>">
                </div>
              <div class="container">
                <div class="swiper-content col">
                  <h2 class="slide-title"><?php the_sub_field('slide_title'); ?></h2>
                  <p class="slide-text"><?php the_sub_field('slide_text'); ?></p>
                </div>
              </div>
          </div>
        <?php endwhile; ?>
      </div>
      <div class="swiper-pagination"></div>
    </div>
  <?php else : ?>
    <?php // no rows found
    ?>
  <?php endif; ?>
</div>
