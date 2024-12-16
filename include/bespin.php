<?php
/* affiche la méta pour un auteur */
function detail_admin($parameters) {
  return the_author_meta($parameters,1);
}

/* affichage du titre */
function run_title() {
  if (true === is_front_page() || true === is_home() ) {
    $title = get_bloginfo('name') ; 
  }
  elseif (true === is_archive() && false === is_author() || true === is_search() ) {
    if( true === is_search() ) {
      $title = __("Recherhe", "bespin");
    }
    else {
      $title = ucfirst(single_cat_title());
    }
  }
  elseif( true === is_author()) {
    $title = __("Les articles de", "bespin") . " " . ucfirst(get_the_author_meta("display_name", get_current_user_id() ) ) ;
  }
  elseif (true === is_singular() || true === is_page() ) {
    $title = get_the_title();
  }
  elseif (true === is_404()) {
    $title = "404";
  }
  else {
    $title = "Hey !";
  }

  return $title;
}

/* affichage de la description */
function run_category() {
  if (true === is_front_page() || true === is_home() ) {
    $title = get_bloginfo('description') ; 
  }
  elseif (true === is_archive() && false === is_author() || true === is_search() ) {
    if( true === is_search() ) {
      $title = __("Voilà ce que j'ai trouvé pour vous", "bespin");
    }
    else if( true === is_tag() ) {
      $title = get_the_tags(get_the_ID())[0]->description;
    }
    else {
      $title = get_the_category(get_the_ID())[0]->description;
    }
  }
  elseif( true === is_author()) {
    $title = get_the_author_meta("description", get_current_user_id() ) ;
  }
  elseif (true === is_singular() || true === is_page() ) {
    return false;
  }
  elseif (true === is_404()) {
    $title = __("Un erreur est survenue", "bespin");
  }
  return $title;
}

/* change la longeur des caractères de l'excerpt  */
function replace_text($text) {
	$text = substr($text, 0, 60) .' [...]';
	return $text;
}
add_filter('get_the_excerpt', 'replace_text');

/* PREPARE PRISM.JS */
$types = array( "html", "html_visible", "css_visible", "js_visible", "php_visible" );
$names = array( "Preview", "HTML", "CSS", "Javascript", "PHP"  );
$code["html_visible"] = "language-markup";
$code["css_visible"] = "language-css";
$code["js_visible"] = "language-javascript";
$code["php_visible"] = "language-php";
DEFINE("TYPES", $types);

/* Ajoute la fonction "order" de Wordpress */
function add_post_page_attributes(){
  add_post_type_support('post','page-attributes');
}
add_action('admin_init','add_post_page_attributes');

/* Modifie le lien du logo de la page de connexion */
function custom_url() {
    return home_url();
  }
add_filter( 'login_headerurl', 'custom_url');

/* Modifie le logo de connexion de wordpress */
function virgin_my_custom_login_logo() {
echo '<style type="text/css">
h1 a { background-image:url('.get_stylesheet_directory_uri().'/favicon.png) !important; }
</style>';
}
add_action('login_head', 'virgin_my_custom_login_logo');

/* Cache le logo WORDPRESS dans le dashboard */
function example_admin_bar_remove_logo() {
    global $wp_admin_bar;
    $wp_admin_bar->remove_menu( 'wp-logo' );
}
add_action( 'wp_before_admin_bar_render', 'example_admin_bar_remove_logo', 0 );

/* Modifie le footer dans le dashboard */
function oz_alter_wp_admin_bottom_left_text( $text ) {
    return sprintf( __( 'Merci de faire de <a href="%s" title="L\'intermédiaire" target="_blank">L\'intermédiaire</a> votre agence de communication' ),'https://lintermediaire.be');
}
add_filter('admin_footer_text','oz_alter_wp_admin_bottom_left_text');