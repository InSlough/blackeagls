<div class="second-swiper-container">
  <!-- Additional required wrapper -->
  <div class="swiper-wrapper container">
    <!-- Slides -->
    <?php
    $args = array('post_type' => 'review');
    $loop = new WP_Query($args);
    while ($loop->have_posts()) : $loop->the_post(); ?>
      <div class="swiper-slide">
      <?php
          $customs = get_post_custom();
          $youtubeUrl = str_replace('watch?v=','embed/', $customs['video_link'][0]);
          $fragment = $customs['review_fragment'][0];
        ?>
        <iframe width="360" height="190" src="<?php echo $youtubeUrl ?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        <h3 class="review-author"><?php the_title(); ?></h3>
        <p class="review-fragment"><?php echo $fragment ?></p>
      </div>
    <?php endwhile; ?>
  </div>
  <!-- If we need pagination -->
  <div class="second-swiper-pagination"></div>
</div>
