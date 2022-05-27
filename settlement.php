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
		
		
		if (isset($_POST["checkout"]) && ($_POST["checkout"]!="")) {
			header("Location:check.php"); 
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
					echo '<div class="col-7">';
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
					echo '<hr/>';
				echo '</div>';
				
				echo '<div class="row">';//購物車產品列
					
					echo '<div class="col-1">';//勾勾框
						echo '<form action = "" method = "post">';
							echo '<input type = "checkbox" name = "check" value = "">';
						echo '</form>';
					echo '</div>';
					
					echo '<div class="col-6">';
						echo '商品名稱';
					echo '</div>';
					
					echo '<div class="col-3">';
						echo '商品單價';
					echo '</div>';
					
					echo '<div class="col-2">';
						echo '商品數量';
					echo '</div>';
					
				echo '</div>';
				
				echo '<div class="row">';
					//結帳
					echo '<div class="col-7">';
						//空白
					echo '</div>';
					echo '<div class="col-3">';
						//總金額計算
						echo 'NTD  ';
					echo '</div>';
					echo '<div class="col-2">';
						//結帳頁面跳轉
						
						echo '<form action = "" method = "post">';
							echo '<input type = "submit" name = "checkout" value = "checkout">';
						echo '</form>';
						
					echo '</div>';
				echo '</div>';
					
			

			
			

			
			
			

			?>
		</div>
	</body>
</html> 
<?php # 一些 PHP 函式放這邊


?>
