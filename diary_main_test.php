<?php
if(!session_id()) {
	// id가 없을 경우 세션 시작
	session_start();
}
unset($_SESSION['analystic']);
// 연결을 위한 DB 정보
include("DB_connect.php");

/* db 연결 확인을 위한 출력문
 if($con){
 echo "MySQL success";
 }else{
 echo "MySQL fail";
 }
 */

// db에 한글 저장을 위한 문장
mysqli_query($con, "set session character_set_connection=utf8;");
mysqli_query($con, "set session character_set_results=utf8;");
mysqli_query($con, "set session character_set_client=utf8;");

$url = "https://mood-flask-vfml.run-asia-northeast1.goorm.io/result";  //감정분석 api 연결 url

// 일기내용을 위한 문장
$content = $_POST['content'];
// echo "content: ".$content."<br/>";
// uid 받아와서 지정할 부분
$uid = $_SESSION['user_email_address'];
//user 저장
/*
$userdata_save_sql_result = mysqli_query($con, "INSERT INTO user (
		uid,
		is_noti
		) VALUES (
		'$uid',
		false
		)");
if($userdata_save_sql_result) {
	echo "<br />user INSERT success<br />";
} else {
	echo "<br />user INSERT fail : ";
	echo("Errormessage:". $con -> error);
}
*/
//시간
$d_datetime = date( 'Y-m-d H:i:s' );
$d_date = date('Y-m-d');
$diary_date = $d_datetime;
$e_date = (int)preg_replace("/[ #\&\+\-%@=\/\\\:;,\.'\"\^`~\_|\!\?\*$#<>()\[\]\{\}]/i", "", $d_datetime);



//diary_id 생성
$diary_id_b = $uid.$e_date;
$diary_id = (string)$diary_id_b;
//바디 데이터 -> 수정필요한가 -> diaryID와 일기내용만 남기기로
$body_data = array(
		'diaryID' => $diary_id,
		'content' => $content
);

// json -> 일기분석으로 전송
$body = json_encode($body_data, JSON_UNESCAPED_UNICODE);
$method = "POST";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_HEADER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $body);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$result = curl_exec ($ch);
$result_explode = explode('"', $result);      //문자열 " 기준으로 쪼개기
//echo "<br />emotion: ".$result_explode[7]; // 받은 감정 부분 확인 출력

$post_emotion = $result_explode[7]; //받은 감정 emotion 저장
$_SESSION['analystic'] = $post_emotion;
//diary 테이블에 저장
$diary_sql_result = mysqli_query($con, "INSERT INTO diary (
		uid,
		diary_content,
        diary_datetime,
		diary_date,
		diary_id
		) VALUES (
		'$uid',
		'$content',
         NOW(),
		'$d_date',
		'$diary_id'
		)");
// diary 테이블 insert 확인 출력
 if($diary_sql_result) {
// echo "<br />diary INSERT success<br />";
 } else {
 echo "<br />diary INSERT fail : ";
 echo("Errormessage:". $con -> error);
 }
 
// track_id를 위한 설문조사 가져오기
$db_song_data = mysqli_query($con,
		"SELECT track_id FROM survey WHERE uid='$uid' AND analystic='$post_emotion'");
$song_data_a = mysqli_fetch_assoc($db_song_data);
$song_data = $song_data_a['track_id'];
// track_id로 DB속 노래정보 검색
$user_song_data = mysqli_query($con,
		"SELECT * FROM music_info WHERE track_id = '$song_data'");
//값 얻기위한 배열 분류
$user_song_data_result = mysqli_fetch_array($user_song_data);
// 필요한 값 변수에 저장
$recommend_artist_id = $user_song_data_result['artist_id'] ;
$recommend_artist_name = $user_song_data_result['artist_name'] ;
$recommend_track_id = $user_song_data_result['track_id'] ;

//음악추천 API 사용을 위한 url 초기화
$url1 = "https://mood-music-yyioo.run.goorm.io/recommend";

//음악추천 함수 사용을 위한 바디
$body_data1 = array(
		'artist_id' => $recommend_artist_id,
		'artist_name' => $recommend_artist_name,
		'track_id' => $recommend_track_id
);
// 바디 전송
$body1 = json_encode($body_data1, JSON_UNESCAPED_UNICODE);

