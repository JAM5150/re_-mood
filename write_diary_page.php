<?php
if(!session_id()) {
	// id가 없을 경우 세션 시작
	session_start();
}
//DB 연결
include("DB_connect.php");
/*
 //session 초기화
 include("logout_test.php");
 //email을 통한 로그인
 $post_email = $_POST['email'];
 //uid 설정
 $_SESSION['uid'] = $post_email;
 // 기존 유저 정보 확인
 $db_user_data = mysqli_query($con,
 "SELECT uid FROM user WHERE uid= '$post_email'");
 $user_data = mysqli_fetch_assoc($db_user_data);
 // printf($user_data['uid']);
 //유저 정보가 없을 시  DB저장
 if($user_data == NULL) {
 // echo "if> success";
 include("user_save.php");
 }
 else {
 //유저 정보가 있다면 DB저장은 건너뜀
 // echo "else > success";
 }
 */
//index에 맞춘 수정
$post_email = $_SESSION['user_email_address'];
// $date = $_POST['date']; //테스트용 문장
$date = date('Y-m-d'); //오늘 날짜 받아오기
$uid = $_SESSION['user_email_address']; //uid 받아오기

//날짜와 uid에 일치하는 일기 모두 가져오기
$old_diary_data = mysqli_query($con,
		"SELECT * FROM diary WHERE diary_date = '$date' AND uid = '$uid' ");

/* 데이터 셀렉트 확인문
 if($old_diary_data) {
 echo "<br />select success<br />";
 } else {
 echo "<br />select fail : ";
 echo("Errormessage:". $con -> error);
 }
 */
//값 얻기위한 배열 분류
$diary_id_array = array();
$diary_content_array = array();
$diary_time_array = array();
$diary_time;
$i = 0;

while($row = mysqli_fetch_assoc($old_diary_data)) {
	if($row == NULL) {
		break;
	}
	// echo "content: " . $row["diary_content"]. " diary_datetime:" . $row["diary_datetime"]. "<br>";
	$diary_id_array[$i] = $row["diary_id"];
	$diary_content_array[$i] = $row["diary_content"];
	$diary_time = $row["diary_datetime"];
	$e_date = preg_replace("/[ #\&\+\-%@=\/\\\:;,\.'\"\^`~\_|\!\?\*$#<>()\[\]\{\}]/i", " ", $diary_time);
	$date_explode = explode(' ', $e_date);
	//$diary_time_array[$i] = $date_explode[3]." : ".$date_explode[4]." : ".$date_explode[5]; //24시형식 시 : 분 : 초
	// AM/PM 시:분
	if($date_explode[3] < 12){
		$diary_time_array[$i] = $date_explode[3]." : ".$date_explode[4]." am";
	}
	else{
		$date_explode[3] = $date_explode[3] - 12;
		if ($date_explode[3] <10){
			$diary_time_array[$i] = "0".$date_explode[3]." : ".$date_explode[4]." pm";
		}
		else{
			$diary_time_array[$i] = $date_explode[3]." : ".$date_explode[4]." pm";
		}
	}
	// echo "No".$i." time: ".$diary_time_array[$i]."<br/>";
	$i = $i + 1;
}


?>
<!DOCTYPE html>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />

    <link rel="stylesheet" href="css/rome.css" />
    <script src="https://kit.fontawesome.com/92a89305e9.js" crossorigin="anonymous"></script>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />

    <!-- Style -->
    <link rel="stylesheet" href="css/result.css" />
    <link rel="stylesheet" href="css/writediary.css" />
    <link rel="stylesheet" href="css/menu.css" />

    <title>#MOOD</title>
</head>
</html>
<body>
<form action="diary_main_test.php" method="post">

    <header>
        <span id="home"><i class="fa-solid fa-house"></i></span>
        <span id="menu"><i class="fa-solid fa-bars"></i></span>
    </header>
    <menu>
        <div class="logo">
        </div>
        <span id="close-menu"><i class="fa-solid fa-xmark"></i></span>
        <div class="container">
            <div class="box">
                <ul>
                    <li><a href="<?php echo "playlistJoy.php";?>"><span id="playlist">플레이리스트</span></a></li>
                    <li><a href="<?php echo "alarm.php";?>"><span id="alarm">알림</span></a></li>
                    <li><a href="<?php echo "logout.php";?>"><span id="logout">로그아웃</span></a>
                </ul>
            </div>
        </div>
    </menu>


    <div class="content">
        <div class="row justify-content-left">
            <div class="col-md-7 text-center">
                <!--달력 pick한 날짜 시간을 보여줌-->
                <input
                        type="text"
                        class="form-control w-25 mx-auto mb-3"
                        id="result"
                        placeholder="Select date"
                        disabled=""

                /><!--달력을 불러옴-->
                       <form action="#" class="row">
                    <div class="col-md-12">
                        <div id="inline_cal"></div>

    </div>
    </form>

    </div>
            <!--남은 글자수 계산 요놈은 php 안해줘도됩니다-->
            <div class="box">
                <textarea name="content" id="comment" placeholder="감정일기를 작성해주세요"></textarea>
                <span class="txsub">남은 글자수 : <input type="text" readonly value="120" name="counter" id="counter" disabled=""> / 120
                </span>
                <pastdiary>
                    <div class="diary">
                        <div class="diary_content_box">
                            <ul>
                                <!--다이어리 시계 type="datetime-localtime" 으로 불러와서 그대로 사용해도 될것같은데 혹시 오류 뜨면 string->날짜형식으로 변경해주기... 그래도 에러나면 부르기 ㅠ
            -->      <!--diary 시간 : time , diary 내용:diary_content-->
                                <script>
                                var diary_len = "<?php echo $i; ?>";
                                var arr_js_time = <?php echo json_encode($diary_time_array);?>;
                                var arr_js_content = <?php echo json_encode($diary_content_array);?>; 

                 for(var i = 0; i < diary_len; i += 1){
                     var movtag ='';
                     movtag += '<li>';
                     
                     movtag += '<span class=diary_content>' + arr_js_time[i] +' '+ arr_js_content[i] + '</br></span></li>';
                     
		             document.write(movtag);
	            }
              </script>
                               
                            </ul>
                        </div>
                    </div>
                </pastdiary>

    </div>
            <div class="button_container">
                <button type = "submit" formmethod="POST"><span id="diary_add">+</span></button>

        </div>

        <!-- Modal -->
        
    </div>
    </div>



    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/rome.js"></script>
    <script src="js/menu.js?ver=1"></script>
    <script src="js/writediary.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://apis.google.com/js/platform.js?onload=onLoad" async defer></script>
</form>

</body>
</html>
