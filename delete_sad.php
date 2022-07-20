<?php
if(!session_id()) {
	// id가 없을 경우 세션 시작
	session_start();
}
include("DB_connect.php");
$uid = $_SESSION['user_email_address'];

$analystic = 'sad';
$result = array();
$music_string = $_POST['data'];
$result_explode = explode(' ', $music_string);
$delete_len = count($result_explode);
$preg_result = array();
for($i = 0; $i < $delete_len; $i = $i + 1) {
	$preg_result[$i] = preg_replace('/[\@\.\;\" "]+/', '', $result_explode[$i]);
	$result[$i] = mysqli_query($con, "DELETE FROM playlist WHERE uid = '$uid' AND analystic = '$analystic' AND track_id = '$preg_result[$i]'");
	if($result[$i]) {
		//echo "<br />DELETE success<br />";
	} else {
		echo "<br />DELETE fail : ";
		echo("Errormessage:". $con -> error);
	}
}

//echo "0: ".$preg_result[0]."   1: ".$preg_result[1];
header('Location: playlistSad.php');
?>