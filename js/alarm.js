$('.slider-toggle .slider').click(function() {
    $(this).parent('.slider-toggle')
        .toggleClass('left')
        .toggleClass('right');
    if('.slider-toggle.right'.postition().left==44)
    {
        console.log('성공');
        $("#js-alarm nav").hide(); //display :none 일떄
    }
    else
    {
        $("#js-alarm nav").show(); //display :none 일떄
    }

});
//알림권한요청
function getNotificationPermission(){
    //브라우저 지원여부체크
    if(!("Notification"in window)){
        alert("데스크톱 알림지원하지 않는 브라우저입니다");
    }
    //데스크탑 알림권한요청
    Notification.requestPermission(function(result) {
        //권한거절
        if (result == 'denied') {
            alert("알림차단합니다.");
            return false;
        }
        //요청을 허용하면,
        else {
            //데스크탑 알림 권한 요청 버튼을 비활성화
            requestPermissionButton.attr('disabled', 'disabled');
            //데스크탑 메시지 입력폼을 활성화
            notificationMessage.removeAttr('disabled');
            //데스크탑 메시지 요청 버튼을 활성화
            notificationButton.removeAttr('disabled');
            return;
        }
    });
}

//알림부분
const alarmContainer = document.querySelector('.js-alarm');
const currentTime = alarmContainer.querySelector('h1');
// input태그를 담을 전역변수 추가
const setTime = alarmContainer.querySelector('input');
// 설정한 시간을 가져오고 현재 시간과 비교하여 알람 기능을 할 함수

function getAlarm() {
    const setValue = setTime.value;
    //input에 입력된 값을 변수에 담아줍니다.
    const date = new Date();
    const hours = date.getHours();
    const minutes = date.getMinutes();
    const current = `${hours < 10 ? `0${hours}` : hours}:${minutes < 10 ? `0${minutes}` : minutes}`;
    if (current === setValue) {
        console.log(current, setValue);
//알림띄우기
        function notify(msg){
            var options={
                body:"오늘 일기를 작성하시지 않으셨습니다. 일기를 작성해주세요 :)"
            }
            //데스크탑 알림요청
            var notification=new Notification("#mood",options);

            //알림닫기
            clearInterval(alarm);

            //3초뒤 알람닫기
           // setTimeout(function(){
            //    notification.close();
           // },5000);
        }
    }
}

 function getTime(){
    const date = new Date();
 const hours = date.getHours();
 const minutes = date.getMinutes();
 const seconds = date.getSeconds();
 currentTime.innerText =   `${hours < 10 ? `0${hours}` : hours}:${minutes < 10 ? `0${minutes}` : minutes}:${seconds < 10 ? `0${seconds}` : seconds}`;}

function init()
 {  getTime();
     setInterval(getTime, 5000);
     alarm=setInterval(getAlarm, 5000);}init();