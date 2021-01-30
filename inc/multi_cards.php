
<?php function simpla_card ($args = array()) {
    if(!isset($args['classes']   )){ $args['classes']     = False; }
    if(!isset($args['author']    )){ $args['author']      = get_the_author(); }
    if(!isset($args['date']      )){ $args['date']        = get_the_date('d/m/y'); }
    if(!isset($args['title']     )){ $args['title']       = get_the_title(); }
    if(!isset($args['link']      )){ $args['link']        = get_the_permalink(); }
    if(!isset($args['image']     )){ $args['image']       = get_the_post_thumbnail_url(); }
    if (!$args['image']) { $rand_number = rand(0, 9);
      $args['image'] = "https://picsum.photos/600/40$rand_number";
    }
    if(!isset($args['r_time']    )){ $args['r_time']      = reading_time(); }
    if(!isset($args['categories'])){
      $args['categories']  = get_categories(array(
        'include' => wp_get_post_categories(get_the_ID()),
        'orderby'    => 'count',
        'order'      => 'DESC',
        'number' => 1, //can be 0, '0', '' too
      ));
    }
    ?>

    <article class="simpla <?php if($args['classes']){echo $args['classes'];} ?>">
        <?php if($args['image'] != false){ ?>
          <div class="simpla_share rowcol1" onclick="altClassFromSelector('visible', '.post-<?php echo get_the_ID(); ?> .social_sharing_container')">
            <?php include 'social_sharing.php'; ?>
            <svg class="simpla_share_icon" aria-hidden="true" focusable="false" role="img" xmlns="https://www.w3.org/2000/svg" viewBox="0 0 50 50">
              <use xlink:href="#share_svg"></use>
            </svg>
            <!-- <p class="simpla_share_txt">Compartir</p> -->


          </div>
          <a href="<?php echo $args['link']; ?>" class="simpla_amg rowcol1">
            <img class="simpla_img" loading="lazy" src="<?php echo $args['image']; ?>" alt="">
          </a>
        <?php } ?>
        <div class="simpla_caption">
          <?php if($args['date'] != false){ ?>
            <div class="simpla_date_cat">
              <time class="simpla_date"><?php echo $args['date']; ?></time>
              <p class="simpla_cat">
                <?php foreach ($args['categories'] as $key => $value) { ?>
                  <a href="<?php echo get_term_link($value->term_id); ?>"><?php _e($value->name, 'latte') ?></a>
                <?php } ?>
              </p>

            </div>
          <?php } ?>
          <?php if($args['title'] != false){ ?>
            <h5 class="simpla_title">
              <a href="<?php echo $args['link']; ?>">
                <?php echo $args['title']; ?>
              </a>
            </h5>
          <?php } ?>
          <?php if($args['author'] != false or $args['r_time'] != false){ ?>
            <div class="simpla_foot">
              <author class="simpla_author">Por -<?php echo $args['author']; ?>-</author>
              <div class="simpla_r_time">
                <?php include get_template_directory() . '/assets/clock.svg' ?>
                <p><?php echo $args['r_time']; ?>’</p>
              </div>
            </div>
          <?php } ?>
        </div>
    </article>

<?php } ?>





<?php function shiny_card ($args = array()) {
    if(!isset($args['title']  )){ $args['title']   = get_the_title(); }
    if(!isset($args['link']   )){ $args['link']    = get_the_permalink(); }
    if(!isset($args['image']  )){ $args['image']   = get_the_post_thumbnail_url(); }
    if(!isset($args['color']  )){ $args['color']   = get_post_meta(get_the_ID(), 'color', true); }
    ?>

    <div class="shiny">
        <?php if($args['image'] != false){ ?>
            <a class="shiny_amg" href="<?php echo $args['link']; ?>">
              <?php if($args['color'] != false){ ?>
                <div class="shiny_deco" style="background:<?php echo $args['color']; ?>"></div>
              <?php } ?>
              <img class="shiny_img" loading="lazy" src="<?php echo $args['image']; ?>" alt="">
            </a>
        <?php } ?>
        <?php if($args['title'] != false){ ?>
          <h6 class="shiny_title">
            <a href="<?php echo $args['link']; ?>">
              <?php echo $args['title']; ?>
            </a>
          </h6>
        <?php } ?>
    </div>

<?php } ?>


<?php function banin_card ($args = array()) {
    if(!isset($args['title']      )){ $args['title']      = get_the_title(); }
    if(!isset($args['excerpt']    )){ $args['excerpt']    = excerpt(120); }
    // if(!isset($args['image']      )){ $args['image']      = get_the_post_thumbnail_url(); }
    if(!isset($args['link']       )){ $args['link']       = get_post_meta(get_the_ID(), 'link', true); }
    if(!isset($args['color']      )){ $args['color']      = get_post_meta(get_the_ID(), 'color', true); }
    if(!isset($args['button_text'])){ $args['button_text']= get_post_meta(get_the_ID(), 'button_text', true); }

    ?>

    <div class="banin">
        <?php if($args['image'] != false){ ?>
            <!-- <a class="banin_amg" href="<?php echo $args['link']; ?>">
              <?php if($args['color'] != false){ ?>
                <div class="banin_deco" style="background:<?php echo $args['color']; ?>"></div>
              <?php } ?>
              <img class="banin_img" loading="lazy" src="<?php echo $args['image']; ?>" alt="">
            </a> -->
        <?php } ?>
        <?php if($args['title'] != false){ ?>
          <h6 class="banin_title">
            <a href="<?php echo $args['link']; ?>">
              <?php echo $args['title']; ?>
            </a>
          </h6>
        <?php } ?>
        <?php if($args['color'] != false){ ?>
          <div class="banin_deco" style="background:<?php echo $args['color']; ?>"></div>
        <?php } ?>
        <?php if($args['excerpt'] != false){ ?>
          <div class="banin_short">
            <?php echo $args['excerpt']; ?>
          </div>
        <?php } ?>
        <?php if($args['link'] != false){ ?>
          <a class="banin_btn btn" href="<?php echo $args['link']; ?>">
            <?php echo $args['button_text']; ?>
          </a>
        <?php } ?>
    </div>

<?php } ?>
