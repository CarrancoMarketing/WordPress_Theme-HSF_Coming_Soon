<?php


function theme_styles(){
    wp_enqueue_style( 'reset', get_template_directory_uri() . '/css/reset.css' );
	wp_enqueue_style( 'bootstrap_css', get_template_directory_uri() . '/css/bootstrap.min.css' );
	wp_enqueue_style( 'fonts', 'http://fonts.googleapis.com/css?family=Titillium+Web:400,300,600,600italic,700' );
}
add_action('wp_enqueue_scripts', 'theme_styles');

function theme_js() {

	global $wp_scripts;

	wp_register_script('html5_shiv','https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js', '', '', false);
	wp_register_script('respond_js','https://oss.maxcdn.com/respond/1.4.2/respond.min.js', '', '', false);

	$wp_scripts->add_data( 'html5_shiv', 'conditional', 'lt IE 9' );
	$wp_scripts->add_data( 'respond_js', 'conditional', 'lt IE 9' );

	wp_enqueue_script('bootstrap_js', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '',true );
	wp_enqueue_script('theme_js', get_template_directory_uri() . '/js/theme.js', array('bootstrap_js'), '',true );


	 
}
add_action( 'wp_enqueue_scripts', 'theme_js');

//add_filter( 'show_admin_bar', '__return_false' );

add_theme_support ( 'menus' );
add_theme_support ( 'post-thumbnails' );

/* Obfuscate E-Mail Addresses
	Use shotcode in editor: [mailto][/mailto]
	=============================================== */
	function cwc_mail_shortcode( $atts , $content=null ) {
		for ($i = 0; $i < strlen($content); $i++) $encodedmail .= "&#" . ord($content[$i]) . ';';
		return '<a href="mailto:'.$encodedmail.'">'.$encodedmail.'</a>';
	}
	add_shortcode('mailto', 'cwc_mail_shortcode');


	/* Remove Post Formatting Around Images
	=============================================== */
    function filter_ptags_on_images($content){
       return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
    }
    add_filter('the_content', 'filter_ptags_on_images');


	/* Truncate Page & Post WYSIWYG Content
	/* Use <?php echo content(20); ?> In The Template
	=============================================== */
function content($limit) {
  $content = explode(' ', get_the_content(), $limit);
  if (count($content)>=$limit) {
    array_pop($content);
    $content = implode(" ",$content).'...';
  } else {
    $content = implode(" ",$content);
  }
  $content = preg_replace('/\[.+\]/','', $content);
  $content = apply_filters('the_content', $content);
  $content = str_replace(']]>', ']]>', $content);
  return $content;
}
//Link Excerpt to post
function new_excerpt_more( $more ) {
	return ' <a class="read-more" href="'. get_permalink( get_the_ID() ) . '">' . __('...more <i class="fa fa-angle-double-right"></i>', 'your-text-domain') . '</a>';
}
add_filter( 'excerpt_more', 'new_excerpt_more' );

//Increase Excerpt Length
function custom_excerpt_length( $length ) {
	return 150;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );


//Add ACF Fields to search page
function custom_field_excerpt() {
	global $post;
	$text = get_field('three_column_left');
	if ( '' != $text ) {
		$text = strip_shortcodes( $text );
		$text = apply_filters('the_content', $text);
		$text = str_replace(']]>', ']]>', $text);
		$excerpt_length = 100; // 20 words
		$excerpt_more = apply_filters('excerpt_more', ' ' . '[...]');
		$text = wp_trim_words( $text, $excerpt_length, $excerpt_more );
	}
	return apply_filters('the_excerpt', $text);
}

function custom_field_excerpt_lefthome() {
	global $post;
	$lhome = get_field('left_column_home');
	if ( '' != $lhome ) {
		$lhome = strip_shortcodes( $lhome );
		$lhome = apply_filters('the_content', $lhome);
		$lhome = str_replace(']]>', ']]>', $lhome);
		$excerpt_length = 100; // 20 words
		$excerpt_more = apply_filters('excerpt_more', ' ' . '[...]');
		$lhome = wp_trim_words( $lhome, $excerpt_length, $excerpt_more );
	}
	return apply_filters('the_excerpt', $text);
}

function custom_field_excerpt_middle() {
	global $post;
	$midtext = get_field('three_column_middle');
	if ( '' != $midtext ) {
		$midtext = strip_shortcodes( $midtext );
		$midtext = apply_filters('the_content', $midtext);
		$midtext = str_replace(']]>', ']]>', $midtext);
		$excerpt_length = 100; // 20 words
		$excerpt_more = apply_filters('excerpt_more', ' ' . '[...]');
		$midtext = wp_trim_words( $midtext, $excerpt_length, $excerpt_more );
	}
	return apply_filters('the_excerpt', $midtext);
}

function custom_field_excerpt_middlehome() {
	global $post;
	$mhome = get_field('middle_column_home');
	if ( '' != $mhome ) {
		$mhome = strip_shortcodes( $mhome );
		$mhome = apply_filters('the_content', $mhome);
		$mhome = str_replace(']]>', ']]>', $mhome);
		$excerpt_length = 100; // 20 words
		$excerpt_more = apply_filters('excerpt_more', ' ' . '[...]');
		$mhome = wp_trim_words( $mhome, $excerpt_length, $excerpt_more );
	}
	return apply_filters('the_excerpt', $text);
}

function custom_field_excerpt_right() {
	global $post;
	$righttext = get_field('three_column_right');
	if ( '' != $righttext ) {
		$righttext = strip_shortcodes( $righttext );
		$righttext = apply_filters('the_content', $righttext);
		$righttext = str_replace(']]>', ']]>', $righttext);
		$excerpt_length = 100; // 20 words
		$excerpt_more = apply_filters('excerpt_more', ' ' . '[...]');
		$righttext = wp_trim_words( $righttext, $excerpt_length, $excerpt_more );
	}
	return apply_filters('the_excerpt', $midtext);
}

function custom_field_excerpt_righthome() {
	global $post;
	$rhome = get_field('right_column_home');
	if ( '' != $rhome ) {
		$rhome = strip_shortcodes( $rhome );
		$rhome = apply_filters('the_content', $rhome);
		$rhome = str_replace(']]>', ']]>', $rhome);
		$excerpt_length = 100; // 20 words
		$excerpt_more = apply_filters('excerpt_more', ' ' . '[...]');
		$rhome = wp_trim_words( $rhome, $excerpt_length, $excerpt_more );
	}
	return apply_filters('the_excerpt', $text);
}

//Menu Registar
function register_theme_menus() {

	register_nav_menus(
		array(
			'menu-1'	=> __( 'Menu 1' ),
			'menu-2'	=> __( 'Menu 2' )
		)
	);
}
add_action ( 'init', 'register_theme_menus');

function create_widget( $name, $id, $description ) {

	register_sidebar(array(
		'name' => __( $name ),	 
		'id' => $id, 
		'description' => __( $description ),
		'before_widget' => '<div class="widget">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>'
	));

}

create_widget( 'Blog Sidebar', 'blog', 'Displays on the side of pages in the blog section' );
create_widget( 'Header Widget', 'header-widget', 'Displays to the right of header menu 2' );
create_widget( 'Footer Widget', 'footer-widget', 'Displays in the black portion of the footer' );
?>