<?php
/*
	Template Name: Materiały do pobrania
*/
?>

<?php get_header(); ?>

	<section id="downloads" class="content">
        <?php
        global $post;
        if ( function_exists( 'pll_get_post_language' ) ):
            $lang = pll_get_post_language($post->ID);
        endif;
        ?>
        <div class="breadcrumbs">
            <a href="<?php echo esc_url(home_url('/')); ?>">Home</a>  /  <span><a href="<?php echo esc_url(home_url('/do-pobrania')); ?>"><?= pl_t('Do pobrania', $lang) ?></a></span>
        </div>

        <div class="container">

            <h4 class="blue-header"><?= pl_t('Do pobrania', $lang) ?></h4>
            <h1><?= pl_t('Materiały do pobrania', $lang) ?></h1>
            <span class="line"></span>

            <div class="row download-list">
				
				<?php if( have_rows('material_do_pobrania') ): ?>
				
					<?php while( have_rows('material_do_pobrania') ): the_row(); 

						// vars
						$icon = get_sub_field('ikona');
						$title = get_sub_field('tytul');
						$subtitle = get_sub_field('podtytul');
						$file = get_sub_field('plik');
								
					?>

                <div class="col-md-4">
                    <div class="download">
						
						<img src="<?php echo $icon['url']; ?>" alt="<?php echo $icon['alt'] ?>" />
						<h5><?php echo $title; ?></h5>
						<p><?php echo $subtitle; ?></p>
						<a target="_blank" href="<?php echo $file['url']; ?>"><?= pl_t('Pobierz', $lang) ?></a>

                    </div>
                </div>
				
					<?php endwhile; ?>
				
				<?php endif; ?>
                
            </div>

        </div>

    </section>

<?php get_footer(); ?>