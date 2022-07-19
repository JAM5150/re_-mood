// 캘린더 js
//$(function () {
  // rome(inline_cal, { time: false });

//  rome(inline_cal, { time: false, inputFormat: "YYYY년 MM월 DD일" }).on(
//    "data",
//    function (value) {
//      result.value = value;
//    }
//  );
//});

//오늘날짜 불러오는 코드
var today=new Date();
$(function () {
// 다이어리 불러오는 소스코드
    //main 화면이라 그냥 olddiary.html으로 넘어가게 설정해놨습니다. olddiary에서는 그냥 날짜값불러오는거만
// rome코드 열심히들락날락 해서보니까 data가 string으로 불러와집니다.
// 그래서 String값을 new Date값으로 날짜 변환해줘야하는데.
    rome(inline_cal, { time: false, inputFormat: "YYYY-MM-DD" }).on(
        "data",
        function (value) {
            //불러온 data 값을 result value값에 살포시 넣어줍니다.
            result.value = value;
            // 날짜 를 클릭시
            $("#inline_cal").click(function(){
                //만약 날짜가 오늘 날짜 이전이라면
                if(new Date(result.value)<today) {
                    // olddiary html을 불러옵니다
                    $("html").load("olddiary_html.php");
                    //consolelog는 F12에서 잘돌아가나 확인하기위해....지우셔도됩니다
                    console.log(new Date(result.value));
                }
            })
        }
    );
});
