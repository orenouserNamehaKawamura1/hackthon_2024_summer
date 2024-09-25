"use strict";
const tagColor = [
    "yellow",
    "#E0E62F",
    "#E3DB2F",
    "#E8CB2E",
    "#F0B22D",
    "#F69E2D",
    "#FC872C",
    "#F56551",
    "#F84A75",
];
const changeColor = [
    "yellow",
    "#E0E62F",
    "#E3DB2F",
    "#E8CB2E",
    "#F0B22D",
    "#F69E2D",
    "#FC872C",
    "#F56551",
    "#F84A75",
];
const tagLabel = document.getElementsByClassName("tab-label");
const tabContent = document.getElementsByClassName("tab-content");
const problemContent = document.querySelector(".tab-content");
const questionContent = document.querySelector("question");
const tabShareContent = document.querySelector(".tab-content-share");
let currentTab = "question";

// 現在選択されている要素番号を格納する変数
let nowIndex = 0;
for (let i = 0; i < tagLabel.length; i++) {
    // 色を変える関数に要素番号を渡す
    tagLabel[i].addEventListener("click", {
        index: i,
        handleEvent: changeTabColor,
    });
}

// tabの色を変える関数
function changeTabColor() {
    // 要素番号を受け取る
    const index = this.index;
    // 同じタブが押された場合は処理を実行しない
    if (nowIndex === index) {
        return;
    }

    if (currentTab === "question") {
        problemContent.style.display = "block";
        tabShareContent.style.display = "none";
    } else if (currentTab === "share") {
        problemContent.style.display = "none";
        // questionContent.style.display = "none";
    }

    // 選択された要素のスタイルを変更
    tagLabel[
        index
    ].style.cssText = `background-color: ${changeColor[index]}; border: 2px solid ${changeColor[index]}; padding:3px; margin-top:6px`;
    // 選択されたコンテンツのボーダーを変更
    tabContent[
        index
    ].style.cssText = `border: 2px solid ${changeColor[index]}; `;
    // 元々選択されていた色を元の色に変更
    tagLabel[
        nowIndex
    ].style.cssText = `background-color: ${tagColor[nowIndex]}; border:none;`;
    // 元々選択されていたコンテンツのボーダーを削除
    tabContent[nowIndex].style.cssText = `border: none`;
    // 表示したコンテンツに表示するクラスを付与
    tabContent[index].classList.add("tab-content-on");
    // 元々表示されていたコンテンツの表示するクラスを削除
    tabContent[nowIndex].classList.remove("tab-content-on");

    // 共有コンテンツの枠線をタブの色と同じ色に設定
    if (currentTab === "share") {
        const shareContent = document.querySelector(".tab-wrap-share");
        shareContent.style.cssText = `border: 2px solid ${changeColor[index]}; padding: 10px;`;
    }

    // 現在選択されている要素を変更
    nowIndex = index;
}

document.addEventListener("DOMContentLoaded", function () {
    // 質問と共有のラジオボタン
    const questionTab = document.getElementById("rdobg1");
    const shareTab = document.getElementById("rdobg2");

    // 質問と共有に対応するコンテンツ
    const questionLabel = document.querySelector(".tab-label");
    const questionContent = document.querySelector(".tab-content");
    const shareContent = document.querySelector(".tab-wrap-share");
    const tabShareContent = document.querySelector(".tab-content-share");

    // 初期状態では質問のコンテンツを表示、共有のコンテンツを非表示にする
    shareContent.style.display = "none";

    // 質問タブがクリックされた時の動作
    questionTab.addEventListener("click", function () {
        if (this.checked) {
            questionContent.style.display = "block";
            shareContent.style.display = "none";
            tabShareContent.style.display = "none";
            // init();
            currentTab = "question";
            console.log(currentTab);
        }
    });

    // 共有タブがクリックされた時の動作
    shareTab.addEventListener("click", function () {
        if (this.checked) {
            // questionLabel.style.display = "none";
            questionContent.style.display = "none";
            shareContent.style.display = "block";
            currentTab = "share";
            console.log(currentTab);

            const shareIndex = nowIndex; // 現在選択されているタブの色を使用
            shareContent.style.cssText = `border: 2px solid ${changeColor[shareIndex]}; padding: 10px;`;
        }
    });
});

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
