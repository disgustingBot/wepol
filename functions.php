<?php
// este si va -> Para copiar toda la carpeta
// scp -r /mnt/d/xampp/htdocs/encuesta/wp-content/themes/wepol_original/* trespi@144.91.64.164:~/temp_for_encuesta
// scp /mnt/d/xampp/htdocs/encuesta/wp-content/themes/wepol_original/home.php trespi@144.91.64.164:~/temp_for_encuesta

// temp_for_encuesta
// u4b6C3Ph4cm4dAHd


// este si va
// scp -r trespi@144.91.64.164:~/temp_for_encuesta/* /var/www/html/wp-content/themes/wepol_original
// scp -r trespi@144.91.64.164:~/temp_for_encuesta/* /var/app/current/wp-content/themes/wepol_original

// scp trespi@144.91.64.164:~/temp_for_encuesta/home.php /var/www/html/wp-content/themes/wepol_original
// scp trespi@144.91.64.164:~/temp_for_encuesta/home.php /var/app/current/wp-content/themes/wepol_original

// /var/app/current


// chmod -R 777 /var/www/html/wp-content/themes/
// chmod -R 755 /var/www/html


// scp /var/www/html/encuesta_blog.zip trespi@144.91.64.164:~/temp_for_encuesta


// activate debug mode, I need wp-config.php
// scp /mnt/d/xampp/htdocs/encuesta/wp-content/themes/wepol_original/page-blog.php trespi@144.91.64.164:~/temp_for_encuesta
// scp trespi@144.91.64.164:~/temp_for_encuesta/page-blog.php /var/www/html/wp-content/themes/wepol_original
//
// 144.91.64.164
// 173.249.15.176


// tp_encuesta
// x2HGcKBc6TGnRlrc



require_once 'inc/custom_posts.php';
require_once 'inc/form_handler.php';
require_once 'inc/new_ajax.php';

if(!is_admin()){
  require_once 'inc/multi_cards.php';
}

function lattte_setup(){
  wp_enqueue_style('style', get_stylesheet_uri(), NULL, microtime(), 'all');
	wp_enqueue_script('modules', get_theme_file_uri('/js/modules.js'), NULL, microtime(), true);

  // wp_enqueue_script('ReCaptcha', 'https://www.google.com/recaptcha/api.js', NULL, microtime(), true);


  // register our main script but do not enqueue it yet
  wp_register_script( 'main', get_stylesheet_directory_uri() . '/js/custom.js', array('jquery'), NULL, microtime(), true );
  // now the most interesting part
  // we have to pass parameters to myloadmore.js script but we can get the parameters values only in PHP
  // you can define variables directly in your HTML but I decided that the most proper way is wp_localize_script()

  $categories = get_categories( array(
      'orderby' => 'name',
      'order'   => 'ASC'
  ) );
  wp_localize_script( 'main', 'lt_data', array(
    'ajaxurl' => site_url() . '/wp-admin/admin-ajax.php', // WordPress AJAX
    'homeurl' => site_url(),
    'categories' => json_encode($categories),
    'is_front_page' => is_front_page(),
  ) );

  wp_enqueue_script( 'main' );
}
add_action('wp_enqueue_scripts', 'lattte_setup');

// Adding Theme Support

function gp_init() {
  add_theme_support('post-thumbnails');
  add_theme_support('title-tag');
  add_theme_support('html5',
    array('comment-list', 'comment-form', 'search-form')
  );
  // add_theme_support( 'woocommerce' );
  // add_theme_support( 'wc-product-gallery-zoom' );
  // add_theme_support( 'wc-product-gallery-lightbox' );
  // add_theme_support( 'wc-product-gallery-slider' );

   add_image_size( 'the_perfect_size', 450, 450 );
}
add_action('after_setup_theme', 'gp_init');


function standard_svg($id, $class) {
  $html='
  <svg class="' . $class . '" aria-hidden="true" focusable="false" role="img" xmlns="https://www.w3.org/2000/svg" viewBox="0 0 50 50">
    <use xlink:href="#' . $id . '"></use>
  </svg>
  ';
  return $html;
}









add_action('admin_init', 'my_general_section');
function my_general_section() {

    add_settings_section(
      'custom_settings', // Section ID
      'Custom Settings', // Section Title
      'my_section_options_callback', // Callback
      'general' // What Page?  This makes the section show up on the General Settings Page
    );

    add_settings_field( // Option 1
      'contact_form_to', // Option ID
      'Recive messages from contact form here', // Label
      'my_textbox_callback', // !important - This is where the args go!
      'general', // Page it will be displayed (General Settings)
      'custom_settings', // Name of our section
      array( // The $args
        'contact_form_to' // Should match Option ID
      )
    );

    register_setting('general','contact_form_to', 'esc_attr');
    // register_setting('general','option_2', 'esc_attr');
}

