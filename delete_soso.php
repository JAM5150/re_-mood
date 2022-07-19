<?php
if(!session_id()) {
	// id가 없을 경우 세션 시작
	session_start();
}
include("DB_connect.php");
$uid = $_SESSION['user_email_address'];

$analystic = 'soso';

$music_string = $_POST['data'];
$result_explode = explode(' ', $music_string);
$delete_len = count($result_explode);
for($i = 0; $i < $delete_len; $i = $i + 1) {
	$result = mysqli_query($con, "DELETE FROM playlist WHERE uid = '$uid' AND analystic = '$analystic' AND track_id = '$result_explode[$i]'");
}

header('Location: playlistSosoEdit.php');

?>