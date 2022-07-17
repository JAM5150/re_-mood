{/* <script>
    var checkUnload = true;    
    $(window).on("beforeunload", function(){
        if(checkUnload) return "이 페이지를 벗어나면 작성된 내용은 저장되지 않습니다.";    
    });
</script>

$("#saveBtn").on("click", function(){
        checkUnload = false;
        $("#saveForm").submit();
}); */}


$(function(){
    $('#savebtn').click(function(){
       location.replace('');
    });
});