<?php
//음악 검색을 위한 url 초기화
$url = "https://mood-music-yyioo.run.goorm.io/search";

// 검색어 받아오는 부분 우선 그대로 둠
$search_track = $_POST['search_track'];

//바디데이터 설정
$body_data = array(
		'search' => $search_track
);
// api에 바디 전송
$body = json_encode($body_data, JSON_UNESCAPED_UNICODE);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_HEADER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $body);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$result = curl_exec ($ch);
$result_explode = explode('"', $result); // 문자열 "기준으로 쪼개기
$result_len = count($result_explode); // 배열길이 구하기
$i = 0;
$result_edit = array();
$j = 0;
// 결과값 분류해서 저장, 출력은 따로 작성하지 않음
for($i=1; $i < $result_len; $i = $i+2)
{
	//$result_explode[$i] = preg_replace("/[ #\&\+\-%@=\/\\\:;,\.'\"\^`~\_|\!\?\*$#<>()\[\]\{\}]/i", "", $result_explode[$i]);
	$result_edit[$j] = $result_explode[$i];
	$j = $j + 1;
}
$result_artist_id = array();
$result_artist_name = array();
$result_track_id = array();
$result_track_image = array();
$result_track_name = array();
$j = 0;
for($i = 1; $i < 11; $i = $i + 1){
	$result_artist_id[$j] = $result_edit[$i];
	$result_artist_name[$j] = $result_edit[$i + 11];
	$result_track_id[$j] = $result_edit[$i + 22];
	$result_track_image[$j] = $result_edit[$i + 33];
	$result_track_name[$j] = $result_edit[$i + 44];
	$j = $j + 1;
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width" />
    <title>#MOOD-Survey</title>
    <script src="https://kit.fontawesome.com/8aa8789802.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css\survey_search.css" />
</head>

<body>
    <div class="wrapper">
        <header>
            <h2 class="search-emotion">
                나는 '보통'일 때, 이런 노래를 듣는다.
            </h2>
        </header>

        <!-- 검색 창 -->
        <div class="search">
            <form action="survey_search_soso.php" method="POST" name="search_form" onsubmit="return blankSubmit()">
                <input class="search-bar" type="text" name="search_track" placeholder="노래나 가수를 입력하세요" />
                <button class="search-btn" type="submit"></button>
            </form>
        </div>

        <!-- search_track이 빈칸이 아닐 때만 노래검색 결과 출력-->
        <div class="playlist-box">
            <?php
            if($search_track != NULL){
              for($i = 0; $i < 10; $i = $i + 1){
                // survey_save_test.php로 POST로 값들 전송 
                // POST 전송하면서 survey_save_test.php로 창 이동은 X 안 되게 함(target='blank')
                // class=playlist부분이 노래 검색결과 하나하나 나오는 부분
                // >>노래 클릭할 때마다 전송됨<<
                  echo
                  "<form id='choose-song' action='survey_save_test.php' method='POST' target='blank'>
                  <button class='choose-song-btn' type='submit' name='choose'>
                  <input type='hidden' name='result_artist_id' value='$result_artist_id[$i]'>
                  <input type='hidden' name='result_artist_name' value='$result_artist_name[$i]'>
                  <input type='hidden' name='result_track_id' value='$result_track_id[$i]'>
                  <input type='hidden' name='result_track_name' value='$result_track_name[$i]'>
                  <input type='hidden' name='result_track_image' value='$result_track_image[$i]'>
                  <input type='hidden' name='analystic' value='soso'>
                  <ul class='playlist'>
                      <li class='playlist__song'>
                          <img
                          class='albumcover'
                          src='$result_track_image[$i]'
                          width='50%'
                          />
                      <div class='playlist__info'>
                          <h5>$result_track_name[$i]</h5>
                          <h6>$result_artist_name[$i]</h6>
                      </div>
                      </li>
                  </ul> 
                  </button>     
                  </form>";
              }
            }
            ?>
        </div>

        <!-- 이전 버튼 -->
        <a href="survey_search_sad_first.php">
            <button class="prev-btn"></button>
        </a>

        <!-- 다음 버튼 -->
        <a href="survey_search_surprise_first.php">
            <button class="next-btn"></button>
        </a>
    </div>

    <script type="text/javascript" src="js\survey_search.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
</body>

<iframe name='blank' style='display:none' ;></iframe>

</html>