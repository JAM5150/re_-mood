
function save_selected(){ // 리스트에서 선택 저장
    var playlist = "";
    if(document.form.chklist.length){

        for(var i=0;i<form.chklist.length;i++){

            if(form.chklist[i].checked){

                if(list){
                    list += "|";
                }
        playlist += form.chklist[i].value;
            }
        }
    }
    form.playlist.value = playlist;
}