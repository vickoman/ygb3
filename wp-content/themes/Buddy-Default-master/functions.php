<?php
/**
 * BP-Default theme functions and definitions
 *
 * Sets up the theme and provides some helper functions. Some helper functions
 * are used in the theme as custom template tags. Others are attached to action and
 * filter hooks in WordPress and BuddyPress to change core functionality.
 *
 * The first function, bp_dtheme_setup(), sets up the theme by registering support
 * for various features in WordPress, such as post thumbnails and navigation menus, and
 * for BuddyPress, action buttons and javascript localisation.
 *
 * When using a child theme (see http://codex.wordpress.org/Theme_Development, http://codex.wordpress.org/Child_Themes
 * and http://codex.buddypress.org/theme-development/building-a-buddypress-child-theme/), you can override
 * certain functions (those wrapped in a function_exists() call) by defining them first in your
 * child theme's functions.php file. The child theme's functions.php file is included before the
 * parent theme's file, so the child theme functions would be used.
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are instead attached
 * to a filter or action hook. The hook can be removed by using remove_action() or
 * remove_filter() and you can attach your own function to the hook.
 *
 * For more information on hooks, actions, and filters, see http://codex.wordpress.org/Plugin_API.
 *
 * @package BuddyPress
 * @subpackage BP-Default
 * @since BuddyPress (1.2)
 */

//DEsactivar Admin BAR
add_filter( 'show_admin_bar', '__return_false' );
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Set the content width based on the theme's design and stylesheet.
 *
 * Used to set the width of images and content. Should be equal to the width the theme
 * is designed for, generally via the style.css stylesheet.
 */
if ( ! isset( $content_width ) )
	$content_width = 591;

