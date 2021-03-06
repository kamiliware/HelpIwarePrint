<!-- Footer -->
<section id="footer-links">
    <div class="container">
        <div class="row">

            <div class="col-md-3 webinars">
                <img src="<?php echo get_template_directory_uri(); ?>/img/icon_webinars.png" alt="webinars">
                <span class="line"></span>
                <h2>Najbliższe webinaria</h2>
                <p><?php the_field('webinaria', 'option'); ?></p>
                <a target="_blank" href="'http://webinaria.iwareprint.pl/'">Zapisz się</a>
            </div>

            <div class="col-md-3 outsourcing">
                <img src="<?php echo get_template_directory_uri(); ?>/img/icon_outsourcing.png" alt="outsourcing">
                <span class="line"></span>
                <h2>Dropshipping<br>Outsourcing</h2>
                <p>Strona dedykowana Modułowi Podzlecania. Zobacz pełną listę drukarni korzystających.</p>
                <a target="_blank" href="http://podzlecdruk.pl/">Przejdź</a>
            </div>

            <div class="col-md-3 creator">
                <img src="<?php echo get_template_directory_uri(); ?>/img/icon_creator.png" alt="creator">
                <span class="line"></span>
                <h2>Kreator wydruków</h2>
                <p>Strona dedykowana Modułowi Kreator. Poznaj możliwości graficzne kreatora.</p>
                <a target="_blank" href="http://kreatorwydrukow.pl/">Przejdź</a>
            </div>

            <div class="col-md-3 conference">
                <img src="<?php echo get_template_directory_uri(); ?>/img/icon_conference.png" alt="conference">
                <span class="line"></span>
                <h2>Najbliższa konferencja</h2>
                <p><?php the_field('konferencje', 'option'); ?></p>
                <a target="_blank" href="http://konferencja.podzlecdruk.pl/">Dołącz</a>
            </div>

        </div>
    </div>

</section>

<section id="newsletter">

    <div class="container">


        <h4>Newsletter</h4>
        <h3>Na bieżąco i z tematem pod reką.</h3>
        <span class="line"></span>

        <?php echo do_shortcode( '[optin-cat id=4941]' ); ?>

    </div>

</section>

