<?php
if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly.
}
?>
<?php
while (have_posts()) : the_post();
?>

  <!-- Content -->
  <main <?php post_class('site-main post-page'); ?> role="main">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <a href="javascript:window.history.back();" class="nav-back-btn">
            <svg width="6" height="10" viewBox="0 0 6 10" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M5.5 0.5L1 5L5.5 9.5" stroke="white" />
            </svg> Назад к услугам</a>
        </div>
      </div>

      <div class="section-wrapper row post-wrapper">
        <div class="wrapper col-auto">
          <div class="post-img">
            <div>
              <?php the_post_thumbnail('full'); ?>
            </div>
          </div>
        </div>
        <div class="wrapper col">
          <section class="section ps-0 ps-lg-4">
            <div class="post-head">
              <h1><?php the_title(); ?></h1>
              <?php if (get_field('price')) : ?> <p>Цена: <span><?php the_field('price'); ?></span></p> <?php endif; ?>
            </div>
            <div>
              <?php the_content(); ?>
            </div>
            <?php
            $url = get_field('video_url');
            if ($url) {
              echo getEmbedVideo($url);
            }
            ?>
            <?php the_field('description'); ?>

            <div class="col text-center person-link-post">
              <a class="" href="javascript:;" data-src="#contact-modal">Отправить заявку</a>
            </div>
          </section>
        </div>
      </div>
    </div>

    <div class="row mt-5 py-5">
    </div>


    <?php
    // if ('' != locate_template('template-parts/contact_form_wrapper.php')) {
    //   get_template_part('template-parts/contact_form_wrapper');
    // }
    ?>

    <div style="display: none;" id="contact-modal">
      <div class="contact-modal-content contact-f">
        <?php
        echo do_shortcode('[contact-form-7 id="31" title="Contact form 1"]');
        ?>
      </div>
    </div>

  </main>

<?php
endwhile;
