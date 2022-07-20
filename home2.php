<?php 
if(!session_id()) {
	// id가 없을 경우 세션 시작
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
  <!--누르면 login홈페이지로 갑니다 슝슝-->
    <button onclick="location.href='olddiary_html.php'">Button</button >
  </body>
</html>
