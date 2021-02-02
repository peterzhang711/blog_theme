<?php
	/**
	 * Starkers functions and definitions
	 *
	 * For more information on hooks, actions, and filters, see http://codex.wordpress.org/Plugin_API.
	 *
 	 * @package 	WordPress
 	 * @subpackage 	Starkers
 	 * @since 		Starkers 4.0
	 */

	/* ========================================================================================================================
	
	Required external files
	
	======================================================================================================================== */

	require_once( 'external/starkers-utilities.php' );

	/* ========================================================================================================================
	
	Theme specific settings

	Uncomment register_nav_menus to enable a single menu with the title of "Primary Navigation" in your theme
	
	======================================================================================================================== */

	add_theme_support('post-thumbnails');
    add_theme_support('custom-logo');
//    add_theme_support( 'custom-background' );
	
	// register_nav_menus(array('primary' => 'Primary Navigation'));

	/* ========================================================================================================================
	
	Actions and Filters
	
	======================================================================================================================== */

	add_action( 'wp_enqueue_scripts', 'starkers_script_enqueuer' );

	add_filter( 'body_class', array( 'Starkers_Utilities', 'add_slug_to_body_class' ) );

	/* ========================================================================================================================
	
	Custom Post Types - include custom post types and taxonimies here e.g.

	e.g. require_once( 'custom-post-types/your-custom-post-type.php' );
	
	======================================================================================================================== */



	/* ========================================================================================================================
	
	Scripts
	
	======================================================================================================================== */

    /**
     * Add menus via add_action()
     *
     * @return void
     * @author Peter Zhang
     */
    function starkers_menus() {

        $locations = array(
          'primary'=> "top menus",
          'footer'=> "bottom menus"
        );
        register_nav_menus($locations);
    }
    add_action('init','starkers_menus');

	/**
	 * Add scripts via wp_head()
	 *
	 * @return void
	 * @author Keir Whitaker
	 */

	function starkers_script_enqueuer() {

        wp_register_script( 'jquery', 'https://code.jquery.com/jquery-3.4.1.slim.min.js', array( 'jquery' ) );
        wp_enqueue_script( 'jquery' );
        wp_register_script( 'bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js', array() );
        wp_enqueue_script( 'bootstrap' );
        wp_register_script( 'custom', get_template_directory_uri().'/js/site.js', array() ,'1.0',true);
        wp_enqueue_script( 'custom' );


        wp_enqueue_style('wt-custom', get_template_directory_uri(). "/style.css", array('wt-bootstrap'));
        wp_enqueue_style('wt-bootstrap', "https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css");
        wp_enqueue_style('wt-fontawesome', "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css");
        wp_enqueue_style('wt-fontawesome-01', "https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic");
        wp_enqueue_style('wt-fontawesome-02', "https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800");
	}	

	/* ========================================================================================================================
	
	Comments
	
	======================================================================================================================== */

	/**
	 * Custom callback for outputting comments 
	 *
	 * @return void
	 * @author Keir Whitaker
	 */
	function starkers_comment( $comment, $args, $depth ) {
		$GLOBALS['comment'] = $comment; 
		?>
		<?php if ( $comment->comment_approved == '1' ): ?>	
		<li>
			<article id="comment-<?php comment_ID() ?>">
				<?php echo get_avatar( $comment ); ?>
				<h4><?php comment_author_link() ?></h4>
				<time><a href="#comment-<?php comment_ID() ?>" pubdate><?php comment_date() ?> at <?php comment_time() ?></a></time>
				<?php comment_text() ?>
			</article>
		<?php endif;
	}