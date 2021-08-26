<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    
    <meta charset="<?php bloginfo('charset') ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <title><?php echo bloginfo('name'); ?></title> 
    
	<link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>">
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/bootstrap.css">
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,600,700,900&display=swap&subset=latin-ext" rel="stylesheet">
    <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/img/favicon-32x32.png" type="image/png">
	
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-138654119-2"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'UA-138654119-2');
	</script>
    <script type="text/javascript" src="<?= get_template_directory_uri(); ?>/js/jquery.min.js"></script>
    <script type="text/javascript" src="<?= get_template_directory_uri(); ?>/js/functions.js"></script>
	
<!-- 	<script type="text/javascript">
	$(document).ready(function(){
		$(".dropdown, .btn-group").hover(function(){
			var dropdownMenu = $(this).children(".dropdown-menu");
			if(dropdownMenu.is(":visible")){
				dropdownMenu.parent().toggleClass("open");
			}
		});
	});     
	</script> -->

	<?php wp_head(); ?>
</head>
<body>
    <div class="header-ph"></div>
    <!-- ####### Header ####### -->
    <header>
    
    <!-- Menu -->
    <nav class="d-flex align-items-center a-nav">
       
        <div class="container-fluid">
            <div class="row no-gutters justify-content-between align-items-center">

                <div class="col-7 col-lg-2 text-left">
                   
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="d-block">
                        <img src="<?php echo get_template_directory_uri(); ?>/img/logo.png" class="d-inline-block img-fluid logo" alt="logo">
                    </a>
                    
                </div>

                <div class="d-none d-lg-block col-lg-8">
                   
                    <ul class="nav a-menu">
                       
                        <?php
						   wp_nav_menu([
							 'menu'            => 'top',
							 'theme_location'  => 'top',
							 'container'       => 'div',
							 'container_id'    => 'bs4navbar',
							 'container_class' => '',
							 'menu_id'         => false,
							 'menu_class'      => 'nav',
							 'depth'           => 2,
							 'fallback_cb'     => 'bs4navwalker::fallback',
							 'walker'          => new bs4navwalker()
						   ]);
						?>
                        
                    </ul>
                
                </div>

                <div class="col-3 d-lg-none text-right">
                    <input id="toggle" type="checkbox">
					  <label for="toggle" id="toggle-label">
					  <span></span>
					  <span></span>
					  <span></span>
					  </label>
					  <div class="hamburger-menu-container mobile-menu">
						  <ul>
							<?php
							   wp_nav_menu([
								 'menu'            => 'top',
								 'theme_location'  => 'top',
								 'container'       => 'div',
								 'container_id'    => 'bs4navbar',
								 'container_class' => '',
								 'menu_id'         => false,
								 'menu_class'      => 'nav',
								 'depth'           => 2,
								 'fallback_cb'     => 'bs4navwalker::fallback',
								 'walker'          => new bs4navwalker()
							   ]);
							?>
						</ul>
            		</div>
                </div>
				
				<div class="col-2 text-right">
					<?php get_search_form(); ?>
                </div>
            
            </div>
        </div>
		
    </nav>
    
    </header>
    <!-- ####### End of Header ####### -->