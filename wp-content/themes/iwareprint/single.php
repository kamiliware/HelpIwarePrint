<?php get_header(); ?>

	<?php the_post(); ?>
	
<section id="blog" class="content">

    <div class="breadcrumbs">
        <a href="<?php echo esc_url(home_url('/')); ?>">Home</a>  /  <a href="<?php echo esc_url(home_url('/blog')); ?>">Blog</a>  /  <span><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></span>
    </div>

    <div class="container">

        <h4 class="blue-header">Blog</h4>
        <h1><?php the_title(); ?></h1>
        <span class="line"></span>
		<h6>Opublikowano <?php echo get_the_date('d F Y' ); ?></h6>

        <div class="row blog-single-content">

			<?php the_content(); ?>
			
		</div>
		
		<?php comments_template(); ?>
		
		<div class="row related-posts">
			
			<!-- Polecane artykuły -->
			<?php $orig_post = $post;
			global $post;
			$categories = get_the_category($post->ID);
			if ($categories) {
			$category_ids = array();
			foreach($categories as $individual_category) $category_ids[] = $individual_category->term_id;

			$args=array(
			'category__in' => $category_ids,
			'post__not_in' => array($post->ID),
			'posts_per_page'=> 6, // Number of related posts that will be shown.
			'ignore_sticky_posts'=>1
			);

			$my_query = new wp_query( $args );
			if( $my_query->have_posts() ) {
			echo '<h2 class="related-posts-header">Polecane artykuły</h2>';
			while( $my_query->have_posts() ) {
			$my_query->the_post();?>

			<div class="col-md-4 post">
					<div class="thumbnail">
						<?php the_post_thumbnail(); ?>
						<a href="<?php the_permalink(); ?>" class="box-arrow-link"><img src="<?php echo get_template_directory_uri(); ?>/img/arrow.png" alt="link"></a>
					</div>
					<h5><?php the_title(); ?></h5>
		   </div>

			<?
			}
			}
			}
			$post = $orig_post;
			wp_reset_query(); ?>
			
		</div>
		
    </div>

</section>

<?php get_footer(); ?>