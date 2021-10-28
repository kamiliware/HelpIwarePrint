<!doctype html>
<html <?php language_attributes(); ?>>
<head>

    <meta charset="<?php bloginfo('charset') ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title><?php the_title(); if (!empty(get_queried_object()->name)): echo get_queried_object()->name; endif; ?> - <?php echo bloginfo('name'); ?></title>

    <!-- 	<link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>"> -->
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/bootstrap.css">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,600,700,900&display=swap&subset=latin-ext" rel="stylesheet">
    <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/img/favicon-32x32.png" type="image/png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-138654119-2"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-138654119-2');
    </script>
    <script type="text/javascript" src="<?= get_template_directory_uri(); ?>/js/jquery.min.js"></script>

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
<header id="mainHeader">

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
                            'walker'          => new bs4navwalker(),
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
    <script type='text/javascript'>
        $(window).on('load', function () {
            headerHeight = $('#mainHeader').innerHeight();
            if ($('#wpadminbar').length) {
                adminBarHeight = $('#wpadminbar').innerHeight();
                $('#mainHeader').css('transform', 'translateY('+ adminBarHeight +'px)');
                $(".header-ph").css('height', headerHeight + 'px');
            } else {
                $(".header-ph").css('height', headerHeight + 'px');
            }
            var fc_JS=document.createElement('script');
            fc_JS.type='text/javascript';
            fc_JS.src='https://wchat.eu.freshchat.com/js/widget.js?t='+Date.now();
            (document.body?document.body:document.getElementsByTagName('head')[0]).appendChild(fc_JS);
            window.fcSettings = { token:'7a74cec9-9eeb-4940-9513-426f1ddbe00b', host : 'https://wchat.eu.freshchat.com', siteId: 'help.iwareprint.pl', locale: 'pl'};
        })
        $(window).on('resize', function() {
            headerHeight = $('#mainHeader').innerHeight();
            if ($('#wpadminbar').length) {
                adminBarHeight = $('#wpadminbar').innerHeight();
                setTimeout(function() {
                    $('#mainHeader').css('transform', 'translateY('+ adminBarHeight +'px)');
                    $(".header-ph").css('height', headerHeight + 'px');
                }, 250)
            } else {
                setTimeout(function() {
                    $(".header-ph").css('height', headerHeight + 'px');
                }, 250)
            }
        })
    </script>
</header>
<!-- ####### End of Header ####### -->