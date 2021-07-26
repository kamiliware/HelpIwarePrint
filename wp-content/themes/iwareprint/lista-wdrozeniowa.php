<?php
/*
	Template Name: Lista wdrożeniowa
*/
?>

<?php get_header(); ?>

    <section id="list-top">

        <div class="breadcrumbs">
            <a href="<?php echo esc_url(home_url('/')); ?>">Home</a>  /  <span><a href="<?php echo esc_url(home_url('/aktualizacje')); ?>" style="color:#fff;">Aktualizacje</a></span>
        </div>

        <div class="container">

            <div class="list-top">

                <h4 class="white-header">Aktualizacje</h4>
                <h1>Pracujemy na okrągło</h1>
                <span class="line"></span>
                <h2>5 najnowszych aktualizacji</h2>

                <div class="new">
                    <ul>

                        <?php

                        $args = array(
                            'post_type'	   => 'aktualizacje',
                            'posts_per_page' => 5,
                        );

                        $my_query = new WP_Query($args);

                        while ($my_query->have_posts()):
                            $my_query->the_post();
                            $do_not_duplicate = $post->ID;

                            ?>

                            <li>
                                <span><?= get_the_date( 'Y-m-d' ); ?></span>
                                <h3 style="color: #333;padding: 0 0 10px;"><?= the_title(); ?></h3>
                                <?php
                                $categories = get_the_category();
                                if ( ! empty( $categories ) ) {
                                    echo '<h4 style="font-size: 20px;color: #f21559;">' . esc_html( $categories[0]->name ) . '</h4>';
                                }
                                ?>
                                <p style="font-size: 16px;line-height: 1.4;">
                                    <?= the_content();?>
                                </p>
                                <a style="color: #0099fe;" href="<?= get_permalink($post->ID) ?>" class="read-link">Czytaj więcej</a>
                            </li>

                        <?php endwhile; ?>

                    </ul>
                </div>

            </div>

        </div>

    </section>

