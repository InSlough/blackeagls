<?php

/**
 * Block template file:
 *
 * About Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'about-' . $block['id'];
if (!empty($block['anchor'])) {
  $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'block-about';
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

<div id="<?php echo esc_attr($id); ?>" class="container <?php echo esc_attr($classes); ?>">
  <div class="row">
    <?php if (have_rows('about_repeater')) : ?>
      <?php while (have_rows('about_repeater')) : the_row(); ?>
        <div class="about-card col-<?php the_field('about_column_index'); ?>">
          <?php if (get_sub_field('about_icon')) : ?>
            <img src="<?php the_sub_field('about_icon'); ?>" />
          <?php endif ?>
          <h3 class="about-title"><?php the_sub_field('about_title'); ?></h3>
          <p class="about-text"><?php the_sub_field('about_text'); ?></p>
          <a href="<?php the_sub_field('about_link'); ?>"><img src="<?php tUrl() ?>/img/arrow.svg" alt="" class="style-svg"></a>
        </div>
      <?php endwhile; ?>
    <?php else : ?>
      <?php // no rows found
      ?>
    <?php endif; ?>

  </div>
</div>