$ch1 = curl_init();
curl_setopt($ch1, CURLOPT_URL, $url1);
curl_setopt($ch1, CURLOPT_HEADER, true);
curl_setopt($ch1, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch1, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
curl_setopt($ch1, CURLOPT_POST, true);
curl_setopt($ch1, CURLOPT_POSTFIELDS, $body1);
curl_setopt($ch1, CURLOPT_RETURNTRANSFER, true);

$result1 = curl_exec ($ch1);
//print($result1);
//추천 받은 노래 정보 쪼개기
$result_explode = explode('"', $result1); // 문자열 "기준으로 쪼개기
$result_len = count($result_explode); // 배열길이 구하기
$i = 0;
$result_artist_id = array();
$result_artist_name = array();
$result_tracks_id = array();
$result_tracks_name = array();
$result_tracks_image = array();
$result_tracks_prev = array();
$j = 0;
for($i=1; $i < $result_len; $i = $i+1)
{
	//$result_explode[$i] = preg_replace("/[ #\&\+\-%@=\/\\\:;,\.'\"\^`~\_|\!\?\*$#<>()\[\]\{\}]/i", "", $result_explode[$i]);
	//echo "no.".$i.$result_explode[$i]."<br />";
	
}
for($i=3; $i < 8; $i = $i+2)
{
	//$result_explode[$i] = preg_replace("/[ #\&\+\-%@=\/\\\:;,\.'\"\^`~\_|\!\?\*$#<>()\[\]\{\}]/i", "", $result_explode[$i]);
	$result_artist_id[$j] = $result_explode[$i];
	$result_artist_name[$j] = $result_explode[$i + 8];
	$result_tracks_id[$j] = $result_explode[$i + 16];
	$result_tracks_image[$j] = $result_explode[$i + 24];
	$result_tracks_name[$j] = $result_explode[$i + 32];
	$result_tracks_prev[$j] = $result_explode[$i + 40];
	//echo $result_edit[$j]."<br />";
	$j = $j + 1;
	
}
$music_save_result = array();
//음악 중복 검사
for($i = 0; $i < 3; $i = $i + 1){
	$db_music_data = mysqli_query($con,
		"SELECT track_id FROM music_info WHERE track_id= '$result_tracks_id[$i]'");
	$music_data = mysqli_fetch_assoc($db_music_data);
	if($music_data == NULL){
		$music_save_result[$i] = mysqli_query($con, "INSERT INTO music_info (
				artist_id,
				artist_name,
				track_id,
				track_name,
				track_image,
				track_prev
				) VALUES (
				'$result_artist_id[$i]',
				'$result_artist_name[$i]',
				'$result_tracks_id[$i]',
				'$result_tracks_name[$i]',
				'$result_tracks_image[$i]',
				'$result_tracks_prev[$i]'
				)");
		if($music_save_result[$i]) {
			//echo "<br />music".$i." INSERT success<br />";
		} else {
			echo "<br />music".$i." INSERT fail : ";
			echo("Errormessage:". $con -> error);
		}
	}
}


// DB에 음악정보 저장
$music_save_result = array();

$diary_music_save = mysqli_query($con, "INSERT INTO diary_music (
		music_id1,
		music_id2,
		music_id3,
		diary_id,
        analystic
		) VALUES (
		'$result_tracks_id[0]',
		'$result_tracks_id[1]',
		'$result_tracks_id[2]',
        '$diary_id',
        '$post_emotion'
		)");
//echo "result1: ".$result_tracks_prev[0];
//echo " result2: ".$result_tracks_prev[1];
//echo " result3: ".$result_tracks_prev[2];
if($diary_music_save) {
	//echo "<br />diary_music INSERT success<br />";
} else {
	echo "<br />diary_music INSERT fail : ";
	echo("Errormessage:". $con -> error);
}

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width" />
    <title>Today's mood</title>
    <script
      src="https://kit.fontawesome.com/8aa8789802.js"
      crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href="css/result.css" />
    <script src="js/jquery-3.6.0-.min.js"></script>
  </head>
  <body>
  
    <div class="wrapper">
      <div class="top-header">
        <h2><?php echo $d_date;?> 기준</h2>
      </div>

      <header>
        <h1><?php echo $post_emotion;?></h1>
        <h2>일 때, 이런 음악은 어떠신가요?</h2>
      </header>

      <ul class="playlist">
        <li class="playlist__song">
          <input type=checkbox name=chklist value="<?php echo $result_tracks_id[0];?>" >
          <img
            class="albumcover"
            src=<?php echo $result_tracks_image[0];?>
            width="50%"
          />
          <div class="playlist__info">
            <h5><?php echo $result_tracks_name[0];?></h5>
            <h6><?php echo $result_artist_name[0];?></h6>
          </div>

          <div class="btn-play">
            <a
              href=<?php echo $result_tracks_prev[0];?>
              target="_blank"
            >
              <i class="fa-solid fa-play fa-3x"></i>
            </a>
          </div>

        </li>

        <li class="playlist__song">
        <input type=checkbox name=chklist value="<?php echo $result_tracks_id[1];?>">
            <img
            class="albumcover"
            src=<?php echo $result_tracks_image[1];?>
            width="50%"
            />
            <div class="playlist__info">
            <h5><?php echo $result_tracks_name[1];?></h5>
            <h6><?php echo $result_artist_name[1];?></h6>
            </div>

            <div class="btn-play">
            <a
                href=<?php echo $result_tracks_prev[1];?>
                target="_blank"
            >
                <i class="fa-solid fa-play fa-3x"></i>
            </a>
            </div>

        </li>

        <li class="playlist__song">
        <input type=checkbox name=chklist value="<?php echo $result_tracks_id[2];?>">
            <img
              class="albumcover"
              src=<?php echo $result_tracks_image[2];?>
              width="50%"
            />
            <div class="playlist__info">
              <h5><?php echo $result_tracks_name[2];?></h5>
              <h6><?php echo $result_artist_name[2];?></h6>
            </div>
  
            <div class="btn-play">
              <a
                href=<?php echo $result_tracks_prev[2];?>
                target="_blank"
              >
                <i class="fa-solid fa-play fa-3x"></i>
              </a>
            </div>
        </li>
      </ul>
      <button id="save_btn" type="button" class="save" onclick="save_selected()">저장 완료</button>
    </div>
    <script type="text/JavaScript" src="js/result.js?var=1"></script> 
  </body>
</html>
                             