function my_section_options_callback() { // Section Callback
    echo '<p>A little message on editing info</p>';
}

function my_textbox_callback($args) {  // Textbox Callback
    $option = get_option($args[0]);
    echo '<input type="text" id="'. $args[0] .'" name="'. $args[0] .'" value="' . $option . '" />';
}








// this removes the "Archive" word from the archive title in the archive page
add_filter('get_the_archive_title',function($title){
  if(is_category()){$title=single_cat_title('',false);
  }elseif(is_tag()){$title=single_tag_title('',false);
  }elseif(is_author()){$title='<span class="vcard">'.get_the_author().'</span>';
  }return $title;
});






function excerpt($charNumber){
  if(!$charNumber){$charNumber=1000000;}
  $excerpt = get_the_excerpt();
  if(strlen($excerpt)<=$charNumber){return $excerpt;}else{
    $excerpt = substr($excerpt, 0, $charNumber);
    $result  = substr($excerpt, 0, strrpos($excerpt, ' '));
    // $result .= $result . '(...)';
    // return var_dump($excerpt);
    return $result;
  }
}









 function register_menus() {
   register_nav_menu('nav_bar',__( 'Header' ));
   // register_nav_menu('navBarMobile',__( 'Header Mobile' ));
   // register_nav_menu('contactMenu',__( 'Contact Menu' ));
   register_nav_menu('footer_info',__( 'Footer More Info' ));
   register_nav_menu('footer_support',__( 'Footer Support' ));
   // add_post_type_support( 'page', 'excerpt' );
 }
 add_action( 'init', 'register_menus' );









 function get_img_url_by_slug($slug){
   return wp_get_attachment_url( get_img_id_by_slug($slug));
 }

 function get_img_id_by_slug( $slug ) {
   $args = array(
     'post_type' => 'attachment',
     'name' => sanitize_title($slug),
     'posts_per_page' => 1,
     'post_status' => 'inherit',
   );
   $_header = get_posts( $args );
   $header = $_header ? array_pop($_header) : null;
   return $header ? $header->ID : '';
 }







//Second solution : two or more files.
//If you're using a child theme you could use:
// get_stylesheet_directory_uri() instead of get_template_directory_uri()
add_action( 'admin_enqueue_scripts', 'load_admin_styles' );
function load_admin_styles() {
  wp_enqueue_style( 'admin_css', get_template_directory_uri() . '/css/admin.css', false, '1.0.0' );
}





function wpse_287931_register_categories_names_field()
{
    register_rest_field(
        array('post'),
        'categories_data',
        array(
            'get_callback'    => 'wpse_287931_get_categories_names',
            'update_callback' => null,
            'schema'          => null,
        )
    );
}

add_action('rest_api_init', 'wpse_287931_register_categories_names_field');

function wpse_287931_get_categories_names($object, $field_name, $request)
{
    $formatted_categories = array();

    $categories = get_the_category($object['id']);

    foreach ($categories as $category) {
        $formatted_categories[] = array(
          'name' => $category->name,
          'link' => get_term_link($category->term_id),
        );
    }

    return $formatted_categories;
}











//estimated reading time
function reading_time() {
  $content = get_post_field( 'post_content', $post->ID );
  $word_count = str_word_count( strip_tags( $content ) );
  $words_per_minute = 200;
  $readingtime = ceil($word_count / $words_per_minute);
  return $readingtime;
}














// Receive the Request post that came from AJAX
add_action( 'wp_ajax_ticon_category', 'ticon_category' );
// We allow non-logged in users to access our function
add_action( 'wp_ajax_nopriv_ticon_category', 'ticon_category' );
function ticon_category(){
  // $response = array();
  $id = $_POST['term_id'];
  // $response['id'] = $id;


  $category = get_category($id);
  //
  // echo wp_json_encode($response);
  // exit();
  include get_template_directory() . '/inc/multi_cards.php';

  $cant_normal_posts = 3;
  $cat_cta = get_term_meta( $category->term_id, 'tp_meta_cta', true);
  $cat_banner = get_term_meta( $category->term_id, 'tp_meta_banner', true);
  $stickies = get_option( 'sticky_posts' );

  $args = array(
    'posts_per_page' => 1,
    'category__and'  => $category->term_id, //must use category id for this field
    // 'meta_key' => 'custom-meta-key'
    'meta_query' => array(
       array(
           'key' => 'featured_post',
           'value' => 'yes',
           'compare' => '=',
       ),
    ),
  );
  $blog=new WP_Query($args);
  $featured_id = 0;
  if($blog->have_posts()){
    while($blog->have_posts()){$blog->the_post();
      $arg = array(
        'classes' => 'featured',
      );
      $featured_id = get_the_ID();
      simpla_card($arg);
    } wp_reset_query();
  } else {
    // if there is no sticky post, load 2 more normal posts
    $cant_normal_posts += 2;
  }


  if(!$cat_cta){
    // if there is no banner load one more post
    $cant_normal_posts += 1;
  } else {
    $banner = get_page_by_path( $cat_cta, OBJECT, 'cta' );
    $args = array(
      'post_type'      => 'CTA',
      'posts_per_page' => 1,
      'post__in'       => [$banner->ID],
    );
    $banner=new WP_Query($args);
    while($banner->have_posts()){$banner->the_post();
      banin_card();
    }
  }

  $args = array(
    'posts_per_page' => $cant_normal_posts,
    'post__not_in'   => array($featured_id),
    'category__and' => $category->term_id, //must use category id for this field
    'ignore_sticky_posts' => 1,
  );
  $blog=new WP_Query($args);
  while($blog->have_posts()){$blog->the_post();
    simpla_card();
    $i+=1;
  } wp_reset_query();

  exit();

}










