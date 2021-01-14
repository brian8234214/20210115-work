<?php
    error_reporting();
//error_reporting()函式是用來設定錯誤級別並返回當前級別的。
    $conn=mysqli_connect("localhost","root","","mydb");
    // delete from bulletin where bid=???
////連接mysql數據庫中的mydb資料庫
    $sql="delete from bulletin where bid={$_GET[bid]}";
    //echo $sql;
    if (!mysqli_query($conn, $sql))
        echo "刪除錯誤";
    else{
        echo "刪除成功；回前頁中...";
        echo "<meta http-equiv='refresh' content='3;url=bulletin.php'>"; 
    }
?>
