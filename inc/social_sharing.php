<div class="social_sharing_container">
  <div class="dialogue_pointer"></div>
  <a href="http://www.facebook.com/sharer.php?u=<?php echo get_permalink(); ?>" target="_blank">
    <?php echo standard_svg('facebook_svg', 'social_sharing_svg'); ?>
  </a>
  <a href="mailto:?subject=I Mira este artículo&amp;body=<?php echo get_permalink(); ?>">
    <?php echo standard_svg('email_svg', 'social_sharing_svg'); ?>
  </a>
  <a href="https://twitter.com/share?url=<?php echo get_permalink(); ?>&amp;text=Mira%este%artículo&amp;hashtags=encuestapuntocom" target="_blank">
    <?php echo standard_svg('twitter_svg', 'social_sharing_svg'); ?>
  </a>
  <a href="whatsapp://send?text=Hey! Mira este artículo: <?php echo get_permalink(); ?>">
    <?php echo standard_svg('whatsapp_svg', 'social_sharing_svg'); ?>
  </a>
</div>
