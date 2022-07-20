
function save_selected() {
    //선택된 목록 가져오기 (체크박스에 체크된 것=저장할 음악)
    const query = 'input[name="chklist"]:checked';
    const selectedEls = document.querySelectorAll(query);

    // 선택된 목록에서 value 찾기 chklist중 선택된 value값 result에 저장
    let result = '';
    selectedEls.forEach((el) => {
        result += el.value + ' ';
    });
    let music_data = JSON.stringify(result);
    $("html").load("save_playlist.php", { data: music_data });

}