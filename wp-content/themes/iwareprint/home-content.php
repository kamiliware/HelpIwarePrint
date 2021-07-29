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
                    <h1>Baza wiedzy</h1>
                    <p>Nawigacja po systemie. Instrukcje techniczne</p>
                    <div class="d-md-none box-arrow">
                        <a href="<?php echo esc_url(home_url('/baza-wiedzy')); ?>" class="box-arrow-link"><img src="<?php echo get_template_directory_uri(); ?>/img/arrow.png" alt="link"></a>
                    </div>
                    <div class="d-none d-md-inline-block">
                        <a href="<?php echo esc_url(home_url('/baza-wiedzy')); ?>" class="box-link">Przejdź</a>
                    </div>
                </div>
                
                <div class="col-lg-4 faq-box">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/icon_faq.png" alt="faq">
                    <h2>FAQ</h2>
                    <p>Na każde pytanie jest odpowiedź</p>
                    <div class="d-md-none box-arrow">
                        <a href="<?php echo esc_url(home_url('/faq')); ?>" class="box-arrow-link"><img src="<?php echo get_template_directory_uri(); ?>/img/arrow.png" alt="link"></a>
                    </div>
                    <div class="d-none d-md-inline-block">
                        <a href="<?php echo esc_url(home_url('/faq')); ?>" class="box-link">Przejdź</a>
                    </div>
                </div>
                
                <div class="col-lg-4 download-box">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/icon_download.png" alt="download">
                    <h2>Materiały do pobrania</h2>
                    <p>Baza materiałów iwarePRINT</p>
                    <div class="d-md-none box-arrow">
                        <a href="<?php echo esc_url(home_url('/do-pobrania')); ?>" class="box-arrow-link"><img src="<?php echo get_template_directory_uri(); ?>/img/arrow.png" alt="link"></a>
                    </div>
                    <div class="d-none d-md-inline-block">
                        <a href="<?php echo esc_url(home_url('/do-pobrania')); ?>" class="box-link">Przejdź</a>
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
                    <h2>Najbliższe webinaria</h2>
                    <p><?php the_field('webinaria', 'option'); ?></p>
                    <a target="_blank" href="http://webinaria.iwareprint.pl/">Zapisz się</a>
                </div>

                <div class="col-md-3 outsourcing">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/icon_outsourcing.png" alt="outsourcing">
                    <span class="line"></span>
                    <h2>Dropshipping<br>Outsourcing</h2>
                    <p>Strona dedykowana Modułowi Podzlecania. Zobacz pełną listę drukarni korzystających.</p>
                    <a target="_blank" href="http://podzlecdruk.pl/">Przejdź</a>
                </div>
				
				<div class="col-md-3 creator">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/icon_creator.png" alt="creator">
                    <span class="line"></span>
                    <h2>Kreator wydruków</h2>
                    <p>Strona dedykowana Modułowi Kreator. Poznaj możliwości graficzne kreatora.</p>
                    <a target="_blank" href="http://kreatorwydrukow.pl/">Przejdź</a>
                </div>

                <div class="col-md-3 conference">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/icon_conference.png" alt="conference">
                    <span class="line"></span>
                    <h2>Najbliższa konferencja</h2>
                    <p><?php the_field('konferencje', 'option'); ?></p>
                    <a target="_blank" href="http://konferencja.podzlecdruk.pl/">Dołącz</a>
                </div>

            </div>
        </div>

    </section>
    
    <section id="list-download">

        <div class="container-fluid">
            <div class="row">

                <div class="col-md-8 list">
                    <div class="container">
                        <h3>Aktualizacje</h3>
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
                                <a target="_blank" style="color: #0099fe;" href="<?= get_field('link_do_bazy_wiedzy') ?>" class="read-link">Czytaj więcej</a>
                            <?php endif; ?>
                        </li>
						
						<?php endwhile; ?>

                        </ul>
                        <a class="d-lg-none button" href="<?php echo esc_url(home_url('/aktualizacje')); ?>">Pełna lista</a>
                        <a class="d-none d-lg-inline-block button" href="<?php echo esc_url(home_url('/aktualizacje')); ?>">Zobacz pełną listę</a>
                    </div>
                </div>

                <div class="col-md-4 download-home">
                    <div class="container">
                        <h3>Materiały<br>do pobrania</h3>
                        <a class="button" href="<?php echo esc_url(home_url('/do-pobrania')); ?>">Zobacz</a>
                        <img src="<?php echo get_template_directory_uri(); ?>/img/tablet.png" alt="tablet">
                    </div>
                </div>

            </div>
        </div>

    </section>
    
    <section id="tutorials">
        
        <div class="container">
           
            <h4>Materiały wideo</h4>
            <h3>Mamy dla Ciebie sporo wiedzy!</h3>
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
            
            <a class="button" href="<?php echo esc_url(home_url('/materialy-wideo')); ?>">Zobacz wszystkie</a>
            
        </div>

    </section>
    
    <section id="blog">

        <div class="container">

            <h3>Blog IwarePrint</h3>

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

			<h4>Nie ma żadnych postów.</h4>

			<?php endif; ?> 
            </div>

            <a class="button" href="<?php echo esc_url(home_url('/blog')); ?>">Zobacz wszystkie</a>

        </div>
        <script type="text/javascript" src="<?= get_template_directory_uri()?>/js/youtubeHandler.js"></script>

    </section>

<?php get_footer(home); ?>