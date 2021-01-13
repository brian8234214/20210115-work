<?php
    error_reporting(0);
  //error_reporting()函式是用來設定錯誤級別並返回當前級別的。

    $conn = mysqli_connect("localhost","root","", "mydb");
 //連接mysql數據庫中的mydb資料庫

    if (mysqli_connect_error($conn))
        die("資料庫連線錯誤");
//如果$conn引用失敗則返回一個字符串描述的最後連接錯誤 出現資料庫連線錯誤

    mysqli_set_charset($conn, "utf8");
 //引用$conn 修改連結的資料庫為"utf8"

    $result=mysqli_query($conn, "select * from user");
    //引用上一個$conn資料庫中的連結 打開from user

    $login=FALSE;
    while ($row=mysqli_fetch_array($result)) {
        if ($_POST["id"] == $row["id"] && $_POST["pwd"]==$row["pwd"]) 
        $login=TRUE;
    }
//函数从结果集中取得一行作为关联数组，或数字数组，或二者兼有。 该函数返回的字段名是区分大小写的。


    if  (!$_POST["id"] || !$_POST["pwd"]){
           echo "請輸入帳號/密碼"; 
           echo "<meta http-equiv='refresh' content='3;url=login.html''>";              
    }
//meta http-equiv='refresh' content='3頁面定期重新整理，content後面跟的 是時間（單位秒）
//url=login.html如果加url的，則會重新定向到指定的網頁

    elseif ($login==TRUE){
      session_start();
        //Session對於 PHP 的安全性有很大的提升，同時也讓網站功能更全面。如果能夠用 session 搭配 cookie 有的時候可以做出很多更方便的東西。
        //Session：儲存於伺服器端，不用擔心用戶禁用session的問題，但計錄檔案的負荷由伺服器承擔。
        //Cookie：儲存於用戶端，可能有用戶端禁用cookie，但伺服器不需承擔計錄檔案的負荷。
        
        //各有優缺點，所以並沒有完全捨棄 cookie 的問題存在，
        //有些不重要的資料其實用 cookie 儲存就可以了，降低一些 server 的負荷；但是重要的資訊，像是用戶的登入帳號等，請用 session 會比較安全。
      $_SESSION["id"] = $_POST['id'];
      echo "歡迎登入";    
      echo "<meta http-equiv='refresh' content='0;url=bulletin.php''>";   
    }
//meta http-equiv='refresh' content='0  經過一段時間轉到另外某個頁面，0表示沒有延時，直接跳轉到後面的URL。把0改成1，則延時1秒後跳轉。
//url=bulletin.php如果加url的，則會重新定向到指定的網頁
    else{
      echo "帳號密碼錯誤";
      echo "<meta http-equiv='refresh' content='3;url=login.html''>";     
        //meta http-equiv='refresh' content='3頁面定期重新整理，content後面跟的 是時間（單位秒）
        //url=login.html如果加url的，則會重新定向到指定的網頁
    }
?>