/*
FUNCTIONALITY: featured post from a column in the general view

thanks to Misha!
https://rudrastyh.com/woocommerce/columns.html
*/
// this part of the code is for creating a column
add_filter( 'manage_edit-post_columns', 'misha_extra_column', 20 );
function misha_extra_column( $columns ) {
	$columns['star'] = '★';
  unset($columns['comments']);
	// remember that you can add this column at any place you want with array_slice() function
	return $columns;
}
// this part of the code adds checkbox to our newly created column
add_action( 'manage_posts_custom_column', 'misha_populate_columns' );
function misha_populate_columns( $column_name ) {
	if( $column_name  == 'star' ) {
		echo '
      <input
        type="checkbox"
        data-productid="' . get_the_ID() .'"
        class="star_checkbox"
        ' . checked( 'yes', get_post_meta( get_the_ID(), 'featured_post', true ), false ) . '/>
      <small style="display:block;color:#7ad03a"></small>';
	}
}
// this code adds jQuery script to website footer that allows to send AJAX request
add_action( 'admin_footer', 'misha_jquery_event' );
function misha_jquery_event(){
	echo "<script>jQuery(function($){
		$('.star_checkbox').click(function(){
			var checkbox = $(this),
			    checkbox_value = (checkbox.is(':checked') ? 'yes' : 'no' );
			$.ajax({
				type: 'POST',
				data: {
					action: 'productmetasave', // wp_ajax_{action} WordPress hook to process AJAX requests
					value: checkbox_value,
					product_id: checkbox.attr('data-productid'),
					myajaxnonce : '" . wp_create_nonce( "activatingcheckbox" ) . "'
				},
				beforeSend: function( xhr ) {
					checkbox.prop('disabled', true );
				},
				url: ajaxurl, // as usual, it is already predefined in /wp-admin
				success: function(data){
					checkbox.prop('disabled', false ).next().html(data).show().fadeOut(400);
				}
			});
		});
	});</script>";
}
// this small piece of code can process our AJAX request
add_action( 'wp_ajax_productmetasave', 'misha_process_ajax' );
function misha_process_ajax(){
	check_ajax_referer( 'activatingcheckbox', 'myajaxnonce' );
	if( update_post_meta( $_POST[ 'product_id'] , 'featured_post', $_POST['value'] ) ) {
		echo '✓';
	}
	die();
}









































































// Receive the Request post that came from AJAX
add_action( 'wp_ajax_change_view_count_name', 'change_view_count_name' );
// We allow non-logged in users to access our function
add_action( 'wp_ajax_nopriv_change_view_count_name', 'change_view_count_name' );
function change_view_count_name(){
  $response = array();
  $response['cant_posts'] = 0;
  $response['cant_with_my_count'] = 0;
  $response['cant_with_filthy_count'] = 0;

  $args = array(
    'post_type'      => 'post',
    'posts_per_page' => 10000000,
  );
  $blog=new WP_Query($args);
  if($blog->have_posts()){
    while($blog->have_posts()){$blog->the_post();
      $response['cant_posts'] += 1;
      $view_count = get_post_meta(get_the_ID(), 'tp_view_count', true);
      if($view_count){
        $response['cant_with_my_count'] +=1;
      } else {
        $filthy_plugin_view_count = get_post_meta(get_the_ID(), 'nectar_blog_post_view_count', true);
        if ($filthy_plugin_view_count) {
          $response['cant_with_filthy_count'] +=1;
          add_post_meta(get_the_ID(), 'tp_view_count', $filthy_plugin_view_count);
          delete_post_meta(get_the_ID(), 'nectar_blog_post_view_count');
        }
      }
    } wp_reset_query();
  }
  echo wp_json_encode($response);
  exit();
}
