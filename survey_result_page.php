<?php
if(!session_id()) {
	// id가 없을 경우 세션 시작
	session_start();
}
include("DB_connect.php");
// 세션 사용 $uid = $_SESSION['uid'];
// 테스트용
$uid = $_SESSION['user_email_address'];
// echo "uid: ".$uid."<br/>";

//변수 선언
$joy_survey_result = array();
$soso_survey_result = array();
$sad_survey_result = array();
$angry_survey_result = array();
$surprise_survey_result = array();
// //joy
$save_joy_result = mysqli_query($con,
		"SELECT track_id FROM survey WHERE uid = '$uid' AND analystic = 'joy'");
$row12 = mysqli_fetch_assoc($save_joy_result);
$row1 = $row12['track_id'];
$save_music_result = mysqli_query($con,
		"SELECT * FROM music_info WHERE track_id = '$row1'");
$row = mysqli_fetch_assoc($save_music_result);
$joy_survey_result[0] = $row["track_name"];
$joy_survey_result[1] = $row['artist_name'];
// //soso
$save_soso_result = mysqli_query($con,
		"SELECT track_id FROM survey WHERE uid = '$uid' AND analystic = 'soso'");
$row12 = mysqli_fetch_assoc($save_soso_result);
$row1 = $row12['track_id'];
$save_music_result = mysqli_query($con,
		"SELECT * FROM music_info WHERE track_id = '$row1'");
$row = mysqli_fetch_assoc($save_music_result);
$soso_survey_result[0] = $row['track_name'];
$soso_survey_result[1] = $row['artist_name'];
// //sad
$save_sad_result = mysqli_query($con,
		"SELECT track_id FROM survey WHERE uid = '$uid' AND analystic = 'sad'");
$row12 = mysqli_fetch_assoc($save_sad_result);
$row1 = $row12['track_id'];
$save_music_result = mysqli_query($con,
		"SELECT * FROM music_info WHERE track_id = '$row1'");
$row = mysqli_fetch_assoc($save_music_result);
$sad_survey_result[0] = $row['track_name'];
$sad_survey_result[1] = $row['artist_name'];
// //angry
$save_angry_result = mysqli_query($con,
		"SELECT track_id FROM survey WHERE uid = '$uid' AND analystic = 'angry'");
$row12 = mysqli_fetch_assoc($save_angry_result);
$row1 = $row12['track_id'];
$save_music_result = mysqli_query($con,
		"SELECT * FROM music_info WHERE track_id = '$row1'");
$row = mysqli_fetch_assoc($save_music_result);
$angry_survey_result[0] = $row['track_name'];
$angry_survey_result[1] = $row['artist_name'];
// //surprise
$save_surprise_result = mysqli_query($con,
		"SELECT track_id FROM survey WHERE uid = '$uid' AND analystic = 'surprise'");
$row12 = mysqli_fetch_assoc($save_surprise_result);
$row1 = $row12['track_id'];
$save_music_result = mysqli_query($con,
		"SELECT * FROM music_info WHERE track_id = '$row1'");
$row = mysqli_fetch_assoc($save_music_result);
$surprise_survey_result[0] = $row['track_name'];
$surprise_survey_result[1] = $row['artist_name'];

// //출력 테스트
// echo "joy- 노래 명: ".$joy_survey_result[0]." 가수 명: ".$joy_survey_result[1]."<br/>";
// echo "soso- 노래 명: ".$soso_survey_result[0]." 가수 명: ".$soso_survey_result[1]."<br/>";
// echo "sad- 노래 명: ".$sad_survey_result[0]." 가수 명: ".$sad_survey_result[1]."<br/>";
// echo "angry- 노래 명: ".$angry_survey_result[0]." 가수 명: ".$angry_survey_result[1]."<br/>";
// echo "surprise- 노래 명: ".$surprise_survey_result[0]." 가수 명: ".$surprise_survey_result[1]."<br/>";
/*
// 제가 테스트 하느라 암거나 변수만 빼다가 아무 값 넣어서 해봤슴다. 디자인 보고 삭제해주세욥
$joy_survey_result[0]="joy_track_name";
$sad_survey_result[0]="sad_track_name";
$soso_survey_result[0]="soso_track_name";
$surprise_survey_result[0]="surprise_track_name";
$angry_survey_result[0]="angry_track_name";

$joy_survey_result[1]="joy_artist_name";
$sad_survey_result[1]="sad_artist_name";
$soso_survey_result[1]="soso_artist_name";
$surprise_survey_result[1]="surprise_artist_name";
$angry_survey_result[1]="angry_artist_name";
*/
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width" />
    <title>#MOOD-Survey</title>
    <script src="https://kit.fontawesome.com/8aa8789802.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css\survey_result.css" />
</head>

<body>
    <div class="wrapper">
        <header>
            <h2>설문조사 결과</h2>
            <h5>이전을 눌러 수정하거나 다음을 눌러 설문을 완료하세요</h5>
        </header>

        <!-- 감정별 노래들 -->
        <ul class="playlist">
            <li class="playlist__song">
                <div class="emotion">기쁨</div>
                <div class="playlist__info">
                    <p class="track_name"><?php echo $joy_survey_result[0] ?></p>
                    <p class="artist_name"><?php echo $joy_survey_result[1] ?></p>
                </div>
            </li>

            <li class="playlist__song">
                <div class="emotion">슬픔</div>
                <div class="playlist__info">
                    <p class="track_name"><?php echo $sad_survey_result[0] ?></p>
                    <p class="artist_name"><?php echo $sad_survey_result[1] ?></p>
                </div>
            </li>

            <li class="playlist__song">
                <div class="emotion">보통</div>
                <div class="playlist__info">
                    <p class="track_name"><?php echo $soso_survey_result[0] ?></p>
                    <p class="artist_name"><?php echo $soso_survey_result[1] ?></p>
                </div>
            </li>

            <li class="playlist__song">
                <div class="emotion">놀람</div>
                <div class="playlist__info">
                    <p class="track_name"><?php echo $surprise_survey_result[0] ?></p>
                    <p class="artist_name"><?php echo $surprise_survey_result[1] ?></p>
                </div>
            </li>

            <li class="playlist__song">
                <div class="emotion">분노</div>
                <div class="playlist__info">
                    <p class="track_name"><?php echo $angry_survey_result[0] ?></p>
                    <p class="artist_name"><?php echo $angry_survey_result[1] ?></p>
                </div>
            </li>
        </ul>

        <!-- 설문조사 페이지(angry)로 이동 -->
        <a href="survey_search_angry_first.php">
            <button class="prev-btn"></button>
        </a>

        <!--다이어리 메인 페이지로 연결-->
        <a href="main.php">
            <button class="next-btn"></button>
        </a>

        <!--수정 전ver. 완료버튼 하나-->
        <!-- <a href="main.html">
            <div class="end-btn">
                <p>완료</p>
            </div>
        </a> -->
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1pywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous"></script>
</body>

</html>