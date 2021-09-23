<!-- Footer -->
<section id="footer-links">
    <?php
    global $post;
    if ( function_exists( 'pll_get_post_language' ) ):
        $lang = pll_get_post_language($post->ID);
    endif;
    ?>
    <div class="container">
        <div class="row">

            <div class="col-md-3 webinars">
                <img src="<?php echo get_template_directory_uri(); ?>/img/icon_webinars.png" alt="webinars">
                <span class="line"></span>
                <h2><?= pl_t('Najbliższe webinaria', $lang) ?></h2>
                <p><?php the_field('webinaria', 'option'); ?></p>
                <a target="_blank" href="<?= pl_t('http://webinaria.iwareprint.pl/', $lang) ?>"><?= pl_t('Zapisz się', $lang) ?></a>
            </div>

            <div class="col-md-3 outsourcing">
                <img src="<?php echo get_template_directory_uri(); ?>/img/icon_outsourcing.png" alt="outsourcing">
                <span class="line"></span>
                <h2>Dropshipping<br>Outsourcing</h2>
                <p><?= pl_t('Strona dedykowana Modułowi Podzlecania. Zobacz pełną listę drukarni korzystających.', $lang) ?></p>
                <a target="_blank" href="http://podzlecdruk.pl/"><?= pl_t('Przejdź', $lang) ?></a>
            </div>

            <div class="col-md-3 creator">
                <img src="<?php echo get_template_directory_uri(); ?>/img/icon_creator.png" alt="creator">
                <span class="line"></span>
                <h2><?= pl_t('Kreator wydruków', $lang) ?></h2>
                <p><?= pl_t('Strona dedykowana Modułowi Kreator. Poznaj możliwości graficzne kreatora.', $lang) ?></p>
                <a target="_blank" href="http://kreatorwydrukow.pl/"><?= pl_t('Przejdź', $lang) ?></a>
            </div>

            <div class="col-md-3 conference">
                <img src="<?php echo get_template_directory_uri(); ?>/img/icon_conference.png" alt="conference">
                <span class="line"></span>
                <h2><?= pl_t('Najbliższa konferencja', $lang) ?></h2>
                <p><?php the_field('konferencje', 'option'); ?></p>
                <a target="_blank" href="http://konferencja.podzlecdruk.pl/"><?= pl_t('Dołącz', $lang) ?></a>
            </div>

        </div>
    </div>

</section>

<section id="newsletter">

    <div class="container">


        <h4>Newsletter</h4>
        <h3><?= pl_t('Na bieżąco i z tematem pod reką.', $lang) ?></h3>
        <span class="line"></span>

        <?php echo do_shortcode( '[optin-cat id=4941]' ); ?>

    </div>

</section>

