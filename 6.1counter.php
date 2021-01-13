<?php
    error_reporting(0);
    session_start();
    if (!isset($_SESSION["counter1"])){
        $_SESSION["counter1"]=1;
    }else{
        $_SESSION["counter1"]++;
    }
    echo "登入{$_SESSION["counter1"]}人次";
?>
