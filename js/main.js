"use strict";

var siteUrl = window.location.protocol + "//" + window.location.hostname;

(function ($, undefined) {
  jQuery(document).ready(function () {
    //
    console.log("Start Site jQuery, current Link:", siteUrl);
    $('body').on('click', '.nav__content .menu-item a', function () {
      $('body').removeClass('nav-active');
    }); // * SimpleBar Init
    // var SB = new SimpleBar($(".i-body")[0]);
    // Инициализация слайдера

    var mySwiper = new Swiper(".swiper-container", {
      speed: 400,
      spaceBetween: 100,
      pagination: {
        el: ".swiper-pagination",
        type: "bullets"
      }
    });
    var mySecondSwiper = new Swiper(".second-swiper-container", {
      speed: 400,
      spaceBetween: 32,
      slidesPerView: 3,
      pagination: {
        el: ".second-swiper-pagination",
        type: "bullets"
      }
    });
    siteMovement();
    $(window).on("scroll", siteMovement);

    function siteMovement() {
      if ($(this).scrollTop() >= 1) $('body').addClass("site-move");else $('body').removeClass("site-move");
    } // = ./jqe/file_name
    // = ./jqe/file_name
    // = ./jqe/file_name
    // = ./jqe/file_name


    $('.home-sp .cont-text').each(function (i, v) {
      var t = $(v).find('p');
      $(v).append(t.text());
      t.remove();
    });
    console.log("End Site jQuery"); //
  });
  var newarr = [];
  var atr = "";
  var proid = $(".proid").text();

  var _loop = function _loop(pi) {
    newarr[pi] = new Array();
    $("." + pi + " td").each(function (ip) {
      atr = $(this).text();
      newarr[pi][ip] = atr;
    });
  };

  for (var pi = 0; pi <= proid; pi++) {
    _loop(pi);
  }

  var result = [];
  var $data = [];
  $("body").on("click", ".filter-button", function () {
    $(".filter").find("input, textearea, select").each(function () {
      $data[this.name] = $(this).val(); // console.log($data);
    });
    newarr.forEach(function (m, i) {
      result[i] = Math.abs(1 - (m[0] / $data["eco"] * 2 + m[1] / $data["weight"] + m[2] / $data["calorie"] + m[3] / $data["price"]) / 5);
      console.log(result[i]);
    });
    result.forEach(function (m, i) {
      m[i];
    });
    $("body").find(".product-single").toggle();
  });

  if ($("html.mobile").length) {
    // ? horizontal scroll
    // var slider = document.querySelector(".register--steps-btns");
    var slider = document.querySelector(".hs-block");
    var isDown = false;
    var startX;
    var scrollLeft;

    if (slider) {
      slider.addEventListener("mousedown", function (e) {
        isDown = true;
        startX = e.pageX - slider.offsetLeft;
        scrollLeft = slider.scrollLeft;
      });
      slider.addEventListener("mouseleave", function () {
        isDown = false;
      });
      slider.addEventListener("mouseup", function () {
        isDown = false;
      });
      slider.addEventListener("mousemove", function (e) {
        if (!isDown) return;
        e.preventDefault();
        var x = e.pageX - slider.offsetLeft;
        var walk = (x - startX) * 1.366; //scroll-fast

        slider.scrollLeft = scrollLeft - walk;
      });
    } // ! horizontal scroll

  }

  $("body").find('input[name="your-name"]').attr("autocomplete", "off"); // !OLD $("[data-src='#contact-modal']").fancybox(

  Fancybox.bind("[data-src='#contact-modal']", {
    mainClass: "contact-modal",
    showClass: "contact-modal-container"
  });
  var currentAnchor = "";
  var anchorSelector = ".i-body [id].anchor";
  var menuElem = "header nav";
  var activeMenuClass = "active";
  var prevActiveMenuElem = "";
  changeMenuElemIfScrollToAnchor();
  $(window).on("scroll", changeMenuElemIfScrollToAnchor);
  $(window).on("resize", changeMenuElemIfScrollToAnchor);

  function changeMenuElemIfScrollToAnchor() {
    if (!prevActiveMenuElem) {
      var a = $(menuElem).find("." + activeMenuClass);
      prevActiveMenuElem = a.length ? a : '';
    }

    var elems = $(anchorSelector);
    var collection = [];
    var last_element = 0;
    elems.each(function () {
      var te = $(this);
      var top = window.pageYOffset + window.innerHeight / 2;
      var te_top = te.offset().top;

      if (top >= te_top) {
        collection.push(te);
        last_element = collection[collection.length - 1];
      }
    });
    var anchor = $(last_element).attr("id");

    if (currentAnchor != anchor) {
      $(menuElem).find("." + activeMenuClass).removeClass(activeMenuClass);
      $(menuElem).find('a[href*="#' + anchor + '"]').parent().addClass(activeMenuClass);
      currentAnchor = anchor;
    }

    if (!last_element && !currentAnchor) {
      if (prevActiveMenuElem) $(prevActiveMenuElem).addClass(activeMenuClass);else $(menuElem).find('a:not([href*="#"])').first().parent().addClass(activeMenuClass);
    }
  }

  if (history.length < 2) $(".nav-back-btn").addClass("d-none");
})(jQuery);

function throttle(func, ms) {
  var isThrottled = false,
      savedArgs,
      savedThis;

  function wrapper() {
    if (isThrottled) {
      savedArgs = arguments;
      savedThis = this;
      return;
    }

    func.apply(this, arguments);
    isThrottled = true;
    setTimeout(function () {
      isThrottled = false;

      if (savedArgs) {
        wrapper.apply(savedThis, savedArgs);
        savedArgs = savedThis = null;
      }
    }, ms);
  }

  return wrapper;
}
/**
 * @param json try : return JSON.parse(json)
 * @param rv catch : return !rv ? null : rv
 */


function saveJSONParse(json, rv) {
  try {
    return JSON.parse(json);
  } catch (e) {
    return !rv ? null : rv;
  }
}

function randID() {
  return "_" + Math.random().toString(36).substr(5, 15);
}

var app = function () {
  var body = undefined;
  var menu = undefined;
  var menuItems = undefined;

  var init = function init() {
    body = document.querySelector("body");
    menu = document.querySelector(".menu-icon");
    menuItems = document.querySelectorAll(".menu-main-menu-container .menu-item");
    applyListeners();
  };

  var applyListeners = function applyListeners() {
    menu.addEventListener("click", function () {
      return toggleClass(body, "nav-active");
    });
  };

  var toggleClass = function toggleClass(element, stringClass) {
    if (element.classList.contains(stringClass)) element.classList.remove(stringClass);else element.classList.add(stringClass);
  };

  init();
}();