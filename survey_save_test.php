<?php
if(!session_id()) {
	// id�� ���� ��� ���� ����
	session_start();
}
include("logout_test.php");
//db ����
include("DB_connect.php");
$post_email = $_POST['email'];
//uid ����
$_SESSION['uid'] = $post_email;
// ���� ���� ���� Ȯ��
$db_user_data = mysqli_query($con,
		"SELECT uid FROM user WHERE uid= '$post_email'");
$user_data = mysqli_fetch_assoc($db_user_data);
// printf($user_data['uid']);
//���� ������ ���� ��  DB����
if($user_data == NULL) {
	// echo "if> success";
	include("user_save.php");
}
else {
	//���� ������ �ִٸ� DB������ �ǳʶ�
	// echo "else > success";
}
// ���� ���� �� �� �޾ƿ���
$artist_id ='7IrDIIq3j04exsiF3Z7CPg';
$artist_name = 'Beenzino';
$tracks_id = '6ZY5lLjDmK6Bzon5vseYLn';
$tracks_name = 'Break';
$tracks_image = 'https://i.scdn.co/image/ab67616d0000b273e1e537461e981a5e21b8e693';
$tracks_prev = NULL;
$uid = $_SESSION['uid'];
echo $uid;
$analystic = $_POST['analystic'];

//�׽�Ʈ�� ������ php����
// include("music_test_data.php");



//�뷡 ����Ǿ��ִ��� Ȯ��
$save_test = mysqli_query($con,
		"SELECT artist_id FROM music_info WHERE track_id = '$tracks_id'");
$row = mysqli_fetch_assoc($save_test);

//�뷡�� ������ �ȵǾ��ִٸ� insert �뷡�� ������ �Ǿ��ִٸ� �ǳʶ�
if ($row == null) {
	echo "<br/>null<br/>";
	$music_save_sql_result = mysqli_query($con, "INSERT INTO music_info (
			artist_id,
			artist_name,
			track_id,
			track_name,
			track_image,
			track_prev
			) VALUES (
			'$artist_id',
			'$artist_name',
			'$tracks_id',
			'$tracks_name',
			'$tracks_image',
			'$tracks_prev'
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
	echo "<br/>is not null<br/>";
}
$emotion = 0;
//survey_id = 'uid' + ���� (1~5) ����
switch ($analystic) {     
	case 'surprise':
		$emotion = 1;
		break;
	case 'joy':
		$emotion = 2;
		break;
	case 'soso':
		$emotion = 3;
		break;
	case 'sad':
		$emotion = 4;
		break;
	case 'angry':
		$emotion = 5;
		break;
	default:
		break;
}
$survey_id = $uid.strval($emotion);
echo $survey_id."<br/>";
// ����������� ����
$db_survey_data = mysqli_query($con,
		"SELECT track_id FROM survey WHERE survey_id= '$survey_id'");
$user_survey_data = mysqli_fetch_assoc($db_survey_data);
if($user_survey_data == NULL){
	$survey_save_sql_result = mysqli_query($con, "INSERT INTO survey (
			survey_id,
			uid,
			analystic,
			track_id
			) VALUES (
			'$survey_id',
			'$uid',
			'$analystic',
			'$tracks_id'
			)");
	if($survey_save_sql_result) {
		echo "<br />survey INSERT success<br />";
	} else {
		echo "<br />survey INSERT fail : ";
		echo("Errormessage:". $con -> error);
	}
}
else{
	$survey_update_sql_result = mysqli_query($con, "UPDATE survey SET track_id = '$track_id' WHERE survey_id = '$survey_id'");
	$playlist_delte_sql_result = mysqli_query($con, "DELETE FROM playlist WHERE uid = '$uid' AND analystic = '$analystic' AND track_id = '$user_survey_data'");
}
$playlist_id = $uid.$tracks_id.strval($emotion);
//playlist�� ����
$playlist_save_sql_result = mysqli_query($con, "INSERT INTO playlist (
		uid,
		analystic,
		track_id,
        playlist_id
		) VALUES (
		'$uid',
		'$analystic',
		'$tracks_id',
        '$playlist_id'
		)");
if($playlist_save_sql_result) {
	echo "<br />playlist INSERT success<br />";
} else {
	echo "<br />playlist INSERT fail : ";
	echo("Errormessage:". $con -> error);
}

?>