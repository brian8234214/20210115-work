<html>
<title>新增佈告</title>
	//標題
<body>
    <h2>新增佈告</h2>
    <form action="bulletin_add.php" method="post">
	    //表單是action=bulletin_add.php當送出表單之後，會將資料傳送到bulletin_add.php
    標題：<input  type="text" name="title" size="100"><p>
    佈告內容：<p>
	<textarea rows="20" cols="100" name="content"></textarea> 
	    //TEXTAREA在表單中，建立一個可以輸入多行文字的輸入框。rows設定輸入框的高度、cols設定輸入框的寬度、name:聲明欄位名稱。
    <p>
    佈告類型：<input type="radio" name="type" value="1" checked >系上公告  
              <input type="radio" name="type" value="2">招生訊息 
              <input type="radio"  name="type" value="3">企業徵才
    <p>      
    發佈時間：<input  type="date" name="time"><p>      
    <input type=submit value="發佈"><p>
  </form>
</body>
</html> 
