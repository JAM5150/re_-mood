<?php
//�ʿ��� ������ ���� ����α�
$uid = $_SESSION['uid'];
$track_id = $_POST['track_id'];
$analystic = $_POST['analystic'];
//DB����
include("DB_connect.php");

//�ߺ������� ���ϱ� ���� �����Ͱ� �ִ��� �˻�
$save_test = mysqli_query($con,
		"SELECT track_id FROM playlist WHERE track_id = '$track_id'AND analystic = '$analystic' AND track_id = '$track_id'");
$row = mysqli_fetch_assoc($save_test);

//�ߺ��� �ƴ϶�� playlist�� �뷡 �߰� 
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
	
	
	// ���̺� insert Ȯ�� ���
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