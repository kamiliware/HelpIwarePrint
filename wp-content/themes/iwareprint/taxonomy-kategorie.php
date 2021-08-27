<?php
/*
	Template Name: Category - helpdesk
*/
?>

<?php get_header();
    wp_head();
    ?>


	<?php the_post(); ?>
	<section id="helpdesk-category" class="hcat">
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
                                    'hide_empty'    => false,
                                    'orderby'       => 'name',
                                    'order'         => 'ASC',
                                    'parent' => 0
                                )
                            );
                            if( $cat_terms ) :?>
                                <ul>
                                    <?php
                                    foreach( $cat_terms as $term ) :
                                        echo '<li class="helpdesk-category cat-main accTrigger">'. $term->name;
                                        $term_children = get_term_children($term->term_id, 'kategorie');
                                        if (!empty($term_children)): ?>
                                            <ul style="display: none;">
                                                <?php foreach ($term_children as $child):
                                                    $subCat = get_term_by('id', $child, 'kategorie');
                                                    $subArgs = array(
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
                                                    $subCatPosts = new WP_Query( $subArgs );
                                                    if( $subCatPosts->have_posts() ) :?>
                                                        <li class="helpdesk-category cat-sub accTrigger"><?= $subCat->name ?>
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

                                                        echo '<li><a href="' . get_permalink() . '">'. get_the_title() .'</a></li>';

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
                    <img class="arrow-back" src="<?php echo get_template_directory_uri(); ?>/img/arrow_back.png" alt="arrow back">
                    <div class="breadcrumbs">
                        <a href="<?php echo esc_url(home_url('/')); ?>">Home</a>  /  <a href="<?php echo esc_url(home_url('/baza-wiedzy')); ?>">Baza wiedzy</a>  /
						
						<?php
                            $taxonomyName = "kategorie";
                            //This gets top layer terms only.  This is done by setting parent to 0.
                            $parent_terms = get_terms( $taxonomyName, array( 'parent' => 0, 'orderby' => 'slug', 'hide_empty' => false ) );



						
						$terms = get_the_terms( $post->ID , 'kategorie' );
						
						foreach ( $terms as $term ) {

						$term_link = get_term_link( $term );
						$tid = $term->term_id;
						if ( is_wp_error( $term_link ) ):
							continue;
						endif;
                            $term = get_queried_object();
                            $parent = ( isset( $term->parent ) ) ? get_term_by( 'id', $term->parent, 'kategorie' ) : false;
                            if( $parent ): ?>
                                 <a href="<?php echo esc_url(home_url('/baza-wiedzy')); ?>/<?php echo $parent->slug; ?>"><?php echo $parent->name; ?></a>  /

                            <?php else:?>

                            <?php endif; ?>



						<span><?php
							$case_study_cat_slug = get_queried_object()->slug;
							$case_study_cat_namex = $term->name;
                            $case_study_cat_name = get_queried_object()->name;
							$case_study_id = get_queried_object_id();

							echo $case_study_cat_name;



							?></span>
						
						
						<?php }
						?>

                    </div>
					<?php

            ?>
                <h1><?php echo $case_study_cat_name; ?></h1>
					
					
					<?php


					if(($case_study_cat_slug=='e-commerce')OR($case_study_cat_slug=='kreator-wydrukow')){


											foreach ( $parent_terms as $pterm ) {
    //Get the Child terms
    //
    $childTerms = get_terms( $taxonomyName, array( 'parent' => $pterm->term_id, 'orderby' => 'slug', 'hide_empty' => false ) );
												$xy_id = $pterm->term_id;
												if($xy_id==$case_study_id){
    foreach ( $childTerms as $term ) { ?>
		<div class="category-single">

						<div class="thumbnail">
							<h5><?= $term->name; ?></h5>
							<a href="<?= esc_url(home_url("/baza-wiedzy/$term->slug"));  ?>" class="box-arrow-link"><img src="<?= get_template_directory_uri(); ?>/img/arrow.png" alt="link"></a>
						</div>

					</div>

					<?php

    }
												}
}





					}else{
						$args = [
                        'tax_query' => [
                            [
                                'taxonomy' => 'kategorie',
                                'terms' => $tid
                            ],
                        ],
    // Rest of your arguments
];
					$wq = new WP_Query($args);
					?>
					<?php if ($wq->have_posts()) : ?>
					<?php while ($wq->have_posts()) : $wq->the_post(); ?>

					<div class="category-single">
						<div class="thumbnail">
							<h5><?php the_title(); ?></h5>
							<a href="<?php the_permalink(); ?>" class="box-arrow-link"><img src="<?= get_template_directory_uri(); ?>/img/arrow.png" alt="link"></a>
						</div>

					</div>

					<?php endwhile; ?>
					<?php else: ?>

					<h4>Nie ma żadnych postów.</h4>

					<?php endif;








						}




					?>
					
					
					
					
					
					
					
					
                </div>
            </div>
        </div>
    </section>
 
<?php get_footer(helpdesk); ?>




