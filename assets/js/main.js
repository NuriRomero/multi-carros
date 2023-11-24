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



  function buscarPorPalabraClave() {
    const keyword = $('#search-input').val();

    $.ajax({
      url: cars.apiurl+ 'filtrar_por_palabra_clave/'+keyword,
      type: "GET",
      dataType: 'json',
      data: {
        'search': keyword,
      },
      beforeSend: function () {
        $("#listing-cars").html("Cargando");
        $(".col-md-6").hide();
      },
      success: function (response) {
        let cars_grid_html = "";
        if (Array.isArray(response) && response.length > 0) {
          cars_grid_html += `<div class="row">`;
          response.forEach((element, index) => {
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
      },
    });
  }


  $('#search-button').on('click', buscarPorPalabraClave);
  $('#search-input').on('keyup', buscarPorPalabraClave);

  function filtrarPorCategorias() {
    const brand = $('#cars-brand-selector').val() || 'Mostrar Todas';
    const fuel = $('#cars-fuel-selector').val() || 'Mostrar Todas';
    const condition = $('#cars-condition-selector').val() || 'Mostrar Todas';
    const typeCar = $('#cars-type_car-selector').val() || 'Mostrar Todas';
    const state = $('#cars-state-selector').val() || 'Mostrar Todas';
    const city = $('#cars-city-selector').val() || 'Mostrar Todas';

    const data = {
      'cars-brand-selector': brand,
      'cars-fuel-selector': fuel,
      'cars-condition-selector': condition,
      'cars-type_car-selector': typeCar,
      'cars-state-selector': state,
      'cars-city-selector': city,
    };
    
    $.ajax({
        url: cars.apiurl + 'filtrar_por_categorias',
        type: 'POST',
        data: data,
        dataType: 'json',
        beforeSend: function () {
            $("#listing-cars").html("Cargando");
            $(".col-md-6").hide();
        },
        success: function (response) {
          console.log(cars.apiurl);
            let cars_grid_html = "";
            if (Array.isArray(response) && response.length > 0) {
                cars_grid_html += `<div class="row">`;
                response.forEach((element, index) => {
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
            console.log("Error:", error);
        },
    });
  }
  $('#cars-brand-selector, #cars-fuel-selector, #cars-condition-selector, #cars-type_car-selector, #cars-state-selector, #cars-city-selector').on('change', filtrarPorCategorias);

  $(document).ready(function () {
    filtrarPorCategorias();
});
  /* ------------------------------------------------------------
    Muestra las ciudades correspondientes al estado seleccionado
  --------------------------------------------------------------- */
    $(document).ready(function () {
      let ciudadesRegistradas = {};
  
      function cargarCiudades(estado) {
        $.ajax({
          url: cars.apiurl + 'location/' + estado,
          type: 'GET',
          dataType: 'json',
          success: function (response) {
            if (response.ciudades) {
              let ciudades = response.ciudades;
  
              let $ciudadesSelect = $('select.ciudades-select');
  
              $ciudadesSelect.niceSelect('destroy');
              $ciudadesSelect.empty();
              $ciudadesSelect.append('<option value="Mostrar Todas">Todas las ciudades</option');
  
              ciudades.forEach(function (ciudad) {
                if (!ciudadesRegistradas[ciudad]) {
                  $ciudadesSelect.append('<option value="' + ciudad + '">' + ciudad + '</option>');
  
                  ciudadesRegistradas[ciudad] = true;
                }
              });
  
              $ciudadesSelect.niceSelect();
            }
          },
          error: function (jqXHR, textStatus, errorThrown) {
            console.log('Error:', textStatus, errorThrown);
          },
        });
      }
  
      $('select.estados-select').on('change', function () {
        let estado = $(this).val();
        
        ciudadesRegistradas = {};
  
        cargarCiudades(estado);
      });
    });

  
  /* ------------------------------------------------------------
    Carga mas publicaciones al presionar el boton
  --------------------------------------------------------------- */
  jQuery(document).ready(function($) {
      var offset = 6; // Cantidad de publicaciones ya mostradas

      $('#cargar-mas-publicaciones').on('click', function(e) {
          e.preventDefault();

          $.ajax({
              url: cars.ajaxurl, 
              type: 'POST',
              data: {
                  action: 'cargar_mas_publicaciones',
                  offset: offset
              },
              success: function(response) {
                  if (response) {
                      $('#listing-cars').append(response); 
                      offset += 6; 
                  }
              }
          });
      });
  });

  jQuery(document).ready(function ($) {
    // Event handler for the "Buscar" button
    $('#buscar-button').on('click', function (e) {
        e.preventDefault();

        // Get selected values from the dropdowns
        const brand = $('#cars-brand-selector').val() || 'Mostrar Todas';
        const fuel = $('#cars-fuel-selector').val() || 'Mostrar Todas';
        const condition = $('#cars-condition-selector').val() || 'Mostrar Todas';
        const typeCar = $('#cars-type_car-selector').val() || 'Mostrar Todas';
        const state = $('#cars-state-selector').val() || 'Mostrar Todas';
        const city = $('#cars-city-selector').val() || 'Mostrar Todas';

        // Construct the URL with selected parameters
        const redirectURL = `${window.location.origin}/compra-un-auto/?brand=${brand}&fuel=${fuel}&condition=${condition}&typeCar=${typeCar}&state=${state}&city=${city}`;

        // Redirect to the "compra-un-auto" page with selected parameters
        window.location.href = redirectURL;
    });
});

  // Función para filtrar y redirigir
  function filtrarYRedirigir() {
    const brand = $('#cars-brand-selector').val() || 'Mostrar Todas';
    const fuel = $('#cars-fuel-selector').val() || 'Mostrar Todas';
    const condition = $('#cars-condition-selector').val() || 'Mostrar Todas';
    const typeCar = $('#cars-type_car-selector').val() || 'Mostrar Todas';
    const state = $('#cars-state-selector').val() || 'Mostrar Todas';
    const city = $('#cars-city-selector').val() || 'Mostrar Todas';

    const data = {
        'cars-brand-selector': brand,
        'cars-fuel-selector': fuel,
        'cars-condition-selector': condition,
        'cars-type_car-selector': typeCar,
        'cars-state-selector': state,
        'cars-city-selector': city,
    };

    // Almacena los parámetros de búsqueda en sessionStorage
    sessionStorage.setItem('searchParams', JSON.stringify(data));

    // Redirecciona a la página "compra-un-auto"
    window.location.href = cars.apiurl + 'compra-un-auto';
  }

  // Asociar el evento de clic al botón de búsqueda
  $('#hero-search-form button').on('click', function (e) {
    e.preventDefault(); // Evitar el envío del formulario por defecto
    filtrarYRedirigir();
  });

  // Ejecutar la función al cargar la página
  $(document).ready(function () {
    // Recupera los parámetros de búsqueda de sessionStorage al cargar la página
    const savedSearchParams = sessionStorage.getItem('searchParams');
    if (savedSearchParams) {
        const parsedSearchParams = JSON.parse(savedSearchParams);
        // Lógica para aplicar los parámetros de búsqueda a tus selectores si es necesario
        // ...

        // O simplemente redirecciona
        // window.location.href = cars.apiurl + 'compra-un-auto';
    }
  });


})(window.jQuery);