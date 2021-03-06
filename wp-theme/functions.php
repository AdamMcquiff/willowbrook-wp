<?php
/*
Author: Zetec IT Solutions
URL: https://www.zetec-it.com

This is where you can drop your custom functions or
just edit things like thumbnail sizes, header images,
sidebars, comments, etc.
*/

// LOAD CORE (if you remove this, the theme will break)
require_once('library/core.php');

// CUSTOMIZE THE WORDPRESS ADMIN (off by default)
require_once('library/admin.php');

// CMB2 Custom Fields
require_once('library/custom-fields.php');

/*********************
LAUNCH
Let's get everything up and running.
*********************/

function setup () {

    //Allow editor style.
    add_editor_style(get_stylesheet_directory_uri() . '/library/css/editor-style.css');

    // let's get language support going, if you need it
    load_theme_textdomain('theme_slug', get_template_directory() . '/library/translation');

    // USE THIS TEMPLATE TO CREATE CUSTOM POST TYPES EASILY
    require_once('library/custom-post-type.php');

    // launching operation cleanup
    add_action('init', 'head_cleanup');
    add_action('init', 'footer_cleanup');
    // A better title
    add_filter('wp_title', 'rw_title', 10, 3);
    // remove WP version from RSS
    add_filter('the_generator', 'rss_version');
    // remove pesky injected css for recent comments widget
    add_filter('wp_head', 'remove_wp_widget_recent_comments_style', 1);
    // clean up comment styles in the head
    add_action('wp_head', 'remove_recent_comments_style', 1);
    // clean up gallery output in wp
    add_filter('gallery_style', 'gallery_style');

    // enqueue base scripts and styles
    add_action('wp_enqueue_scripts', 'scripts_and_styles', 999);
    // ie conditional wrapper

    // launching this stuff after theme setup
    theme_support();

    // adding sidebars to Wordpress (these are created in functions.php)
    add_action('widgets_init', 'theme_register_sidebars');

    // cleaning up random code around images
    add_filter('the_content', 'filter_ptags_on_images');
    // cleaning up excerpt
    add_filter('excerpt_more', 'excerpt_more');
    // auto update plugins
    add_filter('auto_update_plugin', '__return_true');

}

add_action('after_setup_theme', 'setup');

/*********************
OEMBED SIZE OPTIONS
*********************/

if (!isset($content_width)) {
    $content_width = 680;
}

/*********************
WP HEAD
*********************/

// amended wp_head with indentation
function head(){
	ob_start();
	wp_head();
	$header = ob_get_contents();
	ob_end_clean();
	echo preg_replace("/\n</", "\n\t<", substr($header, 0, -1));
	echo "\n";
}

/*********************
THUMBNAIL SIZE OPTIONS
*********************/

// Thumbnail sizes
add_image_size('thumb-600', 600, 150, true);
add_image_size('thumb-300', 300, 100, true);

function remove_image_size_attributes($html) {
    return preg_replace('/(width|height)="\d*"/', '', $html);
}

// Remove image size attributes from post thumbnails
add_filter('post_thumbnail_html', 'remove_image_size_attributes');

// Remove image size attributes from images added to a WordPress post
add_filter('image_send_to_editor', 'remove_image_size_attributes');

/*
to add more sizes, simply copy a line from above
and change the dimensions & name. As long as you
upload a "featured image" as large as the biggest
set width or height, all the other sizes will be
auto-cropped.

To call a different size, simply change the text
inside the thumbnail function.

For example, to call the 300 x 100 sized image,
we would use the function:
<?php the_post_thumbnail( 'thumb-300' ); ?>
for the 600 x 150 image:
<?php the_post_thumbnail( 'thumb-600' ); ?>

You can change the names and dimensions to whatever
you like. Enjoy!
*/

function custom_image_sizes($sizes) {
    return array_merge($sizes, array(
        'thumb-600' => __('600px by 150px'),
        'thumb-300' => __('300px by 100px'),
    ));
}

add_filter('image_size_names_choose', 'custom_image_sizes');

/*
The function above adds the ability to use the dropdown menu to select
the new images sizes you have just created from within the media manager
when you add media to your content blocks. If you add more image sizes,
duplicate one of the lines in the array and name it according to your
new image size.
*/

/*********************
THEME CUSTOMIZE
*********************/

/*
  A good tutorial for creating your own Sections, Controls and Settings:
  http://code.tutsplus.com/series/a-guide-to-the-wordpress-theme-customizer--wp-33722

  Good articles on modifying the default options:
  http://natko.com/changing-default-wordpress-theme-customization-api-sections/
  http://code.tutsplus.com/tutorials/digging-into-the-theme-customizer-components--wp-27162

  To do:
  - Create a js for the postmessage transport method
  - Create some sanitize functions to sanitize inputs
  - Create some boilerplate Sections, Controls and Settings
*/

