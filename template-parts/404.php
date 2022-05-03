<?php

if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly.
}
?>

<main class="site-main" role="main">
    <header class="page-header">
      <h1 class="entry-title"><?php esc_html_e('The page can&rsquo;t be found.', gV('slug')); ?></h1>
    </header>
  <div class="page-content">
    <p><?php esc_html_e('It looks like nothing was found at this location.', gV('slug')); ?></p>
  </div>
</main>
