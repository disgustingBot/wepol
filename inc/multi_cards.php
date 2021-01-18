
<?php function simpla_card ($args = array()) {
    if(!isset($args['classes'] )){ $args['classes']  = False; }
    if(!isset($args['author'] )){ $args['author']  = get_the_author(); }
    if(!isset($args['date']   )){ $args['date']    = get_the_date(); }
    if(!isset($args['title']  )){ $args['title']   = get_the_title(); }
    if(!isset($args['link']   )){ $args['link']    = get_the_permalink(); }
    if(!isset($args['image']  )){ $args['image']   = get_the_post_thumbnail_url(); }
    if(!isset($args['r_time'] )){ $args['r_time']  = reading_time(); }
    ?>

    <article class="simpla <?php if($args['classes']){echo $args['classes'];} ?>">
        <?php if($args['image'] != false){ ?>
            <a href="<?php echo $args['link']; ?>" class="simpla_amg">
                <img class="simpla_img" loading="lazy" src="<?php echo $args['image']; ?>" alt="">
            </a>
        <?php } ?>
        <div class="simpla_caption">
          <?php if($args['date'] != false){ ?>
            <div class="simpla_date_cat">
              <p class="simpla_date"><?php echo $args['date']; ?></p>
              <p class="simpla_cat"><?php echo 'categoria'; ?></p>

            </div>
          <?php } ?>
          <?php if($args['title'] != false){ ?>
            <h4 class="simpla_title">
              <a href="<?php echo $args['link']; ?>">
                <?php echo $args['title']; ?>
              </a>
            </h4>
          <?php } ?>
          <?php if($args['author'] != false or $args['r_time'] != false){ ?>
            <div class="simpla_foot">
              <p class="simpla_author">Por -<?php echo $args['author']; ?>-</p>
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
