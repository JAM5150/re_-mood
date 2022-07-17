<?php
//DB연결
include("DB_connect.php");
//변수들 정리
$uid = $_SESSION['uid'];
$analystic = $_POST['analystic'];

$playlist_data = mysqli_query($con,
		"SELECT track_id FROM playlist WHERE uid = '$uid' AND analystic = '$analystic' ");
//값 얻기위한 배열 분류
$track_id_data = array();
$i = 0;

if (mysqli_num_rows($playlist_data) > 0) {
	while($row = mysqli_fetch_assoc($playlist_data)) {
		$track_id_data[$i] = $row["track_id"];
		$i = $i + 1;
	}
}
$playlist_length = count($track_id_data);

$return_artist_name = array();
$return_track_name = array();
$return_track_image = array();
$return_track_prev = array();
$return_track_id = array();

// 플레이리스트 내용 분류 -> 어떻게 나눠야할지 몰라서 1번째 곡은 배열들 1번째에 들어가도록 쪼개둠
for($j = 0; $j < $playlist_length; $j = $j + 1) {
	$playlist_music_data = mysqli_query($con,
			"SELECT * FROM music_info WHERE track_id = '$track_id_data[$j]'");
	$row1 = mysqli_fetch_assoc($playlist_music_data);
	$return_artist_name[$j] = $row1["artist_name"];
	$return_track_name[$j] = $row1["track_name"];
	$return_track_image[$j] = $row1["track_image"];
	$return_track_prev[$j] = $row1["track_prev"];
	$return_track_id[$j] = $row1["track_id"];
	// 나중에 데이터 전송을 위해 출력문으로 형식만 살려둠
	echo "<br/>artist_name: ".$return_artist_name[$j]." track_name: ".$return_track_name[$j]." track_image: ".$return_track_image[$j]." track_prev: ".$return_track_prev[$j];
}


?>