if ( ! function_exists( 'bp_dtheme_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress and BuddyPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 *
 * To override bp_dtheme_setup() in a child theme, add your own bp_dtheme_setup to your child theme's
 * functions.php file.
 *
 * @global BuddyPress $bp The one true BuddyPress instance
 * @since BuddyPress (1.5)
 */
function bp_dtheme_setup() {

	// This theme styles the visual editor with editor-style.css to match the theme style.
	add_editor_style();

	// This theme uses post thumbnails
	add_theme_support( 'post-thumbnails' );

	// Add default posts and comments RSS feed links to head
	add_theme_support( 'automatic-feed-links' );

	// Add responsive layout support to bp-default without forcing child
	// themes to inherit it if they don't want to
	add_theme_support( 'bp-default-responsive' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Navigation', 'buddypress' ),
	) );

	// This theme allows users to set a custom background
	$custom_background_args = array(
		'wp-head-callback' => 'bp_dtheme_custom_background_style'
	);
	add_theme_support( 'custom-background', $custom_background_args );

	// Add custom header support if allowed
	if ( !defined( 'BP_DTHEME_DISABLE_CUSTOM_HEADER' ) ) {
		define( 'HEADER_TEXTCOLOR', 'FFFFFF' );

		// The height and width of your custom header. You can hook into the theme's own filters to change these values.
		// Add a filter to bp_dtheme_header_image_width and bp_dtheme_header_image_height to change these values.
		define( 'HEADER_IMAGE_WIDTH',  apply_filters( 'bp_dtheme_header_image_width',  1250 ) );
		define( 'HEADER_IMAGE_HEIGHT', apply_filters( 'bp_dtheme_header_image_height', 133  ) );

		// We'll be using post thumbnails for custom header images on posts and pages. We want them to be 1250 pixels wide by 133 pixels tall.
		// Larger images will be auto-cropped to fit, smaller ones will be ignored.
		set_post_thumbnail_size( HEADER_IMAGE_WIDTH, HEADER_IMAGE_HEIGHT, true );

		// Add a way for the custom header to be styled in the admin panel that controls custom headers.
		$custom_header_args = array(
			'wp-head-callback' => 'bp_dtheme_header_style',
			'admin-head-callback' => 'bp_dtheme_admin_header_style'
		);
		add_theme_support( 'custom-header', $custom_header_args );
	}

}
add_action( 'after_setup_theme', 'bp_dtheme_setup' );
endif;

if ( !function_exists( 'bp_dtheme_enqueue_scripts' ) ) :
/**
 * Enqueue theme javascript safely
 *
 * @see http://codex.wordpress.org/Function_Reference/wp_enqueue_script
 * @since BuddyPress (1.5)
 */
function bp_dtheme_enqueue_scripts() {

	// Maybe enqueue comment reply JS
	if ( is_singular() && bp_is_blog_page() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );
}
add_action( 'wp_enqueue_scripts', 'bp_dtheme_enqueue_scripts' );
endif;

if ( !function_exists( 'bp_dtheme_enqueue_styles' ) ) :
/**
 * Enqueue theme CSS safely
 *
 * For maximum flexibility, BuddyPress Default's stylesheet is enqueued, using wp_enqueue_style().
 * If you're building a child theme of bp-default, your stylesheet will also be enqueued,
 * automatically, as dependent on bp-default's CSS. For this reason, bp-default child themes are
 * not recommended to include bp-default's stylesheet using @import.
 *
 * If you would prefer to use @import, or would like to change the way in which stylesheets are
 * enqueued, you can override bp_dtheme_enqueue_styles() in your theme's functions.php file.
 *
 * @see http://codex.wordpress.org/Function_Reference/wp_enqueue_style
 * @see http://codex.buddypress.org/releases/1-5-developer-and-designer-information/
 * @since BuddyPress (1.5)
 */
function bp_dtheme_enqueue_styles() {

	// Register our main stylesheet
	wp_register_style( 'bp-default-main', get_template_directory_uri() . '/css/default.css', array(), bp_get_version() );

	// If the current theme is a child of bp-default, enqueue its stylesheet
	if ( is_child_theme() && 'bp-default' == get_template() ) {
		wp_enqueue_style( get_stylesheet(), get_stylesheet_uri(), array( 'bp-default-main' ), bp_get_version() );
	}

	// Enqueue the main stylesheet
	wp_enqueue_style( 'bp-default-main' );

	// Default CSS RTL
	if ( is_rtl() )
		wp_enqueue_style( 'bp-default-main-rtl',  get_template_directory_uri() . '/css/default-rtl.css', array( 'bp-default-main' ), bp_get_version() );

	// Responsive layout
	if ( current_theme_supports( 'bp-default-responsive' ) ) {
		wp_enqueue_style( 'bp-default-responsive', get_template_directory_uri() . '/css/responsive.css', array( 'bp-default-main' ), bp_get_version() );

		if ( is_rtl() ) {
			wp_enqueue_style( 'bp-default-responsive-rtl', get_template_directory_uri() . '/css/responsive-rtl.css', array( 'bp-default-responsive' ), bp_get_version() );
		}
	}
}
add_action( 'wp_enqueue_scripts', 'bp_dtheme_enqueue_styles' );
endif;

if ( !function_exists( 'bp_dtheme_admin_header_style' ) ) :
/**
 * Styles the header image displayed on the Appearance > Header admin panel.
 *
 * Referenced via add_custom_image_header() in bp_dtheme_setup().
 *
 * @since BuddyPress (1.2)
 */
function bp_dtheme_admin_header_style() {
?>
<?php
}
endif;

if ( !function_exists( 'bp_dtheme_custom_background_style' ) ) :
/**
 * The style for the custom background image or colour.
 *
 * Referenced via add_custom_background() in bp_dtheme_setup().
 *
 * @see _custom_background_cb()
 * @since BuddyPress (1.5)
 */
function bp_dtheme_custom_background_style() {
	$background = get_background_image();
	$color = get_background_color();
	if ( ! $background && ! $color )
		return;

	$style = $color ? "background-color: #$color;" : '';

	if ( $style && !$background ) {
		$style .= ' background-image: none;';

	} elseif ( $background ) {
		$image = " background-image: url('$background');";

		$repeat = get_theme_mod( 'background_repeat', 'repeat' );
		if ( ! in_array( $repeat, array( 'no-repeat', 'repeat-x', 'repeat-y', 'repeat' ) ) )
			$repeat = 'repeat';
		$repeat = " background-repeat: $repeat;";

		$position = get_theme_mod( 'background_position_x', 'left' );
		if ( ! in_array( $position, array( 'center', 'right', 'left' ) ) )
			$position = 'left';
		$position = " background-position: top $position;";

		$attachment = get_theme_mod( 'background_attachment', 'scroll' );
		if ( ! in_array( $attachment, array( 'fixed', 'scroll' ) ) )
			$attachment = 'scroll';
		$attachment = " background-attachment: $attachment;";

		$style .= $image . $repeat . $position . $attachment;
	}
?>
	<style type="text/css">
		body { <?php echo trim( $style ); ?> }
	</style>
<?php
}
endif;

if ( !function_exists( 'bp_dtheme_header_style' ) ) :
/**
 * The styles for the post thumbnails / custom page headers.
 *
 * Referenced via add_custom_image_header() in bp_dtheme_setup().
 *
 * @global WP_Query $post The current WP_Query object for the current post or page
 * @since BuddyPress (1.2)
 */
function bp_dtheme_header_style() {
	global $post;

	$header_image = '';

	if ( is_singular() && current_theme_supports( 'post-thumbnails' ) && has_post_thumbnail( $post->ID ) ) {
		$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'post-thumbnail' );

		// $src, $width, $height
		if ( !empty( $image ) && $image[1] >= HEADER_IMAGE_WIDTH )
			$header_image = $image[0];
		else
			$header_image = get_header_image();

	} else {
		$header_image = get_header_image();
	}
?>

	<style type="text/css">
		<?php if ( !empty( $header_image ) ) : ?>
			#header { background-image: url(<?php echo $header_image ?>); }
		<?php endif; ?>

		<?php if ( 'blank' == get_header_textcolor() ) { ?>
		#header h1, #header #desc { display: none; }
		<?php } else { ?>
		#header h1 a, #desc { color:#<?php header_textcolor(); ?>; }
		<?php } ?>
	</style>

<?php
}
endif;

