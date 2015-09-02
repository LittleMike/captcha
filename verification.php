<html>

<head>
<title>PHP验证码</title>
</head>

<body>

<img id="c_img" src='captcha.php'/>
<a href="javascript:void(0)" onclick="document.getElementById('c_img').src='captcha.php'" title="换一张">看不清？</a>
<br>
<form method="post" action="verification.php">
请输入验证码<input type='text' name='userInput'/>
<br>
<input type='submit' value='确定'/>
</form>

<?php
session_start();
if(isset($_POST['userInput']))
{
	if($_POST['userInput'] == $_SESSION['captcha'])
	{
	header("location:http://127.0.0.1/index.php");
	}
	else
	{
		echo "输入错误!";
	}
}
?>

</body>

</html>
