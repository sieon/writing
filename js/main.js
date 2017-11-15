$(function() {
  $(window).scroll(function() {
    var scrollHeight = $(document).scrollTop();
    if (scrollHeight > 60) {
      $('.change-nav').removeClass('navbar-dark bg-transparent');
      $('.change-nav').addClass('navbar-light bg-white');
    } else {
      $('.change-nav').removeClass('navbar-light bg-white');
      $('.change-nav').addClass('navbar-dark bg-transparent');
    }
  });
});
