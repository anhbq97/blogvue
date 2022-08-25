var blog = {
    navbar () {
        var global_width_screen = $(window).width();
        var global_height_screen = $(window).height();
      
        var global_scroll = 0;
      
        var global_header_wrap = $('.header-wrap');
        var global_main_body = $('#main-body-content');
      
        if (global_width_screen <= 768) { //Mobile or Table Tab
          let ul = $('#navbar-menu').children()[0];
          //Kiểm tra vị trí menu
          $(window).scroll(function (event) {
            global_scroll = $(window).scrollTop();
      
            if (global_scroll >= 24) {
              global_header_wrap.addClass('fixed-menu');
              global_main_body.addClass('main-add-margin-top');
            } else {
              global_header_wrap.removeClass('fixed-menu');
              global_main_body.removeClass('main-add-margin-top');
            }
          });
      
          //Sự kiện click menu trên mobile
          $(document).on('click', '.icon-bar-mobile', function (event) {
            event.preventDefault();
            $('.navbar-list').toggleClass('show');
          })
        } else if (global_width_screen > 768) { //PC Large
          $(window).scroll(function (event) {
            global_scroll = $(window).scrollTop();

            if (global_scroll) {
              global_header_wrap.addClass('header-wrap-fixed');
              global_main_body.addClass('main-body-content-fixed');
            } else {
              global_header_wrap.removeClass('header-wrap-fixed');
              global_main_body.removeClass('main-body-content-fixed');
            }
          });
        }
    },
}

export default blog;
  