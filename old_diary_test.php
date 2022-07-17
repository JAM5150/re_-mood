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
$db_user_data = mysqli_query($con,
		"SELECT uid FROM user WHERE uid= '$post_email'");
$user_data = mysqli_fetch_assoc($db_user_data);
if($user_data == NULL) {
	// echo "if> success";
	include("user_save.php");
}
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
    <link rel="stylesheet" href="css/calendar_menu.css" />
    <title>Calendar</title>
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
                    <li><b href="#"><span id="playlist">플레이리스트</span></b></li>
                    <li><b href="#"><span id="alarm">알림</span></b></li>
                    <li><b href="#"><span id="logout">로그아웃</span></b></li>
                </ul>
            </div>
        </div>
    </menu>


    <div class="content">
        <div class="row justify-content-left">
            <div class="col-md-7 text-center">
                <form action="#" class="row">
                    <div class="col-md-12">
                        <div id="inline_cal"></div>
                    </div>
                </form>

            </div>
            <div class="box">
                <textarea name="content" id="comment" placeholder="감정일기를 작성해주세요"></textarea>
                <span class="txsub">남은 글자수 : <input type="text" readonly value="120" name="counter" id="counter">
                </span>
                <pastdiary>
                    <div class="diary">
                        <div class="diary_content_box">
                            <ul>
                                <script>
				var diary_len = "<?php echo $i; ?>";
                var arr_js_time = <?php echo json_encode($diary_time_array);?>;
                var arr_js_content = <?php echo json_encode($diary_content_array);?>; 
                            
	            for(var i = 0; i < diary_len; i += 1){
		             document.write("<li><span class=time>" + arr_js_time[i] + "</span>");
		             document.write("<span class=diary_content> "+ arr_js_content[i] + "</span></li>");
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
           </div>

        
    </div>



    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/rome.js"></script>
    <script src="js/calendar_menu.js"></script>
    <script src="js/writediary.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
</form>

</body>
</html>

                    				