function theme_customizer ($wp_customize) {
  // $wp_customize calls go here.

  // Uncomment the below lines to remove the default customize sections
  // $wp_customize->remove_section('title_tagline');
  // $wp_customize->remove_section('colors');
  // $wp_customize->remove_section('background_image');
  // $wp_customize->remove_section('static_front_page');
  // $wp_customize->remove_section('nav');
  // $wp_customize->remove_control('custom_css');

  // Uncomment the below lines to remove the default controls
  // $wp_customize->remove_control('blogdescription');

  // Uncomment the following to change the default section titles
  // $wp_customize->get_section('colors')->title = __('Theme Colors');
  // $wp_customize->get_section('background_image')->title = __('Images');

  // Add Logo support
  $wp_customize->add_setting('logo');
  $wp_customize->add_section('logo_section', array(
      'title'       => __('Logo', 'theme_slug'),
      'priority'    => 30,
      'description' => 'Upload a logo',
  ));
  $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'logo', array(
      'label'    => __('Logo', 'theme_slug'),
      'section'  => 'logo_section',
      'settings' => 'logo',
  )));
}

add_action('customize_register', 'theme_customizer');


/*********************
ACTIVE SIDEBARS
*********************/

// Sidebars & Widgetizes Areas
function theme_register_sidebars () {
	register_sidebar(array(
		'id' => 'sidebar1',
		'name' => 'Sidebar 1',
		'description' => 'The first (primary) sidebar.',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));

	/*
	to add more sidebars or widgetized areas, just copy
	and edit the above sidebar code. In order to call
	your new sidebar just use the following code:

	Just change the name to whatever your new
	sidebar's id is, for example:

	register_sidebar(array(
		'id' => 'sidebar2',
		'name' => __( 'Sidebar 2', 'theme_slug' ),
		'description' => __( 'The second (secondary) sidebar.', 'theme_slug' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));

	To call the sidebar in your template, you can just copy
	the sidebar.php file and rename it to your sidebar's name.
	So using the above example, it would be:
	sidebar-sidebar2.php

	*/
}


/*********************
COMMENT LAYOUT
*********************/

// Comment Layout
function theme_slug_comments($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment; ?>
	<div id="comment-<?php comment_ID(); ?>" <?php comment_class('cf'); ?>>
	<article class="cf">
		<header class="comment-author vcard">
			<?php
			/*
			this is the new responsive optimized comment image. It used the new HTML5 data-attribute to display comment gravatars on larger screens only. What this means is that on larger posts, mobile sites don't have a ton of requests for comment images. This makes load time incredibly fast! If you'd like to change it back, just replace it with the regular wordpress gravatar call:
			echo get_avatar($comment,$size='32',$default='<path_to_url>' );
			*/
			?>
			<?php // custom gravatar call ?>
			<?php $bgauthemail = get_comment_author_email(); ?>
			<img data-gravatar="http://www.gravatar.com/avatar/<?php echo md5( $bgauthemail ); ?>?s=40" class="load-gravatar avatar avatar-48 photo" height="40" width="40" src="<?php echo get_template_directory_uri(); ?>/library/images/nothing.gif" />
			<?php // end custom gravatar call ?>
			<cite class="fn">%1$s</cite> %2$s
			<?php echo get_comment_author_link(); ?>
			<?php echo edit_comment_link(__('(Edit)', 'theme_slug'),'  ',''); ?>
			<time datetime="<?php echo comment_time('Y-m-j'); ?>">
				<a href="<?php echo htmlspecialchars(get_comment_link($comment->comment_ID)) ?>">
					<?php comment_time(__('F jS, Y', 'theme_slug')); ?>
				</a>
			</time>
		</header>
		<?php if ($comment->comment_approved == '0'): ?>
			<div class="alert alert-info">
				<p>
					<?php _e('Your comment is awaiting moderation.', 'theme_slug') ?>
				</p>
			</div>
		<?php endif; ?>

		<section class="comment_content cf">
			<?php comment_text() ?>
		</section>

		<?php comment_reply_link(array_merge($args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
	</article>
<?php
}

/*********************
LOAD FONTS
*********************/

/*
This is a modification of a function found in the
twentythirteen theme where we can declare some
external fonts. If you're using Google Fonts, you
can replace these fonts, change it in your scss files
and be up and running in seconds.
*/
function theme_slug_fonts () {
    wp_enqueue_style('googleFonts', '//fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic');
}

add_action('wp_enqueue_scripts', 'theme_slug_fonts');

?>
