<?php

function getVimeoId($url)
{
  if (preg_match('#(?:https?://)?(?:www.)?(?:player.)?vimeo.com/(?:[a-z]*/)*([0-9]{6,11})[?]?.*#', $url, $m)) {
    return $m[1];
  }
  return false;
}
function getYoutubeId($url)
{
  $parts = parse_url($url);
  if (isset($parts['host'])) {
    $host = $parts['host'];
    if (
      false === strpos($host, 'youtube') &&
      false === strpos($host, 'youtu.be')
    ) {
      return false;
    }
  }
  if (isset($parts['query'])) {
    parse_str($parts['query'], $qs);
    if (isset($qs['v'])) {
      return $qs['v'];
    } else if (isset($qs['vi'])) {
      return $qs['vi'];
    }
  }
  if (isset($parts['path'])) {
    $path = explode('/', trim($parts['path'], '/'));
    return $path[count($path) - 1];
  }
  return false;
}
function getVideoThumbnailByUrl($url, $format = 'small')
{
  if (false !== ($id = getVimeoId($url))) {
    $hash = unserialize(file_get_contents("https://vimeo.com/api/v2/video/$id.php"));
    /**
     * thumbnail_small
     * thumbnail_medium
     * thumbnail_large
     */
    if ('medium' === $format) {
      return preg_replace("/^http:/i", "https:", $hash[0]['thumbnail_medium']);
    } else if ('large' === $format) {
      return preg_replace("/^http:/i", "https:", $hash[0]['thumbnail_large']);
    }
    return preg_replace("/^http:/i", "https:", $hash[0]['thumbnail_small']);
    // return $hash[0]['thumbnail_small'];
  } elseif (false !== ($id = getYoutubeId($url))) {
    /**
     * http://img.youtube.com/vi/<insert-youtube-video-id-here>/0.jpg
     * http://img.youtube.com/vi/<insert-youtube-video-id-here>/1.jpg
     * http://img.youtube.com/vi/<insert-youtube-video-id-here>/2.jpg
     * http://img.youtube.com/vi/<insert-youtube-video-id-here>/3.jpg
     *
     * http://img.youtube.com/vi/<insert-youtube-video-id-here>/default.jpg
     * http://img.youtube.com/vi/<insert-youtube-video-id-here>/mqdefault.jpg
     * http://img.youtube.com/vi/<insert-youtube-video-id-here>/hqdefault.jpg
     * http://img.youtube.com/vi/<insert-youtube-video-id-here>/sddefault.jpg
     * http://img.youtube.com/vi/<insert-youtube-video-id-here>/maxresdefault.jpg
     */
    if ('medium' === $format) {
      return 'https://img.youtube.com/vi/' . $id . '/hqdefault.jpg';
    } else if ('large' === $format) {
      return 'https://img.youtube.com/vi/' . $id . '/sddefault.jpg';
    } else if ('original' === $format) {
      return 'https://img.youtube.com/vi/' . $id . '/maxresdefault.jpg';
    }
    return 'https://img.youtube.com/vi/' . $id . '/mqdefault.jpg';
  }
  return false;
}
function getEmbedVideo($url)
{
  $code = <<<EEE
<style>
.vec { position: relative; padding-bottom: 56.25%!important; height: 0; overflow: hidden; max-width: 100%; }
.vec iframe, .vec object, .vec embed { position: absolute; top: 0; left: 0; width: 100%; height: 100%; }
</style>
EEE;

  if (false !== ($id = getVimeoId($url))) {
    $code .= <<<EEE
<div class='vec'><iframe src='https://player.vimeo.com/video/$id' frameborder='0' webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe></div>
EEE;
  } elseif (false !== ($id = getYoutubeId($url))) {
    $code .= <<<EEE
<div class='vec'><iframe src='https://www.youtube.com/embed/$id' frameborder='0' allowfullscreen></iframe></div>
EEE;
  } else {
    $code = false;
  }
  return $code;
}
