<?php

if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly.
}
?>
<footer id="site-footer" class="site-footer" role="contentinfo">
  <div class="container">
    <?php if (have_rows('soc', 'option')) : ?>
      <?php while (have_rows('soc', 'option')) : the_row(); ?>
        <div class="row">
          <div class="col-md-6 col-12">
            <p> <span class="fl">Email: </span> <span>info@mail.ru</span> </p>
            <p> <span class="fl">Tel: </span> <span>+7 999 456 45 45</span> </p>
          </div>
          <div class="col-md-6 col-12 cl">
            <div>
              <span>Подпишитесь на нас</span>
              <a href="<?php the_sub_field('l1'); ?>"> <img src="<?php tUrl(); ?>/img/gc.png" alt=""> </a>
              <a href="<?php the_sub_field('l2'); ?>"> <img src="<?php tUrl(); ?>/img/gc.png" alt=""> </a>
              <a href="<?php the_sub_field('l3'); ?>"> <img src="<?php tUrl(); ?>/img/gc.png" alt=""> </a>
            </div>
          </div>
        </div>
  </div>

<?php endwhile; ?>
<?php endif; ?>
<?php // footer.
?>
</footer>
