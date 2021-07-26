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

					<ul>
<?php

$args=array(
'post_type'                => 'helpdesk',
'child_of'                 => 0,
'parent'                   => '',
'hide_empty'               => 1,
'hierarchical'             => 1,
'exclude'                  => '',
'include'                  => '',
'number'                   => '',
'taxonomy'                 => 'kategorie',
'pad_counts'               => false
);

$categories=get_categories($args);

foreach ( $categories as $category ) {

if ( $category->parent > 0 ) {
continue;   
}

echo '<li class="helpdesk-category cat-main">' .	$category->name . '</li>';

$querystr = "SELECT $wpdb->posts.*
          FROM $wpdb->posts, $wpdb->term_relationships, $wpdb->terms
          WHERE term_id = (" . $category->cat_ID . ")
          AND term_taxonomy_id = (" . $category->term_taxonomy_id . ")
          AND ID = object_id
          AND post_type = 'helpdesk'
          AND post_status = 'publish'
          ORDER BY post_date DESC";
$posts = $wpdb->get_results($querystr, OBJECT);

echo '<ul>';
foreach ( $posts as $post ) {
    setup_postdata($post);  

        echo '<li><a href="'; the_permalink(); echo '">'; the_title();   echo '</a></li>';
		

        }


$categories2 = get_terms('kategorie',array('parent' => $category->term_id , 'hide_empty'=> '0' ));

	echo '<ul>';
foreach ( $categories2 as $category ) {

echo '<li class="helpdesk-category cat-sub">' .	$category->name . '</li>';


$args = [
    'post_type' => 'helpdesk',
	'posts_per_page' => 999,
    'tax_query' => [
        [
            'taxonomy' => 'kategorie',
            'terms' => $category->term_id
        ],
    ],
    // Rest of your arguments
];
	
$posts = get_posts($args);

echo '<ul>';
foreach($posts as $post) { 
    setup_postdata($post);  

		
        echo '<li><a href="'; the_permalink(); echo '">'; the_title();   echo '</a></li>';

        }
echo '</ul>';
	
	

}
	echo '</ul>';
	echo '</ul>';
}
wp_reset_query();
/*
?>
                    

						
						
						<?php

						$args = array(
							'post_type' => 'helpdesk',
							'tax_query' => array(
								'terms' => 'kategorie'
						  	),
						);
						
						$loop = new WP_Query($args);

						while($loop->have_posts()): $loop->the_post(); ?>
						
						<?php
						
						$terms = get_the_terms( $post->ID , 'kategorie' );
						foreach ( $terms as $term ) {

						$term_link = get_term_link( $term );

						if ( is_wp_error( $term_link ) ) {
							continue;
						}?>
							
						<li class="helpdesk-category">
							<a href="<?php echo esc_url( $term_link ) ?>"><?php echo $term->name; ?></a>
						</li>
						
						<?php }
						?>

						<li><a href="<?php the_permalink();?>"><?php the_title();?></a></li>

						<?php
						endwhile;
						wp_reset_query(); */
						?>

                    </ul>  
	</div>
	
</div>
                </div>
                <div class="col-lg-9 content helpdesk-content">

                    <div class="breadcrumbs">
						<a href="<?php echo esc_url(home_url('/')); ?>">Home</a>  /  <span><a href="<?php echo esc_url(home_url('/baza-wiedzy')); ?>">Baza wiedzy</a></span>
                    </div>

					<div class="row modules">
						
						<div class="col-md-3 module">
							<div class="thumbnail">
								<img src="<?php echo get_template_directory_uri(); ?>/img/modul-ecommerce.png" alt="e-commerce" class="module-icon">
								<a href="<?php echo esc_url(home_url('/baza-wiedzy/e-commerce')); ?>" class="box-arrow-link"><img src="<?php echo get_template_directory_uri(); ?>/img/arrow.png" alt="link"></a>
							</div>
							<h5>Moduł E-commerce</h5>
						</div>

						<div class="col-md-3 module">
							<div class="thumbnail">
								<img src="<?php echo get_template_directory_uri(); ?>/img/modul-podzlecanie.png" alt="podzlecanie" class="module-icon">
								<a href="<?php echo esc_url(home_url('/baza-wiedzy/podzlecanie')); ?>" class="box-arrow-link"><img src="<?php echo get_template_directory_uri(); ?>/img/arrow.png" alt="link"></a>
							</div>
							<h5>Moduł Podzlecanie</h5>
						</div>

						<div class="col-md-3 module">
							<div class="thumbnail">
								<img src="<?php echo get_template_directory_uri(); ?>/img/modul-produkcja.png" alt="produkcja" class="module-icon">
								<a href="<?php echo esc_url(home_url('/baza-wiedzy/produkcja')); ?>" class="box-arrow-link"><img src="<?php echo get_template_directory_uri(); ?>/img/arrow.png" alt="link"></a>
							</div>
							<h5>Moduł Produkcja</h5>
						</div>

						<div class="col-md-3 module">
							<div class="thumbnail">
								<img src="<?php echo get_template_directory_uri(); ?>/img/modul-handlowiec.png" alt="handlowiec" class="module-icon">
								<a href="<?php echo esc_url(home_url('/baza-wiedzy/handlowiec')); ?>" class="box-arrow-link"><img src="<?php echo get_template_directory_uri(); ?>/img/arrow.png" alt="link"></a>
							</div>
							<h5>Moduł Handlowiec</h5>
						</div>

						<div class="col-md-3 module">
							<div class="thumbnail">
								<img src="<?php echo get_template_directory_uri(); ?>/img/modul-reseller.png" alt="reseller" class="module-icon">
								<a href="<?php echo esc_url(home_url('/baza-wiedzy/reseller')); ?>" class="box-arrow-link"><img src="<?php echo get_template_directory_uri(); ?>/img/arrow.png" alt="link"></a>
							</div>
							<h5>Moduł Reseller Multidrukarnia</h5>
						</div>

						<div class="col-md-3 module">
							<div class="thumbnail">
								<img src="<?php echo get_template_directory_uri(); ?>/img/modul-preflight.png" alt="preflight" class="module-icon">
								<a href="<?php echo esc_url(home_url('/baza-wiedzy/preflight')); ?>" class="box-arrow-link"><img src="<?php echo get_template_directory_uri(); ?>/img/arrow.png" alt="link"></a>
							</div>
							<h5>Moduł Preflight</h5>
						</div>

						<div class="col-md-3 module">
							<div class="thumbnail">
								<img src="<?php echo get_template_directory_uri(); ?>/img/modul-kreator.png" alt="kreator" class="module-icon">
								<a href="<?php echo esc_url(home_url('/baza-wiedzy/kreator-wydrukow')); ?>" class="box-arrow-link"><img src="<?php echo get_template_directory_uri(); ?>/img/arrow.png" alt="link"></a>
							</div>
							<h5>Moduł Kreator</h5>
						</div>
						
						<div class="col-md-3 module">
							<div class="thumbnail">
								<img src="<?php echo get_template_directory_uri(); ?>/img/lista_wdrozeniowa.png" alt="lista" class="module-icon">
								<a href="<?php echo esc_url(home_url('/baza-wiedzy/lw')); ?>" class="box-arrow-link"><img src="<?php echo get_template_directory_uri(); ?>/img/arrow.png" alt="link"></a>
							</div>
							<h5>Lista wdrożeniowa</h5>
						</div>
						
					</div>

                </div>
            </div>
        </div>
    </section>
 
<?php get_footer(helpdesk); ?>