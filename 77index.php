<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php
session_start();  // 啟用交談期
header ('Content-Type: text/html; charset=utf-8');
// 檢查Session變數是否存在, 表示是否已成功登入
if ( $_SESSION["login_session"] != true ) 
   header("Location: 77form.htm"); //也可以header("Refresh:0;url=form.htm")
else
{
echo "歡迎使用者<font color=blue>".$_SESSION["name"]."</font>進入網站!<br/>";
echo '<form action="welcome.php" method="post">';
echo '<table border="1">';
echo '<tr><td>ID:</td><td><input type="text"  name="id" size ="6" value="'.$_SESSION["id"].'"/></td>';
echo '</tr><tr><td>姓名:</td><td><input type= "text"  name="name" size="12" value="'.$_SESSION["name"].'"/></td>';
echo '</tr><tr><td>e-mail:</td><td><input type="text"  name="email" size="30" value="'.$_SESSION["email"].'"/></td>';
echo '</tr><tr><td>密碼:</td><td><input type= "text"  name="passwd" size="12" value="'.$_SESSION["passwd"].'"/></td>';
echo '</tr><tr><td>職業:</td><td><input type="text"  name="job" size="10" value="'.$_SESSION["job"].'"/>';
echo '</td></tr> </table><hr/>';
echo '<input type="submit" name="Insert" value="更新">';
echo '<input type="reset" name="reset" value="重設"></form>';
}
?>



</body>
</html>