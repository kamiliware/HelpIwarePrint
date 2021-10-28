<?php
/*
	Template Name: Helpdesk
*/
?>

<?php get_header(); ?>

<?php the_post(); ?>



<section id="helpdesk-modules">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 helpdesk-menu">
                <div class="submenu">

                    <input id="toggle-sub" type="checkbox">

                    <label for="toggle-sub" id="toggle-label-sub">
                        <span></span>
                        <span></span>
                        <span></span>
                    </label>
                    <div class="hamburger-menu-container">
                        <?php
                        $termName = 'kategorie';
                        $taxonomies = [$termName];
                        $args = array(
                            'taxonomy' => $termName,
                            'hide_empty'    => true,
                            'orderby'       => 'term_order',
                            'parent' => 0
                        );
                        $cat_terms = apply_filters( 'get_terms_orderby', 'term_order', $args, $taxonomies);
                        $cat_terms = get_terms(
                            $args
                        );
                        if( $cat_terms ) :?>
                            <ul>
                                <?php
                                foreach( $cat_terms as $term ) :
                                    echo '<li class="helpdesk-category cat-main accTrigger"><span>'. $term->name . '</span>';
                                    $term_children = get_term_children($term->term_id, 'kategorie');
                                    if (!empty($term_children)): ?>
                                        <ul style="display: none;">
                                            <?php foreach ($term_children as $child):
                                                $subCat = get_term_by('id', $child, 'kategorie');
                                                $args = array(
                                                    'post_status'           => 'publish',
                                                    'orderby'               => 'menu_order',
                                                    'order'               => 'ASC',
                                                    'tax_query'             => array(
                                                        array(
                                                            'taxonomy' => 'kategorie',
                                                            'terms'    => $child,
                                                        ),
                                                    ),
                                                    'ignore_sticky_posts'   => true //caller_get_posts is deprecated since 3.1
                                                );
                                                $subCatPosts = new WP_Query( $args );
                                                if( $subCatPosts->have_posts() ) :?>
                                                    <li class="helpdesk-category cat-sub accTrigger"><span><?= $subCat->name ?></span>
                                                        <?php if( $subCatPosts->have_posts() ) : ?>
                                                            <ul class="withChildren" style="display: none;">
                                                                <?php while( $subCatPosts->have_posts() ) : $subCatPosts->the_post();

                                                                    echo '<li><a href="' . get_permalink() . '">'. get_the_title() .'</a></li>';

                                                                endwhile; ?>
                                                            </ul>
                                                        <?php endif; ?>
                                                    </li>

                                                <?php endif;
                                            endforeach; ?>
                                        </ul>
                                    <?php else:
                                        $args = array(
                                            'post_status'           => 'publish',
                                            'orderby'               => 'menu_order',
                                            'order'               => 'ASC',
                                            'tax_query'             => array(
                                                array(
                                                    'taxonomy' => 'kategorie',
                                                    'terms'    => $term->term_id,
                                                ),
                                            ),
                                            'ignore_sticky_posts'   => true //caller_get_posts is deprecated since 3.1
                                        );
                                        $_posts = new WP_Query( $args );
                                        if( $_posts->have_posts() ) : ?>
                                            <ul class="noChildren" style="display: none;">
                                                <?php while( $_posts->have_posts() ) : $_posts->the_post();

                                                    echo '<li><a href="' . get_permalink() . '"><span>'. get_the_title() .'</span></a></li>';

                                                endwhile; ?>
                                            </ul>
                                        <?php endif;
                                        echo '</li>';
                                    endif;
                                    wp_reset_postdata(); //important
                                endforeach; ?>
                            </ul>
                        <?php endif;?>

                    </div>
                </div>
            </div>
            <div class="col-lg-9 content helpdesk-content">

                <div class="breadcrumbs">
                    <a href="<?php echo esc_url(home_url('/')); ?>">Home</a>  /  <span><a href="<?php echo esc_url(home_url('/baza-wiedzy')); ?>">Baza wiedzy</a></span>
                </div>

                <div class="row modules">

                    <a href="<?php echo esc_url(home_url('/baza-wiedzy/nawigacja')); ?>" class="col-md-3 module">
                        <div class="thumbnail">
                            <img src="<?php echo get_template_directory_uri(); ?>/img/nawigacja.png" alt="Nawigacja" class="module-icon">
                            <span class="box-arrow-link"><img src="<?php echo get_template_directory_uri(); ?>/img/arrow.png" alt="link"></span>
                        </div>
                        <h5>Nawigacja po systemie</h5>
                    </a>

                    <a href="<?php echo esc_url(home_url('/baza-wiedzy/e-commerce')); ?>" class="col-md-3 module">
                        <div class="thumbnail">
                            <img src="<?php echo get_template_directory_uri(); ?>/img/modul-ecommerce.png" alt="e-commerce" class="module-icon">
                            <span class="box-arrow-link"><img src="<?php echo get_template_directory_uri(); ?>/img/arrow.png" alt="link"></span>
                        </div>
                        <h5>Moduł E-commerce</h5>
                    </a>

                    <a href="<?php echo esc_url(home_url('/baza-wiedzy/podzlecanie')); ?>"  class="col-md-3 module">
                        <div class="thumbnail">
                            <img src="<?php echo get_template_directory_uri(); ?>/img/modul-podzlecanie.png" alt="podzlecanie" class="module-icon">
                            <span class="box-arrow-link"><img src="<?php echo get_template_directory_uri(); ?>/img/arrow.png" alt="link"></span>
                        </div>
                        <h5>Moduł Podzlecanie</h5>
                    </a>

                    <a href="<?php echo esc_url(home_url('/baza-wiedzy/produkcja')); ?>"  class="col-md-3 module">
                        <div class="thumbnail">
                            <img src="<?php echo get_template_directory_uri(); ?>/img/modul-produkcja.png" alt="produkcja" class="module-icon">
                            <span class="box-arrow-link"><img src="<?php echo get_template_directory_uri(); ?>/img/arrow.png" alt="link"></span>
                        </div>
                        <h5>Moduł Produkcja</h5>
                    </a>

                    <a href="<?php echo esc_url(home_url('/baza-wiedzy/handlowiec')); ?>"  class="col-md-3 module">
                        <div class="thumbnail">
                            <img src="<?php echo get_template_directory_uri(); ?>/img/modul-handlowiec.png" alt="handlowiec" class="module-icon">
                            <span class="box-arrow-link"><img src="<?php echo get_template_directory_uri(); ?>/img/arrow.png" alt="link"></span>
                        </div>
                        <h5>Moduł Handlowiec</h5>
                    </a>

                    <a href="<?php echo esc_url(home_url('/baza-wiedzy/reseller')); ?>" class="col-md-3 module">
                        <div class="thumbnail">
                            <img src="<?php echo get_template_directory_uri(); ?>/img/modul-reseller.png" alt="reseller" class="module-icon">
                            <span class="box-arrow-link"><img src="<?php echo get_template_directory_uri(); ?>/img/arrow.png" alt="link"></span>
                        </div>
                        <h5>Moduł Reseller Multidrukarnia</h5>
                    </a>

                    <a href="<?php echo esc_url(home_url('/baza-wiedzy/preflight')); ?>" class="col-md-3 module">
                        <div class="thumbnail">
                            <img src="<?php echo get_template_directory_uri(); ?>/img/modul-preflight.png" alt="preflight" class="module-icon">
                            <span class="box-arrow-link"><img src="<?php echo get_template_directory_uri(); ?>/img/arrow.png" alt="link"></span>
                        </div>
                        <h5>Moduł Preflight</h5>
                    </a>

                    <a href="<?php echo esc_url(home_url('/baza-wiedzy/kreator-wydrukow')); ?>" class="col-md-3 module">
                        <div class="thumbnail">
                            <img src="<?php echo get_template_directory_uri(); ?>/img/modul-kreator.png" alt="kreator" class="module-icon">
                            <span class="box-arrow-link"><img src="<?php echo get_template_directory_uri(); ?>/img/arrow.png" alt="link"></span>
                        </div>
                        <h5>Moduł Kreator</h5>
                    </a>

                    <a href="<?php echo esc_url(home_url('/baza-wiedzy/lw')); ?>" class="col-md-3 module">
                        <div class="thumbnail">
                            <img src="<?php echo get_template_directory_uri(); ?>/img/lista_wdrozeniowa.png" alt="lista" class="module-icon">
                            <span class="box-arrow-link"><img src="<?php echo get_template_directory_uri(); ?>/img/arrow.png" alt="link"></span>
                        </div>
                        <h5>Lista wdrożeniowa</h5>
                    </a>

                    <a href="<?php echo esc_url(home_url('/baza-wiedzy/pakiet-wdrozeniowy')); ?>" class="col-md-3 module">
                        <div class="thumbnail">
                            <img src="<?php echo get_template_directory_uri(); ?>/img/pw-icon.png" alt="lista" class="module-icon">
                            <span class="box-arrow-link"><img src="<?php echo get_template_directory_uri(); ?>/img/arrow.png" alt="link"></span>
                        </div>
                        <h5>Pakiet wdrożeniowy</h5>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
