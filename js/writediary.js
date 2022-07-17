// 캘린더 js
$(function () {
    // rome(inline_cal, { time: false });

    rome(inline_cal, { time: false, inputFormat: "YYYY년 MM월 DD일" }).on(
        "data",
        function (value) {
            result.value = value;
        }
    );
});

//일기작성 남은글자수
$('#comment').keyup(function (e){
    var content = $(this).val();
    $('#counter').val(120-content.length);

    if(content.length > 120) {
        $(this).val($(this).val().substring(0, 120));
    }
});

//일기 등록
//diary 작성버튼
$(".trigger").click(function () {
    $('.modal-wrapper').toggleClass('open');
    $('.page-wrapper').toggleClass('blur-it');
    return false;
});

//북마크 .....이게맞나...기능이...엉엉
$(function () {
    $(".bookmark").unbind('click');
    $(".bookmark").click(function (e) {
        $(this).toggleClass("<i className=\"fa-thin fa-star\"></i>");
    })
});


var downArrow = document.getElementById("btn1");
var upArrow = document.getElementById("btn2");

downArrow.onclick = function () {
    'use strict';
    document.getElementById("first-list").style = "top:-620px";
    document.getElementById("second-list").style = "top:-620px";
    downArrow.style = "display:none";
    upArrow.style = "display:block";
};

upArrow.onclick = function () {
    'use strict';
    document.getElementById("first-list").style = "top:0";
    document.getElementById("second-list").style = "top:80px";
    upArrow.style = "display:none";
    downArrow.style = "display:block";
};
