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
 $date = $_POST['date']; //테스트용 문장
// $P_date = preg_replace("/[ #\&\+\-%@=\/\\\:;,\.'\"\^`~\_|\!\?\*$#<>()\[\]\{\}]/i", "", $P_date);
// $date = date('Y-m-d', strtotime($P_date));
$date = date('Y-m-d', strtotime($date)); //오늘 날짜 받아오기
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
$analystic = array();
$music1 = array();
$music2 = array();
$music3 = array();
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
	/*
	$diary_music_data = mysqli_query($con,
			"SELECT * FROM diary_music WHERE diary_id = '$diary_id[$i]' ");
	
	// echo "No".$i." time: ".$diary_time_array[$i]."<br/>";
	$diary_music = mysqli_fetch_assoc($diary_music_data);
	$analystic[i] = $diary_music['analystic'];
	$music1[$i] = $diary_music['music_id1'];
	$music2[$2] = 
	 */
	
	 
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
    <link rel="stylesheet" href="css/writediary.css"/>
    <link rel="stylesheet" href="css/olddiary.css" />
    <link rel="stylesheet" href="css/menu.css" />
    <title>#MOOD</title>
</head>
</html>
<body>
<h1><?php echo $date;?></h1>
<form action="olddiary_html.php" method="post">
    <header>
        <!--홈 아이콘-->
        <span id="home"><i class="fa-solid fa-house"></i></span>
        <!--메뉴 화면-->
        <span id="menu"><i class="fa-solid fa-bars"></i></span>
    </header>
    <menu>
        <!--메뉴창-->
        <div class="logo">
        </div>
        <!--X닫는 아이콘-->
        <span id="close-menu"><i class="fa-solid fa-xmark"></i></span>
        <div class="container">
            <div class="box">
                <ul>
                    <!--플레이리스트 메뉴-->
                    <li><a href="#"><span id="playlist">플레이리스트</span></a></li>
                    <!--알림 메뉴-->
                    <li><a href="#"><span id="alarm">알림</span></a></li>
                    <!--로그아웃 메뉴-->
                    <li><a href="#"><span id="logout">로그아웃</span></a></li>
                </ul>
            </div>
        </div>
    </menu>

    <!--달력 화면-->
    <div class="content">
        <div class="row justify-content-left">
            <div class="col-md-7 text-center">
                <!--달력 pick한 날짜 시간을 보여줌-->
                <input
                        type="date"
                        class="form-control w-25 mx-auto mb-3"
                        id="result"
                        placeholder="Select date"
                        disabled=""
                />
                <!--달력을 보여줌-->
                <form action="#" class="row">
                    <div class="col-md-12">
                        <div id="inline_cal"></div>
                    </div>
                </form>
            </div>
            <!--과거 다이어리-->
            <pastdiary>
                <div class="diary">
                    <div class="diary_content_box">
                        <ul id="mood_diary_content">
                            <!--다이어리 시계 type="datetime-localtime" 으로 불러와서 그대로 사용해도 될것같은데 혹시 오류 뜨면 string->날짜형식으로 변경해주기... 그래도 에러나면 부르기 ㅠ
                             disable="" button 효과 사라지는거에요... css에서 하는거 안보여서 그냥html에 효과주었어요 건들이지 말아주세오내용 구성-->
                            <!--diary 시간 : time , diary 내용:diary_content-->
                        <!--  
                            <li><input type="datetime-localtime" class="time" name="time" disabled="" ><span class=diary_content>사랑인가봐~너도나와 같다면 시작인가봐</span></li>
                            <li><input type="datetime-localtime" class="time" name="time"disabled=""><span class=diary_content>왘안대신이나나나나나쏴</span></li>
                            <li><input type="datetime-localtime" class="time" name="time"disabled=""><span class=diary_content>행복한월요일밤</span></li>
                            <li><input type="datetime-localtime" class="time" name="time"disabled=""><span class=diary_content>행복한월요일밤</span></li>
                            -->  <script>
				var diary_len = "<?php echo $i; ?>";
                var arr_js_time = <?php echo json_encode($diary_time_array);?>;
                var arr_js_content = <?php echo json_encode($diary_content_array);?>; 
                            
	            for(var i = 0; i < diary_len; i += 1){
		       
		             document.write("<span class=diary_content>"+ arr_js_time[i]  +"   "+ arr_js_content[i] + "<br></span></li>");
	            }
	            
                </script>
                            </ul>
                    </div>
                </div>
            </pastdiary>
        </div>
        <!-- Modal -->
        
        </div>
    </div>
    </div>



    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/rome.js"></script>
    <script src="js/writediary.js"></script>
    <script src="js/menu.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
</form>

</body>
</html>
