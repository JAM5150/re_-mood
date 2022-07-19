<?php
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
                나는 '분노'일 때, 이런 노래를 듣는다.
            </h2>
        </header>

        <!-- 검색 창 -->
        <div class="search">
            <form action="survey_search_angry.php" method="POST" name="search_form" onsubmit="return blankSubmit()">
                <input class="search-bar" type="text" name="search_track" placeholder="노래나 가수를 입력하세요" />
                <button class="search-btn" type="submit"></button>
            </form>
        </div>

        <!-- search_track이 빈칸이 아닐 때만 노래검색 결과 출력-->
        <div class="playlist-box">
           
        </div>

        <!-- 이전 버튼 -->
        <a href="survey_search_surprise_first.php">
            <button class="prev-btn"></button>
        </a>

        <!-- 다음 버튼 -->
        <a href="survey_result_page.php">
            <button class="next-btn"></button>
        </a>
    </div>

    <script type="text/javascript" src="js\survey_search.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
</body>

<iframe name='blank' style='display:none' ;></iframe>

</html>