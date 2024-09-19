"use strict";
// 要素一覧
const editMenu = document.getElementById("editMenu");
const selectOpen = document.getElementById("selectOpen");
const closeButton = document.getElementById("closeButton");
const problemButton = document.getElementById("toggle");
const problemRadio = document.getElementsByClassName("problem");
const TagRadio = document.getElementsByClassName("TagRadio");
const tagSelect = document.getElementById("tagSelect");


// イベント一覧

 // タグを選択する要素を表示
selectOpen.addEventListener("click", (event) => {
    editMenu.removeAttribute("hidden", "hidddn");
});
 // タグを選択する要素を非表示
 closeButton.addEventListener("click", (event) => {
    editMenu.setAttribute("hidden", "hidddn");
});

// タグの選択を反映させる関数
for(let i = 0; i < TagRadio.length; i++){
    TagRadio[i].addEventListener("change", { index: i, handleEvent: selectedTag });
}

// お悩みか発信かを切り替えるイベント
problemButton.addEventListener("change",(event)=>{
    // checkboxのオンオフを格納
    const flg = event.target.checked;
    if(flg){
        problemRadio[0].checked = true;
    }else{
        problemRadio[1].checked = true;
    }
    
})

function selectedTag(){
    // 選択するindex番号を取得する
    const index = this.index;
    // 投稿画面のタグのselectboxの値を選択する
    tagSelect[index].selected = true;
 
}
// タグを選択する要素を削除

// 初期処理
editMenu.setAttribute("hidden", "hidddn");
