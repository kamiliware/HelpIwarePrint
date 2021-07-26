<?php
/**
 * Template part for displaying content from Gutenberg
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <section class="content">
	    <div class="container">
	        <div class="row a-flex">
		        <?php the_content(); ?>
	        </div>
	    </div>
	</section> 

</article><!-- #post-<?php the_ID(); ?> -->