<div id="footer">

    <div class="container">
        <div class="row">

            <div class="col-12 col-md-6 col-lg-3">
                <p>
                    <span><?= pl_t('Cenimy sobie dobry kontakt', $lang) ?></span>
                </p>
                <img src="https://iwareprint.pl/wp-content/uploads/2020/08/footer-logo.png" />
            </div>
            <div class="col-12 col-md-6 col-lg-1">
                <img src="https://iwareprint.pl/wp-content/uploads/2020/08/arrow.png" />
            </div>
            <div class="col-12 col-md-6 col-lg-2">
                <p>
                    <span>Team: Customer Success Management</span>
                    <a href="tel:48515023611">+48 515 023 611</a>
                    <a href="mailto:bok@iwareprint.pl">bok@iwareprint.pl</a>
                </p>
            </div>
            <div class="col-12 col-md-6 col-lg-2">
                <p>
                    <span>Daniel Rychlik</span>
                    Key Account Specialist
                    <a href="tel:48783778772">+48 783 778 772</a>
                    <a href="mailto:daniel.rychlik@iware.pl">daniel.rychlik@iware.pl</a>
                </p>
            </div>
            <div class="col-12 col-md-6 col-lg-2">
                <p>
                    <span>Adam Kowalczyk</span>
                    Key Account Specialist
                    <a href="tel:48573998469">+48 573 998 469</a>
                    <a href="mailto:adam.kowalczyk@iware.pl">adam.kowalczyk@iware.pl</a>
                </p>
            </div>
            <div class="col-12 col-md-6 col-lg-2">
                <p>
                    <span>Dariusz Michalik</span>
                    Moduł Kreator Wydruków
                    <a href="tel:48571248337">+48 571 248 337</a>
                    <a href="mailto:dariusz.michalik@iware.pl">dariusz.michalik@iware.pl</a>
                </p>
            </div>

            <div class="col-12 col-lg-3 f-middle">
                <a target="_blank" href="https://calendly.com/iware-print-sprzedaz" class="f-btn"><?= pl_t('Rezerwuj spotkanie ON-LINE', $lang) ?></a>
            </div>
            <div class="col-12 col-lg-9">
                <div class="grey-line"></div>
            </div>

            <div class="col-12 col-md-6 col-lg-2">
                <h4>
                    <?= pl_t('Pomoc techniczna', $lang) ?>
                </h4>
                <a target="_blank" href="https://help.iwareprint.pl/baza-wiedzy/"><?= pl_t('Baza wiedzy', $lang) ?></a>
                <a target="_blank" href="https://help.iwareprint.pl/tutoriale/"><?= pl_t('Filmy instruktażowe', $lang) ?></a>
                <a target="_blank" href="https://help.iwareprint.pl/aktualizacje/"><?= pl_t('Aktualizacje iP', $lang) ?></a>
            </div>
            <div class="col-12 col-md-6 col-lg-2">
                <h4>
                    <?= pl_t('Serwisy iwarePrint', $lang) ?>
                </h4>
                <a target="_blank" href="https://iwareprint.pl/">iwareprint.pl</a>
                <a target="_blank" href="https://help.iwareprint.pl/">help.iwareprint.pl</a>
                <a target="_blank" href="https://podzlecdruk.pl/">podzlecdruk.pl</a>
                <a target="_blank" href="https://kreatorwydrukow.pl/">kreatorwydrukow.pl</a>
                <a target="_blank" href="https://help.iwareprint.pl/blog/">help.iwareprint.pl/blog</a>
                <a target="_blank" href="http://webinaria.iwareprint.pl/">webinaria.iwareprint.pl</a>
                <a target="_blank" href="https://iwareprint.pl/konferencja2021">iwareprint.pl/konferencja2021</a>
            </div>
            <div class="col-12 col-md-6 col-lg-2">
                <h4>
                    <?= pl_t('Moduły', $lang) ?>
                </h4>
                <a href="https://iwareprint.pl/e-commerce/">E-commerce</a>
                <a href="https://iwareprint.pl/podzlecanie/"><?= pl_t('Podzlecanie', $lang) ?></a>
                <a href="https://iwareprint.pl/produkcja/"><?= pl_t('Produkcja', $lang) ?></a>
                <a href="https://iwareprint.pl/handlowiec/"><?= pl_t('Handlowiec', $lang) ?></a>
                <a href="https://iwareprint.pl/reseller/"><?= pl_t('Reseller', $lang) ?></a>
                <a href="https://iwareprint.pl/preflight/"><?= pl_t('Preflight', $lang) ?></a>
                <a href="https://iwareprint.pl/kreator/"><?= pl_t('Kreator', $lang) ?></a>
            </div>
            <div class="col-12 col-md-6 col-lg-2">
                <h4>
                    iwarePrint
                </h4>
                <a href="https://iwareprint.pl/korzysci/"><?= pl_t('Korzyści', $lang) ?></a>
                <a href="https://iwareprint.pl/cechy/"><?= pl_t('Cechy', $lang) ?></a>
                <a target="_blank" href="https://help.iwareprint.pl/faq/">FAQ</a>
                <a href="https://iwareprint.pl/cennik/"><?= pl_t('Cennik', $lang) ?></a>
            </div>
            <div class="col-12 col-lg-4">
                <div class="f-socials">
                    <a target="_blank" href="https://www.youtube.com/channel/UCVsUQgfGDXLh47gT5U2yZ7Q"><img src="https://iwareprint.pl/wp-content/uploads/2020/08/youtube.png" /></a>
                    <a target="_blank" href="https://www.facebook.com/iwareprint"><img src="https://iwareprint.pl/wp-content/uploads/2020/08/facebook.png" /></a>
                    <a target="_blank" href="https://twitter.com/iwareprint"><img src="https://iwareprint.pl/wp-content/uploads/2020/08/twitter.png" /></a>
                </div>
                <div class="f-copy">
                    <p>
                        Copyright © 2020 Iware Software House Sp. z o.o.<br>
                        <?= pl_t('Korzystając z tej witryny, akceptujesz zobowiązania wynikające z postanowień Regulaminu ogólnego iwarePrint. Używamy plików cookies, celem ułatwienia korzystania z serwisu. Kontynuowanie przeglądania naszej strony oznacza zgodę na ich użycie.', $lang) ?>
                    </p>
                </div>
                <div class="f-links">
                    <a href="https://iwareprint.pl/regulamin/"><?= pl_t('Regulamin serwisu iwarePrint', $lang) ?></a><br>
                    <a href="https://iwareprint.pl/wp-content/uploads/2020/12/2020-12-04-polityka-prywatnos%CC%81ci-iwareprint.pl-RODO-v2.pdf"><?= pl_t('Polityka Prywatności', $lang) ?></a>
                </div>
            </div>

        </div>
    </div>

