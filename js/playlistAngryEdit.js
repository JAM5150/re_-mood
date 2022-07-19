/*앞에 들어간 요소 복사해서 .appendTo()메소드 사용해서 붙여넣기 (01을 복사해서 04뒤에붙인다)
$("#chk01").clone().appendTo("#chk04");  >>여기서 안 쓰는데 일단 둠!*/



//삭제버튼 눌렀을 때 실행되는 함수
function getCheckboxValue() {
  //체크된 항목 모두 가져오기 (체크박스에 체크된 것=삭제할 목록)
  const query = 'input[name="chklist"]:checked';
  const selectedEls =document.querySelectorAll(query);

  // 선택된 목록에서 value 찾기 chklist중 선택된 value값 result에 저장
  let result = '';
  selectedEls.forEach((el) => {
    result += el.value + ' ';
  });

  //콘솔로 확인 > 출력은 music0 music2 이런 식
  console.log(JSON.parse(JSON.stringify(result)));
  let music_data = JSON.stringify(result);
  $("html").load("delete_angry.php", { data: music_data });

  //화남 플리로 이동 >replace사용으로 뒤로가기 눌렀을 때 편집화면으로 못 가도록함
  //location.replace('playlistAngry.html')
}



//src에 변수로 앨범아트 경로 추가 >안쓰는건데 혹시 몰라서 일단 둠
{/* <html>
  <head>
    <script type="text/javascript">
            var profile_image_src = "앨범아트경로";
    </script>
  </head>
<body>
    <img class="albumcover" src="" width="100" height="100">
    <script type="text/javascript">
      document.getElementsByClassName('albumcover').src = profile_image_src;
    </script>
</body>
</html> */}