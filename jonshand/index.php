<?php
/**
 * The main template file
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file 
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
<?php while ( have_posts() ) : the_post(); ?>
    <a href="<?php esc_url( the_permalink() ); ?>" title="Permalink to <?php the_title(); ?>" rel="bookmark">
		<figure class="polaroid">
			<?php the_content(); ?>
            <figcaption class="polaroid__caption">
                <h1 class="polaroid__title">@<?php the_title(); ?></h1>
                <time datetime="<?php the_time( 'Y-m-d' ); ?>" pubdate><?php the_time( 'm-d-y' ); ?></time>,
                <?php 
                    $category = get_the_category(); 
                    echo '#', $category[0]->cat_name; 
                ?>
            </figcaption>
		</figure>
    </a>
<?php endwhile; ?>
<?php else: ?>
<h2>No posts to display</h2>
<?php endif; ?>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer') ); ?>