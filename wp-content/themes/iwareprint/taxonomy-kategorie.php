<?php
/*
	Template Name: Category - helpdesk
*/
?>

<?php get_header(); ?>

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
          ORDER BY post_date DESC";
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
$taxonomyName = "kategorie";
//This gets top layer terms only.  This is done by setting parent to 0.  
$parent_terms = get_terms( $taxonomyName, array( 'parent' => 0, 'orderby' => 'slug', 'hide_empty' => false ) );   



						
						$terms = get_the_terms( $post->ID , 'kategorie' );
						
						foreach ( $terms as $term ) {

						$term_link = get_term_link( $term );
						$tid = $term->term_id;
						if ( is_wp_error( $term_link ) ) {
							continue;
						}
						
							
							
							
							
							
				
							
							
						?>
						
						
						<?php
$term = get_queried_object();
$parent = ( isset( $term->parent ) ) ? get_term_by( 'id', $term->parent, 'kategorie' ) : false;
?>

<?php if( $parent ): ?>
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
    $terms = get_terms( $taxonomyName, array( 'parent' => $pterm->term_id, 'orderby' => 'slug', 'hide_empty' => false ) );
												$xy_id = $pterm->term_id;
												if($xy_id==$case_study_id){
    foreach ( $terms as $term ) { ?>
		<div class="category-single">
						
						<div class="thumbnail">
							<h5><?php echo $term->name; ?></h5>
							<a href="<?php echo get_term_link( $term ) ?>" class="box-arrow-link"><img src="<?php echo get_template_directory_uri(); ?>/img/arrow.png" alt="link"></a>
						</div>
						
					</div>

					<?php
          
    }
												}
}
						
						
						
						
						
					}else{
						$args = [
    'post_type' => 'helpdesk',
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
							<a href="<?php the_permalink(); ?>" class="box-arrow-link"><img src="<?php echo get_template_directory_uri(); ?>/img/arrow.png" alt="link"></a>
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




