<?php
//DB����
include("DB_connect.php");
//������ ����
$uid = $_SESSION['uid'];
$analystic = $_POST['analystic'];

$playlist_data = mysqli_query($con,
		"SELECT track_id FROM playlist WHERE uid = '$uid' AND analystic = '$analystic' ");
//�� ������� �迭 �з�
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

// �÷��̸���Ʈ ���� �з� -> ��� ���������� ���� 1��° ���� �迭�� 1��°�� ������ �ɰ���
for($j = 0; $j < $playlist_length; $j = $j + 1) {
	$playlist_music_data = mysqli_query($con,
			"SELECT * FROM music_info WHERE track_id = '$track_id_data[$j]'");
	$row1 = mysqli_fetch_assoc($playlist_music_data);
	$return_artist_name[$j] = $row1["artist_name"];
	$return_track_name[$j] = $row1["track_name"];
	$return_track_image[$j] = $row1["track_image"];
	$return_track_prev[$j] = $row1["track_prev"];
	$return_track_id[$j] = $row1["track_id"];
	// ���߿� ������ ������ ���� ��¹����� ���ĸ� �����
	echo "<br/>artist_name: ".$return_artist_name[$j]." track_name: ".$return_track_name[$j]." track_image: ".$return_track_image[$j]." track_prev: ".$return_track_prev[$j];
}


?>