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
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

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

<?php endwhile; ?>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>