<div id="footer">

    <div class="container">
        <div class="row">

            <div class="col-12 col-md-6 col-lg-3">
                <p>
                    <span>Cenimy sobie dobry kontakt</span>
                </p>
                <img src="https://iwareprint.pl/wp-content/uploads/2020/08/footer-logo.png" />
            </div>
            <div class="col-12 col-md-6 col-lg-1">
                <img src="https://iwareprint.pl/wp-content/uploads/2020/08/arrow.png" />
            </div>
            <div class="col-12 col-md-6 col-lg-2">
                <p>
                    <span>Konrad Skotniczny</span>
                    Customer Success Management
                    <a href="tel:48515023611">+48 515 023 611</a>
                    <a href="mailto:konrad.skotniczny@iware.pl">konrad.skotniczny@iware.pl</a>
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
                    <span>Dariusz Michalik</span>
                    Moduł Kreator Wydruków
                    <a href="tel:48571248337">+48 571 248 337</a>
                    <a href="mailto:dariusz.michalik@iware.pl">dariusz.michalik@iware.pl</a>
                </p>
            </div>
            <div class="col-12 col-md-6 col-lg-2">
                <p>
                    <span>Łukasz Głośny</span>
                    Sales Director
                    <a href="tel:48533025708">+48 533 025 708</a>
                    <a href="mailto:lukasz.glosny@iware.pl">lukasz.glosny@iware.pl</a>
                </p>
            </div>
            <div class="col-12 col-lg-3 f-middle">
                <a target="_blank" href="https://calendly.com/iware-print-sprzedaz" class="f-btn">Rezerwuj spotkanie ON-LINE</a>
            </div>
            <div class="col-12 col-lg-9">
                <div class="grey-line"></div>
            </div>

            <div class="col-12 col-md-6 col-lg-2">
                <h4>
                    Pomoc techniczna
                </h4>
                <a target="_blank" href="https://help.iwareprint.pl/baza-wiedzy/">Baza wiedzy</a>
                <a target="_blank" href="https://help.iwareprint.pl/tutoriale/">Filmy instruktażowe</a>
                <a target="_blank" href="https://help.iwareprint.pl/aktualizacje/">Aktualizacje iP</a>
            </div>
            <div class="col-12 col-md-6 col-lg-2">
                <h4>
                    Serwisy iwarePrint
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
                    Moduły
                </h4>
                <a href="https://iwareprint.pl/e-commerce/">E-commerce</a>
                <a href="https://iwareprint.pl/podzlecanie/">Podzlecanie</a>
                <a href="https://iwareprint.pl/produkcja/">Produkcja</a>
                <a href="https://iwareprint.pl/handlowiec/">Handlowiec</a>
                <a href="https://iwareprint.pl/reseller/">Reseller</a>
                <a href="https://iwareprint.pl/preflight/">Preflight</a>
                <a href="https://iwareprint.pl/kreator/">Kreator</a>
            </div>
            <div class="col-12 col-md-6 col-lg-2">
                <h4>
                    IwarePrint
                </h4>
                <a href="https://iwareprint.pl/korzysci/">Korzyści</a>
                <a href="https://iwareprint.pl/cechy/">Cechy</a>
                <a target="_blank" href="https://help.iwareprint.pl/faq/">FAQ</a>
                <a href="https://iwareprint.pl/cennik/">Cennik</a>
            </div>
            <div class="col-12 col-lg-4">
                <div class="f-socials">
                    <a target="_blank" href="https://www.youtube.com/channel/UCVsUQgfGDXLh47gT5U2yZ7Q"><img src="https://iwareprint.pl/wp-content/uploads/2020/08/youtube.png" /></a>
                    <a target="_blank" href="https://www.facebook.com/iwareprint"><img src="https://iwareprint.pl/wp-content/uploads/2020/08/facebook.png" /></a>
                    <a target="_blank" href="https://twitter.com/iwareprint"><img src="https://iwareprint.pl/wp-content/uploads/2020/08/twitter.png" /></a>
                </div>
                <div class="f-copy">
                    <p>
                        Copyright © 2021 Iware Software House Sp. z o.o.
                    </p>
                </div>
                <div class="contact-info" style="font-size: 1rem; color: #fff; text-align: right;">
                    IWARE Sp. z o.o.<br/>
                    Internet Software House<br/>
                    ul. Armii Krajowej 6A lok.2, 50-541 Wrocław<br/>
                    NIP: 894 300 73 04
                </div>
                <div class="f-links">
                    <a href="https://iwareprint.pl/regulamin/">Regulamin serwisu iwarePrint</a><br>
                    <a href="https://iwareprint.pl/wp-content/uploads/2020/12/2020-12-04-polityka-prywatnos%CC%81ci-iwareprint.pl-RODO-v2.pdf">Polityka Prywatności</a>
                </div>
            </div>

        </div>
    </div>

</div>
<a href="#" id="bottom-contact-trigger">
    <i class="fa fa-phone"></i>
</a>
<div id="bottom-contact">

    <div class="container-fluid f-banners d-none d-lg-block">
        <div class="row">

            <div class="col-12 col-lg-4 left">
                <div class="heading">
                    <h5>
                        Umów się na prezentację systemu
                    </h5>
                </div>
                <div class="call">
                    <a target="_blank" href="https://calendly.com/iware-print-sprzedaz/" class="f-btn">Zarezerwuj</a>
                </div>
            </div>
            <div class="col-12 col-lg-8 right">
                <div class="heading">
                    <h5>
                        Szybkie pytanie, szybka odpowiedź, szybki kontakt.<br>
                        <span>+48 533 025 708 (w sprawach sprzedażowych)</span>
                    </h5>
                </div>
                <div class="right-call">
                    <a href="tel:+48533025708" class="f-btn">Dzwonię</a>
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
    $('#bottom-contact-trigger').on('click', function(e) {
        e.preventDefault();
        $('#bottom-contact').slideToggle(250);
        $(this).toggleClass('active');
        $('#fc_frame').toggleClass('active');
    })
    //     var prevScrollpos = window.pageYOffset;
    //     window.onscroll = function() {
    //         var currentScrollPos = window.pageYOffset;
    //         if (prevScrollpos > currentScrollPos) {
    //             document.getElementById("bottom-contact").style.bottom = "-500px";
    //         } else {
    //             document.getElementById("bottom-contact").style.bottom = "0";
    //         }
    //         prevScrollpos = currentScrollPos;
    //     }
</script>

<script src="<?php echo get_template_directory_uri(); ?>/js/bootstrap.bundle.min.js"></script>

<?php wp_footer(); ?>

</body>
</html>