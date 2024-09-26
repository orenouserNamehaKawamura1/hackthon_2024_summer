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
const tagShareLabel = document.getElementsByClassName("tab-label-share");
const tagShareContent = document.getElementsByClassName("tab-content-share");
const questionContent = document.querySelector(".tab-content");
const allContent = document.querySelectorAll(".tab-content");
const tabShareContent = document.querySelector(".tab-content-share");
const tabAllShareContent = document.querySelectorAll(".tab-content-share");
let currentTab = "question";

// 現在選択されている要素番号を格納する変数
let nowIndex = 0;

function setTabClickEvents() {
    if (currentTab === "question") {
        resetCategoryTabs();
        resetTabDisplay();
        for (let i = 0; i < tagLabel.length; i++) {
            // 色を変える関数に要素番号を渡す
            tagLabel[i].addEventListener("click", {
                index: i,
                handleEvent: changeTabColor,
            });
        }
    } else if (currentTab === "share") {
        resetCategoryTabs();
        resetTabDisplay();
        for (let i = 0; i < tagShareLabel.length; i++) {
            // 色を変える関数に要素番号を渡す
            tagShareLabel[i].addEventListener("click", {
                index: i,
                handleEvent: changeTabColor,
            });
        }
    }
}

// タブのリセット
function resetTabDisplay() {
    // すべてのタブコンテンツを非表示にする
    if (currentTab === "share") {
        allContent.forEach((content) => (content.style.display = "none"));
    } else if (currentTab === "question") {
        tabAllShareContent.forEach(
            (content) => (content.style.display = "none")
        );
    }
}

// タブの選択状態をリセットする関数
function resetCategoryTabs() {
    // 質問タブのカテゴリーの選択状態をリセット
    for (let i = 0; i < tagLabel.length; i++) {
        // 背景色とボーダーをリセット
        tagLabel[
            i
        ].style.cssText = `background-color: ${tagColor[i]}; border: none;`;
        // 表示状態もリセット
        tabContent[i].classList.remove("tab-content-on");
    }

    // 共有タブのカテゴリーの選択状態をリセット
    for (let i = 0; i < tagShareLabel.length; i++) {
        tagShareLabel[
            i
        ].style.cssText = `background-color: ${tagColor[i]}; border: none;`;
        tagShareContent[i].classList.remove("tab-content-on");
    }

    // すべてタブを初期選択状態にする
    if (currentTab === "question") {
        // 質問タブの最初のカテゴリー（例: すべてタブ）を選択
        tagLabel[0].style.cssText = `background-color: ${changeColor[0]}; border: 2px solid ${changeColor[0]};`;
        tabContent[0].classList.add("tab-content-on");
    } else if (currentTab === "share") {
        // 共有タブの最初のカテゴリー（例: すべてタブ）を選択
        tagShareLabel[0].style.cssText = `background-color: ${changeColor[0]}; border: 2px solid ${changeColor[0]};`;
        tagShareContent[0].classList.add("tab-content-on");
    }

    // nowIndexをリセット
    nowIndex = 0;
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
    } else if (currentTab === "share") {
        // 選択された要素のスタイルを変更
        tagShareLabel[
            index
        ].style.cssText = `background-color: ${changeColor[index]}; border: 2px solid ${changeColor[index]}; padding:3px; margin-top:6px`;
        // 選択されたコンテンツのボーダーを変更
        tagShareContent[
            index
        ].style.cssText = `border: 2px solid ${changeColor[index]}; `;
        // 元々選択されていた色を元の色に変更
        tagShareLabel[
            nowIndex
        ].style.cssText = `background-color: ${tagColor[nowIndex]}; border:none;`;
        // 元々選択されていたコンテンツのボーダーを削除
        tagShareContent[nowIndex].style.cssText = `border: none`;
        // 表示したコンテンツに表示するクラスを付与
        tagShareContent[index].classList.add("tab-content-on");
        // 元々表示されていたコンテンツの表示するクラスを削除
        tagShareContent[nowIndex].classList.remove("tab-content-on");
    }

    if (currentTab === "question") {
        questionContent.style.display = "block";
        tabAllShareContent.forEach(function (item) {
            item.style.display = "none";
        });
    } else if (currentTab === "share") {
        questionContent.style.display = "none";
        allContent.forEach(function (item) {
            item.style.display = "none";
        });
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
    const questionWrap = document.querySelector(".tab-wrap");
    const shareContent = document.querySelector(".tab-wrap-share");
    const tabShareContent = document.querySelectorAll(".tab-content-share");
    const allContent = document.querySelectorAll(".tab-content");

    // 初期状態では質問のコンテンツを表示、共有のコンテンツを非表示にする
    shareContent.style.display = "none";
    setTabClickEvents();

    // 質問タブがクリックされた時の動作
    questionTab.addEventListener("click", function () {
        if (this.checked) {
            resetTabDisplay();
            questionLabel.style.display = "block";
            questionContent.style.display = "block";
            questionWrap.style.display = "flex";
            shareContent.style.display = "none";
            allContent.forEach(function (item) {
                item.style.display = "block";
                console.log(item);
            });
            currentTab = "question";
            setTabClickEvents();
            init();
        }
    });

    // 共有タブがクリックされた時の動作
    shareTab.addEventListener("click", function () {
        if (this.checked) {
            resetTabDisplay();
            questionLabel.style.display = "none";
            questionContent.style.display = "none";
            shareContent.style.display = "flex";
            questionWrap.style.display = "none";
            tabShareContent.forEach(function (item) {
                item.style.display = "block";
                console.log(item);
            });
            currentTab = "share";
            setTabClickEvents();
            init();
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

    // 共有タブのスタイルを設定
    tagShareLabel[0].style.cssText = `background-color: ${changeColor[0]}; border: 2px solid ${changeColor[0]}`;
    // 選択されたコンテンツのボーダーを変更
    tagShareContent[0].style.cssText = `border: 2px solid ${changeColor[0]}`;
    // 表示したコンテンツに表示するクラスを付与
    tagShareContent[0].classList.add("tab-content-on");

    for (let i = 0; i < tagShareLabel.length; i++) {
        // タブに背景色を付ける
        tagShareLabel[i].style.cssText = `background-color: ${tagColor[i]}`;
    }
}

init();
