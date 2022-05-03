<?php

if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly.
}

get_template_part('template-parts/footer');
?>
<!-- <div class="copyright"><?php /*the_field('copyright', 'options');*/ ?></div> -->

<!-- .content-wrapper END -->
</div>
<div class="noise"></div>


<!-- .i-body END -->
<!-- </div> -->

<!-- Modal -->
<?php // get_template_part('template-parts/modals');
?>

<div class="sources">
  <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.umd.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.css" />
  <?php wp_footer(); ?>



  <!-- <div id="toast-wrapper" aria-live="polite" aria-atomic="true"></div> -->
</div>


</body>

</html>
