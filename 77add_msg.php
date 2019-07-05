<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

</BODY>

</html>

<?php
session_start();  // 啟用交談期
header ('Content-Type: text/html; charset=utf-8');

// 檢查Session變數是否存在, 表示是否已成功登入
if ( $_SESSION["login_session"] != true ) 
   header("Location: 77login.htm"); //也可以header("Refresh:0;url=form.htm")

else
{
    header ('Content-Type: text/html; charset=utf-8');
    // 表單是否送回
    if ( isset($_POST["Insert"])) 
    {
        // 開啟MySQL的資料庫連接
        $link = @mysqli_connect("localhost","root","12345678","goodideas") or die("無法開啟MySQL資料庫連接!<br/>");
        // 選擇資料庫
        mysqli_select_db($link, "goodidaels");  
        // 建立新增記錄的SQL指令字串
        $sql ="INSERT INTO message (m_date,m_main,m_msg) 
            VALUES ('" . $_POST["m_date"] . "','" . $_POST["m_main"] . "','" . $_POST["m_msg"] ."')";

        echo "<b>SQL指令: $sql</b><br/>";
        mysqli_query($link, "SET CHARACTER SET utf-8");
        mysqli_query($link, "SET collation_connection = 'utf8_unicode_ci'");

        if ( mysqli_query($link,$sql) ) // 執行SQL指令
            echo "資料庫新增記錄成功, 影響記錄數: ". 
            mysqli_affected_rows($link) . "<br/>"; 
        
        else die("資料庫新增記錄失敗<br/>");
            mysqli_close($link);      // 關閉資料庫連接
    } 
}
?>   