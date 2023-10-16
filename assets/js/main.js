/*-----------------------------------------------------------------------------------
    Template Name: Fioxen - Directory & Listings HTML Template
    Template URI: site.com
    Description: Fioxen - Directory & Listings HTML Template
    Author: WebTend 
    Author URI: https://webtend.net/
    Version: 1.0

    Note: This is Main Js file
-----------------------------------------------------------------------------------
    Js INDEX
    ===================
    ## Main Menu
    ## Panel Widget
    ## Prealoder
    ## Sticky
    ## Back to top
    ## Counter
    ## WOW
    ## Magnific-popup
    ## Nice select
    ## Slick Slider
-----------------------------------------------------------------------------------*/

(function ($) {
  "use strict";

  //===== Main Menu
  function mainMenu() {
    // Variables
    var var_window = $(window),
      navContainer = $(".header-navigation"),
      navbarToggler = $(".navbar-toggler"),
      navMenu = $(".nav-menu"),
      navMenuLi = $(".nav-menu ul li ul li"),
      closeIcon = $(".navbar-close");
    // navbar toggler
    navbarToggler.on("click", function () {
      navbarToggler.toggleClass("active");
      navMenu.toggleClass("menu-on");
    });
    // close icon
    closeIcon.on("click", function () {
      navMenu.removeClass("menu-on");
      navbarToggler.removeClass("active");
    });
    // adds toggle button to li items that have children
    navMenu.find("li a").each(function () {
      if ($(this).next().length > 0) {
        $(this)
          .parent("li")
          .append(
            '<span class="dd-trigger"><i class="ti-arrow-down"></i></span>'
          );
      }
    });
    // expands the dropdown menu on each click
    navMenu.find("li .dd-trigger").on("click", function (e) {
      e.preventDefault();
      $(this).parent("li").children("ul").stop(true, true).slideToggle(350);
      $(this).parent("li").toggleClass("active");
    });
    // check browser width in real-time
    function breakpointCheck() {
      var windoWidth = window.innerWidth;
      if (windoWidth <= 1199) {
        navContainer.addClass("breakpoint-on");
      } else {
        navContainer.removeClass("breakpoint-on");
      }
    }
    breakpointCheck();
    var_window.on("resize", function () {
      breakpointCheck();
    });
  }
  // Document Ready
  $(document).ready(function () {
    mainMenu();
  });

  // Panel Widget
  var panelIcon = $(".off-menu"),
    panelClose = $(".panel-close"),
    panelWrap = $(".offcanvas-panel");
  panelIcon.on("click", function (e) {
    panelWrap.toggleClass("panel-on");
    e.preventDefault();
  });
  panelClose.on("click", function (e) {
    panelWrap.removeClass("panel-on");
    e.preventDefault();
  });

  //===== Prealoder
  $(window).on("load", function (event) {
    $(".preloader").delay(500).fadeOut("500");
  });

  //===== Sticky
  $(window).on("scroll", function (event) {
    var scroll = $(window).scrollTop();
    if (scroll < 190) {
      $(".header-navigation").removeClass("sticky");
    } else {
      $(".header-navigation").addClass("sticky");
    }
  });

  //===== Back to top
  $(window).on("scroll", function (event) {
    if ($(this).scrollTop() > 600) {
      $(".back-to-top").fadeIn(200);
    } else {
      $(".back-to-top").fadeOut(200);
    }
  });
  $(".back-to-top").on("click", function (event) {
    event.preventDefault();
    $("html, body").animate(
      {
        scrollTop: 0,
      },
      1500
    );
  });

  //===== Counter js
  $(".count").counterUp({
    delay: 100,
    time: 4000,
  });

  //===== Magnific-popup js
  $(".video-popup").magnificPopup({
    type: "iframe",
    removalDelay: 300,
    mainClass: "mfp-fade",
  });

  $(".img-popup").magnificPopup({
    type: "image",
    gallery: {
      enabled: true,
    },
  });
  //===== Nice select js
  $("select").niceSelect();

  //===== Slick slider js
  $(".place-slider-one").slick({
    dots: true,
    arrows: false,
    infinite: true,
    autoplaySpeed: 1500,
    autoplay: true,
    slidesToShow: 4,
    slidesToScroll: 1,
    prevArrow: '<div class="prev"><i class="ti-arrow-left"></i></div>',
    nextArrow: '<div class="next"><i class="ti-arrow-right"></i></div>',
    responsive: [
      {
        breakpoint: 1199,
        settings: {
          slidesToShow: 2,
        },
      },
      {
        breakpoint: 767,
        settings: {
          slidesToShow: 1,
        },
      },
    ],
  });
  $(".listing-slider-one").slick({
    dots: false,
    arrows: true,
    infinite: true,
    autoplaySpeed: 1500,
    autoplay: true,
    slidesToShow: 3,
    slidesToScroll: 1,
    prevArrow: '<div class="prev"><i class="ti-arrow-left"></i></div>',
    nextArrow: '<div class="next"><i class="ti-arrow-right"></i></div>',
    responsive: [
      {
        breakpoint: 1400,
        settings: {
          slidesToShow: 3,
        },
      },
      {
        breakpoint: 1200,
        settings: {
          arrows: false,
          slidesToShow: 2,
        },
      },
      {
        breakpoint: 767,
        settings: {
          arrows: false,
          slidesToShow: 1,
        },
      },
    ],
  });
  $(".listing-slider-two").slick({
    dots: false,
    arrows: false,
    infinite: true,
    autoplaySpeed: 1500,
    autoplay: true,
    slidesToShow: 5,
    slidesToScroll: 1,
    variableWidth: true,
  });
  $(".client-slider-one").slick({
    dots: false,
    arrows: false,
    infinite: true,
    autoplaySpeed: 1500,
    autoplay: true,
    slidesToShow: 4,
    slidesToScroll: 1,
    prevArrow: '<div class="prev"><i class="ti-arrow-left"></i></div>',
    nextArrow: '<div class="next"><i class="ti-arrow-right"></i></div>',
    responsive: [
      {
        breakpoint: 1199,
        settings: {
          slidesToShow: 3,
        },
      },
      {
        breakpoint: 767,
        settings: {
          slidesToShow: 1,
        },
      },
    ],
  });
  $(".gallery-slider-one").slick({
    dots: false,
    arrows: false,
    autoplaySpeed: 1500,
    autoplay: true,
    slidesToShow: 4,
    slidesToScroll: 1,
  });
  $(".testimonial-thumb-slider-one").slick({
    dots: false,
    arrows: false,
    autoplaySpeed: 1500,
    focusOnSelect: true,
    autoplay: true,
    asNavFor: ".testimonial-content-slider-one",
    slidesToShow: 3,
    slidesToScroll: 1,
  });
  $(".testimonial-content-slider-one").slick({
    dots: false,
    arrows: false,
    infinite: true,
    autoplaySpeed: 1500,
    autoplay: true,
    asNavFor: ".testimonial-thumb-slider-one",
    fade: true,
    slidesToShow: 1,
    slidesToScroll: 1,
  });

  $(".products-thumb-gallery-slider").slick({
    dots: false,
    arrows: false,
    autoplaySpeed: 1500,
    focusOnSelect: true,
    autoplay: true,
    vertical: true,
    asNavFor: ".products-big-gallery-slider",
    slidesToShow: 3,
    slidesToScroll: 1,
    responsive: [
      {
        breakpoint: 767,
        settings: {
          vertical: false,
        },
      },
    ],
  });
  $(".products-big-gallery-slider").slick({
    dots: false,
    arrows: false,
    infinite: true,
    autoplaySpeed: 1500,
    autoplay: true,
    asNavFor: ".products-thumb-gallery-slider",
    fade: true,
    slidesToShow: 1,
    slidesToScroll: 1,
  });
  $(".releted-products-slider-one").slick({
    dots: false,
    arrows: false,
    infinite: true,
    autoplaySpeed: 1500,
    autoplay: true,
    slidesToShow: 3,
    slidesToScroll: 1,
    prevArrow: '<div class="prev"><i class="ti-arrow-left"></i></div>',
    nextArrow: '<div class="next"><i class="ti-arrow-right"></i></div>',
    responsive: [
      {
        breakpoint: 1400,
        settings: {
          slidesToShow: 3,
        },
      },
      {
        breakpoint: 1200,
        settings: {
          arrows: false,
          slidesToShow: 2,
        },
      },
      {
        breakpoint: 767,
        settings: {
          arrows: false,
          slidesToShow: 1,
        },
      },
    ],
  });
  $(".releted-listing-slider-one").slick({
    dots: false,
    arrows: false,
    infinite: true,
    autoplaySpeed: 1500,
    autoplay: true,
    slidesToShow: 2,
    slidesToScroll: 1,
    prevArrow: '<div class="prev"><i class="ti-arrow-left"></i></div>',
    nextArrow: '<div class="next"><i class="ti-arrow-right"></i></div>',
    responsive: [
      {
        breakpoint: 767,
        settings: {
          arrows: false,
          slidesToShow: 1,
        },
      },
    ],
  });
  //===== Quantity Number js
  $(".quantity-down").on("click", function () {
    var numProduct = Number($(this).next().val());
    if (numProduct > 0)
      $(this)
        .next()
        .val(numProduct - 1);
  });
  $(".quantity-up").on("click", function () {
    var numProduct = Number($(this).prev().val());
    $(this)
      .prev()
      .val(numProduct + 1);
  });

  //===== Wow js
  new WOW().init();

  //====== Isotope js
  $(".masonry-place-area").imagesLoaded(function () {
    var $grid = $(".masonry-place-row").isotope({
      itemSelector: ".place-column",
      percentPosition: true,
      masonry: {
        columnWidth: 1,
      },
    });
  });

  //======= Price ranger
  $("#slider-range").slider({
    range: true,
    min: 0,
    max: 4000,
    values: [400, 3500],
    slide: function (event, ui) {
      $("#amount").val("$" + ui.values[0] + " - $" + ui.values[1]);
    },
  });
  $("#amount").val(
    "$" +
      $("#slider-range").slider("values", 0) +
      " - $" +
      $("#slider-range").slider("values", 1)
  );

// Selector de taxonomias con ajax muestra los resultados de combustible

function buscarPorPalabraClave() {
  const keyword = $('#search-input').val();

  $.ajax({
    url: cars.ajaxurl,
    type: "POST",
    data: {
      action: "filtrar_por_palabra_clave", 
      'search': keyword,
    },
    beforeSend: function () {
      $("#listing-cars").html("Cargando");
      $(".col-md-6").hide();
    },
    success: function (data) {
      console.log(data);
      let cars_grid_html = "";
      if (Array.isArray(data) && data.length > 0) {
        cars_grid_html += `<div class="row">`;
        data.forEach((element, index) => {
          cars_grid_html += `
            <div class="col-md-6 col-sm-12">
              <div class="listing-item listing-grid-item-two mb-30 wow fadeInUp">
                <div class="listing-thumbnail">
                  <img src="${element.post_thumbnail_url}"></img>
                  <span class="featured-btn">${element.estado}</span>
                </div>
                <div class "listing-content">
                  <h3 class="title"><a href="${element.permalink}">${element.title}</a></h3>
                  <div class="listing-meta">
                    <ul>
                      <li><span><i class="ti-location-pin"></i>${element.ciudad}</span></li>
                      <li style="display: block;font-weight: 600;color: #0d0d0d;margin-bottom: 15px;">Precio: ${element.precio}</li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>`;
          if ((index + 1) % 2 === 0) {
            cars_grid_html += `</div><div class="row">`;
          }
        });
        cars_grid_html += `</div>`;
      } else {
        cars_grid_html = "No se encontraron resultados.";
      }
      $("#listing-cars").html(cars_grid_html).show();
    },
    error: function (error) {
      console.log(error);
    },
  });
}


$('#search-button').on('click', buscarPorPalabraClave);
$('#search-input').on('keyup', buscarPorPalabraClave);



$('#cars-brand-selector, #cars-fuel-selector, #cars-condition-selector, #cars-type_car-selector').change(function () {
  // Obtén los valores de los selectores de categorías
  const selectedBrand = $('#cars-brand-selector').val();
  const selectedFuel = $('#cars-fuel-selector').val();
  const selectedCondition = $('#cars-condition-selector').val();
  const selectedTypeCar = $('#cars-type_car-selector').val();

  $.ajax({
    url: cars.ajaxurl,
    type: "POST",
    data: {
      action: "filtrar_por_categoria",
      'cars-brand-selector': selectedBrand,
      'cars-fuel-selector': selectedFuel,
      'cars-condition-selector': selectedCondition,
      'cars-type_car-selector': selectedTypeCar,
    },
    beforeSend: function () {
      // Hide individual car listings and show a loading message in the listing-cars container
      $("#listing-cars").html("Cargando");
      $(".col-md-6").hide();
    },
    success: function (data) {
      console.log(data);
      let cars_grid_html = "";
      if (Array.isArray(data) && data.length > 0) {
        // Si data es un array con elementos, muestra los resultados
        cars_grid_html += `<div class="row">`; // Inicia una nueva fila
        data.forEach((element, index) => {
          cars_grid_html += `
            <div class="col-md-6 col-sm-12">
              <div class="listing-item listing-grid-item-two mb-30 wow fadeInUp">
                <div class="listing-thumbnail">
                  <img src="${element.post_thumbnail_url}"></img>
                  <span class="featured-btn">${element.estado}</span>
                </div>
                <div class="listing-content">
                  <h3 class="title"><a href="${element.permalink}">${element.title}</a></h3>
                  <div class="listing-meta">
                    <ul>
                      <li><span><i class="ti-location-pin"></i>${element.ciudad}</span></li>
                      <li style="display: block;font-weight: 600;color: #0d0d0d;margin-bottom: 15px;">Precio: ${element.precio}</li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>`;
          if ((index + 1) % 2 === 0) {
            cars_grid_html += `</div><div class="row">`; // Cierra la fila después de cada segundo carro
          }
        });
        cars_grid_html += `</div>`; // Cierra la última fila
      } else {
        // Si data no tiene elementos, maneja el caso de no resultados
        cars_grid_html = "No se encontraron resultados.";
      }

      // Inserta el HTML generado en el contenedor y show it
      $("#listing-cars").html(cars_grid_html).show();
    },
    error: function (error) {
      console.log(error);
    },
  });
});
$estadoSelector.change(function () {
  const selectedEstado = $estadoSelector.val();
  $ciudadSelector.empty();

  if (selectedEstado !== 'Mostrar Todas') {
      // Realizar una solicitud AJAX para cargar las ciudades
      $.ajax({
          url: cars.ajaxurl,
          type: 'POST',
          data: {
              action: 'filtrar_por_categoria',
              'cars-administrative-selector': selectedEstado,
          },
          success: function (data) {
              if (Array.isArray(data) && data.length > 0) {
                  $.each(data, function (i, ciudad) {
                      $ciudadSelector.append($('<option>').text(ciudad.title).val(ciudad.title));
                  });
              } else {
                  $ciudadSelector.append($('<option>').text('No hay ciudades disponibles').val(''));
              }
          },
          error: function (error) {
              console.log(error);
          },
      });
  } else {
      $ciudadSelector.append($('<option>').text('Todas las ciudades').val('Mostrar Todas'));
  }
});

})(window.jQuery);
