<?php get_header(); ?>


<div class="not_found">
  <h1 class="not_found_title">404</h1>
  <p class="not_found_txt">UPS! Parece que no hemos encontrado la página que estás buscando</p>
  <a class="btn" onclick="goBack()">Go Back</a>
  <a class="btn" href="<?php echo site_url() . '/blog';  ?>">Go to Home</a>
</div>






<?php get_footer(); ?>
