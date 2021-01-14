<?php
    error_reporting(0);   //報告執行時錯誤
    session_start();     //啟動Session的使用
    if (!isset($_SESSION["id"])){   //檢查Session值是否存在
        echo "請登入系統";       //這行會被echo出來文字「請登入系統」 
        echo "<meta http-equiv='refresh' content='3; url=login.html'>";   //上面例子會讓網頁在載入 3 秒後，自動跳轉到login.html
    }else{
        echo "歡迎 {$_SESSION['id']} 登入 [<a href=logout.php>登出</a>]<p>[<a href=bulletin_add_form.php>新增佈告</a>]<p>";
        $conn=mysqli_connect("localhost","root","", "mydb");     //建立資料庫連線，如果$conn=false代表連結不成功
        $result=mysqli_query($conn, "select * from bulletin");
        echo "<table border=2><tr><td>佈告操作</td><td>佈告編號</td><td>佈告類別</td><td>標題</td><td>佈告內容</td><td>發佈時間</td></tr>";
        while ($row=mysqli_fetch_array($result)){
            echo "<tr><td>";
            echo "<a href=bulletin_edit_form.php?bid='$row[bid]'>修改</a> <a href=delete.php?bid={$row[bid]}>刪除</a>";
            echo "</td><td>";
            echo $row[bid];
            echo "</td><td>";
            echo $row[type];
            echo "</td><td>"; 
            echo $row[title];
            echo "</td><td>";
            echo $row[content]; 
            echo "</td><td>";
            echo $row[time];
            echo "</td></tr>";
        }
        echo "</table>";
    }
?>
