<?php /* Template Name: Tutoriale */ ?>

<?php get_header(); ?>
<?php
global $post;
if ( function_exists( 'pll_get_post_language' ) ):
    $lang = pll_get_post_language($post->ID);
endif; ?>
<section id="tutorials" class="content">

    <div class="breadcrumbs">
        <a href="<?php echo esc_url(home_url('/')); ?>">Home</a>  /  <span><a href="<?php echo esc_url(home_url(pl_t('/materialy-wideo', $lang))); ?>"><?= pl_t('Materiały wideo', $lang) ?></a></span>
    </div>

    <div class="container">

        <h4><?= pl_t('Materiały wideo', $lang) ?></h4>
        <h1><?= pl_t('Obejrzyj nasze wskazówki', $lang) ?></h1>
        <span class="line"></span>
 <?php
		$counter = 0;

                $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                $args = array(
                    "post_type" => "tutoriale",
                    "posts_per_page" => 9,
                    "paged" => $paged
                );

                $query = new WP_Query($args);

                if($query->have_posts()) :

                ?>
        <div class="row tutorial-container">
             
			
                 <?php   while($query->have_posts()) : $query->the_post(); 
			$counter++;
			if ($counter % 7 == 0) { ?>
			<div class="col-md-4 tutorial">
                <div class="thumbnail thumbnail">
                    <div class="youtube-player" data-id="<?php the_field('filmid'); ?>"></div>
                </div>
                <h5><?php the_title();?></h5>
            </div>
			<?php
			}else{
			?>
            
            <div class="col-md-4 tutorial">
                <div class="thumbnail thumbnail">
                    <div class="youtube-player" data-id="<?php the_field('filmid'); ?>"></div>
                </div>
                <h5><?php the_title();?></h5>
                <?php if (is_null(get_field('film')) or is_null(get_field('filmid'))): ?>
                    Tutaj nie ma żadnego filmu
                <?php endif; ?>
            </div>
            
			
            <?php 
			}
			endwhile; 
			next_posts_link();
			?>
        </div>
        <div id="morePostsWrapper"></div>
        <div class="button">
            <a href="#" id="load-more-posts"><?= pl_t('Wczytaj więcej', $lang) ?></a>
        </div>
<!--		<div class="button">-->
<!--                    <a href="#" id="load-more-posts"><img  src="--><?//= get_template_directory_uri()?><!--/img/load.png" /></a>-->
<!--                </div>-->
		<?php if(function_exists('wp_pagenavi')) { wp_pagenavi(); } ?>
<?php endif; ?>
    </div>
    <script type="text/javascript" src="<?= get_template_directory_uri()?>/js/youtubeHandler.js"></script>

</section>

<?php get_footer(); ?>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>