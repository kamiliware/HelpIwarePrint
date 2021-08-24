<?php
/*
	Template Name: Single - helpdesk
    Template Post Type: helpdesk, implementation_list, e_commerce_module, trader, wizard, production, reseller, preflight, podzlecanie
*/
?>

<?php get_header(); ?>


	<?php the_post(); ?>

	<section id="helpdesk-single">
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
						http://newhelp.iwareprint.pl/baza-wiedzy/e-commerce/
						$str = "$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
							$last = explode("/", $str, 3);
						$lastx = $last[2];
						$lasty = substr($lastx, 0, 4);
						
						if($lasty=='e-co'){
							?>
						<a href="http://newhelp.iwareprint.pl/baza-wiedzy/e-commerce/">Moduł E-commerce</a>  /  
						<?php
						}
						
						if($lasty=='krea'){
							?>
						<a href="http://newhelp.iwareprint.pl/baza-wiedzy/kreator-wydrukow/">Moduł Kreator Wydruków</a>  /  
						<?php
						}



						$terms = get_the_terms( $post->ID , 'kategorie' );
						foreach ( $terms as $term ) {

						$term_link = get_term_link( $term );

						if ( is_wp_error( $term_link ) ) {
							continue;
						}?>
						
						<a href="<?php echo esc_url( $term_link ) ?>"><?php echo $term->name; ?></a>
						
						<?php }
						
						
						
						?>
						
						
						<?php
$term = get_queried_object();
$parent = ( isset( $term->parent ) ) ? get_term_by( 'id', $term->parent, 'kategorie' ) : false;
?>

<?php if( $parent ): ?>
     <a href="<?php echo esc_url(home_url('/baza-wiedzy')); ?>/<?php echo $parent->slug; ?>"><?php echo $parent->name; ?></a>  / zaza
    
						
<?php else:?>
   <a href="<?php echo esc_url(home_url('/baza-wiedzy')); ?>/<?php echo $parent->slug; ?>"><?php echo $parent->name; ?></a>
<?php endif; ?>
						
						
						
						
						/  <span><a href="<?php the_permalink();?>"><?php the_title();?></a></span>
                    </div>
					<div class="row helpdesk-header">
						
					
					<div class="col-md-8">
                    <h1><?php the_title(); ?></h1>
					</div>
					<div class="col-md-4">
						<div class="helpdesk-tooltip">
							<img src="<?php echo get_template_directory_uri(); ?>/img/lightbulb.png" alt="uwaga">
							<h5>Uwaga!</h5>
							<p><i><?php the_field('tooltip'); ?></i></p>
						</div>
						
					</div>
						
						</div>
                    <section class="container_help"><?php the_content(); ?></section>
					
					<?php comments_template(); ?>
					
                </div>
            </div>
        </div>
    </section>
 
<?php get_footer(helpdesk); ?>