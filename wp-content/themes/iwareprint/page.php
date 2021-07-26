<?php
/*
	Template Name: Page
*/
?>

<?php get_header(); ?>

<div class="project-baner">
	<img src="<?php echo get_the_post_thumbnail_url(); ?>">
</div>

<?php

    /* Start the Loop */
    while ( have_posts() ) :
        the_post();

        get_template_part( 'template-parts/content/content', 'page' );

        // If comments are open or we have at least one comment, load up the comment template.
        if ( comments_open() || get_comments_number() ) {
            comments_template();
        }

    endwhile;
    // End of the loop.

?>

<section class="content">
	<div class="container">
		<div class="row a-flex">

			<?php

			// check if the repeater field has rows of data
			if( have_rows('filmy') ):

				// loop through the rows of data
				while ( have_rows('filmy') ) : the_row();

					// display a sub field value
					the_sub_field('film');

				endwhile;

			else :

				// no rows found

			endif;

			?>
			
		</div>
	</div>
</section> 

<?php get_footer(); ?>