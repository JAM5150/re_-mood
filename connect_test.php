<?php
if(!session_id()) {
	// id�� ���� ��� ���� ����
	session_start();
}
unset($_SESSION['date']);
$ddate = $_POST['time']; //�׽�Ʈ�� ����
$_SESSION['date'] = $ddate; 
header('Location: olddiary_html.php');
?>