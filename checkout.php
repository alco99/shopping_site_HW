<?php session_start(); ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
		<title>結帳頁面</title>
		<?php # 一些 PHP 程式碼
		require_once 'db_connect.php';
		require_once 'function.php';
		
		
		if (isset($_POST["search"]) && ($_POST["search"]!="")) {
			$bookname = getProduct($_POST["search"]);
		}
		?>
	</head>
	<body>
		<div class="container">	
			<?php # 一些 PHP 程式碼
			//logo
				echo '<div class="row">';
					echo '<div class="col-3">';
						echo '<a href = "index.php" >';
						echo '<img src = "images/logo.png">';
						echo '</a>';
					echo '</div>';
					echo '<div class="col-6">';
					echo '</div>';
					echo '<div class="col-1">';
						//購物車用超連結
						echo '<a href = "settlement.php" >';
						//插入購物車圖片
						echo '<img src = "images/cart.png">';
						echo '</a>';
					echo '</div>';
					echo '<div class="col-2">';
						//echo $_SESSION['login'];
						if($_SESSION['login']){
							echo '<a href = "logout.php" >';
							//插入圖片
							echo '<img src = "images/logout.png">';
							echo '</a>';
						} else {
							echo '<a href = "login.php" >';
							//插入圖片
							echo '<img src = "images/login.png">';
							echo '</a>';
						}
					echo '</div>';
				echo '</div>';
				
				echo '<div class="row">';
				
					echo '<div class="col-6">';
						echo '<hr/>';
						//明細
					echo '</div>';
					
					echo '<div class="col-6">';
						echo '<hr/>';
						//收件資訊
						echo '<form action = "" method = "post">';
							echo '收件人姓名  <input type = "text" name = "receiver" maxlength = 10><br/><br/>';
							echo '收件人電話  <input type = "text" name = "phone" maxlength = 10><br/><br/>';
							echo '收件人地址  <textarea name = "address" rows = "2" cols = "25">';
								
							echo '</textarea><br/><br/>';
							echo '帳單末三碼  <input type = "text" name = "bill" maxlength = 3><br/><br/>';
							echo '<input type = "submit" name = "sent">';
						echo '</form>';
					echo '</div>';
					
				echo '</div>';
				
				
			?>
		</div>
	</body>
</html> 
<?php # 一些 PHP 函式放這邊


?>
