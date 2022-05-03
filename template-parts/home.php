<?php
if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly.
}
?>

<!-- Content -->
<main <?php /*post_class('site-main');*/ ?> role="main">

  <div class="container-fluid first-section bg">
    <div class="row align-items-end h-100">
      <div class="col">
        <div class="container">
          <div class="row">
            <div class="col">
              <div class="first-section-content">
                <h2>Functions</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nihil error quidem fugiat consequatur officia? Rerum, delectus aut. Repellat magni repellendus minima, earum voluptas illum animi sequi sit ipsa eveniet esse?</p>
                <button type="button" class="btn btn-light">Light</button>
              </div>
            </div>
            <div class="col">
              <div class="first-section-content">
                <h2>Eat and drink</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa saepe blanditiis dignissimos qui ipsam enim eos provident? Dolore repellat libero ipsum, at facilis necessitatibus. Illum dolorum voluptatem quisquam optio ad!</p>
                <button type="button" class="btn border border-light text-light">Light</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php
  // if ('' != locate_template('template-parts/reviews_wrapper.php')) {
  //   get_template_part('template-parts/reviews_wrapper');
  // }
  ?>

</main>