</div>

<div id="bottom-contact">

    <div class="container-fluid f-banners d-none d-lg-block">
        <div class="row">

            <div class="col-12 col-lg-4 left">
                <div class="heading">
                    <h5>
                        <?= pl_t('Umów się na prezentację systemu', $lang) ?>
                    </h5>
                </div>
                <div class="call">
                    <a target="_blank" href="https://calendly.com/iware-print-sprzedaz/" class="f-btn"><?= pl_t('Zarezerwuj', $lang) ?></a>
                </div>
            </div>
            <div class="col-12 col-lg-8 right">
                <div class="heading">
                    <h5>
                        <?= pl_t('Szybkie pytanie, szybka odpowiedź, szybki kontakt.', $lang) ?><br>
                        <span>+48 533 025 708 (<?= pl_t('w sprawach sprzedażowych', $lang) ?>)</span>
                    </h5>
                </div>
                <div class="right-call">
                    <a href="tel:+48533025708" class="f-btn"><?= pl_t('Dzwonię', $lang) ?></a>
                </div>
            </div>

        </div>
    </div>

    <div class="container-fluid f-banners d-lg-none">
        <div class="row">

            <div class="col-12 left">
                <div class="call" style="margin: 15px auto;">
                    <a target="_blank" href="https://calendly.com/iware-print-sprzedaz/" class="f-btn" style="margin: 0;">Umów się na prezentację systemu</a>
                </div>
            </div>

        </div>
    </div>

</div>

<script>

    var prevScrollpos = window.pageYOffset;
    window.onscroll = function() {
        var currentScrollPos = window.pageYOffset;
        if (prevScrollpos > currentScrollPos) {
            document.getElementById("bottom-contact").style.bottom = "-500px";
        } else {
            document.getElementById("bottom-contact").style.bottom = "0";
        }
        prevScrollpos = currentScrollPos;
    }
</script>

<script src="<?php echo get_template_directory_uri(); ?>/js/bootstrap.bundle.min.js"></script>

<?php wp_footer(); ?>

</body>
</html>