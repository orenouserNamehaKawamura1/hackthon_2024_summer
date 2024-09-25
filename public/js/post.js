"use strict";
// 要素一覧
const editMenu = document.getElementById("editMenu");
const selectOpen = document.getElementById("selectOpen");
const closeButton = document.getElementById("closeButton");
const problemButton = document.getElementById("toggle");
const problemRadio = document.getElementsByClassName("problem");
const TagRadio = document.getElementsByClassName("TagRadio");
const tagSelect = document.getElementById("tagSelect");
const addButton = document.getElementById("addButton");
// 画面に画像を追加と表示されているボタン
const fileButton = document.getElementById("fileButton");
// heddinで隠されているinput flieボタン
const inputFile = document.getElementById("inputFile");
// お悩みか共有化のlabel
const problemLabel = document.getElementsByClassName("problemLabel");

// 変数一覧
// タグの編集でタグ編集したい要素番号を格納する変数
let TagIndex = 0;
//  お悩みか共有かを格納する変数
let TagFlgIndex = 0;


// イベント一覧

// ◆ポップアップ関連の処理◆

 // タグを選択する要素を表示
selectOpen.addEventListener("click", (event) => {
    // 現在選択されている値を変数に格納しポップアップの初期値を格納
    // お悩みか共有かの処理
    if(problemRadio[0].checked){
        // お悩み相談
        TagFlgIndex = 0;
        problemButton.checked = true;
    }else{
        // 共有
        TagFlgIndex = 1;
        problemButton.checked = false;
    }
    console.log(problemButton.checked);
    
    // タグの処理
    TagIndex = tagSelect.value;
    TagRadio[TagIndex - 1].checked = true;


    // 要素を表示
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

// お悩みか発信かの変更を変数に格納
problemButton.addEventListener("change",(event)=>{
    // checkboxのオンオフを格納
    const flg = event.target.checked;
    if(flg){
        // お悩み相談
        TagFlgIndex = 0;
    }else{
        // 共有
        TagFlgIndex = 1;
    }
    
})

function selectedTag(){
    // 選択されたタグの要素番号を変数に格納
    TagIndex = this.index;
 
}
// タグの編集で追加ボタンが押されたら投稿画面に反映する処理
addButton.addEventListener("click",()=>{
    // タグの編集を反映させる
    tagSelect[TagIndex].selected = true;
    problemRadio[TagFlgIndex].checked = true;

    // お悩み・共有を画面上の表示・非表示を切り替える処理
    if(TagFlgIndex === 0){
        problemLabel[0].removeAttribute("hidden");
        problemLabel[1].setAttribute("hidden","hidden");
    }else{
        problemLabel[0].setAttribute("hidden","hidden");
        problemLabel[1].removeAttribute("hidden");
    }
    // ポップアップを非表示にする
    editMenu.setAttribute("hidden", "hidddn");
});

// ◆画像のアップロードに関する処理◆

// 画像を追加ボタンをクリックしたらinput typefileのclickイベントを発火させる処理
fileButton.addEventListener("click",()=>{
    inputFile.click();
});

// 画像が追加されたら画面に表示する処理
inputFile.addEventListener('change', (event) => {
    const file = event.target.files[0]
  
    // fileがundefinedの時にreader.readAsDataURL(file)がエラーになるため、
    // !fileがfalseの場合にreturnする。
    if (!file) return
  
    const reader = new FileReader()
    
    // 背景画像を表示させる要素を取得
    const postImg = document.getElementById("postImg");

    reader.onload = (event) => {
        postImg.src = event.target.result;
    }
  
    reader.readAsDataURL(file)

    // 画像のhiddenを削除する
    postImg.removeAttribute("hidden")
    postImg.style.cssText = "display:block;"
    const imgBox = document.getElementById("imgBox")
    imgBox.style.cssText = " background-color: white;";
    
  })



// 初期処理
editMenu.setAttribute("hidden", "hidddn");
