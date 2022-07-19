const panel = document.querySelector(".search-emotion");
const playlist = document.querySelector(".playlist-box");

// 빈칸 검색 방지-빈칸 검색시 경고창 뜨고 검색 결과 뜨는 칸 감춰짐
function blankSubmit() {
  var search = document.search_form;

  if (search.search_track.value == "") {
    playlist.style.visibility = "none";
    alert("검색어를 입력하세요!");
    return false;
  }
}

// 노래 선택 시 뜨는 경고창(알람창)-선택됐다는 확인용
playlist.addEventListener("click", (e) => {
  alert("선택되었습니다!");
});
