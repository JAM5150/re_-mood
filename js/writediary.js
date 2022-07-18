//오늘날짜 불러오는 코드
var today=new Date();
$(function () {
// 다이어리 불러오는 소스코드
// rome코드 열심히들락날락 해서보니까 data가 string으로 불러와집니다.
// 그래서 String값을 new Date값으로 날짜 변환해줘야하는데. 그냥 날짜만 있으면 변환불가능 시간분 초까지 나와야 변환가능
// 값이 초까지 보여서 더러운데 안보이게 하는 법 찾아볼께요...일단 이소스를 줘야할 것 같아서 ..보내드립니다.
    rome(inline_cal).on(
        "data",
        function (value) {
            //클릭한 날짜 불러온 data 값이 =value  value가 String이야
            result.value = value;

            //그래서 String을 날짜로 변환해주는 new Date함수에 넣어 변환을해주면 result.value가 날짜값이됩니다 이걸로 일치하는 database데려오면 될것같아요..
            result.value=new Date(result.value);
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

//북마크 체크 클릭하면 체크아이콘 숨기고 동그라미만 있고 반대로 / 동그라미서 클릭하면 체크된거야 북마크~
    $("#check1").click(function() {
        $("#check1").hide(); //display :none 일떄
        $("#noncheck1").show();
    });
        $("#noncheck1").click(function() {
            $("#check1").show(); //display :none 일떄
            $("#noncheck1").hide();
        });

$("#check2").click(function() {
    $("#check2").hide(); //display :none 일떄
    $("#noncheck2").show();
});
$("#noncheck2").click(function() {
    $("#check2").show(); //display :none 일떄
    $("#noncheck2").hide();
});
$("#check3").click(function() {
    $("#check3").hide(); //display :none 일떄
    $("#noncheck3").show();
});
$("#noncheck3").click(function() {
    $("#check3").show(); //display :none 일떄
    $("#noncheck3").hide();
});





//diary 작성버튼클릭시 나온는 모달창..
$(".trigger").click(function () {
    $('.modal-wrapper').toggleClass('open');
    $('.page-wrapper').toggleClass('blur-it');
    return false;
});

//diary 내용을 눌러야 나오는 모달창입니다.
$(".diary_content").click(function () {
    $('.modal-wrapper').toggleClass('open');
    $('.page-wrapper').toggleClass('blur-it');
    return false;
});
