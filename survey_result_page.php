<?php
if(!session_id()) {
	// id�� ���� ��� ���� ����
	session_start();
}
include("DB_connect.php");
// ���� ��� $uid = $_SESSION['uid'];
// �׽�Ʈ��
$uid = 'test_mood@gmail.com';
echo "uid: ".$uid."<br/>";

//���� ����
$joy_survey_result = array();
$soso_survey_result = array();
$sad_survey_result = array();
$angry_survey_result = array();
$surprise_survey_result = array();
//joy
$save_joy_result = mysqli_query($con,
		"SELECT * FROM survey WHERE uid = '$uid' AND analystic = 'joy'");
$row = mysqli_fetch_assoc($save_joy_result);
$joy_survey_result[0] = $row['track_name'];
$joy_survey_result[1] = $row['artist_name'];
//soso
$save_soso_result = mysqli_query($con,
		"SELECT * FROM survey WHERE uid = '$uid' AND analystic = 'soso'");
$row = mysqli_fetch_assoc($save_soso_result);
$soso_survey_result[0] = $row['track_name'];
$soso_survey_result[1] = $row['artist_name'];
//sad
$save_sad_result = mysqli_query($con,
		"SELECT * FROM survey WHERE uid = '$uid' AND analystic = 'sad'");
$row = mysqli_fetch_assoc($save_sad_result);
$sad_survey_result[0] = $row['track_name'];
$sad_survey_result[1] = $row['artist_name'];
//angry
$save_angry_result = mysqli_query($con,
		"SELECT * FROM survey WHERE uid = '$uid' AND analystic = 'angry'");
$row = mysqli_fetch_assoc($save_angry_result);
$angry_survey_result[0] = $row['track_name'];
$angry_survey_result[1] = $row['artist_name'];
//surprise
$save_surprise_result = mysqli_query($con,
		"SELECT * FROM survey WHERE uid = '$uid' AND analystic = 'surprise'");
$row = mysqli_fetch_assoc($save_surprise_result);
$surprise_survey_result[0] = $row['track_name'];
$surprise_survey_result[1] = $row['artist_name'];

//��� �׽�Ʈ
echo "joy- �뷡 ��: ".$joy_survey_result[0]." ���� ��: ".$joy_survey_result[1]."<br/>";
echo "soso- �뷡 ��: ".$soso_survey_result[0]." ���� ��: ".$soso_survey_result[1]."<br/>";
echo "sad- �뷡 ��: ".$sad_survey_result[0]." ���� ��: ".$sad_survey_result[1]."<br/>";
echo "angry- �뷡 ��: ".$angry_survey_result[0]." ���� ��: ".$angry_survey_result[1]."<br/>";
echo "surprise- �뷡 ��: ".$surprise_survey_result[0]." ���� ��: ".$surprise_survey_result[1]."<br/>";

?>
