<?php 
header("Refresh:5");
if(!session_id()) {
	// id가 없을 경우 세션 시작
	session_start();
}
include("DB_connect.php");
$uid = $_SESSION['user_email_address'];
$analystic = 'sad';
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
	//echo "<br/>artist_name: ".$return_artist_name[$j]." track_name: ".$return_track_name[$j]." track_image: ".$return_track_image[$j]." track_prev: ".$return_track_prev[$j];
}


?>

<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width" />	
    <title>#MOOD Playlist</title>
	<link rel="stylesheet" href="css/playlistSadEdit.css">
  <script src="js/jquery-3.6.0-.min.js"></script>
    <script
      src="https://kit.fontawesome.com/8aa8789802.js"
      crossorigin="anonymous"
    ></script>
</head>
<body>
  
  <!-- <form action="playlist_edit_test.php" method="post"> -->
    
<div class="outside">
    <ul id="emotionmenu">
            <!--각 버튼 클릭시 해당 감정 플리로 이동-->
          <li><button name="joy" type="button" class="emotionbutton">기쁨</button></li>
          <li><button name="sad" type="button" class="sad">슬픔</button></li>
          <li><button name="soso" type="button" class="emotionbutton">보통</button></li>
          <li><button name="surprise" type="button" class="emotionbutton">놀람</button></li>
          <li><button name="angry" type="button" class="emotionbutton">화남</button></li>
    </ul>
    <button type="button" class="del" onClick='getCheckboxValue()'>삭제</button>

    <button id="quit" type="button" name="quit" onClick = " if (confirm ('종료하겠습니까 ?')) history.back(); else  alert('입력 취소')"></button>
      
    <div class="playlist_C">
      <ul class="playlist">
        <div class="container__list margin">
          <script>
                 var playlist_len = "<?php echo $playlist_length; ?>";
                 var arr_js_artistname = <?php echo json_encode($return_artist_name);?>;
                 var arr_js_trackname = <?php echo json_encode($return_track_name);?>;
                 var arr_js_trackimage = <?php echo json_encode($return_track_image);?>;
                 var arr_js_trackid = <?php echo json_encode($return_track_id);?>;

                 for(var i = 0; i < playlist_len; i += 1){
                     var movtag ='';
                     movtag += '<li><input type="checkbox" id="chk' + i + '" name="chklist" value="' + arr_js_trackid[i] +'" class="song_check">';
                     movtag += '<div class="container__music-box">';
                     movtag += '<img class="albumcover" src="' + arr_js_trackimage[i] + '" width="50%"/>';
                     movtag += '<div class="container__detail">';
                     movtag += '<h5>' + arr_js_trackname[i] + '</h5>';
                     movtag += '<span>' + arr_js_artistname[i] + '</span>';
                     movtag += '</div>';
                     movtag += '</div>';
                     movtag += '</li>';
                     
		             document.write(movtag);
	            }
              </script>

         </div> 
      </ul>
    </div>
</div>
  <script type="text/JavaScript" src="js/playlistSadEdit.js?ver=6"></script> 
  </body>
  </html>      