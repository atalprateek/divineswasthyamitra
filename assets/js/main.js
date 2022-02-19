$(document).ready(function(){
  $(".showallcat").click(function(){
    $('.showallcat i').toggleClass('fa-th-large fa-chevron-down');
    $('#header-categoris').toggleClass('active');
  });

  $(function(){
      $(document).on( 'scroll', function(){
          if ($(window).scrollTop() > 10) {
              $(".navbar ").addClass("squize");
          } else {
              $(".navbar ").removeClass("squize");
          }
      });
  });
  // slide up
  $(window).scroll(function() {
    $(".slideanim").each(function(){
      var pos = $(this).offset().top;

      var winTop = $(window).scrollTop();
      if (pos < winTop + 800) {
        $(this).addClass("slide");
      }
    });
  });
  // slide left to right
  $(window).scroll(function() {
    $(".slidelrmain").each(function(){
      var pos = $(this).offset().top;
      var winTop = $(window).scrollTop();
      if (pos < winTop + 600) {
        $(this).addClass("slidelr");
      }
    });
  });
  
  // slide right to left
  $(window).scroll(function() {
    $(".sliderlmain").each(function(){
      var pos = $(this).offset().top;

      var winTop = $(window).scrollTop();
      if (pos < winTop + 600) {
        $(this).addClass("sliderl");
      }
    });
  });


  var swiper = new Swiper('.swiper-container-banner', {
    //Optional parameters
    // effect: 'fade',
    speed: 500,
    direction: "horizontal",
    grabCursor: true,
    centeredSlides: true,
    slidesPerView: "auto",
    spaceBetween: 0,    
    // breakpoints: {        
    //   330: {
    //     spaceBetween: 680,
    //   },    
    //   350: {
    //     spaceBetween: 630,
    //   },
    //   370: {
    //     spaceBetween: 550,
    //   },
    //   560: {
    //     spaceBetween: 450,
    //   },
    //   660: {
    //     spaceBetween: 400,
    //   },
    //   768: {
    //     spaceBetween: 508,
    //   },        
    //   1000: {
    //     spaceBetween: 380,
    //   },
    // },
    coverflowEffect: {
      // rotate: 0,
      stretch: 100,
      depth: 50,
      // modifier: 2,
      // slideShadows: false,
    },
    // Autopaly on
    autoplay: {
      delay: 4000
    },
    // Navigation arrows
    navigation: {
      nextEl: ".swiperbanner-button-next",
      prevEl: ".swiperbanner-button-prev"
    },
    // Pagination
    pagination: {
      el: '.swiperbanner-pagination',
      dynamicBullets: true,
      clickable: true,
    },    
    keyboard: {
      enabled: true,
    },
  });
})