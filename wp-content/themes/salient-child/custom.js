jQuery.noConflict();
jQuery(document).ready(function ($) {

    console.log('-fl4v10-');

    const width = $(window).width();

    //creo CTA home
    const btn_custom = `<a href="#" class="btn_custom">SCOPRI DI PIÙ</a>`;
    const btn_custom2 = `<a href="/veicoli-usati/" class="btn_custom">VEDI I VEICOLI USATI</a>`;
    const btn_custom3 = `<a href="/veicoli-usati/" class="btn_custom btn_mobile">VEDI I VEICOLI USATI</a>`;
    const hook_home = $('#section_hero .row-bg-overlay');
    const hook_menu = $('#header-outer ul.sf-menu li.megamenu.columns-6#menu-item-344 > ul.sub-menu');
    const hook_menuMobile = $('#slide-out-widget-area .mobile-only li.menu-item-344');
    hook_home.append(btn_custom);
    hook_menu.append(btn_custom2);
    hook_menuMobile.append(btn_custom3);

    //slider Homepage
    var $sliderHome = $('.homepage_slider .slider_galleria');
    if ($sliderHome.length) {

        $sliderHome.not('.slick-initialized').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false,
            fade: true,
            nextArrow: '<i class="fa-solid fa-chevron-right"></i>',
            prevArrow: '<i class="fa-solid fa-chevron-left"></i>',
            autoplay: true,
        });
    }



    //slider galleria SG
    var $sliderSg1 = $('.sg1 .slider_galleria');
    if ($sliderSg1.length) {
        var currentSlide1;
        var slidesCount1;
        var sliderCounter1 = document.createElement('div');
        sliderCounter1.classList.add('slider__counter1');

        var updateSliderCounter1 = function (slick, currentIndex) {
            currentSlide1 = slick.slickCurrentSlide() + 1;
            slidesCount1 = slick.slideCount;
            $(sliderCounter1).text(currentSlide1 + '/' + slidesCount1)
        };

        $sliderSg1.on('init', function (event, slick) {
            $sliderSg1.append(sliderCounter1);
            updateSliderCounter1(slick);
        });

        $sliderSg1.on('afterChange', function (event, slick, currentSlide1) {
            updateSliderCounter1(slick, currentSlide1);
        });

        $('.sg1 .slider_galleria').not('.slick-initialized').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: true,
            fade: true,
            nextArrow: '<i class="fa-solid fa-chevron-right"></i>',
            prevArrow: '<i class="fa-solid fa-chevron-left"></i>',

        });
    }

    var $sliderSg2 = $('.sg2 .slider_galleria');
    if ($sliderSg2.length) {
        var currentSlide2;
        var slidesCount2;
        var sliderCounter2 = document.createElement('div');
        sliderCounter2.classList.add('slider__counter2');

        var updateSliderCounter2 = function (slick, currentIndex) {
            currentSlide2 = slick.slickCurrentSlide() + 1;
            slidesCount2 = slick.slideCount;
            $(sliderCounter2).text(currentSlide2 + '/' + slidesCount2)
        };

        $sliderSg2.on('init', function (event, slick) {
            $sliderSg2.append(sliderCounter2);
            updateSliderCounter2(slick);
        });

        $sliderSg2.on('afterChange', function (event, slick, currentSlide2) {
            updateSliderCounter2(slick, currentSlide2);
        });

        $('.sg2 .slider_galleria').not('.slick-initialized').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: true,
            fade: true,
            nextArrow: '<i class="fa-solid fa-chevron-right"></i>',
            prevArrow: '<i class="fa-solid fa-chevron-left"></i>',

        });
    }

    var $sliderSg3 = $('.sg3 .slider_galleria');
    if ($sliderSg3.length) {
        var currentSlide3;
        var slidesCount3;
        var sliderCounter3 = document.createElement('div');
        sliderCounter3.classList.add('slider__counter3');

        var updateSliderCounter3 = function (slick, currentIndex) {
            currentSlide3 = slick.slickCurrentSlide() + 1;
            slidesCount3 = slick.slideCount;
            $(sliderCounter3).text(currentSlide3 + '/' + slidesCount3)
        };

        $sliderSg3.on('init', function (event, slick) {
            $sliderSg3.append(sliderCounter3);
            updateSliderCounter3(slick);
        });

        $sliderSg3.on('afterChange', function (event, slick, currentSlide3) {
            updateSliderCounter3(slick, currentSlide3);
        });

        $('.sg3 .slider_galleria').not('.slick-initialized').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: true,
            fade: true,
            nextArrow: '<i class="fa-solid fa-chevron-right"></i>',
            prevArrow: '<i class="fa-solid fa-chevron-left"></i>',

        });
    }

    var $sliderSg4 = $('.sg4 .slider_galleria');
    if ($sliderSg4.length) {
        var currentSlide4;
        var slidesCount4;
        var sliderCounter4 = document.createElement('div');
        sliderCounter4.classList.add('slider__counter4');

        var updateSliderCounter4 = function (slick, currentIndex) {
            currentSlide4 = slick.slickCurrentSlide() + 1;
            slidesCount4 = slick.slideCount;
            $(sliderCounter4).text(currentSlide4 + '/' + slidesCount4)
        };

        $sliderSg4.on('init', function (event, slick) {
            $sliderSg4.append(sliderCounter4);
            updateSliderCounter4(slick);
        });

        $sliderSg4.on('afterChange', function (event, slick, currentSlide4) {
            updateSliderCounter4(slick, currentSlide4);
        });

        $('.sg4 .slider_galleria').not('.slick-initialized').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: true,
            fade: true,
            nextArrow: '<i class="fa-solid fa-chevron-right"></i>',
            prevArrow: '<i class="fa-solid fa-chevron-left"></i>',

        });
    }

    var $sliderSg5 = $('.sg5 .slider_galleria');
    if ($sliderSg5.length) {
        var currentSlide5;
        var slidesCount5;
        var sliderCounter5 = document.createElement('div');
        sliderCounter5.classList.add('slider__counter5');

        var updateSliderCounter5 = function (slick, currentIndex) {
            currentSlide5 = slick.slickCurrentSlide() + 1;
            slidesCount5 = slick.slideCount;
            $(sliderCounter5).text(currentSlide5 + '/' + slidesCount5)
        };

        $sliderSg5.on('init', function (event, slick) {
            $sliderSg5.append(sliderCounter5);
            updateSliderCounter5(slick);
        });

        $sliderSg5.on('afterChange', function (event, slick, currentSlide5) {
            updateSliderCounter5(slick, currentSlide5);
        });

        $('.sg5 .slider_galleria').not('.slick-initialized').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: true,
            fade: true,
            nextArrow: '<i class="fa-solid fa-chevron-right"></i>',
            prevArrow: '<i class="fa-solid fa-chevron-left"></i>',

        });
    }

    //slider galleria prodotti
    var $sliderProd = $('.prod .slider_galleria');
    if ($sliderProd.length) {
        var currentSlideP;
        var slidesCountP;
        var sliderCounterP = document.createElement('div');
        sliderCounterP.classList.add('slider__counter1');

        var updateSliderCounterP = function (slick, currentIndex) {
            currentSlideP = slick.slickCurrentSlide() + 1;
            slidesCountP = slick.slideCount;
            $(sliderCounterP).text(currentSlideP + '/' + slidesCountP)
        };

        $sliderProd.on('init', function (event, slick) {
            $sliderProd.append(sliderCounterP);
            updateSliderCounterP(slick);
        });

        $sliderProd.on('afterChange', function (event, slick, currentSlideP) {
            updateSliderCounterP(slick, currentSlideP);
        });

        $sliderProd.not('.slick-initialized').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: true,
            fade: true,
            nextArrow: '<i class="fa-solid fa-chevron-right"></i>',
            prevArrow: '<i class="fa-solid fa-chevron-left"></i>',

        });
    }


    //switc allestimenti

    const menuBtn = $('section.menu h5'); //btn0
    const galleria = $('section.sezione_galleria'); //sg0
    const descrizione = $('section.desc'); //des0

    $('.btn1').addClass('active');
    $('.sg1').addClass('active');
    $('.des1').addClass('active');

    menuBtn.click(function () {
        let $this = $(this);

        menuBtn.removeClass('active');
        galleria.removeClass('active');
        descrizione.removeClass('active');

        $this.addClass('active');

        if ($this.hasClass('btn1')) {
            $('.sg1').addClass('active');
            $('.des1').addClass('active');
        }
        if ($this.hasClass('btn2')) {
            $('.sg2').addClass('active');
            $('.des2').addClass('active');
        }
        if ($this.hasClass('btn3')) {
            $('.sg3').addClass('active');
            $('.des3').addClass('active');
        }
        if ($this.hasClass('btn4')) {
            $('.sg4').addClass('active');
            $('.des4').addClass('active');
        }
        if ($this.hasClass('btn5')) {
            $('.sg5').addClass('active');
            $('.des5').addClass('active');
        }

    });

    //apri/chiudi filtri-mobile
    const windowsWidth = $(window).width();
    if (windowsWidth <= 691) {
        const boxFiltri = $('.box_filtri');
        const btnFiltri = `<p class="open-close-filtri">Apri/chiudi filtri</p>`;

        boxFiltri.before(btnFiltri);
        boxFiltri.addClass('close');

        const selBtnFiltri = $('.open-close-filtri');
        selBtnFiltri.click(function () {
            boxFiltri.toggleClass('close');
        });
    }

    //back to home - back to blog
    const contentBlog = $('.single-format-standard.single.single-post .container.main-content');
    const returnBtns = `<span class="return_btns">
                            <a href="https://autointernazionale.it/" class="b_home btn_standard">← Home</a>
                            <a href="/blog/" class="b_blog btn_standard">← Blog</a>
                        </span>`;

    contentBlog.after(returnBtns);

    //titolo dinamico trasporto nuovo usato
    const url = $(location).attr('href');
    if (url.indexOf("nuovo") >= 0) {
        let firstString = $('body.page-id-13 h1 > span:first-child span');
        let secondString = $('body.page-id-13 h1 > span:last-child span');
        // firstString.text('ALLESTIMENTI');
        // secondString.text('VEICOLI');
    }
    else if (url.indexOf("usato") >= 0) {
        let firstString = $('body.page-id-13 h1 > span:first-child span');
        let secondString = $('body.page-id-13 h1 > span:last-child span');
        // firstString.text('VEICOLI');
        // secondString.text('USATI');
    }

    //blocco hover e click del menu per i primi 3 secondi dal caricamento della pagina
    const menuTop = $('header#top');
    setTimeout(() => {
        menuTop.addClass('free');
    }, 500);

    //boxCategorie cambio scritta no_results
    /*boxCategorie = $('.box_categoria p:contains(Spiacente, nessun risultato)');
    if(boxCategorie.length) {
        boxCategorie.text('Coming soon - torna presto per vedere le novità!');
    }*/



    //menu toggle
    const deskMenuItems = $('#top li.megamenu > ul > li');
    deskMenuItems.on('mouseenter', function () {
        deskMenuItems.removeClass('attivo');
        $(this).addClass('attivo');
    });
    deskMenuItems.on('mouseleave', function () {
        deskMenuItems.removeClass('attivo');
    });


    function traduciPaginazione() {
        var $prev = $('.pagination .nav-previous a');
        if ($prev.length && $prev.text().trim() === 'Older posts') {
            $prev.text('Indietro');
        }

        var $next = $('.pagination .nav-next a');
        if ($next.length && $next.text().trim() === 'Newer posts') {
            $next.text('Avanti');
        }
    }

    // 1) Prima volta
    traduciPaginazione();

    // 2) Dopo ogni update AJAX di Search & Filter
    $(document).on('sf:ajaxfinish', '.searchandfilter', function () {
        traduciPaginazione();
    });

    // (opzionale) anche quando S&F inizializza
    $(document).on('sf:init', '.searchandfilter', function () {
        traduciPaginazione();
    });
});


