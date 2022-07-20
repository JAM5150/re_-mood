<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width" />
    <title>Today's mood</title>
    <script
      src="https://kit.fontawesome.com/8aa8789802.js"
      crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href="css/result.css" />
  </head>
  <body>
    <div class="wrapper">
      <div class="top-header">
        <h2>5월 26일 기준</h2>
      </div>

      <header>
        <h1>'기쁨'</h1>
        <h2>일 때, 이런 음악은 어떠신가요?</h2>
      </header>

      <ul class="playlist">
        <li class="playlist__song">
          <input type="checkbox" id="chk01" name="chklist" value="music0" class="song_check">
          <!-- <input type=checkbox name=chklist value=".$chkList[$i]["num"]." onclick=save_selected()> 이거 php에 들어갈 체크박스 코드!! 각 체크박스코드 이걸로 대체해서 쓰기!-->
            <img class="albumcover" src="https://image.bugsm.co.kr/album/images/original/1901/190115.jpg?version=undefined" width="50%"/>
          <div class="playlist__info">
            <h5>I Don't Care</h5>
            <h6>투애니원</h6>
          </div>
          <div class="btn-play">
            <a href="https://open.spotify.com/album/5WyEkWi7ZPMrVSbU1Cabba?highlight=spotify:track:1ErdaM9N7EJ7trhXFnDECg" target="_blank">
              <i class="fa-solid fa-play fa-3x"></i>
            </a>
          </div>
        </li>

        <li class="playlist__song">
          <input type="checkbox" id="chk01" name="chklist" value="music1" class="song_check">
          <img
          class="albumcover"
          src="https://image.bugsm.co.kr/album/images/original/5323/532394.jpg?version=undefined"
          width="50%"
        />
        <div class="playlist__info">
          <h5>하루의 끝(End of a day)</h5>
          <h6>종현</h6>
        </div>
        <div class="btn-play">
          <a href="https://open.spotify.com/album/5WyEkWi7ZPMrVSbU1Cabba?highlight=spotify:track:1ErdaM9N7EJ7trhXFnDECg" target="_blank">
            <i class="fa-solid fa-play fa-3x"></i>
          </a>
        </div>
        </li>

        <li class="playlist__song">
          <input type="checkbox" id="chk01" name="chklist" value="music2" class="song_check">
        <img
        class="albumcover"
        src="https://image.bugsm.co.kr/album/images/original/155189/15518966.jpg?version=undefined"
        width="50%"
      />
      <div class="playlist__info">
        <h5>Every Second</h5>
        <h6>Mina Okabe</h6>
      </div>
      <div class="btn-play">
        <a href="https://open.spotify.com/album/5WyEkWi7ZPMrVSbU1Cabba?highlight=spotify:track:1ErdaM9N7EJ7trhXFnDECg" target="_blank">
          <i class="fa-solid fa-play fa-3x"></i>
        </a>
      </div>
        </li>
      </ul>
      <button id="save_btn" type="button" class="save">저장 완료</button>
    </div>
  </body>
</html>
