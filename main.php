<?php 
function func(){
	header('Location: logout.php');
}
?>
<!DOCTYPE html>
  <head>
    <!-- Required meta tags -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />

    <link rel="stylesheet" href="css/rome.css?var1" />
  <script src="https://kit.fontawesome.com/92a89305e9.js" crossorigin="anonymous"></script>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />

    <!-- Style -->
    <link rel="stylesheet" href="css/main.css" />
    <link rel="stylesheet" href="css/menu.css" />
    <title>#MOOD</title>
  </head>
  </html>
  <body>
    <form action="write_diary_page.php" method="post">
      <!--메뉴 화면-->
    <header>

      <span id="menu"><i class="fa-solid fa-bars"></i></span>
  </header>
  <menu>
    <div class="logo">
    </div>
    <!--X 닫기 버튼-->
    <span id="close-menu"><i class="fa-solid fa-xmark"></i></span>
    <div class="container">
      <div class="box">
        <ul>
          <!--플레이리스트-->
          <li><a href="<?php echo "playlistJoy.php";?>"><span id="playlist">플레이리스트</span></a></li>
          <!--알림-->
          <li><a href="<?php echo "alarm.php";?>"><span id="alarm">알림</span></a></li>
          <!--로그아웃-->
          <li><a href="<?php echo "logout.php";?>"><span id="logout">로그아웃</span></a>
          
         </li>
        </ul>
      </div>
    </div>
    </menu>

      <!--달력 부분-->
    <div class="content">

        <div class="row justify-content-center">
          <div class="col-md-10 text-center">
              <input
                      type="text"
                      class="form-control w-25 mx-auto mb-3"
                      id="result"
                      placeholder="Select date"
                      disabled=""

              />
            <form action="#" class="row">
              <div class="col-md-12">
                <div id="inline_cal"></div>
              </div>
            </form>
          </div>
          </div>
      <!--달력 추가버튼 writediary홈페이지로 가는-->
      <div class="button_container">
       
        <button class="btn" href = "write_diary_page.php"><span id="diaryadd">+</span></button>
        </a>
      </div>
        </div>



    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/rome.js"></script>
      <script src="js/calendar.js?ver=4"></script>
    <script src="js/menu.js?ver=1"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    </form>

  </body>
</html>
