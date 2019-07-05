<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
</body>
</html>

<?php
session_start();  // 啟用交談期
header ('Content-Type: text/html; charset=utf-8');
$username = "";  
$password = "";

// 取得表單欄位值
if ( isset($_POST["username"]) ) 
   $username = $_POST["username"];

if ( isset($_POST["Passwd"]) )
   $passwd = $_POST["Passwd"];

// 檢查是否輸入使用者名稱和密碼
if ($username != "" && $passwd != "") {
   
  // 建立MySQL的資料庫連接 
   $link = mysqli_connect("localhost","root","12345678","goodideas") or die("無法開啟MySQL資料庫連接!<br/>");
   // 送出utf-8編碼的MySQL指令
   mysqli_query($link, 'SET CHARACTER SET utf-8');
   mysqli_query($link, "SET collation_connection = 'utf8_unicode_ci'");
   // 建立SQL指令字串
   $sql = "SELECT * FROM member WHERE passwd='" .$passwd. "'AND username='" .$username. "'"; // 執行SQL查詢
   $result = mysqli_query($link, $sql);
   $total_records = mysqli_num_rows($result); // 取得記錄數
   // 是否有查詢到使用者記錄
   if ( $total_records > 0 ) {   // 成功登入, 指定Session變數
      $_SESSION["login_session"] = true;
      $row = mysqli_fetch_array($result); // 將中文姓名name, 放到Session變數
      $_SESSION["id"] = $row[0]; 
      $_SESSION["name"] = $row[1];
      $_SESSION["email"] = $row[2];
      $_SESSION["passwd"] = $row[3];
      $_SESSION["job"] = $row[4];
      //header("Location: 77add_msg.htm");
      header("Location: test.php");
    } 
  else {  // 登入失敗
        echo "<center><font color='red'>";
        echo "使用者名稱或密碼錯誤!<br/>";
        echo '<a href="77login.htm">重新登入</a>';
        echo "</font>";
        $_SESSION["login_session"] = false;
      }
   mysqli_close($link);  // 關閉資料庫連接  
}
?>

