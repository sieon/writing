$(function() {
  $(window).scroll(function() {
    var scrollHeight = $(document).scrollTop();
    if (scrollHeight > 60) {
      $('.navbar').removeClass('navbar-dark bg-transparent');
      $('.navbar').addClass('navbar-light bg-white');
    } else {
      $('.navbar').removeClass('navbar-light bg-white');
      $('.navbar').addClass('navbar-dark bg-transparent');
    }
  });
});
