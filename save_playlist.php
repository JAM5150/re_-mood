<?php
if(!session_id()) {
	// id�� ���� ��� ���� ����
	session_start();
}

// ������ ���� DB ����
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