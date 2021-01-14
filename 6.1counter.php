<?php
    error_reporting(0);
//函式規定報告哪個錯誤 。該函式設定當前指令碼的錯誤報告級別。該函式返回舊的錯誤報告級別。
    session_start();
//Session 與 Cookie 一樣都是要啟用的，啟用 session 請使用 session_start() 函數，而且必須放在程式的最開頭，還沒輸出任何東西之前，否則會出錯。
    if (!isset($_SESSION["counter1"])){
        $_SESSION["counter1"]=1;     //設定Session值
    }else{
        $_SESSION["counter1"]++;
    }
    echo "登入{$_SESSION["counter1"]}人次";
?>
