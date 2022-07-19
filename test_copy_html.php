<!DOCTYPE html>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />

    <link rel="stylesheet" href="css/rome.css" />
    <script src="https://kit.fontawesome.com/92a89305e9.js" crossorigin="anonymous"></script>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />

    <!-- Style -->
    <link rel="stylesheet" href="css/result.css" />
    <link rel="stylesheet" href="css/writediary.css" />
    <link rel="stylesheet" href="css/calendar_menu.css" />
    <title>Calendar</title>
</head>
</html>
<body>
<form action="diary_main_test.php" method="post">
    <header>
        <span id="home"><i class="fa-solid fa-house"></i></span>
        <span id="menu"><i class="fa-solid fa-bars"></i></span>
    </header>
    <menu>
        <div class="logo">
        </div>
        <span id="close-menu"><i class="fa-solid fa-xmark"></i></span>
        <div class="container">
            <div class="box">
                <ul>
                    <li><b href="#"><span id="playlist">플레이리스트</span></b></li>
                    <li><b href="#"><span id="alarm">알림</span></b></li>
                    <li><b href="#"><span id="logout">로그아웃</span></b></li>
                </ul>
            </div>
        </div>
    </menu>


    <div class="content">
        <div class="row justify-content-left">
            <div class="col-md-7 text-center">
                <form action="#" class="row">
                    <div class="col-md-12">
                        <div id="inline_cal"></div>
    </div>
    </form>

    </div>
            <div class="box">
                <textarea name="comment" id="comment" placeholder="감정일기를 작성해주세요"></textarea>
                <span class="txsub">남은 글자수 : <input type="text" readonly value="120" name="counter" id="counter">
                </span>
                <pastdiary>
                    <div class="diary">
                        <div class="diary_content_box">
                            <ul>
                                <li><span class=time>10:00pm</span><span class=diary_content>왜안돼?몰라?알수가없숴미친연이라말해~I'mfuckingtomboyoninfictioninfiction내가슴속에끝나지않을이야길쓰고있어우워널붙잡을께fictioninfiction널놓지않을께워우워어어어끝나지않을너와</span></li>
                                <li><span class=time>10:00pm</span><span class=diary_content>이렇게난또fictioninfictioninfiction널잊지못하고fictioninfictioninfiction내가슴속에끝나지않을이야길쓰고있어우워널붙잡을께fictioninfiction널놓지않을께워우워어어어끝나지않을너와</span></li>
                                <li><span class=time>10:00pm</span><span class=diary_content>이렇게난또fictioninfictioninfiction널잊지못하고fictioninfictioninfiction내가슴속에끝나지않을이야길쓰고있어우워널붙잡을께fictioninfiction널놓지않을께워우워어어어끝나지않을너와</span></li>

                            </ul>
                        </div>
                    </div>
                </pastdiary>

    </div>
            <div class="button_container">
                <button class="btn trigger"><span id="diary_add">+</span></button></div>

        </div>

        <!-- Modal -->
        <div class="modal-wrapper">
            <div class="modal">
                <div class="head">
                    <a class="btn-close trigger" href="#">
                        <i class="fa fa-times" aria-hidden="true"></i>
                    </a>
                </div>
                <div class="emotion_content">
                            <h6>{{emotion}}일 때, 이런 음악은 어떠신가요?</h6>

                        <ul class="playlist">
                            <li class="playlist__song">
                                <div class="bookmark">
                                    <span id="check"><i class="fa-solid fa-circle-check fa-2x"></i></span>
                                    <span id="noncheck"><i class="fa-solid fa-circle fa-2x"></i></span>
                                </div>
                                <img
                                        class="albumcover"
                                        src="https://image.bugsm.co.kr/album/images/original/1901/190115.jpg?version=undefined"
                                        width="50%"
                                />
                                <div class="playlist__info">
                                    <h5>I Don't Care</h5>
                                    <h6>투애니원</h6>
                                </div>
                                <div class="btn-play">
                                    <a
                                            href="https://open.spotify.com/album/5WyEkWi7ZPMrVSbU1Cabba?highlight=spotify:track:1ErdaM9N7EJ7trhXFnDECg"
                                            target="_blank"
                                    >
                                        <i class="fa-solid fa-play fa-3x"></i>
                                    </a>
                                </div>
                            </li>
                            <li class="playlist__song">

                                <div class="bookmark">
                                    <i class="fa-solid fa-circle fa-2x"></i>
                                </div>
                                <img
                                        class="albumcover"
                                        src="https://image.bugsm.co.kr/album/images/original/1901/190115.jpg?version=undefined"
                                        width="50%"
                                />
                                <div class="playlist__info">
                                    <h5>I Don't Care</h5>
                                    <h6>투애니원</h6>
                                </div>
                                <div class="btn-play">
                                    <a
                                            href="https://open.spotify.com/album/5WyEkWi7ZPMrVSbU1Cabba?highlight=spotify:track:1ErdaM9N7EJ7trhXFnDECg"
                                            target="_blank"
                                    >
                                        <i class="fa-solid fa-play fa-3x"></i>
                                    </a>
                                </div>
                            </li>
                            <li class="playlist__song">

                                <div class="bookmark">
                                    <i class="fa-solid fa-star fa-2x"></i>
                                </div>
                                <img
                                        class="albumcover"
                                        src="https://image.bugsm.co.kr/album/images/original/1901/190115.jpg?version=undefined"
                                        width="50%"
                                />
                                <div class="playlist__info">
                                    <h5>I Don't Care</h5>
                                    <h6>투애니원</h6>
                                </div>
                                <div class="btn-play">
                                    <a
                                            href="https://open.spotify.com/album/5WyEkWi7ZPMrVSbU1Cabba?highlight=spotify:track:1ErdaM9N7EJ7trhXFnDECg"
                                            target="_blank"
                                    >
                                        <i class="fa-solid fa-play fa-3x"></i>
                                    </a>
                                </div>
                            </li>
                </ul></div>
                </div>
            </div>
    </div>
    </div>



    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/rome.js"></script>
    <script src="js/calendar_menu.js"></script>
    <script src="js/writediary.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
</form>

</body>
</html>
