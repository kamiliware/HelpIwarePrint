/* Tutaj dodaj swój kod JavaScipt.

Jeśli używasz jQuery, nie zapomnij ująć swój kod wewnątrz jQuery.ready() jak na przykładzie:

jQuery(document).ready(function( $ ){
    // Tutaj Twój kod
});

--

Jeśli chcesz podlinkować plik JavaScript, który znajduje się na innym serwerze
(np. <script src="https://przykladowa-domena.pl/twoj-plik.js"></script>), użyj opcji
"Dodaj wstawkę HTML", jako że jest to kod HTML linkujący do pliku JavaScript.

Koniec komentarza */
function youtubeLoader() {
    let div,
        n,
        v = document.getElementsByClassName("youtube-player");
    for (n = 0; n < v.length; n++) {
        div = document.createElement("div");
        if (v[n].innerHTML === "") {
            div.setAttribute("data-id", v[n].dataset.id);
            div.innerHTML = labnolThumb(v[n].dataset.id);
            div.onclick = labnolIframe;
            v[n].appendChild(div);
        }
    }
}
jQuery(document).ready(function($) {
    // const loadMorePosts = jQuery('#load-more-posts').text();
        const hash = window.location.hash;
        const anchor = $(hash);
        if (anchor.length > 0) {

            $(function () {
                $(anchor).closest(".topic").toggleClass('is-open');
            });

            $(function () {

                $(anchor).closest(".subtopic").prev().toggleClass('is-open');
                $(anchor).toggleClass('subtopic-active');
                $("html, body").animate({scrollTop: $(anchor).offset().top}, 1000);

            });
        }
        const newsUri = window.location.href;
        if ($('#roadmapWrapper').length && newsUri.search(/#\d{4}/) > -1) {
            const newsUriYear = newsUri.substr(newsUri.lastIndexOf("#")+1);
            if (newsUri.indexOf($('#roadmapWrapper a.active').attr('data-year')) <= -1) {
                $('#roadmapWrapper a').removeClass('active');
                $('.yearContainer').hide();
                $('#roadmapWrapper a[data-year=' + newsUriYear + ']').addClass('active');
                $('.yearContainer[data-year=' + newsUriYear + ']').show();
            }
        }
        $('.accordion div').each(function () {
            let list;
            let ten;
            if ($(this).hasClass('topic')) {
                list = 0;
            } else if ($(this).hasClass('subtopic')) {
                if (list === 0) {
                    ten = $(this).index();
                    list = 1;
                }
                if (list === 1) {
                    $(this).find('li').appendTo($('#faq .faq div').eq(ten).find('ul'));
                }
            }
        }).promise().done(function () {
            $('.accordion div').each(function () {
                if ($(this).hasClass('subtopic')) {
                    if ($(this).find('li').length === 0) {
                        $(this).remove();
                    }
                }
            })
        });

        // const loadMorePostsWrapper = $('#load-more-posts');
        // $(window).scroll(function () {
        //     if (loadMorePostsWrapper.length) {
        //         const indicatorPosition = loadMorePostsWrapper.offset().top - $(window).scrollTop();
        //         //console.log("indicators initial position:", indicatorPosition);
        //         const totalScroll = $(window).scrollTop();
        //         if ((indicatorPosition < 910) && (indicatorPosition > 900)) {
        //             curPage = page;
        //             loadMore();
        //         }
        //     }
        // });

        const loadMorePostsTrigger = $('#load-more-posts');
        const morePostsWrapper = $('#morePostsWrapper');
        let page = 1;
        if (loadMorePostsTrigger.not('.blocked')) {
            loadMorePostsTrigger.on('click', function(event) {
                event.preventDefault();
                page++;
                $.ajax({
                    type: "GET",
                    url: '../materialy-wideo/page/' + page,
                    beforeSend: function () {
                        morePostsWrapper.html('<div class="lds-roller"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>');
                    },
                    complete: function () {
                        morePostsWrapper.html('');
                    },
                    success: function (data) {
                        const $data = jQuery(data).find('.tutorial');
                        if ($data.length > 0) {
                            if (morePostsWrapper.html === "") {
                                morePostsWrapper.prepend('<div class="lds-roller"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>')
                            }
                            $('.tutorial-container').append($data);
                            youtubeLoader();
                            $data.css("display", "none");
                            $data.fadeIn("fast");
                        } else {
                            loadMorePostsTrigger.html('Nie ma więcej filmów').addClass('blocked');
                        }
                    },
                    error: function () {
                        loadMorePostsTrigger.html('Wystąpił problem z pobieraniem. Proszę spróbować ponownie');
                    }
                });
            });
        } else {
            loadMorePostsTrigger.on('click', function(event) {
                event.preventDefault();
            })
        }

        $('.accordion .topic').on('click', function (event) {
            event.preventDefault();
            $(this).toggleClass('is-open');
            // location.hash = $('h3', this).attr('id');
        });

        $('#roadmapWrapper a').on('click', function(event) {
            event.stopPropagation();
            if(!$(this).hasClass('active')) {
                $('#roadmapWrapper a').removeClass('active');
                $(this).addClass('active');
                $('.yearContainer').slideUp();
                $('.yearContainer[data-year=' + $(this).attr("data-year") + ']').slideDown();
            }
        })


        if ($('#list-months').length === 0) {
            $('.accordion .subtopic li').click(function (event) {
                event.stopPropagation();
                if ($(this).hasClass("subtopic-active")) {
                } else {
                    location.hash = $(this).attr('id');
                }
                $(this).toggleClass('subtopic-active');
            });
        }

        $('#helpdesk-modules li').click(function () {
            $(this).toggleClass('is-open');
        });

        $('#helpdesk-single li span').click(function () {
            $(this).toggleClass('is-open');
        });

        $('#helpdesk-category li span').click(function () {
            $(this).toggleClass('is-open');
        });

        $('#helpdesk-single li a').each(function () {
            if ($(this).attr('href') === window.location.href) {
                $(this).addClass('active');
            }

        }).promise().done(function () {
            $('.helpdesk-menu li.helpdesk-category').each(function () {
                if ($(this).find('a.active').length > 0) {
                    $(this).find('span').first().addClass('is-open');
                }

            });
        });

        $('#helpdesk-category li.helpdesk-category').each(function () {
            if ($(this).find('span.active').length > 0) {
                $(this).find('span').first().addClass('is-open');
            }

        });
})