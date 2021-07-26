<?php /* Template Name: Tutoriale */ ?>

<?php get_header(); ?>

<section id="tutorials" class="content">

    <div class="breadcrumbs">
        <a href="<?php echo esc_url(home_url('/')); ?>">Home</a>  /  <span><a href="<?php echo esc_url(home_url('/materialy-wideo')); ?>">Materiały wideo</a></span>
    </div>

    <div class="container">

        <h4>Materiały wideo</h4>
        <h1>Obejrzyj nasze wskazówki</h1>
        <span class="line"></span>
 <?php
		$counter = 0;

                $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                $args = array(
                    "post_type" => "tutoriale",
                    "posts_per_page" => 7,
                    "paged" => $paged
                );

                $query = new WP_Query($args);

                if($query->have_posts()) :

                ?>
        <div class="row tutorial-container">
             
			
                 <?php   while($query->have_posts()) : $query->the_post(); 
			$counter++;
			if ($counter % 7 == 0) { ?>
			<div class="col-md-12 tutorial">
                <div class="thumbnail-big">
                    <?php the_field('film'); ?>
                </div>
                <h5><?php the_title();?></h5>
            </div>
			<?php
			}else{
			?>
            
            <div class="col-md-4 tutorial">
                <div class="thumbnail thumbnail">
                    <?php the_field('film'); ?>
                </div>
                <h5><?php the_title();?></h5>
            </div>
            
			
            <?php 
			}
			endwhile; 
			next_posts_link();
			?>
			
	

        </div>
		<div class="button">
                    <a href="#" id="load-more-posts"><img  src="<?php echo esc_url(home_url('/')); ?>wp-content/uploads/2020/10/load.png" /></a>
                </div>
		<?php if(function_exists('wp_pagenavi')) { wp_pagenavi(); } ?>
<?php endif; ?>
    </div>

</section>

<?php get_footer(); ?>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>