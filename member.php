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
		
		
		
		?>
	</head>
	<body>
		<div class="container">	
			<?php # 一些 PHP 程式碼
			//logo
				echo '<div class="row">';
					echo '<div class="col-3">';//首頁
						echo '<a href = "index.php" >';
						echo '<img src = "images/logo.png">';
						echo '</a>';
					echo '</div>';
					echo '<div class="col-6">';
					echo '</div>';
					//購物車
					echo '<div class="col-1">';
						echo '<a href = "settlement.php" >';
						//插入購物車圖片
						echo '<img src = "images/cart.png">';
						echo '</a>';
					echo '</div>';
					//登出
					echo '<div class="col-2">';
						echo '<a href = "login.php" >';
						echo '<img src = "images/login.png">';
						echo '</a>';
						
					echo '</div>';
				echo '</div>';
				
				echo '<div class="row">';
					echo '<hr/>';
				echo '</div>';
				
				
				echo '<div class="row">';
					//結帳
					echo '<div class="col-3">';
						echo '<form action = "" method = "post">';
							echo '<input type = "radio" name = "choice" value = "newpassword" onchange="this.form.submit()">';
							echo '修改密碼<br/>';
							echo '<br/>';
							
							echo '<input type = "radio" name = "choice" value = "newdata" onchange="this.form.submit()">';
							echo '修改會員資料<br/>';
							echo '<br/>';
							
							echo '<input type = "radio" name = "choice" value = "order" onchange="this.form.submit()">';
							echo '訂單查詢<br/>';
							echo '<br/>';
							
						echo '</form>';
					echo '</div>';
					echo '<div class="col-9">';
						
					echo '</div>';
				echo '</div>';
					
			

			
			

			
			
			

			?>
		</div>
	</body>
</html> 
<?php # 一些 PHP 函式放這邊


?>
