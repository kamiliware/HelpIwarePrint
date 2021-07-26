<?php get_header(); ?>

<section id="blog" class="content">

    <div class="breadcrumbs">
        Home  /  <span>Wyszukiwarka</span>
    </div>

    <div class="container">

        <h4 class="blue-header">Wyszukiwarka</h4>
        <h1>Szukasz: <?php the_search_query(); ?></h1>
        <span class="line"></span>

        <div class="row">
			
			<?php if (have_posts()) : ?>    
			<?php while (have_posts()) : the_post(); ?>

            
			
			<div class="post-big">
                <?php the_post_thumbnail(); ?>
                <div class="post-big-content">
                    <h4><?php the_title(); ?></h4>
                    <p><?php the_excerpt(); ?></p>
                    <a href="<?php the_permalink(); ?>">Zobacz</a>
                </div>
            </div>
			
			<?php endwhile; ?>  
			<?php else: ?>

			<h4>Nie ma żadnych postów.</h4>

			<?php endif; ?> 

        </div>

    </div>

</section>

<?php get_footer(); ?>