<?php
include("DB_connect.php");

$track_id = $_POST['track_id'];
$analystic = $_POST['analystic'];
$uid = $_SESSION['uid'];
// uid, 감정, 노래id 가 일치하는 곡 삭제
$result = mysqli_query($mysqli, "DELETE FROM playlist WHERE track_id = '$track_id' AND analystic = '$analystic' AND uid = '$uid'");

if($result) {
	echo "<br />DELETE success<br />";
} else {
	echo "<br />DELETE fail : ";
	echo("Errormessage:". $mysqli -> error);
}

?>