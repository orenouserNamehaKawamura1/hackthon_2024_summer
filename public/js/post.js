"use strict";
// 要素一覧
const selectTag = document.getElementById("selectTag");
const selectOpen = document.getElementById("selectOpen");

// イベント一覧
selectOpen.addEventListener("click", (event) => {
    // タグを選択する要素を表示
    selectTag.removeAttribute("hidden", "hidddn");
});
// 初期処理
selectTag.setAttribute("hidden", "hidddn");
