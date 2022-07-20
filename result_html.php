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
        <h2>5�� 26�� ����</h2>
      </div>

      <header>
        <h1>'���'</h1>
        <h2>�� ��, �̷� ������ ��Ű���?</h2>
      </header>

      <ul class="playlist">
        <li class="playlist__song">
          <input type="checkbox" id="chk01" name="chklist" value="music0" class="song_check">
          <!-- <input type=checkbox name=chklist value=".$chkList[$i]["num"]." onclick=save_selected()> �̰� php�� �� üũ�ڽ� �ڵ�!! �� üũ�ڽ��ڵ� �̰ɷ� ��ü�ؼ� ����!-->
            <img class="albumcover" src="https://image.bugsm.co.kr/album/images/original/1901/190115.jpg?version=undefined" width="50%"/>
          <div class="playlist__info">
            <h5>I Don't Care</h5>
            <h6>���ִϿ�</h6>
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
          <h5>�Ϸ��� ��(End of a day)</h5>
          <h6>����</h6>
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
      <button id="save_btn" type="button" class="save">���� �Ϸ�</button>
    </div>
  </body>
</html>
