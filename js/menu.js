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
    $("html").load("home.html");
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

//main에서 다이어리 추가버튼

$("#diaryadd").click(function () {
  $("html").load("writediary.html");
});

//menu_popup playlist
$("#playlist").click(function () {
  $("html").load("playlist.html");
});
//calendar_menu_popup_alarm
$("#alarm").click(function () {
  $("html").load("alarm.html");
});
//calendar_menu_popup_alarm
$("#alarm").click(function () {
  $("html").load("logout.php");
});