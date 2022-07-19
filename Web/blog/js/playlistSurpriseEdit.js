//노래 동적 추가

//변수 선언
var track_image="https://i.scdn.co/image/ab67616d0000b2734ed058b71650a6ca2c04adff"; //앨범커버
var track_name="LILAC"; //노래제목
var artist_name ="IU"; //가수이름
var track_id = "5xrtzzzikpG3BLbo4q1Yul" //트랙id =각 체크박스 선택 시 반환되는 값(value)으로 사용

//추가될 음악 정보
let append_music = `
<li id="chk"><input type="checkbox"  name="chklist" value="${track_id}" class="song_check">
  <div class="container__music-box">
  <img class="albumcover" src="${track_image}" width="50%"/>

      <div class="container__detail">
          <h5 id="track_name">${track_name}</h5>
          <span id="artist_name">${artist_name}</span>
      </div>
  </div>
</li>`

//html내에 플레이리스트 li로 추가
$(".container__list").append(append_music);



//삭제되어야 하는 값을 체크 후 삭제버튼 눌렀을 때 실행되는 함수
function getCheckboxValue() {
  //선택된 목록 가져오기 (체크박스에 체크된 것=삭제할 목록)
  const query = 'input[name="chklist"]:checked';
  const selectedEls =document.querySelectorAll(query);

  // 선택된 목록에서 value 찾기 chklist중 선택된 value값 result에 저장
  let result = '';
  selectedEls.forEach((el) => {
    result += el.value + ' ';
  });

  //콘솔로 확인 > 출력은 music0 music2 이런 식
  console.log(JSON.parse(JSON.stringify(result)));

  //기선택했던 플리로 이동 >replace사용으로 뒤로가기 눌렀을 때 편집화면으로 못 가도록함
  location.replace('playlistSurprise.html')

}