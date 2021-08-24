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
                            $cat_terms = get_terms(
                                $termName,
                                array(
                                    'hide_empty'    => true,
                                    'orderby'       => 'name',
                                    'order'         => 'ASC',
                                    'parent' => 0
                                )
                            );
                            echo '<pre>';
                            if( $cat_terms ) : var_dump($cat_terms);?>
                                </pre>
                                <ul>
                                    <?php foreach( $cat_terms as $term ) :
                                        echo '<li class="helpdesk-category cat-main">'. $term->name;

                                        $args = array(
                                            'post_type'             => 'e_commerce_module',
                                            'post_status'           => 'publish',
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
                                            <ul style="display:none">
                                                <?php while( $_posts->have_posts() ) : $_posts->the_post();

                                                    echo '<li><a href="' . get_permalink() . '">'. get_the_title() .'</a></li>';

                                                endwhile; ?>
                                            </ul>
                                        <?php endif;
                                        echo '</li>';
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

<!--                    <div class="row modules">-->
<!---->
<!--                        <div class="col-md-3 module">-->
<!--                            <div class="thumbnail">-->
<!--                                <img src="--><?php //echo get_template_directory_uri(); ?><!--/img/modul-ecommerce.png" alt="e-commerce" class="module-icon">-->
<!--                                <a href="--><?php //echo esc_url(home_url('/baza-wiedzy/e-commerce')); ?><!--" class="box-arrow-link"><img src="--><?php //echo get_template_directory_uri(); ?><!--/img/arrow.png" alt="link"></a>-->
<!--                            </div>-->
<!--                            <h5>Moduł E-commerce</h5>-->
<!--                        </div>-->
<!---->
<!--                        <div class="col-md-3 module">-->
<!--                            <div class="thumbnail">-->
<!--                                <img src="--><?php //echo get_template_directory_uri(); ?><!--/img/modul-podzlecanie.png" alt="podzlecanie" class="module-icon">-->
<!--                                <a href="--><?php //echo esc_url(home_url('/baza-wiedzy/podzlecanie')); ?><!--" class="box-arrow-link"><img src="--><?php //echo get_template_directory_uri(); ?><!--/img/arrow.png" alt="link"></a>-->
<!--                            </div>-->
<!--                            <h5>Moduł Podzlecanie</h5>-->
<!--                        </div>-->
<!---->
<!--                        <div class="col-md-3 module">-->
<!--                            <div class="thumbnail">-->
<!--                                <img src="--><?php //echo get_template_directory_uri(); ?><!--/img/modul-produkcja.png" alt="produkcja" class="module-icon">-->
<!--                                <a href="--><?php //echo esc_url(home_url('/baza-wiedzy/produkcja')); ?><!--" class="box-arrow-link"><img src="--><?php //echo get_template_directory_uri(); ?><!--/img/arrow.png" alt="link"></a>-->
<!--                            </div>-->
<!--                            <h5>Moduł Produkcja</h5>-->
<!--                        </div>-->
<!---->
<!--                        <div class="col-md-3 module">-->
<!--                            <div class="thumbnail">-->
<!--                                <img src="--><?php //echo get_template_directory_uri(); ?><!--/img/modul-handlowiec.png" alt="handlowiec" class="module-icon">-->
<!--                                <a href="--><?php //echo esc_url(home_url('/baza-wiedzy/handlowiec')); ?><!--" class="box-arrow-link"><img src="--><?php //echo get_template_directory_uri(); ?><!--/img/arrow.png" alt="link"></a>-->
<!--                            </div>-->
<!--                            <h5>Moduł Handlowiec</h5>-->
<!--                        </div>-->
<!---->
<!--                        <div class="col-md-3 module">-->
<!--                            <div class="thumbnail">-->
<!--                                <img src="--><?php //echo get_template_directory_uri(); ?><!--/img/modul-reseller.png" alt="reseller" class="module-icon">-->
<!--                                <a href="--><?php //echo esc_url(home_url('/baza-wiedzy/reseller')); ?><!--" class="box-arrow-link"><img src="--><?php //echo get_template_directory_uri(); ?><!--/img/arrow.png" alt="link"></a>-->
<!--                            </div>-->
<!--                            <h5>Moduł Reseller Multidrukarnia</h5>-->
<!--                        </div>-->
<!---->
<!--                        <div class="col-md-3 module">-->
<!--                            <div class="thumbnail">-->
<!--                                <img src="--><?php //echo get_template_directory_uri(); ?><!--/img/modul-preflight.png" alt="preflight" class="module-icon">-->
<!--                                <a href="--><?php //echo esc_url(home_url('/baza-wiedzy/preflight')); ?><!--" class="box-arrow-link"><img src="--><?php //echo get_template_directory_uri(); ?><!--/img/arrow.png" alt="link"></a>-->
<!--                            </div>-->
<!--                            <h5>Moduł Preflight</h5>-->
<!--                        </div>-->
<!---->
<!--                        <div class="col-md-3 module">-->
<!--                            <div class="thumbnail">-->
<!--                                <img src="--><?php //echo get_template_directory_uri(); ?><!--/img/modul-kreator.png" alt="kreator" class="module-icon">-->
<!--                                <a href="--><?php //echo esc_url(home_url('/baza-wiedzy/kreator-wydrukow')); ?><!--" class="box-arrow-link"><img src="--><?php //echo get_template_directory_uri(); ?><!--/img/arrow.png" alt="link"></a>-->
<!--                            </div>-->
<!--                            <h5>Moduł Kreator</h5>-->
<!--                        </div>-->
<!---->
<!--                        <div class="col-md-3 module">-->
<!--                            <div class="thumbnail">-->
<!--                                <img src="--><?php //echo get_template_directory_uri(); ?><!--/img/lista_wdrozeniowa.png" alt="lista" class="module-icon">-->
<!--                                <a href="--><?php //echo esc_url(home_url('/baza-wiedzy/lw')); ?><!--" class="box-arrow-link"><img src="--><?php //echo get_template_directory_uri(); ?><!--/img/arrow.png" alt="link"></a>-->
<!--                            </div>-->
<!--                            <h5>Lista wdrożeniowa</h5>-->
<!--                        </div>-->
<!---->
<!--                    </div>-->
                </div>
            </div>
        </div>
    </section>

<?php get_footer(helpdesk); ?>