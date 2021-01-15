
  <div class="interfoot top_block">
    <div class="interfoot_element little_cta">
      <h5 class="little_cta_title">Crea tu encuesta online ahora</h5>
      <a href="" class="btn little_cta_link">Crear encuesta -></a>
    </div>
    <div class="interfoot_deco"></div>
    <div class="interfoot_element formative">
      <h5 class="formative_title">O contacta con nuestro equipo de analistas.</h5>
      <input class="formative_input" type="text" placeholder="Nombre*">
      <input class="formative_input" type="text" placeholder="E-mail*">
      <input class="formative_input" type="text" placeholder="Área">
      <textarea class="formative_input formative_textarea" name="" placeholder="Comentarios" cols="30" rows="10"></textarea>
      <div class="formative_foot">
        <label class="formative_check" for="termcond">
          <input type="checkbox" name="termcond" value="">
          <p>Acepto <a href="">Términos y condiciones</a> de la web</p>
        </label>
        <label class="formative_check" for="termcond">
          <input type="checkbox" name="termcond" value="">
          <p>Acepto la <a href="">Política de Privacidad</a></p>
        </label>
        <button class="btn">Enviar</button>
      </div>
    </div>
  </div>

  <footer class="footer" id="footer">

    <img class="footer_logo" src="https://www.encuesta.com/wp-content/uploads/2018/01/confianza-online-logo.png" alt="">

    <div class="footer_info">
      <div class="footer_col">
        <h5 class="footer_subtitle">Más información</h5>
        <!-- <a href="" class="footer_link"></a> -->

        <?php
        $args = array(
          'theme_location' => 'footer_info',
          'depth' => 0,
          'container'	=> false,
          'fallback_cb' => false,
          'menu_class' => 'footer_nav',
        );
        wp_nav_menu($args);
        ?>
      </div>
      <div class="footer_col">
        <h5 class="footer_subtitle">Soporte</h5>
        <!-- <a href="" class="footer_link"></a> -->

        <?php
        $args = array(
          'theme_location' => 'footer_support',
          'depth' => 0,
          'container'	=> false,
          'fallback_cb' => false,
          'menu_class' => 'footer_nav',
        );
        wp_nav_menu($args);
        ?>
      </div>
      <div class="footer_col">
        <h5 class="footer_subtitle">Contacto</h5>
        <ul class="footer_nav">
          <li class="menu-item">
            <p class="footer_txt">Todos los países</p>
            <div class="footer_tel">
              <img class="footer_tel_icon" src="https://www.encuesta.com/wp-content/uploads/2018/01/telefono-footer.png" alt="">
              <p class="footer_txt">0034 91 564 34 18</p>
            </div>
          </li>
          <li class="menu-item">
            <p class="footer_txt">España</p>
            <div class="footer_tel">
              <img class="footer_tel_icon" src="https://www.encuesta.com/wp-content/uploads/2018/01/telefono-footer.png" alt="">
              <p class="footer_txt">91 564 34 18</p>
            </div>
          </li>
          <li class="menu-item">
            <p class="footer_txt">México</p>
            <div class="footer_tel">
              <img class="footer_tel_icon" src="https://www.encuesta.com/wp-content/uploads/2018/01/telefono-footer.png" alt="">
              <p class="footer_txt">(55) 8421 4155</p>
            </div>
          </li>
          <li class="menu-item">
            <p class="footer_txt">Colombia</p>
            <div class="footer_tel">
              <img class="footer_tel_icon" src="https://www.encuesta.com/wp-content/uploads/2018/01/telefono-footer.png" alt="">
              <p class="footer_txt">(57) 300 929 5074</p>
            </div>
          </li>
          <li class="menu-item">
            <p class="footer_txt">Chile</p>
            <div class="footer_tel">
              <img class="footer_tel_icon" src="https://www.encuesta.com/wp-content/uploads/2018/01/telefono-footer.png" alt="">
              <p class="footer_txt">(42) 245 7612</p>
            </div>
          </li>
        </ul>

      </div>
    </div>


    <sign class="signature">
      <p>© 2018 Webtools. Todos los derechos reservados.</p>
    </sign>

    <sign class="signature" style="display:none">
      <p>&#60;&#47;&#62; by <a href="https://lattedev.com/" target="_blank" class="latteLink">Latte</a></p>
    </sign>
  </footer>
  <?php wp_footer(); ?>
</body>
</html>
