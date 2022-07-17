<?php
if(!session_id()) {
	// id가 없을 경우 세션 시작
	session_start();
}
include("DB_connect.php");
// 세션 사용 $uid = $_SESSION['uid'];
// 테스트용
$uid = 'test_mood@gmail.com';
echo "uid: ".$uid."<br/>";

//변수 선언
$joy_survey_result = array();
$soso_survey_result = array();
$sad_survey_result = array();
$angry_survey_result = array();
$surprise_survey_result = array();
//joy
$save_joy_result = mysqli_query($con,
		"SELECT track_id FROM survey WHERE uid = '$uid' AND analystic = 'joy'");
$row12 = mysqli_fetch_assoc($save_joy_result);
$row1 = $row12['track_id'];
$save_music_result = mysqli_query($con,
		"SELECT * FROM music_info WHERE track_id = '$row1'");
$row = mysqli_fetch_assoc($save_music_result);
$joy_survey_result[0] = $row["track_name"];
$joy_survey_result[1] = $row['artist_name'];
//soso
$save_soso_result = mysqli_query($con,
		"SELECT track_id FROM survey WHERE uid = '$uid' AND analystic = 'soso'");
$row12 = mysqli_fetch_assoc($save_soso_result);
$row1 = $row12['track_id'];
$save_music_result = mysqli_query($con,
		"SELECT * FROM music_info WHERE track_id = '$row1'");
$row = mysqli_fetch_assoc($save_music_result);
$soso_survey_result[0] = $row['track_name'];
$soso_survey_result[1] = $row['artist_name'];
//sad
$save_sad_result = mysqli_query($con,
		"SELECT track_id FROM survey WHERE uid = '$uid' AND analystic = 'sad'");
$row12 = mysqli_fetch_assoc($save_sad_result);
$row1 = $row12['track_id'];
$save_music_result = mysqli_query($con,
		"SELECT * FROM music_info WHERE track_id = '$row1'");
$row = mysqli_fetch_assoc($save_music_result);
$sad_survey_result[0] = $row['track_name'];
$sad_survey_result[1] = $row['artist_name'];
//angry
$save_angry_result = mysqli_query($con,
		"SELECT track_id FROM survey WHERE uid = '$uid' AND analystic = 'angry'");
$row12 = mysqli_fetch_assoc($save_angry_result);
$row1 = $row12['track_id'];
$save_music_result = mysqli_query($con,
		"SELECT * FROM music_info WHERE track_id = '$row1'");
$row = mysqli_fetch_assoc($save_music_result);
$angry_survey_result[0] = $row['track_name'];
$angry_survey_result[1] = $row['artist_name'];
//surprise
$save_surprise_result = mysqli_query($con,
		"SELECT track_id FROM survey WHERE uid = '$uid' AND analystic = 'surprise'");
$row12 = mysqli_fetch_assoc($save_surprise_result);
$row1 = $row12['track_id'];
$save_music_result = mysqli_query($con,
		"SELECT * FROM music_info WHERE track_id = '$row1'");
$row = mysqli_fetch_assoc($save_music_result);
$surprise_survey_result[0] = $row['track_name'];
$surprise_survey_result[1] = $row['artist_name'];

//출력 테스트
echo "joy- 노래 명: ".$joy_survey_result[0]." 가수 명: ".$joy_survey_result[1]."<br/>";
echo "soso- 노래 명: ".$soso_survey_result[0]." 가수 명: ".$soso_survey_result[1]."<br/>";
echo "sad- 노래 명: ".$sad_survey_result[0]." 가수 명: ".$sad_survey_result[1]."<br/>";
echo "angry- 노래 명: ".$angry_survey_result[0]." 가수 명: ".$angry_survey_result[1]."<br/>";
echo "surprise- 노래 명: ".$surprise_survey_result[0]." 가수 명: ".$surprise_survey_result[1]."<br/>";

?>
