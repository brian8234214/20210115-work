<?php
    session_start();
// //啟動Session的使用
if (!isset($_SESSION['id'])){   
    ////檢查Session值是否存在
    echo "請登入系統";
    echo "<meta http-equiv='refresh' content='3;url=index.html''>"; 
    //meta http-equiv='refresh' content='3頁面定期重新整理，content後面跟的 是時間（單位秒）
    //url=index.html如果加url的，則會重新定向到指定的網頁
}else{
    $conn = mysqli_connect("localhost", "root", "", "mydb");
    if (mysqli_connect_error($conn))
      die("無法連線資料庫");
    $sql="insert into bulletin(title, content, type, time) values ('{$_POST['title']}', '{$_POST['content']}', {$_POST['type']},'{$_POST['time']}')"; 
    //echo $sql;
    if (!mysqli_query($conn, $sql)){
     echo("Error description: " . mysqli_error($conn));   
    }
    else  
       echo "新增佈告成功";   
    mysqli_close($conn);
    echo "<meta http-equiv='refresh' content='3;url=bulletin.php''>"; 
}
?>
