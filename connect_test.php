<?php
if(!session_id()) {
	// id가 없을 경우 세션 시작
	session_start();
}
unset($_SESSION['date']);
$ddate = $_POST['time']; //테스트용 문장
$_SESSION['date'] = $ddate; 
header('Location: olddiary_html.php');
?>