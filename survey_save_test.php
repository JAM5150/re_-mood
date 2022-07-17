<?php
if(!session_id()) {
	// id가 없을 경우 세션 시작
	session_start();
}
include("logout_test.php");
//db 연결
include("DB_connect.php");
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
// 변수 선언 및 값 받아오기
$artist_id ='7IrDIIq3j04exsiF3Z7CPg';
$artist_name = 'Beenzino';
$tracks_id = '6ZY5lLjDmK6Bzon5vseYLn';
$tracks_name = 'Break';
$tracks_image = 'https://i.scdn.co/image/ab67616d0000b273e1e537461e981a5e21b8e693';
$tracks_prev = NULL;
$uid = $_SESSION['uid'];
echo $uid;
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
echo $survey_id."<br/>";
// 설문조사란에 저장
$db_survey_data = mysqli_query($con,
		"SELECT track_id FROM survey WHERE survey_id= '$survey_id'");
$user_survey_data = mysqli_fetch_assoc($db_survey_data);
if($user_survey_data == NULL){
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
}
else{
	$survey_update_sql_result = mysqli_query($con, "UPDATE survey SET track_id = '$track_id' WHERE survey_id = '$survey_id'");
	$playlist_delte_sql_result = mysqli_query($con, "DELETE FROM playlist WHERE uid = '$uid' AND analystic = '$analystic' AND track_id = '$user_survey_data'");
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