<!--    <section id="list-months" class="accordion">-->
<!---->
<!--        <div class="container">-->
<!--            --><?php
////            global $more; $more = false; # some wordpress wtf logic
//            $posts = get_posts(array(
//                'post_type' => 'aktualizacje',
//                'orderby' => 'date',
//                'order' => 'desc',
//                'posts_per_page'   => 999999,
//            ));
//            $x=0;
//            $month = '';
////            $year = '';
////            $years = [];
//            $miesiace = array('','Styczeń','Luty','Marzec','Kwiecień','Maj','Czerwiec','Lipiec','Sierpień','Wrzesień','Październik','Listopad','Grudzień');
//            foreach($posts as $post):
//            $x+=1;
//            setup_postdata($post); //enables the_title() etc. without specifying a post ID
//            $postMonth =  date('FY',strtotime($post->post_date));
////            $postYear = date('Y',strtotime($post->post_date));
////            if (!in_array($postYear, $years)):
////                $years[] = $postYear;
////            endif;
//
//            if($month!=$postMonth){
//            if($x>1) {
//                echo '</ul></div>';
//            }
//
//            $group = $miesiace[date('n',strtotime($post->post_date))]. ' ' .date('Y',strtotime($post->post_date));
//
//            $search  = array(' ', '?', 'ą', 'ć', 'ę', 'ł', 'ń', 'ó', 'ś', 'ż', 'ź');
//            $replace = array('-', '', 'a', 'c', 'e', 'l', 'n', 'o', 's', 'z', 'z');
//            $alinks = str_replace($search, $replace, $group);
//
//
//
//
//            echo '<div class="topic"><h3 id="'.$alinks.'">'.$group.'<img src="'.get_template_directory_uri().'/img/arrow_down.png" alt="rozwiń">
//            </div>';
//
//            $month =$postMonth;
//            ?>
<!--            <div class="subtopic sub-aktu">-->
<!--                <ul>-->
<!--                    --><?php
//                    } ?>
<!---->
<!---->
<!--                    <li>-->
<!--                            <span class="subtopic-title">-->
<!--                            <em>--><?php //echo get_the_date( 'Y-m-d' ); ?><!--</em>-->
<!--                                <h3 style="color: #333;padding: 0 0 10px;">--><?//= the_title(); ?><!--</h3>-->
<!--                                --><?php
//                                $categories = get_the_category();
//                                if ( ! empty( $categories ) ) {
//                                    echo '<h4 style="font-size: 20px;color: #f21559;">' . esc_html( $categories[0]->name ) . '</h4>';
//                                }
//                                ?>
<!--                                <p style="font-size: 16px;line-height: 1.4;">-->
<!--                                    --><?//= the_content();?>
<!--                                </p>-->
<!--                                <a style="color: #0099fe;" href="--><?//= get_permalink($post->ID) ?><!--" class="read-link">Czytaj więcej</a>-->
<!--                            </span>-->
<!---->
<!--                    </li>-->
<!---->
<!---->
<!--                    --><?php //endforeach; ?>
<!--                </ul>-->
<!--            </div>-->
<!---->
<!--        </div>-->
<!---->
<!--    </section>-->
    <section id="yearRoadmap">
        <div class="container">
            <h2>Pozostałe aktualizacje</h2>
            <?php
                $posts = get_posts(array(
                            'post_type' => 'aktualizacje',
                            'orderby' => 'date',
                            'order' => 'desc',
                            'numberposts' => -1
                        ));
                $postArrangedByYear = [];
                $currYear = date('Y');
                foreach($posts as $post):
                    $postArrangedByYear[date('Y',strtotime($post->post_date))][date('F',strtotime($post->post_date))][] = $post;
                endforeach;
            if (!empty($postArrangedByYear)):?>
            <div id="roadmapWrapper">
                <ul>
                    <?php foreach($postArrangedByYear as $key => $year): ?>
                        <li>
                            <a data-year="<?= $key ?>" href="#<?= $key ?>" <?php if ($currYear === strval($key)): ?> class="active" <?php endif;?>>
                                <span></span>
                                <?= $key ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <?php endif; ?>
        </div>
    </section>
    <section id="list-months" class="accordion">
        <div class="container">
            <?php
            foreach($postArrangedByYear as $key => $orderedByYear):?>

                <div class="yearContainer" data-year="<?= $key?>" <?php if ($currYear !== strval($key)): ?>style="display: none"<?php endif;?>>
                    <?php foreach ($orderedByYear as $keyInner => $orderedByMonth):?>
                    <div class="topic"><h3 id=""><?= ucfirst(monthTranslator($keyInner) . ' ' . $key) ?><img src="<?= get_template_directory_uri()?>/img/arrow_down.png" alt="rozwiń" /></div>
                        <div class="subtopic sub-aktu">
                            <ul>
                            <?php foreach ($orderedByMonth as $post): ?>
                                <li>
                                        <span class="subtopic-title">
                                        <em><?php echo get_the_date( 'Y-m-d' ); ?></em>
                                            <h3 style="color: #333;padding: 0 0 10px;"><?= the_title(); ?></h3>
                                            <?php
                                            $categories = get_the_category();
                                            if ( ! empty( $categories ) ) {
                                                echo '<h4 style="font-size: 20px;color: #f21559;">' . esc_html( $categories[0]->name ) . '</h4>';
                                            }
                                            ?>
                                            <p style="font-size: 16px;line-height: 1.4;">
                                                <?= the_content();?>
                                            </p>
                                            <a style="color: #0099fe;" href="<?= get_permalink() ?>" class="read-link">Czytaj więcej</a>
                                        </span>
                                </li>
                            <?php endforeach; ?>
                            </ul>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endforeach; ?>
        </div>
    </section>

    <section id="tutorials">

        <div class="container">

            <h4>Tutoriale video</h4>
            <h3>Mamy dla Ciebie sporo wiedzy!</h3>
            <span class="line"></span>

            <div class="row">
                <?php

                $args = array(
                    'post_type'	   => 'tutoriale',
                    'posts_per_page' => 3,
                );

                $my_query = new WP_Query($args);
                while ($my_query->have_posts()):
                    $my_query->the_post();
                    $do_not_duplicate = $post->ID;

                    ?>
                    <div class="col-md-4 tutorial">
                        <div class="thumbnail">
                            <div class="youtube-player" data-id="<?php the_field('filmid'); ?>"></div>
                        </div>
                        <h5><?php the_title();?></h5>
                    </div>

                <?php endwhile; ?>
                <script type="text/javascript" src="<?= get_template_directory_uri()?>/js/youtubeHandler.js"></script>

            </div>

            <a class="button" href="<?php echo esc_url(home_url('/tutorials')); ?>">Zobacz wszystkie</a>

        </div>

    </section>

<?php get_footer(); ?>