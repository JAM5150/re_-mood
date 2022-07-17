<?php
//필요한 데이터 변수 비워두기
$uid = $_SESSION['uid'];
$track_id = $_POST['track_id'];
$analystic = $_POST['analystic'];
//DB연결
include("DB_connect.php");

//중복오류를 피하기 위한 데이터가 있는지 검색
$save_test = mysqli_query($con,
		"SELECT track_id FROM playlist WHERE track_id = '$track_id'AND analystic = '$analystic' AND track_id = '$track_id'");
$row = mysqli_fetch_assoc($save_test);

//중복이 아니라면 playlist에 노래 추가 
if ($row == null) {
	echo "<br/>null<br/>";
	$playlist_save_sql_result = mysqli_query($con, "INSERT INTO playlist (
			uid,
			analystic,
			track_id
			) VALUES (
			'$uid',
			'$analystic',
			'$tracks_id'
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
	echo "<br/>already entered<br/>";
}


?>