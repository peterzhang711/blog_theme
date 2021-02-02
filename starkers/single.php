<?php
/**
 * The Template for displaying all single posts
 *
 * Please see /external/starkers-utilities.php for info on Starkers_Utilities::get_template_parts()
 *
 * @package 	WordPress
 * @subpackage 	Starkers
 * @since 		Starkers 4.0
 */
?>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header' ) ); ?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

<article>

    <header class="masthead" style="background-image: url('img/post-bg.jpg')">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="post-heading">
                        <h1><?php the_title(); ?></h1></br>
                        <span class="meta">Posted by
                            <a href="#">
                                 <?php if ( get_the_author_meta( 'description' ) ) : ?>
                                     <?php echo get_avatar( get_the_author_meta( 'user_email' ) ); ?>
                                     <h3>About <?php echo get_the_author() ; ?></h3>
                                     <?php the_author_meta( 'description' ); ?>
                                 <?php endif; ?>
                            </a>
                            <?php the_date(); ?>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <article>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
	                <p><?php the_content(); ?></p>
                </div>
            </div>
        </div>
    </article>



</article>
<?php endwhile; ?>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>