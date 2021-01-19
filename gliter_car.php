
    <div class="gliter_car">

      <?php
      $term = get_category_by_slug('aumentar-participacion');
      ?>
      <h3><?php echo $term->name; ?></h3>
      <?php
      $args = array(
        'posts_per_page' => 3,
        'category_name' => 'aumentar-participacion'
      );
      $posts = get_posts( $args );
      foreach ( $posts as $post ){ setup_postdata( $post );

        $arg = array(
          'color' => 'var(--brand_color_2)'
        );
        shiny_card($arg);
      } wp_reset_postdata(); ?>

    </div>