if ( !function_exists( 'bp_dtheme_widgets_init' ) ) :
/**
 * Register widgetised areas, including one sidebar and four widget-ready columns in the footer.
 *
 * To override bp_dtheme_widgets_init() in a child theme, remove the action hook and add your own
 * function tied to the init hook.
 *
 * @since BuddyPress (1.5)
 */
function bp_dtheme_widgets_init() {

	// Area 1, located in the sidebar. Empty by default.
	register_sidebar( array(
		'name'          => 'Sidebar',
		'id'            => 'sidebar-1',
		'description'   => __( 'The sidebar widget area', 'buddypress' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widgettitle">',
		'after_title'   => '</h3>'
	) );

	// Area 2, located in the footer. Empty by default.
	register_sidebar( array(
		'name' => __( 'First Footer Widget Area', 'buddypress' ),
		'id' => 'first-footer-widget-area',
		'description' => __( 'The first footer widget area', 'buddypress' ),
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widgettitle">',
		'after_title' => '</h3>',
	) );

	// Area 3, located in the footer. Empty by default.
	register_sidebar( array(
		'name' => __( 'Second Footer Widget Area', 'buddypress' ),
		'id' => 'second-footer-widget-area',
		'description' => __( 'The second footer widget area', 'buddypress' ),
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widgettitle">',
		'after_title' => '</h3>',
	) );

	// Area 4, located in the footer. Empty by default.
	register_sidebar( array(
		'name' => __( 'Third Footer Widget Area', 'buddypress' ),
		'id' => 'third-footer-widget-area',
		'description' => __( 'The third footer widget area', 'buddypress' ),
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widgettitle">',
		'after_title' => '</h3>',
	) );

	// Area 5, located in the footer. Empty by default.
	register_sidebar( array(
		'name' => __( 'Fourth Footer Widget Area', 'buddypress' ),
		'id' => 'fourth-footer-widget-area',
		'description' => __( 'The fourth footer widget area', 'buddypress' ),
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widgettitle">',
		'after_title' => '</h3>',
	) );
}
add_action( 'widgets_init', 'bp_dtheme_widgets_init' );
endif;

if ( !function_exists( 'bp_dtheme_blog_comments' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * To override this walker in a child theme without modifying the comments template
 * simply create your own bp_dtheme_blog_comments(), and that function will be used instead.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 *
 * @param mixed $comment Comment record from database
 * @param array $args Arguments from wp_list_comments() call
 * @param int $depth Comment nesting level
 * @see wp_list_comments()
 * @since BuddyPress (1.2)
 */
function bp_dtheme_blog_comments( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;

	if ( 'pingback' == $comment->comment_type )
		return false;

	if ( 1 == $depth )
		$avatar_size = 50;
	else
		$avatar_size = 25;
	?>

	<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
		<div class="comment-avatar-box">
			<div class="avb">
				<a href="<?php echo get_comment_author_url(); ?>" rel="nofollow">
					<?php if ( $comment->user_id ) : ?>
						<?php echo bp_core_fetch_avatar( array( 'item_id' => $comment->user_id, 'width' => $avatar_size, 'height' => $avatar_size, 'email' => $comment->comment_author_email ) ); ?>
					<?php else : ?>
						<?php echo get_avatar( $comment, $avatar_size ); ?>
					<?php endif; ?>
				</a>
			</div>
		</div>

		<div class="comment-content">
			<div class="comment-meta">
				<p>
					<?php
						/* translators: 1: comment author url, 2: comment author name, 3: comment permalink, 4: comment date/timestamp*/
						printf( __( '<a href="%1$s" rel="nofollow">%2$s</a> said on <a href="%3$s"><span class="time-since">%4$s</span></a>', 'buddypress' ), get_comment_author_url(), get_comment_author(), get_comment_link(), get_comment_date() );
					?>
				</p>
			</div>

			<div class="comment-entry">
				<?php if ( $comment->comment_approved == '0' ) : ?>
				 	<em class="moderate"><?php _e( 'Your comment is awaiting moderation.', 'buddypress' ); ?></em>
				<?php endif; ?>

				<?php comment_text(); ?>
			</div>

			<div class="comment-options">
					<?php if ( comments_open() ) : ?>
						<?php comment_reply_link( array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ); ?>
					<?php endif; ?>

					<?php if ( current_user_can( 'edit_comment', $comment->comment_ID ) ) : ?>
						<?php printf( '<a class="button comment-edit-link bp-secondary-action" href="%1$s" title="%2$s">%3$s</a> ', get_edit_comment_link( $comment->comment_ID ), esc_attr__( 'Edit comment', 'buddypress' ), __( 'Edit', 'buddypress' ) ); ?>
					<?php endif; ?>

			</div>

		</div>

<?php
}
endif;

if ( !function_exists( 'bp_dtheme_page_on_front' ) ) :
/**
 * Return the ID of a page set as the home page.
 *
 * @return int|bool ID of page set as the home page
 * @since BuddyPress (1.2)
 */
function bp_dtheme_page_on_front() {
	if ( 'page' != get_option( 'show_on_front' ) )
		return false;

	return apply_filters( 'bp_dtheme_page_on_front', get_option( 'page_on_front' ) );
}
endif;


if ( !function_exists( 'bp_dtheme_show_notice' ) ) :
/**
 * Show a notice when the theme is activated - workaround by Ozh (http://old.nabble.com/Activation-hook-exist-for-themes--td25211004.html)
 *
 * @since BuddyPress (1.2)
 */
function bp_dtheme_show_notice() {
	global $pagenow;

	// Bail if bp-default theme was not just activated
	if ( empty( $_GET['activated'] ) || ( 'themes.php' != $pagenow ) || !is_admin() )
		return;

	?>

	<div id="message" class="updated fade">
		<p><?php printf( __( 'Theme activated! This theme contains <a href="%s">custom header image</a> support and <a href="%s">sidebar widgets</a>.', 'buddypress' ), admin_url( 'themes.php?page=custom-header' ), admin_url( 'widgets.php' ) ); ?></p>
	</div>

	<style type="text/css">#message2, #message0 { display: none; }</style>

	<?php
}
add_action( 'admin_notices', 'bp_dtheme_show_notice' );
endif;

if ( !function_exists( 'bp_dtheme_main_nav' ) ) :
/**
 * wp_nav_menu() callback from the main navigation in header.php
 *
 * Used when the custom menus haven't been configured.
 *
 * @param array Menu arguments from wp_nav_menu()
 * @see wp_nav_menu()
 * @since BuddyPress (1.5)
 */
function bp_dtheme_main_nav( $args ) {
	$pages_args = array(
		'depth'      => 0,
		'echo'       => false,
		'exclude'    => '',
		'title_li'   => ''
	);
	$menu = wp_page_menu( $pages_args );
	$menu = str_replace( array( '<div class="menu"><ul>', '</ul></div>' ), array( '<ul id="nav">', '</ul><!-- #nav -->' ), $menu );
	echo $menu;

	do_action( 'bp_nav_items' );
}
endif;

if ( !function_exists( 'bp_dtheme_page_menu_args' ) ) :
/**
 * Get our wp_nav_menu() fallback, bp_dtheme_main_nav(), to show a home link.
 *
 * @param array $args Default values for wp_page_menu()
 * @see wp_page_menu()
 * @since BuddyPress (1.5)
 */
function bp_dtheme_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'bp_dtheme_page_menu_args' );
endif;

if ( !function_exists( 'bp_dtheme_comment_form' ) ) :
/**
 * Applies BuddyPress customisations to the post comment form.
 *
 * @param array $default_labels The default options for strings, fields etc in the form
 * @see comment_form()
 * @since BuddyPress (1.5)
 */
function bp_dtheme_comment_form( $default_labels ) {

	$commenter = wp_get_current_commenter();
	$req       = get_option( 'require_name_email' );
	$aria_req  = ( $req ? " aria-required='true'" : '' );
	$fields    =  array(
		'author' => '<p class="comment-form-author">' . '<label for="author">' . __( 'Name', 'buddypress' ) . ( $req ? '<span class="required"> *</span>' : '' ) . '</label> ' .
		            '<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' /></p>',
		'email'  => '<p class="comment-form-email"><label for="email">' . __( 'Email', 'buddypress' ) . ( $req ? '<span class="required"> *</span>' : '' ) . '</label> ' .
		            '<input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' /></p>',
		'url'    => '<p class="comment-form-url"><label for="url">' . __( 'Website', 'buddypress' ) . '</label>' .
		            '<input id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /></p>',
	);

	$new_labels = array(
		'comment_field'  => '<p class="form-textarea"><textarea name="comment" id="comment" cols="60" rows="10" aria-required="true"></textarea></p>',
		'fields'         => apply_filters( 'comment_form_default_fields', $fields ),
		'logged_in_as'   => '',
		'must_log_in'    => '<p class="alert">' . sprintf( __( 'You must be <a href="%1$s">logged in</a> to post a comment.', 'buddypress' ), wp_login_url( get_permalink() ) )	. '</p>',
		'title_reply'    => __( 'Leave a reply', 'buddypress' )
	);

	return apply_filters( 'bp_dtheme_comment_form', array_merge( $default_labels, $new_labels ) );
}
add_filter( 'comment_form_defaults', 'bp_dtheme_comment_form', 10 );
endif;

if ( !function_exists( 'bp_dtheme_before_comment_form' ) ) :
/**
 * Adds the user's avatar before the comment form box.
 *
 * The 'comment_form_top' action is used to insert our HTML within <div id="reply">
 * so that the nested comments comment-reply javascript moves the entirety of the comment reply area.
 *
 * @see comment_form()
 * @since BuddyPress (1.5)
 */
function bp_dtheme_before_comment_form() {
?>
	<div class="comment-avatar-box">
		<div class="avb">
			<?php if ( bp_loggedin_user_id() ) : ?>
				<a href="<?php echo bp_loggedin_user_domain(); ?>">
					<?php echo get_avatar( bp_loggedin_user_id(), 50 ); ?>
				</a>
			<?php else : ?>
				<?php echo get_avatar( 0, 50 ); ?>
			<?php endif; ?>
		</div>
	</div>

	<div class="comment-content standard-form">
<?php
}
add_action( 'comment_form_top', 'bp_dtheme_before_comment_form' );
endif;

if ( !function_exists( 'bp_dtheme_after_comment_form' ) ) :
/**
 * Closes tags opened in bp_dtheme_before_comment_form().
 *
 * @see bp_dtheme_before_comment_form()
 * @see comment_form()
 * @since BuddyPress (1.5)
 */
function bp_dtheme_after_comment_form() {
?>

	</div><!-- .comment-content standard-form -->

<?php
}
add_action( 'comment_form', 'bp_dtheme_after_comment_form' );
endif;

if ( !function_exists( 'bp_dtheme_sidebar_login_redirect_to' ) ) :
/**
 * Adds a hidden "redirect_to" input field to the sidebar login form.
 *
 * @since BuddyPress (1.5)
 */
function bp_dtheme_sidebar_login_redirect_to() {
	$redirect_to = !empty( $_REQUEST['redirect_to'] ) ? $_REQUEST['redirect_to'] : '';
	$redirect_to = apply_filters( 'bp_no_access_redirect', $redirect_to ); ?>

	<input type="hidden" name="redirect_to" value="<?php echo esc_url( $redirect_to ); ?>" />

<?php
}
add_action( 'bp_sidebar_login_form', 'bp_dtheme_sidebar_login_redirect_to' );
endif;

if ( !function_exists( 'bp_dtheme_content_nav' ) ) :
/**
 * Display navigation to next/previous pages when applicable
 *
 * @global WP_Query $wp_query
 * @param string $nav_id DOM ID for this navigation
 * @since BuddyPress (1.5)
 */
function bp_dtheme_content_nav( $nav_id ) {
	global $wp_query;

	if ( !empty( $wp_query->max_num_pages ) && $wp_query->max_num_pages > 1 ) : ?>

		<div id="<?php echo $nav_id; ?>" class="navigation">
			<div class="alignleft"><?php next_posts_link( __( '&larr; Previous Entries', 'buddypress' ) ); ?></div>
			<div class="alignright"><?php previous_posts_link( __( 'Next Entries &rarr;', 'buddypress' ) ); ?></div>
		</div><!-- #<?php echo $nav_id; ?> -->

	<?php endif;
}
endif;

/**
 * Adds the no-js class to the body tag.
 *
 * This function ensures that the <body> element will have the 'no-js' class by default. If you're
 * using JavaScript for some visual functionality in your theme, and you want to provide noscript
 * support, apply those styles to body.no-js.
 *
 * The no-js class is removed by the JavaScript created in bp_dtheme_remove_nojs_body_class().
 *
 * @package BuddyPress
 * @since BuddyPress (1.5).1
 * @see bp_dtheme_remove_nojs_body_class()
 */
function bp_dtheme_add_nojs_body_class( $classes ) {
	$classes[] = 'no-js';
	return array_unique( $classes );
}
add_filter( 'bp_get_the_body_class', 'bp_dtheme_add_nojs_body_class' );

/**
 * Dynamically removes the no-js class from the <body> element.
 *
 * By default, the no-js class is added to the body (see bp_dtheme_add_no_js_body_class()). The
 * JavaScript in this function is loaded into the <body> element immediately after the <body> tag
 * (note that it's hooked to bp_before_header), and uses JavaScript to switch the 'no-js' body class
 * to 'js'. If your theme has styles that should only apply for JavaScript-enabled users, apply them
 * to body.js.
 *
 * This technique is borrowed from WordPress, wp-admin/admin-header.php.
 *
 * @package BuddyPress
 * @since BuddyPress (1.5).1
 * @see bp_dtheme_add_nojs_body_class()
 */
function bp_dtheme_remove_nojs_body_class() {
?><script type="text/javascript">//<![CDATA[
(function(){var c=document.body.className;c=c.replace(/no-js/,'js');document.body.className=c;})();
//]]></script>
<?php
}
add_action( 'bp_before_header', 'bp_dtheme_remove_nojs_body_class' );

add_action( 'authenticate', 'pu_blank_login');

function pu_blank_login( $user ){
  	// check what page the login attempt is coming from
  	$referrer = $_SERVER['HTTP_REFERER'];

  	$error = false;

  	if($_POST['log'] == '' || $_POST['pwd'] == '')
  	{
  		$error = true;
  	}

  	// check that were not on the default login page
  	if ( !empty($referrer) && !strstr($referrer,'wp-login') && !strstr($referrer,'wp-admin') && $error ) {

  		// make sure we don't already have a failed login attempt
    	if ( !strstr($referrer, '?login=failed') ) {
    		// Redirect to the login page and append a querystring of login failed
        	wp_redirect( $referrer . '?login=failed' );
      	} else {
        	wp_redirect( $referrer );
      	}

    exit;

  	}
}

add_action( 'wp_login_failed', 'pu_login_failed' ); // hook failed login

function pu_login_failed( $user ) {
  	// check what page the login attempt is coming from
  	$referrer = $_SERVER['HTTP_REFERER'];

  	// check that were not on the default login page
	if ( !empty($referrer) && !strstr($referrer,'wp-login') && !strstr($referrer,'wp-admin') && $user!=null ) {
		// make sure we don't already have a failed login attempt
		if ( !strstr($referrer, '?login=failed' )) {
			// Redirect to the login page and append a querystring of login failed
	    	wp_redirect( $referrer . '?login=failed');
	    } else {
	      	wp_redirect( $referrer );
	    }

	    exit;
	}
}

?>
