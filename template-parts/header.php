<?php

if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly.
}
$site_name = get_bloginfo('name');
$tagline   = get_bloginfo('description', 'display');
?>
<header class="site-header" role="banner">
  <div class="container">
    <div class="row">
      <div class="col-auto">

        <div class="site-branding">
          <?php
          if (has_custom_logo()) {
            the_custom_logo();
          } elseif ($site_name) {
          ?>
            <h1 class="site-title">
              <a href="<?php echo esc_url(home_url('/')); ?>" title="<?php esc_attr_e('Home', gV('slug')); ?>" rel="home">
                <?php echo esc_html($site_name); ?>
              </a>
            </h1>
          <?php } ?>
        </div>

      </div>
      <nav class="site-navigation col" role="navigation">
        <?php if (has_nav_menu('main_menu')) : ?>
          <?php wp_nav_menu(array('theme_location' => 'main_menu')); ?>
        <?php endif; ?>
      </nav>
      <nav class="nav" style="display: none;">
        <div class="nav__content">
          <?php wp_nav_menu(array('theme_location' => 'main_menu')); ?>
          <div class="menu-footer"> <?php if (have_rows('soc', 'option')) : ?>
              <?php while (have_rows('soc', 'option')) : the_row(); ?>
                <div class="row">
                  <div class="col-md-6 col-12">
                    <p> <span class="fl">Email: </span> <a href="#">info@mail.ru</a> </p>
                    <p> <span class="fl">Tel: </span> <a href="#">+7 999 456 45 45</a> </p>
                  </div>
                  <div class="col-md-6 col-12 cl">
                    <div class="link-subscribe">
                      <span>Подпишитесь на нас</span>
                      <a href="<?php the_sub_field('l1'); ?>"> <img src="<?php tUrl(); ?>/img/gc.png" alt=""> </a>
                      <a href="<?php the_sub_field('l2'); ?>"> <img src="<?php tUrl(); ?>/img/gc.png" alt=""> </a>
                      <a href="<?php the_sub_field('l3'); ?>"> <img src="<?php tUrl(); ?>/img/gc.png" alt=""> </a>
                    </div>
                  </div>
                </div>

              <?php endwhile; ?>
            <?php endif; ?>
          </div>
        </div>
      </nav>
      <div class="nav-but-wrap col-auto">
        <button class="menu-icon mobile-menu-btn" aria-label="Меню" style="opacity:0;"></button>
        <!-- <div class="menu-icon hover-target">
          <span class="menu-icon__line menu-icon__line-left"></span>
          <span class="menu-icon__line"></span>
          <span class="menu-icon__line menu-icon__line-right"></span>
        </div> -->
      </div>
    </div>
  </div>



</header>
