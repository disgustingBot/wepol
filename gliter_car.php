
<?php
// BANNER _____________________________________________________________
// this part gets the asociated banner, either for a post or a category
$object_class = get_class( get_queried_object() );
if( $object_class == "WP_Term" ){
  $my_id = get_queried_object()->term_id;
  $my_type = 'term';
}
if( $object_class == "WP_Post" ){
  $my_id = get_the_ID();
  $my_type = 'post';
}
$cat_banner = get_metadata( $my_type, $my_id, 'tp_meta_banner', true);
$args = array(
  'post_type' => 'banner',
  'posts_per_page' => 1,
);
if(!$cat_banner){
  // if there is no banner, get the default banner
  $args['tax_query'] = array(
    array (
      'taxonomy' => 'posicion',
      'field' => 'slug',
      'terms' => 'default',
    )
  );
} else {
  // if there is a banner, get that one
  $banner = get_page_by_path( $cat_banner, OBJECT, 'banner' );
  $args['post__in'] = array($banner->ID);
}
// then show the banner
$banner = new WP_Query($args);
while ( $banner->have_posts() ){$banner->the_post();
  ?>
  <a class="banner_card" href="<?php echo get_post_meta(get_the_ID(), 'link', true); ?>">
    <img class="banner_card_img" src="<?php echo get_the_post_thumbnail_url(); ?>" alt="">
  </a>
  <?php
} wp_reset_postdata();
// END OF BANNER __________________________________________________________


// now we show this special layout of categories
$categories = get_categories( array(
    'orderby' => 'name',
    'order'   => 'ASC'
));
// el cliente solo quiere 2 categorias
$two_rands = array_rand($categories, 2);
$two_cats  = array();
foreach( $two_rands as $number ) {
  $two_cats[] = $categories[$number];
}
// var_dump($two_cats);
foreach( $two_cats as $category ) { ?>
  <div class="gliter_car">
    <h3 class="gliter_car_title"><?php echo $category->name; ?></h3>
    <?php
    $i=1;
    $args = array(
      'posts_per_page' => 3,
      'category_name' => $category->slug
    );
    $posts = get_posts( $args );
    foreach ( $posts as $post ){ setup_postdata( $post );

      $arg = array(
        'color' => "var(--brand_color_$i)",
        // 'image' => "https://picsum.photos/600/40$i",
      );
      shiny_card($arg);
      $i +=1;
    } wp_reset_postdata(); ?>

  </div>
<?php } ?>
