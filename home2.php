<?php 
if(!session_id()) {
	// id�� ���� ��� ���� ����
	session_start();
}

unset($_SESSION['time']);
$_SESSION['time'] = $_POST['time'];

?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    
  </head>
  <body>
  <!--������ loginȨ�������� ���ϴ� ����-->
    <button onclick="location.href='olddiary_html.php'">Button</button >
  </body>
</html>
