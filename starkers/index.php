<?php
/**
 * The template for displaying Archive pages.
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * Please see /external/starkers-utilities.php for info on Starkers_Utilities::get_template_parts()
 *
 * @package 	WordPress
 * @subpackage 	Starkers
 * @since 		Starkers 4.0
 */
?>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>

<?php if ( have_posts() ): ?>
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
    <ol>
        <?php while ( have_posts() ) : the_post(); ?>
            <div class="post-preview">
                <a href="<?php esc_url( the_permalink() ); ?>">
                    <h2 class="post-title">
                        <?php the_title(); ?>
                    </h2>
                    <h3 class="post-subtitle">
                        <?php the_content(); ?>
                    </h3>
                </a>
                <p class="post-meta">Posted by
                    <a href="#"><?php the_date(); ?></a>
                </p>
            </div>
        <?php endwhile; ?>
    </ol>
            <div class="clearfix">
                <a class="btn btn-primary float-right" href="#">Older Posts &rarr;</a>
            </div>
        </div>
    </div>
</div>

<?php else: ?>
    <h2>No posts to display</h2>
<?php endif; ?>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>
