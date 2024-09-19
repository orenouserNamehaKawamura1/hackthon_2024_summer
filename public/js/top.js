"use strict";
const tagColor = ["yellow", "#E0E62F", "#E3DB2F", "#E8CB2E", "#F0B22D", "#F69E2D", "#FC872C", "#F56551", "#F84A75"];
const changeColor = ["yellow", "#E0E62F", "#E3DB2F", "#E8CB2E", "#F0B22D", "#F69E2D", "#FC872C", "#F56551", "#F84A75"];
const tagLabel = document.getElementsByClassName("tab-label");
const tabContent = document.getElementsByClassName("tab-content");
// 現在選択されている要素番号を格納する変数
let nowIndex = 0;
for (let i = 0; i < tagLabel.length; i++) {
    // 色を変える関数に要素番号を渡す
    tagLabel[i].addEventListener("click", { index: i, handleEvent: changeTabColor });
}

// tabの色を変える関数
function changeTabColor() {
    // 要素番号を受け取る
    const index = this.index;
    // 同じタブが押された場合は処理を実行しない
    if (nowIndex === index) {
        return;
    }
    // 選択された要素のスタイルを変更
    tagLabel[index].style.cssText = `background-color: ${changeColor[index]}; border: 2px solid ${changeColor[index]}; padding:3px; margin-top:6px`;
    // 選択されたコンテンツのボーダーを変更
    tabContent[index].style.cssText = `border: 2px solid ${changeColor[index]}; `;
    // 元々選択されていた色を元の色に変更
    tagLabel[nowIndex].style.cssText = `background-color: ${tagColor[nowIndex]}; border:none;`;
    // 元々選択されていたコンテンツのボーダーを削除
    tabContent[nowIndex].style.cssText = `border: none`;
    // 表示したコンテンツに表示するクラスを付与
    tabContent[index].classList.add("tab-content-on");
    // 元々表示されていたコンテンツの表示するクラスを削除
    tabContent[nowIndex].classList.remove("tab-content-on");
    // 現在選択されている要素を変更
    nowIndex = index;
}
// ページ表示時に実行する処理
function init() {
    // 一覧表示(tab1)に必要なスタイルを適用
    // 選択された要素のスタイルを変更
    tagLabel[0].style.cssText = `background-color: ${changeColor[0]}; border: 2px solid ${changeColor[0]}`;
    // 選択されたコンテンツのボーダーを変更
    tabContent[0].style.cssText = `border: 2px solid ${changeColor[0]}`;
    // 表示したコンテンツに表示するクラスを付与
    tabContent[0].classList.add("tab-content-on");

    for (let i = 0; i < tagLabel.length; i++) {
        // タブに背景色を付ける
        tagLabel[i].style.cssText = `background-color: ${tagColor[i]}`;
    }
}

init();
