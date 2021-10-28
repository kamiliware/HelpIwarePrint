<?php
/*
	Template Name: FAQ
*/
?>

<?php get_header(); ?>

    <section id="faq" class="content accordion">

        <div class="breadcrumbs">
            <a href="<?php echo esc_url(home_url('/')); ?>">Home</a>  /  <span><a href="<?php echo esc_url(home_url('/faq')); ?>">FAQ</a></span>
        </div>

        <div class="container">

            <h4 class="blue-header">FAQ</h4>
            <h1>Wszystko o co chcesz zapytać</h1>
            <span class="line"></span>

            <div class="faq">

                <?php if( have_rows('faq') ): ?>

                    <?php while( have_rows('faq') ): the_row();

                        // vars
                        $group = get_sub_field('nazwa_grupy');

                        ?>

                        <aside class="topic">
                            <?php
                            $search  = array(' ', '(', ')', '?',  'ą', 'ć', 'ę', 'ł', 'ń', 'ó', 'ś', 'ż', 'ź');
                            $replace = array('-', '-', '-', '', 'a', 'c', 'e', 'l', 'n', 'o', 's', 'z', 'z');
                            $alinks = strtolower(str_replace($search, $replace, $group)); ?>
                            <div data-href="#<?php echo rtrim($alinks, '-'); ?>" class="inside">
                                <h3 id="<?php echo rtrim($alinks, '-'); ?>"><?php echo $group; ?></h3>
                                <img src="<?php echo get_template_directory_uri(); ?>/img/arrow_down.png" alt="rozwiń">
                            </div>
                            <?php if( have_rows('content') ): ?>
                                <aside class="subtopic">
                                    <ul>
                                        <?php while( have_rows('content') ): the_row();

                                            // vars
                                            $title = get_sub_field('tytul');
                                            $content = get_sub_field('tresc');
                                            $searcha  = array(' ', '(', ')', '?', 'ą', 'ć', 'ę', 'ł', 'ń', 'ó', 'ś', 'ż', 'ź');
                                            $replacea = array('-', '-', '-', '', 'a', 'c', 'e', 'l', 'n', 'o', 's', 'z', 'z',);
                                            $alink = strtolower(str_replace($searcha, $replacea, $title)); ?>
                                            <li id="<?php echo rtrim($alink, '-');?>" data-href="#<?php echo rtrim($alink, '-'); ?>">
                                                <div class="subtopic-title"><?php echo $title; ?></div>
                                                <div class="subtopic-content"><?php echo $content; ?></div>
                                            </li>

                                        <?php endwhile; ?>
                                    </ul>
                                </aside>

                            <?php endif; ?>
                        </aside>

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