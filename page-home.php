<?php

if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly.
}

get_header();
?>

<div class="container-fluid first-section">
  <div class="row h-100">
    <div class="col">
      <?php if (have_rows('hero')) : ?>
        <?php while (have_rows('hero')) : the_row(); ?>
          <div class="container h-100 px-0 px-lg-4">
            <div class="row fs-row h-100">
              <div class="col-12 col-md-auto">
                <div class="first-section-content">
                  <h1><?php the_sub_field('title'); ?></h1>
                  <p><?php the_sub_field('text'); ?></p>
                </div>
              </div>
              <div class="col">
              </div>
            </div>
            <img class="text-loop" src="<?php tUrl(); ?>/img/text-loop.svg" alt="#">
          </div>
          <?php if (have_rows('video')) : ?>
            <?php while (have_rows('video')) : the_row(); ?>
              <video class="video-bg" preload="metadata" autoplay="true" loop="true" muted="muted">
                <?php if (get_sub_field('webp')) : ?>
                  <source src="<?php the_sub_field('webp'); ?>">
                <?php endif; ?>
                <?php if (get_sub_field('mp4')) : ?>
                  <source src="<?php the_sub_field('mp4'); ?>" type="video/mp4">
                <?php endif; ?>
              </video>
            <?php endwhile; ?>
          <?php endif; ?>
        <?php endwhile; ?>
      <?php endif; ?>
    </div>
  </div>
</div>

<section class="about-block">
  <div class="container">
    <?php if (have_rows('about')) : ?>
      <?php while (have_rows('about')) : the_row(); ?>
        <div class="row">
          <div class="col-12">
            <h2 id="about" class="anchor"><?php the_sub_field('title'); ?></h2>
            <div class="bg-c">
              <?php if (get_sub_field('img')) : ?>
                <img src="<?php the_sub_field('img'); ?>" alt="">
              <?php endif ?>
              <div class="bg-b"></div>
            </div>
            <div class="text-block">
              <h4><?php the_sub_field('big_text'); ?></h4>
              <p><?php the_sub_field('text'); ?></p>
            </div>
          <?php endwhile; ?>
        <?php endif; ?>
          </div>
        </div>
        <div class="row hs-block">

          <?php
          $args = array(
            'post_type' => 'persons',
            'posts_per_page' => 5
          );

          $query = new WP_Query($args);

          // Цикл
          if ($query->have_posts()) {
            while ($query->have_posts()) {
              $query->the_post(); ?>
              <div class="col-lg-auto col-6">
                <a class="person-link" href="<?php the_permalink(); ?>">
                  <div class="persons-img">
                    <div>
                      <img src="<?php echo get_the_post_thumbnail_url($post, 'full'); ?>" alt="">
                    </div>
                  </div>
                  <span><?php the_title(); ?></span>
                </a>
              </div>
          <?php
            }
          } else {
            // Постов не найдено
          }
          // Возвращаем оригинальные данные поста. Сбрасываем $post.
          wp_reset_postdata();
          ?>
        </div>
  </div>
  </div>
</section>

<section class="services-block">
  <div class="container p-md-0">
    <div class="row">
      <h2 id="services" class="anchor" style="margin-bottom:2rem;">Услуги</h2>
      <?php
      $args = array(
        'posts_per_page' => 10
      );

      $query = new WP_Query($args);

      // Цикл
      if ($query->have_posts()) {
        while ($query->have_posts()) {
          $query->the_post(); ?>
          <div class="col-lg-6 col-12 mb-4">
            <div class="home-sp">
              <div>
                <div class="bg-b"></div>
                <?php if (get_the_post_thumbnail_url($post, 'full')) : ?>
                  <img src="<?php echo get_the_post_thumbnail_url($post, 'full'); ?>" alt="">
                <?php endif; ?>
                <div class="content">
                  <h4><?php the_title(); ?></h4>
                  <div class="desc">
                    <div class="cont-text">
                      <?php the_content(); ?>
                    </div>
                    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">Подробнее</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
      <?php
        }
      } else {
        // Постов не найдено
      }
      // Возвращаем оригинальные данные поста. Сбрасываем $post.
      wp_reset_postdata();
      ?>
    </div>
  </div>
</section>

<section class="contact-f">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <h3 id="contact" class="anchor">Заявка</h3>
      </div>
    </div>
    <?php
    echo do_shortcode('[contact-form-7 id="31" title="Contact form 1"]');
    ?>
  </div>
</section>

</div>

<?
get_footer();
