/**
 * Global variables
 */
"use strict";

var userAgent = navigator.userAgent.toLowerCase(),
    initialDate = new Date(),

    $document = $(document),
    $window = $(window),
    $html = $("html"),

    isDesktop = $html.hasClass("desktop"),
    isIE = userAgent.indexOf("msie") != -1 ? parseInt(userAgent.split("msie")[1]) : userAgent.indexOf("trident") != -1 ? 11 : userAgent.indexOf("edge") != -1 ? 12 : false,
    isMobile = /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent),
    isTouch = "ontouchstart" in window,
    onloadCaptchaCallback,

    plugins = {
      pointerEvents: isIE < 11 ? "js/pointer-events.min.js" : false,
      bootstrapTooltip: $("[data-toggle='tooltip']"),
      bootstrapModalDialog: $('.modal'),
      bootstrapTabs: $(".tabs"),
      rdNavbar: $(".rd-navbar"),
      rdParallax: $(".rd-parallax"),
      rdGoogleMaps: $(".rd-google-map"),
      rdMailForm: $(".rd-mailform"),
      rdInputLabel: $(".form-label"),
      regula: $("[data-constraints]"),
      responsiveTabs: $(".responsive-tabs"),
      owl: $(".owl-carousel"),
      swiper: $(".swiper-slider"),
      search: $(".rd-search"),
      
      searchResults: $('.rd-search-results'),
      statefulButton: $('.btn-stateful'),
      isotope: $(".isotope"),
      popover: $('[data-toggle="popover"]'),
      viewAnimate: $('.view-animate'),
      photoSwipeGallery: $("[data-photo-swipe-item]"),
      radio: $("input[type='radio']"),
      checkbox: $("input[type='checkbox']"),
      customToggle: $("[data-custom-toggle]"),
      facebookWidget: $('#fb-root'),
      flickrfeed: $(".flickr"),
      progressBar: $(".progress-bar-js"),
      progressLinear: $(".progress-linear"),
      counter: $(".counter"),
      dateCountdown: $('.DateCountdown'),
      pageLoader: $(".page-loader"),
      rdVideoPlayer: $(".rd-video-player"),
      customWaypoints: $('[data-custom-scroll-to]'),
      productThumb: $(".product-thumbnails"),
      imgZoom: $(".img-zoom"),
      stepper: $("input[type='number']"),
      selectFilter: $("select"),
      circleProgress: $(".progress-bar-circle"),
      particlesJS: $("#particles-js"),
      captcha: $('.recaptcha')
    };

/**
 * Initialize All Scripts
 */
