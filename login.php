<?php session_start(); ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
		<title>登入頁面</title>
		<?php # 一些 PHP 程式碼
		require_once 'db_connect.php';
		require_once 'function.php';
		
		
		if (isset($_POST["accountLogin"]) && ($_POST["accountLogin"]=="登入")) {
			//檢查帳號密碼
			if(isset($_POST["account"]) && isset($_POST["password"])){
				$memdata = getMember($_POST["account"]);
				if($memdata == ""){//無帳號則顯示錯誤
					echo "帳號輸入錯誤";
					echo '<script>';
					echo 'window.location.href = "login.php"';
					echo '</script>';
				} else {
					if($_POST["password"] == $memdata['Password'][0]){//登入成功
						$_SESSION['login'] = '1';
						$_SESSION['UserID'] = $memdata['ID'][0];
						echo '登入成功<br/>';
						echo '<script>';
						echo 'window.location.href = "index.php"';
						echo '</script>';
					} else {//密碼錯誤
						echo "密碼輸入錯誤";
						echo '<script>';
						echo 'window.location.href = "login.php"';
						echo '</script>';
					}
				}
			}
		}
		
		if (isset($_POST["signup"]) && ($_POST["signup"]=="註冊")) {
			if(isset($_POST["account"]) && isset($_POST["password"])){
				$memdata = getMember($_POST["account"]);
				if($memdata == ""){//無帳號則顯示錯誤
					$_SESSION['UserID'] = signUpSet($_POST["account"], $_POST["password"]);
					echo '註冊成功<br/>';
					$_SESSION['login'] = '1';
					echo '<script>';
					echo 'window.location.href = "index.php"';
					echo '</script>';
				} else {
					echo "帳號重複或已有會員";
					echo '<script>';
					echo 'window.location.href = "login.php"';
					echo '</script>';
				}
			}
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
				echo '</div>';
			?>
		</div>	
	</body>
</html> 
<?php # 一些 PHP 函式放這邊


?>
