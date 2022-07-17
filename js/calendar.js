// 캘린더 js
$(function () {
  // rome(inline_cal, { time: false });

  rome(inline_cal, { time: false, inputFormat: "YYYY년 MM월 DD일" }).on(
    "data",
    function (value) {
      result.value = value;
    }
  );
});
