$(function () {
  var w = $(window).width(),
    h = $(window).height();
  //$('section').width(w);
  $("section").height(h);
  $("menu .container").height(h - 60);
  $("body").prepend('<div id="overlay">');
  $("#menu").click(function () {
    $("html").addClass("active");
  });
  $("#close-menu").click(function () {
    $("html").removeClass("active");
  });
  $("#home").click(function () {
    $("html").load("calendar.html");
  });
  $("#overlay").click(function () {
    $("html").removeClass("active");
  });
  $(window).resize(function () {
    var w = $(window).width(),
      h = $(window).height();
    //$('section').width(w);
    $("section").height(h);
    $("menu .container").height(h - 60);
  });
});
//diary 작성버튼
$("#diaryadd").click(function () {
  $("html").load("writediary.html");
});

//diary 저장하고 나서 뜨는 창에서 playlist bookmark

//menu_popup playlist
$("#playlist").click(function () {
  $("html").load("playlist.html");
});
//calendar_menu_popup_alarm

//calendar_menu_logout
$("#logout").click(function () {

});
