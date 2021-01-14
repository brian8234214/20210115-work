<?php 
    error_reporting(0); //報告執行時錯誤
    $conn = mysqli_connect("localhost", "root", "", "mydb");
//建立資料庫連線，如果$conn=false代表連結不成功
    if (mysqli_connect_error($conn))
      die("無法連線資料庫");
//如果連接失敗，顯示錯誤
    $sql="select * from bulletin where bid = {$_GET['bid']}"; 
    //echo $sql;
    $result=mysqli_query($conn, $sql);
    $row=mysqli_fetch_array($result);
   
echo "
<html>
<head><title>修改佈告</title></head>
<body> 
//用來呈現網頁的主要內容
  <h2>修改佈告</h2>
  <form action='bulletin_edit.php' method='post'>
  //按下送出表單之後，會將資料傳送到 bulletin_edit.php 這程式
    <input type=hidden name=bid value=$row[bid]>
    佈告標題：<input  type='text' name='title' size=200 value='$row[title]'><p>      
    佈告內容：<p>
    <textarea rows='20' cols='100' name='content'>$row[content]</textarea> 
    <p>
    佈告類型：<p>
    <input name='type' value='1' ";
    if ($row['type']==1) echo "checked ";
    echo "type='radio'>系上公告 
    <input name='type' value='2' ";
    if ($row['type']==2) echo "checked  ";
    echo "type='radio'>招生訊息 
    <input name='type' value='3' ";
    if ($row['type']==3) echo "checked ";
    echo "type='radio'>企業徵才<p>      
    發佈時間：<input type=date name='time' value=$row[time]><p>      
    <input type=submit>
  </form>
</body>
</html>
"; 
?>
