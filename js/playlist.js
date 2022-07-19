//노래 동적 추가

//변수 선언
var track_image="https://i.scdn.co/image/ab67616d0000b2734ed058b71650a6ca2c04adff"; //앨범커버
var track_name="LILAC"; //노래제목
var artist_name ="IU"; //가수이름
var track_id = "5xrtzzzikpG3BLbo4q1Yul" //트랙id =각 체크박스 선택 시 반환되는 값(value)으로 사용
var track_prev = "https://open.spotify.com/album/5WyEkWi7ZPMrVSbU1Cabba?highlight=spotify:track:1ErdaM9N7EJ7trhXFnDECg"; //미리듣기url

//추가될 음악 정보
let append_music = `
<li>
  <div class="container__music-box">
  <img class="albumcover" src="${track_image}" width="50%"/>
      <div class="container__detail">
          <h5 id="track_name">${track_name}</h5>
          <span id="artist_name">${artist_name}</span>
      </div>
  </div>
  <div class="btn-play">
  <a href="${track_prev}" target="_blank">
    <i class="fa-solid fa-play fa-3x"></i>
  </a>
</div>
</li>`

//html내에 플레이리스트 li로 추가
$(".container__list").append(append_music);