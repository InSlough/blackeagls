<?php

// ? get variables (globally)
function gV($gv)
{
  if ($gv == 'dev') $gv = true;
  // else if ($gv == 'critical') $gv = false;
  else if ($gv == 'ver') $gv = "1.000";
  else if ($gv == 'slug') $gv = "simple-theme";
  else $gv = 0;
  return $gv;
}

require(get_stylesheet_directory() . '/functions/base.php');
require(get_stylesheet_directory() . '/functions/styles.php');
require(get_stylesheet_directory() . '/functions/scripts.php');
require(get_stylesheet_directory() . '/functions/acf.php');
require(get_stylesheet_directory() . '/functions/get-video.php');
require(get_stylesheet_directory() . '/functions/gutenberg-block.php');
// require(get_stylesheet_directory() . '/functions/name.php');
