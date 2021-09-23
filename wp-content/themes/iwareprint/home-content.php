<?php
/*
	Template Name: Home
*/
?>

<?php get_header(); ?>

    <section id="boxes">

        <div class="container-fluid">
            <div class="row">

                <div class="col-lg-4 helpdesk-box">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/icon_helpdesk.png" alt="helpdesk">
                    <?php
                    global $post;
                    if ( function_exists( 'pll_get_post_language' ) ):
                        $lang = pll_get_post_language($post->ID);
                    endif;
                    ?>
                    <h1><?= pl_t('Baza wiedzy', $lang) ?></h1>
                    <p><?= pl_t('Nawigacja po systemie. Instrukcje techniczne', $lang) ?></p>
                    <div class="d-md-none box-arrow">
                        <a href="<?php echo esc_url(pl_t('/baza-wiedzy', $lang)); ?>" class="box-arrow-link"><img src="<?php echo get_template_directory_uri(); ?>/img/arrow.png" alt="link"></a>
                    </div>
                    <div class="d-none d-md-inline-block">
                        <a href="<?php echo esc_url(home_url(pl_t('/baza-wiedzy', $lang))); ?>" class="box-link"><?= pl_t('Przejdź', $lang) ?></a>
                    </div>
                </div>
                
                <div class="col-lg-4 faq-box">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/icon_faq.png" alt="faq">
                    <h2>FAQ</h2>
                    <p><?= pl_t('Na każde pytanie jest odpowiedź', $lang) ?></p>
                    <div class="d-md-none box-arrow">
                        <a href="<?php echo esc_url(home_url('/faq')); ?>" class="box-arrow-link"><img src="<?php echo get_template_directory_uri(); ?>/img/arrow.png" alt="link"></a>
                    </div>
                    <div class="d-none d-md-inline-block">
                        <a href="<?php echo esc_url(home_url('/faq')); ?>" class="box-link"><?= pl_t('Przejdź', $lang) ?></a>
                    </div>
                </div>
                
                <div class="col-lg-4 download-box">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/icon_download.png" alt="download">
                    <h2><?= pl_t('Materiały do pobrania', $lang) ?></h2>
                    <p><?= pl_t('Baza materiałów iwarePRINT', $lang) ?></p>
                    <div class="d-md-none box-arrow">
                        <a href="<?php echo esc_url(home_url(pl_t('/do-pobrania', $lang))); ?>" class="box-arrow-link"><img src="<?php echo get_template_directory_uri(); ?>/img/arrow.png" alt="link"></a>
                    </div>
                    <div class="d-none d-md-inline-block">
                        <a href="<?php echo esc_url(home_url(pl_t('/do-pobrania', $lang))); ?>" class="box-link"><?= pl_t('Przejdź', $lang) ?></a>
                    </div>
                </div>
                
            </div>
        </div>
        
    </section>
    
    <section id="links">

        <div class="container">
            <div class="row">

                <div class="col-md-3 webinars">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/icon_webinars.png" alt="webinars">
                    <span class="line"></span>
                    <h2><?= pl_t('Najbliższe webinaria', $lang) ?></h2>
                    <p><?php the_field('webinaria', 'option'); ?></p>
                    <a target="_blank" href="<?= pl_t('http://webinaria.iwareprint.pl/', $lang) ?>"><?= pl_t('Zapisz się', $lang) ?></a>
                </div>

                <div class="col-md-3 outsourcing">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/icon_outsourcing.png" alt="outsourcing">
                    <span class="line"></span>
                    <h2>Dropshipping<br>Outsourcing</h2>
                    <p><?= pl_t('Strona dedykowana Modułowi Podzlecania. Zobacz pełną listę drukarni korzystających.', $lang) ?></p>
                    <a target="_blank" href="<?= pl_t('http://podzlecdruk.pl/', $lang) ?>"><?= pl_t('Przejdź', $lang) ?></a>
                </div>
				
				<div class="col-md-3 creator">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/icon_creator.png" alt="creator">
                    <span class="line"></span>
                    <h2><?= pl_t('Kreator wydruków', $lang) ?></h2>
                    <p><?= pl_t('Strona dedykowana Modułowi Kreator. Poznaj możliwości graficzne kreatora.', $lang) ?></p>
                    <a target="_blank" href="<?= pl_t('http://kreatorwydrukow.pl/', $lang) ?>"><?= pl_t('Przejdź', $lang) ?></a>
                </div>

                <div class="col-md-3 conference">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/icon_conference.png" alt="conference">
                    <span class="line"></span>
                    <h2><?= pl_t('Najbliższa konferencja', $lang) ?></h2>
                    <p><?php the_field('konferencje', 'option'); ?></p>
                    <a target="_blank" href="<?= pl_t('http://konferencja.podzlecdruk.pl/', $lang) ?>"><?= pl_t('Dołącz', $lang) ?></a>
                </div>

            </div>
        </div>

    </section>
    
    <section id="list-download">

        <div class="container-fluid">
            <div class="row">

                <div class="col-md-8 list">
                    <div class="container">
                        <h3><?= pl_t('Aktualizacje', $lang) ?></h3>
                        <ul>
							<?php
				
							$args = array(
							'post_type'	   => 'aktualizacje',
							'posts_per_page' => 5,
						);

						$my_query = new WP_Query($args);

						while ($my_query->have_posts()):
						$my_query->the_post();
						$do_not_duplicate = $post->ID;

						?>
						
						<li>
                            <h4 style="color: #333;padding: 0 0 10px;"><?= the_title(); ?></h4>
                            <?php
                            $categories = get_the_category();
                            if ( ! empty( $categories ) ) {
                                echo '<h5 style="font-size: 20px;color: #f21559;">' . esc_html( $categories[0]->name ) . '</h5>';
                            }
                            ?>
                            <p style="font-size: 16px;line-height: 1.4;">
                                <?= the_content();?>
                            </p>
                            <?php if (get_field('link_do_bazy_wiedzy') && !is_null(get_field('link_do_bazy_wiedzy'))): ?>
                                <a target="_blank" style="color: #0099fe;" href="<?= get_field('link_do_bazy_wiedzy') ?>" class="read-link"><?= pl_t('Czytaj więcej', $lang) ?></a>
                            <?php endif; ?>
                        </li>
						
						<?php endwhile; ?>

                        </ul>
                        <a class="d-lg-none button" href="<?php echo esc_url(home_url(pl_t('/aktualizacje', $lang))); ?>"><?= pl_t('Pełna lista', $lang) ?></a>
                        <a class="d-none d-lg-inline-block button" href="<?php echo esc_url(home_url(pl_t('/aktualizacje', $lang))); ?>"><?= pl_t('Zobacz pełną listę', $lang) ?></a>
                    </div>
                </div>

                <div class="col-md-4 download-home">
                    <div class="container">
                        <h3><?= pl_t('Materiały<br>do pobrania', $lang) ?></h3>
                        <a class="button" href="<?php echo esc_url(home_url('/do-pobrania')); ?>"><?= pl_t('Zobacz', $lang) ?></a>
                        <img src="<?php echo get_template_directory_uri(); ?>/img/tablet.png" alt="tablet">
                    </div>
                </div>

            </div>
        </div>

    </section>
    
    <section id="tutorials">
        
        <div class="container">
            <?php var_dump(pll_get_post_translations( $post->ID )['pl']); ?>
            <?php var_dump(get_post(pll_get_post_translations( $post->ID )['pl'])); ?>
            <h4><?= pl_t('Materiały wideo', $lang) ?></h4>
            <h3><?= pl_t('Mamy dla Ciebie sporo wiedzy!', $lang) ?></h3>
            <span class="line"></span>
            
            <div class="row">
                
			<?php

            $args = array(
                'post_type'	   => 'tutoriale',
                'posts_per_page' => 3,
            );

            $my_query = new WP_Query($args);
            
            while ($my_query->have_posts()):
            $my_query->the_post();
            $do_not_duplicate = $post->ID;
            
            ?>

            <div class="col-md-4 tutorial">
                <div class="thumbnail thumbnail">
                    <div class="youtube-player" data-id="<?php the_field('filmid'); ?>"></div>
                </div>
                <h5><?php the_title();?></h5>
            </div>
            
            <?php endwhile; ?>
                
            </div>
            
            <a class="button" href="<?php echo esc_url(home_url(pl_t('/materialy-wideo', $lang))); ?>"><?= pl_t('Zobacz wszystkie', $lang) ?></a>
            
        </div>

    </section>
    
    <section id="blog">

        <div class="container">

            <h3><?= pl_t('Blog IwarePrint', $lang) ?></h3>

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
                    <a href="<?php the_permalink(); ?>"><?= pl_t('Zobacz', $lang) ?></a>
                </div>
            </div>
 
			<?php endwhile; ?>
			
			<?php

			$args = array(
                'post_type'	   => 'post',
                'posts_per_page' => 3,
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

			<h4><?= pl_t('Nie ma żadnych postów.', $lang) ?></h4>

			<?php endif; ?> 
            </div>

            <a class="button" href="<?php echo esc_url(pl_t('https://blog.iwareprint.pl', $lang)); ?>"><?= pl_t('Zobacz wszystkie', $lang) ?></a>

        </div>
        <script type="text/javascript" src="<?= get_template_directory_uri()?>/js/youtubeHandler.js"></script>

    </section>

<?php get_footer(home); ?>