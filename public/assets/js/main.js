$(document).ready(function () {
  //initiate swiper
  // header toggle button start
  $(".toggle-button").click(function () {
    $(".navbar-list").toggleClass("right");
    $(".overlay").toggleClass("show");
    $("body").toggleClass("overflow");
  });
  $(".close-container").click(function () {
    $(".navbar-list").toggleClass("right");
    $(".overlay").toggleClass("show");
    $("body").toggleClass("overflow");
  });
  $(".overlay").click(function () {
    $(this).toggleClass("show");
    $(".navbar-list").toggleClass("right");
    $("body").toggleClass("overflow");
  });
  // header toggle button end
  // initiate tab fillters
  function concatValues(obj) {
    var value = '';
    for (var prop in obj) {
      value += obj[prop];
    }
    return value;
  }
  var buttonFilters = {};
  var buttonFilter = '*';
  var $grid = $('.tabs-row').isotope({
    itemSelector: '.item',
    layout: 'masonry',
    filter: function () {
      var $this = $(this);
      return $this.is(buttonFilter);
    }
  });
  $('.filters').on('click', '.btn', function () {

    var $this = $(this);
    var $buttonGroup = $this.parents('.btn-group');
    var filterGroup = $buttonGroup.attr('data-filter-group');
    buttonFilters[filterGroup] = $this.attr('data-filter');
    buttonFilter = concatValues(buttonFilters) || '*';
    console.log(buttonFilter)
    $grid.isotope();
  });
  $('.btn-group').each(function (i, buttonGroup) {
    var $buttonGroup = $(buttonGroup);
    $buttonGroup.on('click', '.btn-filter', function () {
      $buttonGroup.find('.checked').removeClass('checked');
      $(this).addClass('checked');
    });
  });
  // $('.tab-list-button').on("click", function(){
  //   $('.portfolio-right-box').addClass('portfolio-box-margin-none');
  // });
  // $('.all-button').on("click", function(){
  //   $('.portfolio-right-box').removeClass('portfolio-box-margin-none');
  // });
  // tab fillters end
  var swiper = new Swiper(".mySwiper", {
    slidesPerView: 6,
    spaceBetween: 10,
    autoplay: {
      delay: 2500,
      disableOnInteraction: false,
    },
    breakpoints: {
      "992": {
        slidesPerView: 6,
        spaceBetween: 10,
      },
      "768": {
        slidesPerView: 4,
        spaceBetween: 10,
      },
      "576": {
        slidesPerView: 3,
        spaceBetween: 20,
      },
      "300": {
        slidesPerView: 2,
        spaceBetween: 40,
      },

    },
  });
  // swiper end

  // textarea start
  $('.textarea').on('input', function () {
    this.style.height = 'auto';

    this.style.height =
      (this.scrollHeight) + 'px';
  });
  // textarea end
  var selectedText = $(".active").children('.sublist-link').html();
  $(".dropdown-button").children('.language-text-span').html(selectedText);

  $(".upload-file-input").change(function () {
    var path = jQuery(this).val();
    var filename = path.replace(/C:\\fakepath\\/, '');
    $('.choose-file-input-span').html(filename);
  });
});