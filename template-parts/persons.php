<?php
if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly.
}
?>
<?php
while (have_posts()) : the_post();
?>

  <!-- Content -->
  <main <?php post_class('site-main persons'); ?> role="main">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <a href="javascript:window.history.back();" class="nav-back-btn">
            <svg width="6" height="10" viewBox="0 0 6 10" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M5.5 0.5L1 5L5.5 9.5" stroke="white" />
            </svg> Назад к составу команды</a>
        </div>
      </div>

      <div class="section-wrapper row mt-5 post-wrapper">
        <div class="wrapper col-auto">
          <div class="persons-img">
            <div>
              <?php the_post_thumbnail('full'); ?>
            </div>
          </div>
        </div>
        <div class="wrapper col">
          <section class="section ps-0 ps-lg-4">
            <div class="post-head">
              <h1 style="line-height: 1;"><?php the_title(); ?></h1>
            </div>
            <div>
              <?php the_content(); ?>
            </div>

          </section>
        </div>
      </div>

    </div>

    <?php
    // if ('' != locate_template('template-parts/contact_form_wrapper.php')) {
    //   get_template_part('template-parts/contact_form_wrapper');
    // }
    ?>



  </main>

<?php
endwhile;
