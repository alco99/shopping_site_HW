<?php session_start(); ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
		<title>這裡放標題</title>
		<?php # 一些 PHP 程式碼
		require_once 'db_connect.php';
		require_once 'function.php';
		
		
		if (isset($_POST["登入"]) && ($_POST["登入"]!="")) {
			//檢查帳號密碼
			//無帳號則顯示錯誤
			//密碼錯誤
			//登入成功
			$_SESSION['login'] = '1';
			
			//echo $_SESSION['login'];
		}
		
		if (isset($_POST["註冊"]) && ($_POST["send"]=="註冊")) {
			
		}
		?>
	</head>
	<body>
		<div class="container">	
			<?php # 一些 PHP 程式碼
				
				echo '<div class="row">';
					//logo
					echo '<a href = "index.php" >';
					echo '<img src = "images/logo.png">';
					echo '</a>';
				echo '</div>';
				
				echo '<div class="row">';
					echo '<hr/><br/>會員登入頁面<br/><br/><br/>';
				echo '</div>';
				
				echo '<div class="row">';
					echo '<form action = "" method = "post">';
						echo 'Account ：<input type = "text" name = "account">';
						echo '<br/><br/>';
						echo 'password：<input type = "password" name = "password">';
						echo '<br/><br/>';
						echo '<input type = "submit" value = "登入" name = "accountLogin">  ';
						echo '  <input type = "submit" value = "註冊" name = "signup">';
					echo '</form>';
					
					$_SESSION['login'] = '1';
					//echo $_SESSION['login'];
				echo '</div>';
			
			?>
		</div>	
	</body>
</html> 
<?php # 一些 PHP 函式放這邊


?>