$document.ready(function () {

  /**
   * getSwiperHeight
   * @description  calculate the height of swiper slider basing on data attr
   */
  function getSwiperHeight(object, attr) {
    var val = object.attr("data-" + attr),
        dim;

    if (!val) {
      return undefined;
    }

    dim = val.match(/(px)|(%)|(vh)$/i);

    if (dim.length) {
      switch (dim[0]) {
        case "px":
          return parseFloat(val);
        case "vh":
          return $(window).height() * (parseFloat(val) / 100);
        case "%":
          return object.width() * (parseFloat(val) / 100);
      }
    } else {
      return undefined;
    }
  }

  /**
   * toggleSwiperInnerVideos
   * @description  toggle swiper videos on active slides
   */
  function toggleSwiperInnerVideos(swiper) {
    var prevSlide = $(swiper.slides[swiper.previousIndex]),
        nextSlide = $(swiper.slides[swiper.activeIndex]),
        videos;

    prevSlide.find("video").each(function () {
      this.pause();
    });

    videos = nextSlide.find("video");
    if (videos.length) {
      videos.get(0).play();
    }
  }

  /**
   * toggleSwiperCaptionAnimation
   * @description  toggle swiper animations on active slides
   */
  function toggleSwiperCaptionAnimation(swiper) {
    var prevSlide = $(swiper.container),
        nextSlide = $(swiper.slides[swiper.activeIndex]);

    prevSlide
        .find("[data-caption-animate]")
        .each(function () {
          var $this = $(this);
          $this
              .removeClass("animated")
              .removeClass($this.attr("data-caption-animate"))
              .addClass("not-animated");
        });

    nextSlide
        .find("[data-caption-animate]")
        .each(function () {
          var $this = $(this),
              delay = $this.attr("data-caption-delay"),
              duration = $this.attr('data-caption-duration');

          setTimeout(function () {
            $this
                .removeClass("not-animated")
                .addClass($this.attr("data-caption-animate"))
                .addClass("animated");

            if (duration) {
              $this.css('animation-duration', duration + 'ms');
            }
          }, delay ? parseInt(delay) : 0);
        });
  }

  /**
   * makeParallax
   * @description  create swiper parallax scrolling effect
   */
  function makeParallax(el, speed, wrapper, prevScroll) {
    var scrollY = window.scrollY || window.pageYOffset;

    if (prevScroll != scrollY) {
      prevScroll = scrollY;
      el.addClass('no-transition');
      el[0].style['transform'] = 'translate3d(0,' + -scrollY * (1 - speed) + 'px,0)';
      el.height();
      el.removeClass('no-transition');

      if (el.attr('data-fade') === 'true') {
        var bound = el[0].getBoundingClientRect(),
            offsetTop = bound.top * 2 + scrollY,
            sceneHeight = wrapper.outerHeight(),
            sceneDevider = wrapper.offset().top + sceneHeight / 2.0,
            layerDevider = offsetTop + el.outerHeight() / 2.0,
            pos = sceneHeight / 6.0,
            opacity;
        if (sceneDevider + pos > layerDevider && sceneDevider - pos < layerDevider) {
          el[0].style["opacity"] = 1;
        } else {
          if (sceneDevider - pos < layerDevider) {
            opacity = 1 + ((sceneDevider + pos - layerDevider) / sceneHeight / 3.0 * 5);
          } else {
            opacity = 1 - ((sceneDevider - pos - layerDevider) / sceneHeight / 3.0 * 5);
          }
          el[0].style["opacity"] = opacity < 0 ? 0 : opacity > 1 ? 1 : opacity.toFixed(2);
        }
      }
    }

    requestAnimationFrame(function () {
      makeParallax(el, speed, wrapper, prevScroll);
    });
  }

  /**
   * isScrolledIntoView
   * @description  check the element whas been scrolled into the view
   */
  function isScrolledIntoView(elem) {
    var $window = $(window);
    return elem.offset().top + elem.outerHeight() >= $window.scrollTop() && elem.offset().top <= $window.scrollTop() + $window.height();
  }

  /**
   * initOnView
   * @description  calls a function when element has been scrolled into the view
   */
  function lazyInit(element, func) {
    var $win = jQuery(window);
    $win.on('load scroll', function () {
      if ((!element.hasClass('lazy-loaded') && (isScrolledIntoView(element)))) {
        func.call();
        element.addClass('lazy-loaded');
      }
    });
  }

  /**
   * Live Search
   * @description  create live search results
   */
  function liveSearch(options) {
    $('#' + options.live).removeClass('cleared').html();
    options.current++;
    options.spin.addClass('loading');
    $.get(handler, {
      s: decodeURI(options.term),
      liveSearch: options.live,
      dataType: "html",
      liveCount: options.liveCount,
      filter: options.filter,
      template: options.template
    }, function (data) {
      options.processed++;
      var live = $('#' + options.live);
      if (options.processed == options.current && !live.hasClass('cleared')) {
        live.find('> #search-results').removeClass('active');
        live.html(data);
        setTimeout(function () {
          live.find('> #search-results').addClass('active');
        }, 50);
      }
      options.spin.parents('.rd-search').find('.input-group-addon').removeClass('loading');
    })
  }

  /**
   * attachFormValidator
   * @description  attach form validation to elements
   */
  function attachFormValidator(elements) {
    for (var i = 0; i < elements.length; i++) {
      var o = $(elements[i]), v;
      o.addClass("form-control-has-validation").after("<span class='form-validation'></span>");
      v = o.parent().find(".form-validation");
      if (v.is(":last-child")) {
        o.addClass("form-control-last-child");
      }
    }

    elements
        .on('input change propertychange blur', function (e) {
          var $this = $(this), results;

          if (e.type != "blur") {
            if (!$this.parent().hasClass("has-error")) {
              return;
            }
          }

          if ($this.parents('.rd-mailform').hasClass('success')) {
            return;
          }

          if ((results = $this.regula('validate')).length) {
            for (i = 0; i < results.length; i++) {
              $this.siblings(".form-validation").text(results[i].message).parent().addClass("has-error")
            }
          } else {
            $this.siblings(".form-validation").text("").parent().removeClass("has-error")
          }
        })
        .regula('bind');
  }

  /**
   * isValidated
   * @description  check if all elemnts pass validation
   */
  function isValidated(elements) {
    var results, errors = 0;
    if (elements.length) {
      for (j = 0; j < elements.length; j++) {

        var $input = $(elements[j]);

        if ((results = $input.regula('validate')).length) {
          for (k = 0; k < results.length; k++) {
            errors++;
            $input.siblings(".form-validation").text(results[k].message).parent().addClass("has-error");
          }
        } else {
          $input.siblings(".form-validation").text("").parent().removeClass("has-error")
        }
      }

      return errors == 0;
    }
    return true;
  }

  /**
   * Init Bootstrap tooltip
   * @description  calls a function when need to init bootstrap tooltips
   */
  function initBootstrapTooltip(tooltipPlacement) {
    if (window.innerWidth < 599) {
      plugins.bootstrapTooltip.tooltip('destroy');
      plugins.bootstrapTooltip.tooltip({
        placement: 'bottom'
      });
    } else {
      plugins.bootstrapTooltip.tooltip('destroy');
      plugins.bootstrapTooltip.tooltipPlacement;
      plugins.bootstrapTooltip.tooltip();
    }
  }

  /**
   * Copyright Year
   * @description  Evaluates correct copyright year
   */
  var o = $("#copyright-year");
  if (o.length) {
    o.text(initialDate.getFullYear());
  }

  /**
   * IE Polyfills
   * @description  Adds some loosing functionality to IE browsers
   */
  if (isIE) {
    if (isIE < 10) {
      $html.addClass("lt-ie-10");
    }

    if (isIE < 11) {
      if (plugins.pointerEvents) {
        $.getScript(plugins.pointerEvents)
            .done(function () {
              $html.addClass("ie-10");
              PointerEventsPolyfill.initialize({});
            });
      }
    }

    if (isIE === 11) {
      $("html").addClass("ie-11");
    }

    if (isIE === 12) {
      $("html").addClass("ie-edge");
    }
  }

  /**
   * Bootstrap Tooltips
   * @description Activate Bootstrap Tooltips
   */
  if (plugins.bootstrapTooltip.length) {
    var tooltipPlacement = plugins.bootstrapTooltip.attr('data-placement');
    initBootstrapTooltip(tooltipPlacement);
    $(window).on('resize orientationchange', function () {
      initBootstrapTooltip(tooltipPlacement);
    })
  }

  /**
   * bootstrapModalDialog
   * @description Stap vioeo in bootstrapModalDialog
   */
  if (plugins.bootstrapModalDialog.length > 0) {
    var i = 0;

    for (i = 0; i < plugins.bootstrapModalDialog.length; i++) {
      var modalItem = $(plugins.bootstrapModalDialog[i]);

      modalItem.on('hidden.bs.modal', $.proxy(function () {
        var activeModal = $(this),
            rdVideoInside = activeModal.find('video'),
            youTubeVideoInside = activeModal.find('iframe');

        if (rdVideoInside.length) {
          rdVideoInside[0].pause();
        }

        if (youTubeVideoInside.length) {
          var videoUrl = youTubeVideoInside.attr('src');

          youTubeVideoInside
              .attr('src', '')
              .attr('src', videoUrl);
        }
      }, modalItem))
    }
  }

  /**
   * RD Google Maps
   * @description Enables RD Google Maps plugin
   */
  if (plugins.rdGoogleMaps.length) {
    var i;

    $.getScript("//maps.google.com/maps/api/js?key=AIzaSyAFeB0kVA6ouyJ_gEvFbMaefLy3cBCyRwo&sensor=false&libraries=geometry,places&v=3.7", function () {
      var head = document.getElementsByTagName('head')[0],
          insertBefore = head.insertBefore;

      head.insertBefore = function (newElement, referenceElement) {
        if (newElement.href && newElement.href.indexOf('//fonts.googleapis.com/css?family=Roboto') != -1 || newElement.innerHTML.indexOf('gm-style') != -1) {
          return;
        }
        insertBefore.call(head, newElement, referenceElement);
      };

      for (i = 0; i < plugins.rdGoogleMaps.length; i++) {

        var $googleMapItem = $(plugins.rdGoogleMaps[i]);

        lazyInit($googleMapItem, $.proxy(function () {
          var $this = $(this),
              styles = $this.attr("data-styles");

          $this.googleMap({
            styles: styles ? JSON.parse(styles) : [],
            onInit: function (map) {
              var inputAddress = $('#rd-google-map-address');

              if (inputAddress.length) {
                var input = inputAddress;
                var geocoder = new google.maps.Geocoder();
                var marker = new google.maps.Marker(
                    {
                      map: map,
                      icon: "images/gmap_marker.png",
                    }
                );
                var autocomplete = new google.maps.places.Autocomplete(inputAddress[0]);
                autocomplete.bindTo('bounds', map);
                inputAddress.attr('placeholder', '');
                inputAddress.on('change', function () {
                  $("#rd-google-map-address-submit").trigger('click');
                });
                inputAddress.on('keydown', function (e) {
                  if (e.keyCode == 13) {
                    $("#rd-google-map-address-submit").trigger('click');
                  }
                });


                $("#rd-google-map-address-submit").on('click', function (e) {
                  e.preventDefault();
                  var address = input.val();
                  geocoder.geocode({'address': address}, function (results, status) {
                    if (status == google.maps.GeocoderStatus.OK) {
                      var latitude = results[0].geometry.location.lat();
                      var longitude = results[0].geometry.location.lng();

                      map.setCenter(new google.maps.LatLng(
                          parseFloat(latitude),
                          parseFloat(longitude)
                      ));
                      marker.setPosition(new google.maps.LatLng(
                          parseFloat(latitude),
                          parseFloat(longitude)
                      ))
                    }
                  });
                });
              }
            }
          });
        }, $googleMapItem));
      }
    });
  }

  /**
   * Responsive Tabs
   * @description Enables Responsive Tabs plugin
   */
  if (plugins.responsiveTabs.length > 0) {
    var i;

    for (i = 0; i < plugins.responsiveTabs.length; i++) {
      var responsiveTabsItem = $(plugins.responsiveTabs[i]);

      responsiveTabsItem.easyResponsiveTabs({
        type: responsiveTabsItem.attr("data-type") === "accordion" ? "accordion" : "default"
      });

      //If have owl carousel inside tab - resize owl carousel on click
      if (responsiveTabsItem.find('.owl-carousel').length) {
        var respTabsArr = ['.resp-accordion', '.resp-tab-item'],
            j;

        for(j = 0; j < respTabsArr.length; j++) {
          responsiveTabsItem.find(respTabsArr[j].toString()).on('click', $.proxy(function (event) {
            var $this = $(this),
                carouselObj = ($this.find('.resp-tab-content-active .owl-carousel').owlCarousel()).data('owlCarousel');

            if (carouselObj && typeof carouselObj.onResize === "function") {
              carouselObj.onResize();
            }
          }, responsiveTabsItem));
        }
      }

      //If have slick carousel inside tab - resize slick carousel on click
      if (responsiveTabsItem.find('.slick-slider').length) {
        responsiveTabsItem.find('.resp-tab-item').on('click', $.proxy(function (event) {
          var $this = $(this);

          $this.find('.resp-tab-content-active .slick-slider').slick('setPosition');
        }, responsiveTabsItem));
      }
    }
  }

  /**
   * Facebook widget
   * @description  Enables official Facebook widget
   */
  if (plugins.facebookWidget.length) {
    lazyInit(plugins.facebookWidget, function () {
      (function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.id = id;
        js.src = "//connect.facebook.net/ru_RU/sdk.js#xfbml=1&version=v2.5";
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));
    });
  }

  /**
   * Radio
   * @description Add custom styling options for input[type="radio"]
   */
  if (plugins.radio.length) {
    var i;
    for (i = 0; i < plugins.radio.length; i++) {
      var $this = $(plugins.radio[i]);
      $this.addClass("radio-custom").after("<span class='radio-custom-dummy'></span>")
    }
  }

  /**
   * Checkbox
   * @description Add custom styling options for input[type="checkbox"]
   */
  if (plugins.checkbox.length) {
    var i;
    for (i = 0; i < plugins.checkbox.length; i++) {
      var $this = $(plugins.checkbox[i]);
      $this.addClass("checkbox-custom").after("<span class='checkbox-custom-dummy'></span>")
    }
  }

  /**
   * Popovers
   * @description Enables Popovers plugin
   */
  if (plugins.popover.length) {
    if (window.innerWidth < 767) {
      plugins.popover.attr('data-placement', 'bottom');
      plugins.popover.popover();
    }
    else {
      plugins.popover.popover();
    }
  }

  /**
   * Bootstrap Buttons
   * @description  Enable Bootstrap Buttons plugin
   */
  if (plugins.statefulButton.length) {
    $(plugins.statefulButton).on('click', function () {
      var statefulButtonLoading = $(this).button('loading');

      setTimeout(function () {
        statefulButtonLoading.button('reset')
      }, 2000);
    })
  }

  /**
   * UI To Top
   * @description Enables ToTop Button
   */
  if (isDesktop) {
    $().UItoTop({
      easingType: 'easeOutQuart',
      containerClass: 'ui-to-top fa fa-angle-up'
    });
  }

  /**
   * RD Navbar
   * @description Enables RD Navbar plugin
   */
  if (plugins.rdNavbar.length) {
    plugins.rdNavbar.RDNavbar({
      stickUpClone: (plugins.rdNavbar.attr("data-stick-up-clone")) ? plugins.rdNavbar.attr("data-stick-up-clone") === 'true' : false
    });
    if (plugins.rdNavbar.attr("data-body-class")) {
      document.body.className += ' ' + plugins.rdNavbar.attr("data-body-class");
    }
  }

  /**
   * ViewPort Universal
   * @description Add class in viewport
   */
  if (plugins.viewAnimate.length) {
    var i;
    for (i = 0; i < plugins.viewAnimate.length; i++) {
      var $view = $(plugins.viewAnimate[i]).not('.active');
      $document.on("scroll", $.proxy(function () {
            if (isScrolledIntoView(this)) {
              this.addClass("active");
            }
          }, $view))
          .trigger("scroll");
    }
  }

  /**
   * Swiper 3.1.7
   * @description  Enable Swiper Slider
   */
  if (plugins.swiper.length) {
    var i;
    for (i = 0; i < plugins.swiper.length; i++) {
      var s = $(plugins.swiper[i]);
      var pag = s.find(".swiper-pagination"),
          next = s.find(".swiper-button-next"),
          prev = s.find(".swiper-button-prev"),
          bar = s.find(".swiper-scrollbar"),
          parallax = s.parents('.rd-parallax').length,
          swiperSlide = s.find(".swiper-slide");

      for (j = 0; j < swiperSlide.length; j++) {
        var $this = $(swiperSlide[j]),
            url;

        if (url = $this.attr("data-slide-bg")) {
          $this.css({
            "background-image": "url(" + url + ")",
            "background-size": "cover"
          })
        }
      }

      swiperSlide.end()
          .find("[data-caption-animate]")
          .addClass("not-animated")
          .end()
          .swiper({
            autoplay: s.attr('data-autoplay') ? s.attr('data-autoplay') === "false" ? undefined : s.attr('data-autoplay') : 5000,
            direction: s.attr('data-direction') ? s.attr('data-direction') : "horizontal",
            effect: s.attr('data-slide-effect') ? s.attr('data-slide-effect') : "slide",
            speed: s.attr('data-slide-speed') ? s.attr('data-slide-speed') : 600,
            keyboardControl: s.attr('data-keyboard') === "true",
            mousewheelControl: s.attr('data-mousewheel') === "true",
            mousewheelReleaseOnEdges: s.attr('data-mousewheel-release') === "true",
            nextButton: next.length ? next.get(0) : null,
            prevButton: prev.length ? prev.get(0) : null,
            pagination: pag.length ? pag.get(0) : null,
            paginationClickable: pag.length ? pag.attr("data-clickable") !== "false" : false,
            paginationBulletRender: pag.length ? pag.attr("data-index-bullet") === "true" ? function (index, className) {
              return '<span class="' + className + '">' + (index + 1) + '</span>';
            } : null : null,
            scrollbar: bar.length ? bar.get(0) : null,
            scrollbarDraggable: bar.length ? bar.attr("data-draggable") !== "false" : true,
            scrollbarHide: bar.length ? bar.attr("data-draggable") === "false" : false,
            loop: s.attr('data-loop') !== "false",
            simulateTouch: s.attr('data-simulate-touch') ? s.attr('data-simulate-touch') === "true" : false,
            onTransitionStart: function (swiper) {
              toggleSwiperInnerVideos(swiper);
            },
            onTransitionEnd: function (swiper) {
              toggleSwiperCaptionAnimation(swiper);
            },
            onInit: function (swiper) {
              toggleSwiperInnerVideos(swiper);
              toggleSwiperCaptionAnimation(swiper);

              var swiperParalax = s.find(".swiper-parallax");

              for (var k = 0; k < swiperParalax.length; k++) {
                var $this = $(swiperParalax[k]),
                    speed;

                if (parallax && !isIEBrows && !isMobile) {
                  if (speed = $this.attr("data-speed")) {
                    makeParallax($this, speed, s, false);
                  }
                }
              }
              $(window).on('resize', function () {
                swiper.update(true);
              })
            },
            onSlideChangeStart: function(swiper){
              var activeSlideIndex, slidesCount;

              activeSlideIndex = swiper.activeIndex;
              slidesCount = swiper.slides.not(".swiper-slide-duplicate").length;

              if( activeSlideIndex ===  slidesCount + 1 ){
                activeSlideIndex = 1;
              }else if( activeSlideIndex ===  0 ){
                activeSlideIndex = slidesCount;
              }
              if( swiper.slides[activeSlideIndex - 1].getAttribute("data-slide-title") ){
                $(swiper.container).find('.swiper-button-next .title')[0].innerHTML = swiper.slides[activeSlideIndex +
                1].getAttribute("data-slide-title");
                $(swiper.container).find('.swiper-button-prev .title')[0].innerHTML = swiper.slides[activeSlideIndex -
                1].getAttribute("data-slide-title");
              }

              if( swiper.slides[activeSlideIndex - 1].getAttribute("data-slide-subtitle") ) {
                $(swiper.container).find('.swiper-button-prev .subtitle')[0].innerHTML = swiper.slides[activeSlideIndex -
                1].getAttribute("data-slide-subtitle");
                $(swiper.container).find('.swiper-button-next .subtitle')[0].innerHTML = swiper.slides[activeSlideIndex +
                1].getAttribute("data-slide-subtitle");
              }
              //Replace btn img
              if( $(swiper.container).find('.preview__img')[0] !== undefined ){
                $(swiper.container).find('.swiper-button-prev .preview__img').css("background-image", "url(" +
                    swiper.slides[activeSlideIndex - 1].getAttribute("data-slide-bg") + ")");
                $(swiper.container).find('.swiper-button-next .preview__img').css("background-image", "url(" +
                    swiper.slides[activeSlideIndex + 1].getAttribute("data-slide-bg") + ")");
              }
            }
          });

      $(window)
          .on("resize", function () {
            var mh = getSwiperHeight(s, "min-height"),
                h = getSwiperHeight(s, "height");
            if (h) {
              s.css("height", mh ? mh > h ? mh : h : h);
            }
          })
          .trigger("resize");
    }
  }

  /**
   * RD Search
   * @description Enables search
   */
  if (plugins.search.length || plugins.searchResults) {
    var handler = "bat/rd-search.php";
    var defaultTemplate = '<h5 class="search_title"><a target="_top" href="#{href}" class="search_link">#{title}</a></h5>' +
        '<p>...#{token}...</p>' +
        '<p class="match"><em>Terms matched: #{count} - URL: #{href}</em></p>';
    var defaultFilter = '*.html';

    if (plugins.search.length) {

      for (i = 0; i < plugins.search.length; i++) {
        var searchItem = $(plugins.search[i]),
            options = {
              element: searchItem,
              filter: (searchItem.attr('data-search-filter')) ? searchItem.attr('data-search-filter') : defaultFilter,
              template: (searchItem.attr('data-search-template')) ? searchItem.attr('data-search-template') : defaultTemplate,
              live: (searchItem.attr('data-search-live')) ? searchItem.attr('data-search-live') : false,
              liveCount: (searchItem.attr('data-search-live-count')) ? parseInt(searchItem.attr('data-search-live')) : 4,
              current: 0, processed: 0, timer: {}
            };

        if ($('.rd-navbar-search-toggle').length) {
          var toggle = $('.rd-navbar-search-toggle');
          toggle.on('click', function () {
            if (!($(this).hasClass('active'))) {
              searchItem.find('input').val('').trigger('propertychange');
            }
          });
        }

        if (options.live) {
          var clearHandler = false;

          searchItem.find('input').on("keyup input propertychange", $.proxy(function () {
            this.term = this.element.find('input').val().trim();
            this.spin = this.element.find('.input-group-addon');

            clearTimeout(this.timer);

            if (this.term.length > 2) {
              this.timer = setTimeout(liveSearch(this), 200);

              if (clearHandler == false) {
                clearHandler = true;

                $("body").on("click", function (e) {
                  if ($(e.toElement).parents('.rd-search').length == 0) {
                    $('#rd-search-results-live').addClass('cleared').html('');
                  }
                })
              }

            } else if (this.term.length == 0) {
              $('#' + this.live).addClass('cleared').html('');
            }
          }, options, this));
        }

        searchItem.submit($.proxy(function () {
          $('<input />').attr('type', 'hidden')
              .attr('name', "filter")
              .attr('value', this.filter)
              .appendTo(this.element);
          return true;
        }, options, this))
      }
    }

    if (plugins.searchResults.length) {
      var regExp = /\?.*s=([^&]+)\&filter=([^&]+)/g;
      var match = regExp.exec(location.search);

      if (match != null) {
        $.get(handler, {
          s: decodeURI(match[1]),
          dataType: "html",
          filter: match[2],
          template: defaultTemplate,
          live: ''
        }, function (data) {
          plugins.searchResults.html(data);
        })
      }
    }
  }

  /**
   * Owl carousel
   * @description Enables Owl carousel plugin
   */
  if (plugins.owl.length) {
    var k;
    for (k = 0; k < plugins.owl.length; k++) {
      var c = $(plugins.owl[k]),
          responsive = {};

      var aliaces = ["-", "-xs-", "-sm-", "-md-", "-lg-"],
          values = [0, 480, 768, 992, 1200],
          i, j;

      for (i = 0; i < values.length; i++) {
        responsive[values[i]] = {};
        for (j = i; j >= -1; j--) {
          if (!responsive[values[i]]["items"] && c.attr("data" + aliaces[j] + "items")) {
            responsive[values[i]]["items"] = j < 0 ? 1 : parseInt(c.attr("data" + aliaces[j] + "items"));
          }
          if (!responsive[values[i]]["stagePadding"] && responsive[values[i]]["stagePadding"] !== 0 && c.attr("data" + aliaces[j] + "stage-padding")) {
            responsive[values[i]]["stagePadding"] = j < 0 ? 0 : parseInt(c.attr("data" + aliaces[j] + "stage-padding"));
          }
          if (!responsive[values[i]]["margin"] && responsive[values[i]]["margin"] !== 0 && c.attr("data" + aliaces[j] + "margin")) {
            responsive[values[i]]["margin"] = j < 0 ? 30 : parseInt(c.attr("data" + aliaces[j] + "margin"));
          }
          if (!responsive[values[i]]["dotsEach"] && responsive[values[i]]["dotsEach"] !== 0 && c.attr("data" + aliaces[j] + "dots-each")) {
            responsive[values[i]]["dotsEach"] = j < 0 ? false : parseInt(c.attr("data" + aliaces[j] + "dots-each"));
          }
        }
      }

      // Create custom Pagination
      if (c.attr('data-dots-custom')) {
        c.on("initialized.owl.carousel", function (event) {
          var carousel = $(event.currentTarget),
              customPag = $(carousel.attr("data-dots-custom")),
              active = 0;

          if (carousel.attr('data-active')) {
            active = parseInt(carousel.attr('data-active'));
          }

          carousel.trigger('to.owl.carousel', [active, 300, true]);
          customPag.find("[data-owl-item='" + active + "']").addClass("active");

          customPag.find("[data-owl-item]").on('click', function (e) {
            e.preventDefault();
            carousel.trigger('to.owl.carousel', [parseInt(this.getAttribute("data-owl-item")), 300, true]);
          });

          carousel.on("translate.owl.carousel", function (event) {
            customPag.find(".active").removeClass("active");
            customPag.find("[data-owl-item='" + event.item.index + "']").addClass("active")
          });
        });
      }

      // Create custom Navigation
      if (c.attr('data-nav-custom')) {
        c.on("initialized.owl.carousel", function (event) {
          var carousel = $(event.currentTarget),
              customNav = $(carousel.attr("data-nav-custom"));

          customNav.find("[data-owl-prev]").on('click', function (e) {
            e.preventDefault();
            carousel.trigger('prev.owl.carousel', [300]);
          });

          customNav.find("[data-owl-next]").on('click', function (e) {
            e.preventDefault();
            carousel.trigger('next.owl.carousel', [300]);
          });
        });
      }

      c.owlCarousel({
        autoplay: c.attr("data-autoplay") === "true",
        loop: c.attr("data-loop") === "true",
        items: 1,
        autoplaySpeed: 600,
        autoplayTimeout: 3000,
        dotsContainer: c.attr("data-pagination-class") || false,
        navContainer: c.attr("data-navigation-class") || false,
        mouseDrag: c.attr("data-mouse-drag") === "true",
        nav: c.attr("data-nav") === "true",
        dots: c.attr("data-dots") === "true",
        dotsEach: c.attr("data-dots-each") ? parseInt(c.attr("data-dots-each")) : false,
        responsive: responsive,
        animateIn: c.attr("data-animation-in") || false,
        animateOut: c.attr("data-animation-out") || false,
        navText: $.parseJSON(c.attr("data-nav-text")) || [],
        navClass: $.parseJSON(c.attr("data-nav-class")) || ['owl-prev', 'owl-next']
      });

    }
  }

  /**
   * Isotope
   * @description Enables Isotope plugin
   */
  if (plugins.isotope.length) {
    var i, isogroup = [];
    for (i = 0; i < plugins.isotope.length; i++) {
      var isotopeItem = plugins.isotope[i]
          , iso = new Isotope(isotopeItem, {
        itemSelector: '.isotope-item',
        layoutMode: isotopeItem.getAttribute('data-isotope-layout') ? isotopeItem.getAttribute('data-isotope-layout') : 'masonry',
        filter: '*'
      });

      isogroup.push(iso);
    }

    $(window).on('load', function () {
      setTimeout(function () {
        var i;
        for (i = 0; i < isogroup.length; i++) {
          isogroup[i].element.className += " isotope--loaded";
          isogroup[i].layout();
        }
      }, 600);
    });

    var resizeTimout;

    $("[data-isotope-filter]").on("click", function (e) {
      e.preventDefault();
      var filter = $(this);
      clearTimeout(resizeTimout);
      filter.parents(".isotope-filters").find('.active').removeClass("active");
      filter.addClass("active");
      var iso = $('.isotope[data-isotope-group="' + this.getAttribute("data-isotope-group") + '"]');
      iso.isotope({
        itemSelector: '.isotope-item',
        layoutMode: iso.attr('data-isotope-layout') ? iso.attr('data-isotope-layout') : 'masonry',
        filter: this.getAttribute("data-isotope-filter") == '*' ? '*' : '[data-filter*="' + this.getAttribute("data-isotope-filter") + '"]'
      });
    }).eq(0).trigger("click")
  }

  /**
   * WOW
   * @description Enables Wow animation plugin
   */
  if (isDesktop && $html.hasClass("wow-animation") && $(".wow").length) {
    new WOW().init();
  }

  /**
   * Bootstrap tabs
   * @description Activate Bootstrap Tabs
   */
  if (plugins.bootstrapTabs.length) {
    var i;
    for (i = 0; i < plugins.bootstrapTabs.length; i++) {
      var bootstrapTabsItem = $(plugins.bootstrapTabs[i]);

      bootstrapTabsItem.on("click", "a", function (event) {
        event.preventDefault();
        $(this).tab('show');
      });
    }
  }

  /**
   * RD Input Label
   * @description Enables RD Input Label Plugin
   */
  if (plugins.rdInputLabel.length) {
    plugins.rdInputLabel.RDInputLabel();
  }

  /**
   * Regula
   * @description Enables Regula plugin
   */
  if (plugins.regula.length) {
    attachFormValidator(plugins.regula);
  }


  /**
   * RD Mailform
   */
  if (plugins.rdMailForm.length) {
    var i, j, k,
        msg = {
          'MF000': 'Successfully sent!',
          'MF001': 'Recipients are not set!',
          'MF002': 'Form will not work locally!',
          'MF003': 'Please, define email field in your form!',
          'MF004': 'Please, define type of your form!',
          'MF254': 'Something went wrong with PHPMailer!',
          'MF255': 'Aw, snap! Something went wrong.'
        };

    for (i = 0; i < plugins.rdMailForm.length; i++) {
      var $form = $(plugins.rdMailForm[i]);

      $form.attr('novalidate', 'novalidate').ajaxForm({
        data: {
          "form-type": $form.attr("data-form-type") || "contact",
          "counter": i
        },
        beforeSubmit: function () {
          var form = $(plugins.rdMailForm[this.extraData.counter]);
          var inputs = form.find("[data-constraints]");
          if (isValidated(inputs)) {
            var output = $("#" + form.attr("data-form-output"));

            if (output.hasClass("snackbars")) {
              output.html('<p><span class="icon text-middle fa fa-circle-o-notch fa-spin icon-xxs"></span><span>Sending</span></p>');
              output.addClass("active");
            }
          } else {
            return false;
          }
        },
        error: function (result) {
          var output = $("#" + $(plugins.rdMailForm[this.extraData.counter]).attr("data-form-output"));
          output.text(msg[result]);
        },
        success: function (result) {
          var form = $(plugins.rdMailForm[this.extraData.counter]),
              output = $("#" + form.attr("data-form-output")),
              $select = form.find('select');

          // Clear select2 after submit form
          if ($select.length) {
            for (j = 0; j < $select.length; j++) {
              var $selectitem = $($select[j]);
              $selectitem.select2('val', null);
            }
          }

          form.addClass('success');
          result = result.length == 5 ? result : 'MF255';
          output.text(msg[result]);

          if (result === "MF000") {
            if (output.hasClass("snackbars")) {
              output.html('<p><span class="icon text-middle fa fa-check icon-xxs"></span><span>' + msg[result] + '</span></p>');
            }
            output.addClass("success active");
          } else {
            if (output.hasClass("snackbars")) {
              output.html(' <p class="snackbars-left"><span class="icon icon-xxs fa fa-warning text-middle"></span><span>' + msg[result] + '</span></p>');
            }
            output.addClass("error active");
          }

          form.clearForm();
          form.find('input, textarea').blur();

          setTimeout(function () {
            output.removeClass("active error success");
            form.removeClass('success');
          }, 5000);
        }
      });
    }
  }

  /**
   * PhotoSwipe Gallery
   * @description Enables PhotoSwipe Gallery plugin
   */
  if (plugins.photoSwipeGallery.length) {

    // init image click event
    $document.delegate("[data-photo-swipe-item]", "click", function (event) {
      event.preventDefault();

      var $el = $(this),
          $galleryItems = $el.parents("[data-photo-swipe-gallery]").find("a[data-photo-swipe-item]"),
          pswpElement = document.querySelectorAll('.pswp')[0],
          encounteredItems = {},
          pswpItems = [],
          options,
          pswpIndex = 0,
          pswp;

      if ($galleryItems.length == 0) {
        $galleryItems = $el;
      }

      // loop over the gallery to build up the photoswipe items
      $galleryItems.each(function () {
        var $item = $(this),
            src = $item.attr('href'),
            size = $item.attr('data-size').split('x'),
            pswdItem;

        if ($item.is(':visible')) {

          // if we have this image the first time
          if (!encounteredItems[src]) {
            // build the photoswipe item
            pswdItem = {
              src: src,
              w: parseInt(size[0], 10),
              h: parseInt(size[1], 10),
              el: $item // save link to element for getThumbBoundsFn
            };

            // store that we already had this item
            encounteredItems[src] = {
              item: pswdItem,
              index: pswpIndex
            };

            // push the item to the photoswipe list
            pswpItems.push(pswdItem);
            pswpIndex++;
          }
        }
      });

      options = {
        index: encounteredItems[$el.attr('href')].index,

        getThumbBoundsFn: function (index) {
          var $el = pswpItems[index].el,
              offset = $el.offset();

          return {
            x: offset.left,
            y: offset.top,
            w: $el.width()
          };
        }
      };

      // open the photoswipe gallery
      pswp = new PhotoSwipe(pswpElement, PhotoSwipeUI_Default, pswpItems, options);
      pswp.init();
    });
  }

  /**
   * Custom Toggles
   */
  if (plugins.customToggle.length) {
    var i;

    for (i = 0; i < plugins.customToggle.length; i++) {
      var $this = $(plugins.customToggle[i]);

      $this.on('click', $.proxy(function (event) {
        event.preventDefault();
        var $ctx = $(this);
        $($ctx.attr('data-custom-toggle')).add(this).toggleClass('active');
      }, $this));

      if ($this.attr("data-custom-toggle-disable-on-blur") === "true") {
        $("body").on("click", $this, function (e) {
          if ( e.target !== e.data[0]
              && $(e.data.attr('data-custom-toggle')).find($(e.target)).length
              && e.data.find($(e.target)).length == 0) {
            $(e.data.attr('data-custom-toggle')).add(e.data[0]).removeClass('active');
          }
        })
      }
    }
  }

  /**
   * RD Flickr Feed
   * @description Enables RD Flickr Feed plugin
   */
  if (plugins.flickrfeed.length > 0) {
    var i;
    for (i = 0; i < plugins.flickrfeed.length; i++) {
      var flickrfeedItem = $(plugins.flickrfeed[i]);
      flickrfeedItem.RDFlickr({
        callback: function () {
          var items = flickrfeedItem.find("[data-photo-swipe-item]");

          if (items.length) {
            for (var j = 0; j < items.length; j++) {
              var image = new Image();
              image.setAttribute('data-index', j);
              image.onload = function () {
                items[this.getAttribute('data-index')].setAttribute('data-size', this.naturalWidth + 'x' + this.naturalHeight);
              };
              image.src = items[j].getAttribute('href');
            }
          }
        }
      });
    }
  }

  /**
   * Progress bar
   * @description  Enable progress bar
   */
  if (plugins.progressBar.length) {
    var i,
        bar,
        type;

    for (i = 0; i < plugins.progressBar.length; i++) {
      var progressItem = plugins.progressBar[i];
      bar = null;

      if (progressItem.className.indexOf("progress-bar-horizontal") > -1) {
        type = 'Line';
      }

      if (progressItem.className.indexOf("progress-bar-radial") > -1) {
        type = 'Circle';
      }

      if (progressItem.getAttribute("data-stroke") && progressItem.getAttribute("data-value") && type) {
        bar = new ProgressBar[type](progressItem, {
          strokeWidth: Math.round(parseFloat(progressItem.getAttribute("data-stroke")) / progressItem.offsetWidth * 100),
          trailWidth: progressItem.getAttribute("data-trail") ? Math.round(parseFloat(progressItem.getAttribute("data-trail")) / progressItem.offsetWidth * 100) : 0,
          text: {
            value: progressItem.getAttribute("data-counter") === "true" ? '0' : null,
            className: 'progress-bar__body',
            style: null
          }
        });
        bar.svg.setAttribute('preserveAspectRatio', "none meet");
        if (type === 'Line') {
          bar.svg.setAttributeNS(null, "height", progressItem.getAttribute("data-stroke"));
        }

        bar.path.removeAttribute("stroke");
        bar.path.className.baseVal = "progress-bar__stroke";
        if (bar.trail) {
          bar.trail.removeAttribute("stroke");
          bar.trail.className.baseVal = "progress-bar__trail";
        }

        if (progressItem.getAttribute("data-easing") && !isIE) {
          $(document)
              .on("scroll", {"barItem": bar}, $.proxy(function (event) {
                var bar = event.data.barItem;
                var $this = $(this);

                if (isScrolledIntoView($this) && this.className.indexOf("progress-bar--animated") === -1) {
                  this.className += " progress-bar--animated";
                  bar.animate(parseInt($this.attr("data-value")) / 100.0, {
                    easing: $this.attr("data-easing"),
                    duration: $this.attr("data-duration") ? parseInt($this.attr("data-duration")) : 800,
                    step: function (state, b) {
                      if (b._container.className.indexOf("progress-bar-horizontal") > -1 ||
                          b._container.className.indexOf("progress-bar-vertical") > -1) {
                        b.text.style.width = Math.abs(b.value() * 100).toFixed(0) + "%"
                      }
                      b.setText(Math.abs(b.value() * 100).toFixed(0));
                    }
                  });
                }
              }, progressItem))
              .trigger("scroll");
        } else {
          bar.set(parseInt($(progressItem).attr("data-value")) / 100.0);
          bar.setText($(progressItem).attr("data-value"));
          if (type === 'Line') {
            bar.text.style.width = parseInt($(progressItem).attr("data-value")) + "%";
          }
        }
      } else {
        console.error(progressItem.className + ": progress bar type is not defined");
      }
    }
  }


  /**
   * Linear Progress bar
   * @description  Enable progress bar
   */

  // Need count-to.js
  if (plugins.progressLinear.length) {
    for (i = 0; i < plugins.progressLinear.length; i++) {
      var progressBar = $(plugins.progressLinear[i]);
      $window
          .on("scroll load", $.proxy(function () {
            var bar = $(this);
            if (!bar.hasClass('animated-first') && isScrolledIntoView(bar)) {
              var end = bar.attr("data-to");
              bar.find('.progress-bar-linear').css({width: end + '%'});
              bar.find('.progress-value').countTo({
                refreshInterval: 40,
                from: 0,
                to: end,
                speed: 500
              });
              bar.addClass('animated-first');
            }
          }, progressBar));
    }
  }

  /**
   * jQuery Count To
   * @description Enables Count To plugin
   */
  if (plugins.counter.length) {
    var i;

    for (i = 0; i < plugins.counter.length; i++) {
      var $counterNotAnimated = $(plugins.counter[i]).not('.animated');
      $document
          .on("scroll", $.proxy(function () {
            var $this = this;

            if ((!$this.hasClass("animated")) && (isScrolledIntoView($this))) {
              $this.countTo({
                refreshInterval: 40,
                speed: $this.attr("data-speed") || 1000
              });
              $this.addClass('animated');
            }
          }, $counterNotAnimated))
          .trigger("scroll");
    }
  }

  /**
   * TimeCircles
   * @description  Enable TimeCircles plugin
   */
  if (plugins.dateCountdown.length) {
    var i;
    for (i = 0; i < plugins.dateCountdown.length; i++) {
      var dateCountdownItem = $(plugins.dateCountdown[i]),
          time = {
            "Days": {
              "text": "Days",
              "show": true,
              color: dateCountdownItem.attr("data-color") ? dateCountdownItem.attr("data-color") : "#ff5f6d"
            },
            "Hours": {
              "text": "Hours",
              "show": true,
              color: dateCountdownItem.attr("data-color") ? dateCountdownItem.attr("data-color") : "#ff5f6d"
            },
            "Minutes": {
              "text": "Minutes",
              "show": true,
              color: dateCountdownItem.attr("data-color") ? dateCountdownItem.attr("data-color") : "#ff5f6d"
            },
            "Seconds": {
              "text": "Seconds",
              "show": true,
              color: dateCountdownItem.attr("data-color") ? dateCountdownItem.attr("data-color") : "#ff5f6d"
            }
          };
      dateCountdownItem.TimeCircles({
        fg_width: 0.03,
        circle_bg_color: dateCountdownItem.attr("data-bg") ? dateCountdownItem.attr("data-bg") : "#f5f5f5",
        bg_width: 0.8
      });
      $(window).on('load resize orientationchange', function () {
        if (window.innerWidth < 479) {
          dateCountdownItem.TimeCircles({
            time: {
              Days: {
                show: true,
                color: dateCountdownItem.attr("data-color") ? dateCountdownItem.attr("data-color") : "#ff5f6d"
              },
              Hours: {
                show: true,
                color: dateCountdownItem.attr("data-color") ? dateCountdownItem.attr("data-color") : "#ff5f6d"
              },
              Minutes: {
                show: true,
                color: dateCountdownItem.attr("data-color") ? dateCountdownItem.attr("data-color") : "#ff5f6d"
              },
              Seconds: {show: false}
            }
          }).rebuild();
        } else if (window.innerWidth < 991) {
          dateCountdownItem.TimeCircles({
            time: {
              Days: {
                show: true,
                color: dateCountdownItem.attr("data-color") ? dateCountdownItem.attr("data-color") : "#ff5f6d"
              },
              Hours: {
                show: true,
                color: dateCountdownItem.attr("data-color") ? dateCountdownItem.attr("data-color") : "#ff5f6d"
              },
              Minutes: {
                show: true,
                color: dateCountdownItem.attr("data-color") ? dateCountdownItem.attr("data-color") : "#ff5f6d"
              },
              Seconds: {show: false}
            }
          }).rebuild();
        } else {
          dateCountdownItem.TimeCircles({time: time}).rebuild();
        }
      });
    }
  }

  /**
   * Page loader
   * @description Enables Page loader
   */
  if (plugins.pageLoader.length > 0) {

    $window.on("load", function () {
      var loader = setTimeout(function () {
        plugins.pageLoader.addClass("loaded");
        $window.trigger("resize");
      }, 200);
    });
  }

  /**
   * RD Video Player
   * @description Enables RD Video player plugin
   */
  if (plugins.rdVideoPlayer.length) {
    var i;
    for (i = 0; i < plugins.rdVideoPlayer.length; i++) {
      var videoItem = plugins.rdVideoPlayer[i],
          volumeWrap = $(".rd-video-volume-wrap");

      $(videoItem).RDVideoPlayer({});

      volumeWrap.on("mouseenter", function () {
        $(this).addClass("hover")
      });

      volumeWrap.on("mouseleave", function () {
        $(this).removeClass("hover")
      });

      if (isTouch) {
        volumeWrap.find(".rd-video-volume").on("click", function () {
          $(this).toggleClass("hover")
        });
        $document.on("click", function (e) {
          if (!$(e.target).is(volumeWrap) && $(e.target).parents(volumeWrap).length == 0) {
            volumeWrap.find(".rd-video-volume").removeClass("hover")
          }
        })
      }
    }
  }

  /**
   * Custom Waypoints
   */
  if (plugins.customWaypoints.length) {
    var i;
    for (i = 0; i < plugins.customWaypoints.length; i++) {
      var $this = $(plugins.customWaypoints[i]);

      $this.on('click', function (e) {
        e.preventDefault();
        $("body, html").stop().animate({
          scrollTop: $("#" + $(this).attr('data-custom-scroll-to')).offset().top
        }, 1000, function () {
          $(window).trigger("resize");
        });
      });
    }
  }

  /**
   * Product Thumbnails
   * @description Enables product thumbnails
   */
  if (plugins.productThumb.length) {
    var i;
    for (i = 0; i < plugins.productThumb.length; i++) {
      var thumbnails = $(plugins.productThumb[i]);

      thumbnails.find("li").on('click', function () {
        var item = $(this);
        item.parent().find('.active').removeClass('active');
        var image = item.parents(".product").find(".product-image-area");
        image.removeClass('animateImageIn');
        image.addClass('animateImageOut');
        item.addClass('active');
        setTimeout(function () {
          var src = item.find("img").attr("src");
          if (item.attr('data-large-image')) {
            src = item.attr('data-large-image');
          }
          image.attr("src", src);
          image.removeClass('animateImageOut');
          image.addClass('animateImageIn');
        }, 300);
      })
    }
  }

  /**
   * jQuery elevateZoom
   * @description Enables jQuery elevateZoom plugin
   */
  if (plugins.imgZoom.length) {
    for (i = 0; i < plugins.imgZoom.length; i++) {
      var zoomItem = $(plugins.imgZoom[i]);

      zoomItem.elevateZoom({
        zoomType: "inner",
        cursor: "crosshair",
        zoomWindowFadeIn: 300,
        zoomWindowFadeOut: 300,
        scrollZoom: true
      });
    }
  }

  /**
   * Stepper
   * @description Enables Stepper Plugin
   */
  if (plugins.stepper.length) {
    plugins.stepper.stepper({
      labels: {
        up: "",
        down: ""
      }
    });
  }

  /**
   * Select2
   * @description Enables select2 plugin
   */
  if (plugins.selectFilter.length) {
    var i;
    for (i = 0; i < plugins.selectFilter.length; i++) {
      var select = $(plugins.selectFilter[i]);

      select.select2({
        theme: "bootstrap"
      }).next().addClass(select.attr("class").match(/(input-sm)|(input-lg)|($)/i).toString().replace(new RegExp(",", 'g'), " "));
    }
  }


  /**
   * Circle Progress
   * @description Enable Circle Progress plugin
   */
  if (plugins.circleProgress.length) {
    var i;
    for (i = 0; i < plugins.circleProgress.length; i++) {
      var circleProgressItem = $(plugins.circleProgress[i]);
      $document
          .on("scroll", function () {
            if (!circleProgressItem.hasClass('animated')) {

              var arrayGradients = circleProgressItem.attr('data-gradient').split(",");

              circleProgressItem.circleProgress({
                value: circleProgressItem.attr('data-value'),
                size: circleProgressItem.attr('data-size') ? circleProgressItem.attr('data-size') : 175,
                fill: {gradient: arrayGradients, gradientAngle: Math.PI / 4},
                startAngle: -Math.PI / 4 * 2,
                emptyFill: circleProgressItem.attr('data-empty-fill') ? circleProgressItem.attr('data-empty-fill') : "rgb(245,245,245)",
                thickness: circleProgressItem.attr('data-thickness') ? parseInt(circleProgressItem.attr('data-thickness')) : 10,

              }).on('circle-animation-progress', function (event, progress, stepValue) {
                $(this).find('span').text(String(stepValue.toFixed(2)).replace('0.', '').replace('1.', '1'));
              });
              circleProgressItem.addClass('animated');
            }
          })
          .trigger("scroll");
    }
  }


  /**
   * RD Parallax
   * @description Enables RD Parallax plugin
   */
  if (plugins.rdParallax.length) {
    var i;
    $.RDParallax();

    if (!isIE && !isMobile) {
      $(window).on("scroll", function () {
        for (i = 0; i < plugins.rdParallax.length; i++) {
          var parallax = $(plugins.rdParallax[i]);
          if (isScrolledIntoView(parallax)) {
            parallax.find(".rd-parallax-inner").css("position", "fixed");
          } else {
            parallax.find(".rd-parallax-inner").css("position", "absolute");
          }
        }
      });
    }

    $("a[href='#'], a[href^='#']").on("click", function (event) {
      setTimeout(function () {
        $(window).trigger("resize");
      }, 300);
    });
  }
  
  /**
   * BG animation
   * 
   */
  if(plugins.particlesJS.length) {
    particlesJS("particles-js", {
    "particles": {
      "number": {
        "value": 4,
        "density": {
          "enable": true,
          "value_area": 100
        }
      },
      "color": {
        "value": "#ffffff"
      },
      "shape": {
        "type": "circle",
        "stroke": {
          "width": 0,
          "color": "#000000"
        },
        "polygon": {
          "nb_sides": 5
        },
        "image": {
          "src": "img/github.svg",
          "width": 100,
          "height": 100
        }
      },
      "opacity": {
        "value": 0.5,
        "random": false,
        "anim": {
          "enable": false,
          "speed": 1,
          "opacity_min": 0.1,
          "sync": false
        }
      },
      "size": {
        "value": 3,
        "random": true,
        "anim": {
          "enable": false,
          "speed": 40,
          "size_min": 0.1,
          "sync": false
        }
      },
      "line_linked": {
        "enable": true,
        "distance": 150,
        "color": "#ffffff",
        "opacity": 0.4,
        "width": 1
      },
      "move": {
        "enable": true,
        "speed": 6,
        "direction": "none",
        "random": false,
        "straight": false,
        "out_mode": "out",
        "bounce": false,
        "attract": {
          "enable": false,
          "rotateX": 600,
          "rotateY": 1200
        }
      }
    },
    "interactivity": {
      "detect_on": "canvas",
      "events": {
        "onhover": {
          "enable": true,
          "mode": "grab"
        },
        "onclick": {
          "enable": true,
          "mode": "push"
        },
        "resize": true
      },
      "modes": {
        "grab": {
          "distance": 140,
          "line_linked": {
            "opacity": 1
          }
        },
        "bubble": {
          "distance": 400,
          "size": 40,
          "duration": 2,
          "opacity": 8,
          "speed": 3
        },
        "repulse": {
          "distance": 200,
          "duration": 0.4
        },
        "push": {
          "particles_nb": 4
        },
        "remove": {
          "particles_nb": 2
        }
      }
    },
    "retina_detect": true
  });
  }

  /**
   * isValidated
   * @description  check if all elemnts pass validation
   */
  function isValidated(elements, captcha) {
    var results, errors = 0;

    if (elements.length) {
      for (j = 0; j < elements.length; j++) {

        var $input = $(elements[j]);
        if ((results = $input.regula('validate')).length) {
          for (k = 0; k < results.length; k++) {
            errors++;
            $input.siblings(".form-validation").text(results[k].message).parent().addClass("has-error");
          }
        } else {
          $input.siblings(".form-validation").text("").parent().removeClass("has-error")
        }
      }

      if (captcha) {
        if (captcha.length) {
          return validateReCaptcha(captcha) && errors == 0
        }
      }

      return errors == 0;
    }
    return true;
  }

  /**
   * validateReCaptcha
   * @description  validate google reCaptcha
   */
  function validateReCaptcha(captcha) {
    var $captchaToken = captcha.find('.g-recaptcha-response').val();

    if ($captchaToken == '') {
      captcha
        .siblings('.form-validation')
        .html('Please, prove that you are not robot.')
        .addClass('active');
      captcha
        .closest('.form-group')
        .addClass('has-error');

      captcha.bind('propertychange', function () {
        var $this = $(this),
          $captchaToken = $this.find('.g-recaptcha-response').val();

        if($captchaToken != '') {
          $this
            .closest('.form-group')
            .removeClass('has-error');
          $this
            .siblings('.form-validation')
            .removeClass('active')
            .html('');
          $this.unbind('propertychange');
        }
      });

      return false;
    }

    return true;
  }

  /**
   * onloadCaptchaCallback
   * @description  init google reCaptcha
   */
  onloadCaptchaCallback = function () {
    for (i = 0; i < plugins.captcha.length; i++) {
      var $capthcaItem = $(plugins.captcha[i]);

      grecaptcha.render(
        $capthcaItem.attr('id'),
        {
          sitekey: $capthcaItem.attr('data-sitekey'),
          size: $capthcaItem.attr('data-size') ? $capthcaItem.attr('data-size') : 'normal',
          theme: $capthcaItem.attr('data-theme') ? $capthcaItem.attr('data-theme') : 'light',
          callback: function (e) {
            $('.recaptcha').trigger('propertychange');
          }
        }
      );
      $capthcaItem.after("<span class='form-validation'></span>");
    }
  };

  /**
   * Google ReCaptcha
   * @description Enables Google ReCaptcha
   */
  if (plugins.captcha.length) {
    $.getScript("//www.google.com/recaptcha/api.js?onload=onloadCaptchaCallback&render=explicit&hl=en");
  }

  /**
   * RD Mailform
   */
  if (plugins.rdMailForm.length) {
    var i, j, k,
      msg = {
        'MF000': 'Successfully sent!',
        'MF001': 'Recipients are not set!',
        'MF002': 'Form will not work locally!',
        'MF003': 'Please, define email field in your form!',
        'MF004': 'Please, define type of your form!',
        'MF254': 'Something went wrong with PHPMailer!',
        'MF255': 'Aw, snap! Something went wrong.'
      };

    for (i = 0; i < plugins.rdMailForm.length; i++) {
      var $form = $(plugins.rdMailForm[i]),
        formHasCaptcha = false;

      $form.attr('novalidate', 'novalidate').ajaxForm({
        data: {
          "form-type": $form.attr("data-form-type") || "contact",
          "counter": i
        },
        beforeSubmit: function () {
          var form = $(plugins.rdMailForm[this.extraData.counter]),
            inputs = form.find("[data-constraints]"),
            output = $("#" + form.attr("data-form-output")),
            captcha = form.find('.recaptcha'),
            captchaFlag = true;

          output.removeClass("active error success");

          if (isValidated(inputs, captcha)) {

            // veify reCaptcha
            if (captcha.length) {
              var captchaToken = captcha.find('.g-recaptcha-response').val(),
                captchaMsg = {
                  'CPT001': 'Please, setup you "site key" and "secret key" of reCaptcha',
                  'CPT002': 'Something wrong with google reCaptcha'
                }

              formHasCaptcha = true;

              $.ajax({
                method: "POST",
                url: "bat/reCaptcha.php",
                data: {'g-recaptcha-response': captchaToken},
                async: false
              })
                .done(function (responceCode) {
                  if (responceCode != 'CPT000') {
                    if (output.hasClass("snackbars")) {
                      output.html('<p><span class="icon text-middle mdi mdi-check icon-xxs"></span><span>' + captchaMsg[responceCode] + '</span></p>')

                      setTimeout(function () {
                        output.removeClass("active");
                      }, 3500);

                      captchaFlag = false;
                    } else {
                      output.html(captchaMsg[responceCode]);
                    }

                    output.addClass("active");
                  }
                });
            }

            if (!captchaFlag) {
              return false;
            }

            form.addClass('form-in-process');

            if (output.hasClass("snackbars")) {
              output.html('<p><span class="icon text-middle fa fa-circle-o-notch fa-spin icon-xxs"></span><span>Sending</span></p>');
              output.addClass("active");
            }
          } else {
            return false;
          }
        },
        error: function (result) {
          var output = $("#" + $(plugins.rdMailForm[this.extraData.counter]).attr("data-form-output"));
          output.text(msg[result]);
          form.removeClass('form-in-process');

          if (formHasCaptcha) {
            grecaptcha.reset();
          }
        },
        success: function (result) {
          var form = $(plugins.rdMailForm[this.extraData.counter]),
            output = $("#" + form.attr("data-form-output"));

          form
            .addClass('success')
            .removeClass('form-in-process');

          if (formHasCaptcha) {
            grecaptcha.reset();
          }

          result = result.length == 5 ? result : 'MF255';
          output.text(msg[result]);

          if (result === "MF000") {
            if (output.hasClass("snackbars")) {
              output.html('<p><span class="icon text-middle mdi mdi-check icon-xxs"></span><span>' + msg[result] + '</span></p>');
            } else {
              output.addClass("active success");
            }
          } else {
            if (output.hasClass("snackbars")) {
              output.html(' <p class="snackbars-left"><span class="icon icon-xxs mdi mdi-alert-outline text-middle"></span><span>' + msg[result] + '</span></p>');
            } else {
              output.addClass("active error");
            }
          }

          form.clearForm();
          form.find('input, textarea').blur();

          setTimeout(function () {
            output.removeClass("active error success");
            form.removeClass('success');
          }, 3500);
        }
      });
    }
  }
});

