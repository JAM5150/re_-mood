<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>알람</title>
    <link rel="stylesheet" href="css/alarm.css" />
</head>
<body>
<div class="slider-toggle left">
    <span class="label">ON</span>
    <span class="slider">
        <span class="toggle">
            <span class="grip"></span>
        </span>
    </span>
    <span class="label">OFF</span>
</div>
<div class='container'>
    <div onclick="notifyME()"></div>
    <div class='js-alarm nav'>
        <h1>00:00:00</h1>
        <input type='time' min='00:00' max='23:59'/>
        <div class="alarmON"></div>
        <!--완료버튼 누르면 이전 페이지로 갑니다 슝-->
        <button class="btn"><a href="#" onClick="history.back()"><span id="okay">완료</span></a></button>
    </div>
</div>
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/alarm.js"></script>
</body>
</html>