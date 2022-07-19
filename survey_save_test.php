<?php
if(!session_id()) {
	// id가 없을 경우 세션 시작
	session_start();
}
//db 연결
include("DB_connect.php");
$uid = $_SESSION['user_email_address'];

// 변수 선언 및 값 받아오기

$artist_id =$_POST['result_artist_id'];
$artist_name =$_POST['result_artist_name'];
$tracks_id = $_POST['result_track_id'];
$tracks_name = $_POST['result_track_name'];
$tracks_image = $_POST['result_track_image'];
$tracks_prev = NULL;
// echo $uid;
$analystic = $_POST['analystic'];
//테스트용 데이터 php파일
// include("music_test_data.php");



//노래 저장되어있는지 확인
$save_test = mysqli_query($con,
		"SELECT artist_id FROM music_info WHERE track_id = '$tracks_id'");
$row = mysqli_fetch_assoc($save_test);

//노래가 저장이 안되어있다면 insert 노래가 저장이 되어있다면 건너뜀
if ($row == null) {
	echo "<br/>null<br/>";
	$music_save_sql_result = mysqli_query($con, "INSERT INTO music_info (
			artist_id,
			artist_name,
			track_id,
			track_name,
			track_image,
			track_prev
			) VALUES (
			'$artist_id',
			'$artist_name',
			'$tracks_id',
			'$tracks_name',
			'$tracks_image',
			'$tracks_prev'
			)");
	
	
	// 테이블 insert 확인 출력
	if($music_save_sql_result) {
		echo "<br />music INSERT success<br />";
	} else {
		echo "<br />music INSERT fail : ";
		echo("Errormessage:". $con -> error);
	}
	
}
else {
	echo "<br/>is not null<br/>";
}
$emotion = 0;
//survey_id = 'uid' + 숫자 (1~5) 생성
switch ($analystic) {     
	case 'surprise':
		$emotion = 1;
		break;
	case 'joy':
		$emotion = 2;
		break;
	case 'soso':
		$emotion = 3;
		break;
	case 'sad':
		$emotion = 4;
		break;
	case 'angry':
		$emotion = 5;
		break;
	default:
		break;
}
$survey_id = $uid.strval($emotion);
// echo $survey_id."<br/>";
// 설문조사란에 저장
$db_survey_data = mysqli_query($con,
		"SELECT track_id FROM survey WHERE survey_id= '$survey_id'");
$user_survey_data = mysqli_fetch_assoc($db_survey_data);
$survey_old_data = $user_survey_data['track_id'];
if($user_survey_data != NULL){
	$survey_update_sql_result = mysqli_query($con, "DELETE FROM survey WHERE uid = '$uid' AND analystic = '$analystic'");
	$playlist_delte_sql_result = mysqli_query($con, "DELETE FROM playlist WHERE uid = '$uid' AND analystic = '$analystic' AND track_id = '$survey_old_data'");
}

$survey_save_sql_result = mysqli_query($con, "INSERT INTO survey (
		survey_id,
		uid,
		analystic,
		track_id
		) VALUES (
		'$survey_id',
		'$uid',
		'$analystic',
		'$tracks_id'
		)");
if($survey_save_sql_result) {
	echo "<br />survey INSERT success<br />";
} else {
	echo "<br />survey INSERT fail : ";
	echo("Errormessage:". $con -> error);
}
$playlist_id = $uid.$tracks_id.strval($emotion);
//playlist에 저장
$playlist_save_sql_result = mysqli_query($con, "INSERT INTO playlist (
		uid,
		analystic,
		track_id,
        playlist_id
		) VALUES (
		'$uid',
		'$analystic',
		'$tracks_id',
        '$playlist_id'
		)");
if($playlist_save_sql_result) {
	echo "<br />playlist INSERT success<br />";
} else {
	echo "<br />playlist INSERT fail : ";
	echo("Errormessage:". $con -> error);
}

?>