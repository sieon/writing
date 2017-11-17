$(function() {
  $(window).scroll(function() {
    var scrollHeight = $(document).scrollTop();
    if (scrollHeight > 60) {
      $('.change-nav').removeClass('navbar-dark bg-transparent');
      $('.change-nav').addClass('navbar-light bg-light');
    } else {
      $('.change-nav').removeClass('navbar-light bg-light');
      $('.change-nav').addClass('navbar-dark bg-transparent');
    }
  });
});
