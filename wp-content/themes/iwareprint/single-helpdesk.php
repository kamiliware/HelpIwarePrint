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
                    <ul>
<?php

					
						
$args=array(
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

echo '<li class="helpdesk-category cat-main"><span>' .	$category->name .'</span>';

$querystr = "SELECT $wpdb->posts.*
          FROM $wpdb->posts, $wpdb->term_relationships, $wpdb->terms
          WHERE term_id = (" . $category->cat_ID . ")
          AND term_taxonomy_id = (" . $category->term_taxonomy_id . ")
          AND ID = object_id
          AND post_type = 'helpdesk'
          AND post_status = 'publish'
          ORDER BY menu_order ASC";
$posts = $wpdb->get_results($querystr, OBJECT);
	
	

echo '<ul>';
foreach ( $posts as $post ) {
	
    setup_postdata($post);  

        echo '<li><a href="'; the_permalink(); echo '">'; the_title();   echo '</a></li>';
		

        }


$categories2 = get_terms('kategorie',array('parent' => $category->term_id , 'hide_empty'=> '0' ));

	
foreach ( $categories2 as $category ) {

echo '<li class="helpdesk-category cat-sub"><span>' .	$category->name .'</span>';

$args = [
    'post_type' => 'helpdesk',
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
$wq = new WP_Query($args);
				
					if ($wq->have_posts()) : 
		while ($wq->have_posts()) : $wq->the_post();

		
        echo '<li><a href="'; the_permalink(); echo '">'; the_title();   echo '</a></li>';

        endwhile; 
					endif;
echo '</ul>';
	
	

}
	echo '<ul>';
	echo '</li>';
	echo '</ul>';
	echo '</ul>';
	echo '</li>';
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
						wp_reset_query();
						*/
						?>

                    </ul>    
						</div></div>
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