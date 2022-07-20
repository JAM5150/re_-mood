<?php
if(!session_id()) {
	// id가 없을 경우 세션 시작
	session_start();
}

// 연결을 위한 DB 정보
include("DB_connect.php");
$analystic = $_SESSION['analystic'];
$uid = $_SESSION['user_email_address'];
$music_string = $_POST['data'];
$result_explode = explode(' ', $music_string);
$music_len = count($result_explode);
for($i = 0; $i < $music_len; $i = $i + 1) {
	$playlist_id = $uid.$result_explode[i].strval($emotion);
	$playlist_save_sql_result = mysqli_query($con, "INSERT INTO playlist (
			uid,
			analystic,
			track_id,
			playlist_id
			) VALUES (
			'$uid',
			'$analystic',
			'$result_explode[i]',
			'$playlist_id'
			)");
}
header('Location: main.php');
?>