jQuery.noConflict();
jQuery(document).ready(function ($) {

  const menuBtn = $('section.menu h5'); // .btn1, .btn2, ...
  const galleria = $('section.sezione_galleria'); // .sg1, .sg2, ...
  const descrizione = $('section.desc'); // .des1, .des2, ...

  const PARAM = 'var';

  function slugify(str) {
    return (str || '')
      .toString()
      .trim()
      .toLowerCase()
      .normalize('NFD').replace(/[\u0300-\u036f]/g, '') // rimuove accenti
      .replace(/[^a-z0-9\s-]/g, '')                    // solo safe chars
      .replace(/\s+/g, '-')                            // spazi -> -
      .replace(/-+/g, '-');                            // doppioni
  }

  function getParam(name) {
    const url = new URL(window.location.href);
    return url.searchParams.get(name);
  }

  function setParam(name, value, replace = false) {
    const url = new URL(window.location.href);
    url.searchParams.set(name, value);
    if (replace) {
      window.history.replaceState({}, '', url.toString());
    } else {
      window.history.pushState({}, '', url.toString());
    }
  }

  function activateByBtnClass(btnClass) {
    menuBtn.removeClass('active');
    galleria.removeClass('active');
    descrizione.removeClass('active');

    const $btn = $('.' + btnClass);
    $btn.addClass('active');

    const n = (btnClass.match(/^btn(\d+)$/) || [])[1];
    if (n) {
      $('.sg' + n).addClass('active');
      $('.des' + n).addClass('active');
    }
  }

  // 1) Mappa slug -> bottone
  const slugToBtnClass = {};
  menuBtn.each(function () {
    const $b = $(this);
    const txt = $b.text();
    const slug = slugify(txt);

    // prende la classe btnN
    const cls = ($b.attr('class') || '').split(/\s+/).find(c => /^btn\d+$/.test(c));
    if (slug && cls) slugToBtnClass[slug] = cls;
  });

  // 2) Al load: se c'è ?var=... simula click, altrimenti default prima e scrive URL
  const initial = getParam(PARAM);

  if (initial && slugToBtnClass[initial]) {
    $('.' + slugToBtnClass[initial]).trigger('click'); // IMPORTANT: simula click
  } else {
    // default: prima voce (btn1)
    const $first = $('.btn1');
    if ($first.length) {
      // imposta URL parlante della prima (senza "push" per non sporcare history al load)
      setParam(PARAM, slugify($first.text()), true);
      $first.trigger('click'); // così attivi anche roba fuori snippet
    } else if (menuBtn.first().length) {
      // fallback: il primo h5 se non esiste btn1
      setParam(PARAM, slugify(menuBtn.first().text()), true);
      menuBtn.first().trigger('click');
    }
  }

  // 3) Click: fai il tuo comportamento + aggiorna URL
  menuBtn.on('click', function (e) {
    const $this = $(this);

    // --- tua logica attuale (resa dinamica, senza 5 if) ---
    const btnClass = ($this.attr('class') || '').split(/\s+/).find(c => /^btn\d+$/.test(c));
    if (!btnClass) return;

    activateByBtnClass(btnClass);

    // URL parlante
    const slug = slugify($this.text());
    if (slug) setParam(PARAM, slug, false);
  });

});



document.addEventListener('click', function (e) {
  // solo mobile (adatta breakpoint)
  if (!window.matchMedia('(max-width: 991px)').matches) return;

  const a = e.target.closest('#slide-out-widget-area li.menu-item-has-children > a');
  if (!a) return;

  // IMPORTANT: blocca i listener del tema/plugin, ma NON bloccare l'azione di default (navigazione)
  e.stopPropagation();
  e.stopImmediatePropagation();
  // niente preventDefault()
}, true); // <-- capture phase