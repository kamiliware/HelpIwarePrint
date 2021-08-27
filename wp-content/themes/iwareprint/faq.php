<?php
/*
	Template Name: FAQ
*/
?>

<?php get_header(); ?>
    <?php
    global $post;
    if ( function_exists( 'pll_get_post_language' ) ):
        $lang = pll_get_post_language($post->ID);
    endif;
    ?>
	<section id="faq" class="content accordion">
        
        <div class="breadcrumbs">
            <a href="<?php echo esc_url(home_url('/')); ?>">Home</a>  /  <span><a href="<?php echo esc_url(home_url('/faq')); ?>">FAQ</a></span>
        </div>

        <div class="container">

            <h4 class="blue-header">FAQ</h4>
            <h1><?= pl_t('Wszystko o co chcesz zapytać', $lang) ?></h1>
            <span class="line"></span>

            <div class="faq">

                <?php if( have_rows('faq') ): ?>

                    <?php while( have_rows('faq') ): the_row();

                        // vars
                        $group = get_sub_field('nazwa_grupy');

                        ?>

                        <div class="topic">
                            <?php
                            $search  = array(' ', '?', 'ą', 'ć', 'ę', 'ł', 'ń', 'ó', 'ś', 'ż', 'ź');
                            $replace = array('-', '', 'a', 'c', 'e', 'l', 'n', 'o', 's', 'z', 'z');
                            $alinks = str_replace($search, $replace, $group); ?>
                            <h3 id="<?php echo $alinks; ?>"><?php echo $group; ?></h3>
                            <img src="<?php echo get_template_directory_uri(); ?>/img/arrow_down.png" alt="rozwiń">
                        </div>

                        <?php if( have_rows('content') ): ?>
                            <div class="subtopic">
                                <ul>
                                    <?php while( have_rows('content') ): the_row();

                                        // vars
                                        $title = get_sub_field('tytul');
                                        $content = get_sub_field('tresc');

                                        ?>


                                        <?php
                                        $searcha  = array(' ', '?', 'ą', 'ć', 'ę', 'ł', 'ń', 'ó', 'ś', 'ż', 'ź');
                                        $replacea = array('-', '', 'a', 'c', 'e', 'l', 'n', 'o', 's', 'z', 'z',);
                                        $alink = str_replace($searcha, $replacea, $title); ?>
                                        <li id='<?php echo $alink; ?>'>
                                            <span class="subtopic-title"><?php echo $title; ?></span>
                                            <span><?php echo $content; ?></span>
                                        </li>

                                    <?php endwhile; ?>
                                </ul>
                            </div>

                        <?php endif; ?>

                    <?php endwhile; ?>

                <?php endif; ?>

            </div>

			<div class="faq-helpdesk-box" style="margin-top: 50px;">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/icon_helpdesk.png" alt="helpdesk">
                    <h2>Baza wiedzy</h2>
                    <p>Nawigacja po systemie. Instrukcje techniczne</p>
                    <div class="box-arrow">
                        <a href="<?php echo esc_url(home_url('/baza-wiedzy')); ?>" class="box-arrow-link"><img src="<?php echo get_template_directory_uri(); ?>/img/arrow.png" alt="link"></a>
                    </div>
            </div>

        </div>

    </section>
    
<?php get_footer(); ?>