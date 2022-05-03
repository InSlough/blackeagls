<?
/*
 Template name: Filter
 Template post type: post, page
 */
get_header();
?>
<div class="page">

  <?php
  $loop = new WP_Query(array(
    'post_type' => 'product',
    'posts_per_page' => '100',
    'orderby' => 'menu_order',
    'order' => 'ASC',
  ));
  $obj = "";
  $obj .= "[";
  $index = 0;
  while ($loop->have_posts()) : $loop->the_post();
    $index++;
    $slugs = array();
    $product_cats = wp_get_post_terms(get_the_ID(), 'product_cat');
    foreach ($product_cats as $product_cat) {
      $slugs[] = $product_cat->slug;
    }
    if ($index > 1) $obj .= ',';
    $obj .= "{";
    $obj .= "\"pID\":\"" . get_the_ID() . "\",";
    $obj .= "\"toCartUrl\":\"" . $product->add_to_cart_url() . "\",";
    $obj .= "\"safety\":\"" . $product->get_attribute('safety') . "\",";
    $obj .= "\"weight\":\"" . $product->get_attribute('weight') . "\",";
    $obj .= "\"calorie\":\"" . $product->get_attribute('calorie') . "\",";
    $obj .= "\"dia\":\"" . $product->get_attribute('dia') . "\",";
    $obj .= "\"image\":\"" . wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'medium')[0] . "\",";
    $obj .= "\"url\":\"" . get_the_permalink() . "\",";
    $obj .= "\"catSlug\":\"" . implode(",", $slugs) . "\",";
    $obj .= "\"title\":\"" . get_the_title() . "\",";
    $obj .= "\"price\":\"" . $product->get_price() . "\"";
    $obj .= "}";
  endwhile;
  $obj .= "]";
  $obj = trim(preg_replace('/\s\s+/', ' ', $obj));

  // var_dump(get_categories());

  ?>
  <section class="filter" data-products-obj='<?php echo $obj; ?>'>
    <div class="container">
      <div class="row">
        <h3 class="th">Выберите параметры для подбора товара:</h3>
      </div>
      <form class="row" id="form-filter">
        <div class="col col-auto">
          <select name="category">
            <option selected disabled>Товар</option>
            <option value="verm">Макароны</option>
            <option value="cetch">Кетчуп</option>
          </select>
        </div>
        <div class="col col-auto">
          <select name="eco">
            <option selected disabled>Экологичность</option>
            <option value="1">1 - Самые безопасные</option>
            <option value="2">2 - Безопасный</option>
            <option value="3">3 - Ниже среднего</option>
            <option value="4">4 - Выше среднего</option>
            <option value="5">5 - Опасные</option>
            <option value="6">6 - Наиболее опасные</option>
          </select>
        </div>

        <div class="col col-auto">
          <input type="text" id="weight" name="weight" placeholder="Вес">
        </div>
        <div class="col col-auto">
          <input type="text" id="calorie" name="calorie" placeholder="Калорийность">
        </div>
        <div class="col col-auto">
          <input type="text" id="price" name="price" placeholder="Цена">
        </div>
        <div class="col col-auto">
          <input type="checkbox" id="dia" name="dia">
          <label for="scales">Для диабетиков</label>
        </div>
        <div class="col col-auto">
          <input type="checkbox" id="child" name="child">
          <label for="scales">Для детей</label>
        </div>
        <div class="col col-auto">
          <button class="filter-button" form="form-filter" type="button" value="submit">Поиск</button>
        </div>
      </form>
    </div>
  </section>


  <?php
  $loop = new WP_Query(array(
    'post_type' => 'product',
    'posts_per_page' => '3',
    'orderby' => 'menu_order',
    'order' => 'ASC',
  ));

  ?>
  <section class="container product-block ">
    <div class="row">
      <h4 class="th">Три товара которые больше всего вам подходят:</h4>
    </div>
    <div class="row product-block-row">
    </div>
  </section>


</div>
<?
get_footer();
?>
