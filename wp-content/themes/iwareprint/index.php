<?php get_header(); ?>

<section id="blog" class="content">

    <div class="breadcrumbs">
        <a href="<?php echo esc_url(home_url('/')); ?>">Home</a>  /  <span><a href="<?php echo esc_url('https://blog.iwareprint.pl'); ?>">Blog</a></span>
    </div>

    <div class="container">

        <h4 class="blue-header">Blog</h4>
        <h1>Informacje ważniejsze niż myślisz</h1>
        <span class="line"></span>

        <div class="row">
			
			<?php if (have_posts()) :
			
			
			$args = array(
                'post_type'	   => 'post',
                'posts_per_page' => 1,
            );

            $my_query = new WP_Query($args);
            
            while ($my_query->have_posts()):
            $my_query->the_post();
            $do_not_duplicate = $post->ID;
            
            ?>
			
			<div class="post-big">
                <?php the_post_thumbnail(); ?>
                <div class="post-big-content">
                    <h4><?php the_title(); ?></h4>
                    <p><?php the_excerpt(); ?></p>
                    <a href="<?php the_permalink(); ?>">Zobacz</a>
                </div>
            </div>
 
			<?php endwhile; ?>
			
			<?php

			$args = array(
                'post_type'	   => 'post',
                'posts_per_page' => 9999999,
				'offset' => 1,
            );

            $my_query = new WP_Query($args);
            
            while ($my_query->have_posts()):
            $my_query->the_post();
            $do_not_duplicate = $post->ID;
            
            ?>
			
			<div class="col-md-4 post">
                <div class="thumbnail">
                    <?php the_post_thumbnail(); ?>
                    <a href="<?php the_permalink(); ?>" class="box-arrow-link"><img src="<?php echo get_template_directory_uri(); ?>/img/arrow.png" alt="link"></a>
                </div>
                <h5><?php the_title(); ?></h5>
            </div>
 
			<?php endwhile; ?>
			
			<?php else: ?>

			<h4>Nie ma żadnych postów.</h4>

			<?php endif; ?> 

        </div>

    </div>

</section>

<!-- 			<?php while (have_posts()) : the_post(); ?>

            <div class="col-md-4 post">
                <div class="thumbnail">
                    <?php the_post_thumbnail(); ?>
                    <a href="<?php the_permalink(); ?>" class="box-arrow-link"><img src="<?php echo get_template_directory_uri(); ?>/img/arrow.png" alt="link"></a>
                </div>
                <h5><?php the_title(); ?></h5>
            </div>
			
			<?php endwhile; ?>  -->

<?php get_footer(); ?>