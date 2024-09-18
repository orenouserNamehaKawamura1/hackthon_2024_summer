"use strict";
// 要素一覧
const selectTag = document.getElementById("selectTag");
const selectOpen = document.getElementById("selectOpen");
const closeButton = document.getElementById("closeButton");



// イベント一覧

 // タグを選択する要素を表示
selectOpen.addEventListener("click", (event) => {
    selectTag.removeAttribute("hidden", "hidddn");
});
 // タグを選択する要素を非表示
 closeButton.addEventListener("click", (event) => {
    selectTag.setAttribute("hidden", "hidddn");
});

// タグを選択する要素を削除

// 初期処理
// selectTag.setAttribute("hidden", "hidddn");
