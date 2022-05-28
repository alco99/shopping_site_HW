<?php session_start(); ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
		<title>會員資料</title>
		<?php # 一些 PHP 程式碼
		require_once 'db_connect.php';
		require_once 'function.php';
		
		// 判斷顯示的頁面
		$choiceResult = 0;
		if(isset($_POST['choice']) && ($_POST["choice"]=="newpassword")){	// 修改密碼
			$choiceResult = 1;
		} else if(isset($_POST['choice']) && ($_POST["choice"]=="newdata")){	// 修改會員資料
			$choiceResult = 2;		
		} else if(isset($_POST['choice']) && ($_POST["choice"]=="order")){	// 訂單查詢
			$choiceResult = 3;
		}
		
		// 修改密碼或會員資料
//		echo $_SESSION['UserID'];	// test
		if(isset($_POST["save"]) && ($_POST["save"]=="儲存")){
			if(isset($_POST["choiceResult"]) && $_POST["choiceResult"] == 1){	// 修改密碼
				if(isset($_POST['oldPsw'])){
					$inPassword = searchPassword($_SESSION['UserID'], $_POST['oldPsw']);	// 尋找密碼是否存在
					if($inPassword == ""){		// 原本密碼輸入錯誤
						echo 'Old password 輸入錯誤';
					}else{
						if(isset($_POST["newPsw"]) && isset($_POST["newPswA"]) && ($_POST["newPsw"] == $_POST["newPswA"])){		// newPsw == newPswA
							updatePassword($_SESSION['UserID'], $_POST["newPsw"]);
							echo '修改密碼成功';
						}else{
							echo 'New password again 輸入錯誤';
						}
					}
				}
			}else if (isset($_POST["choiceResult"]) && $_POST["choiceResult"] == 2){	// 修改會員資料
				if(isset($_POST['newName']) && isset($_POST['newEmail'])){
					updateMemberData($_SESSION['UserID'], $_POST['newName'], $_POST['newEmail']);
					echo '修改資料成功';
				}
			}
		}
		
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
						echo '<img src = "images/logout.png">';
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
					// 選擇功能後顯示頁面
					echo '<div class="col-9">';
						if($choiceResult == 1) {	// 修改密碼
							echo'<div class="row">';
								echo '<br/>修改密碼<br/><br/><br/>';
							echo'</div>';
							
							echo '<form action = "" method = "post">';
								echo 'Old password： <input type = "password" name = "oldPsw">';
								echo '<br/><br/>';
								echo 'New password： <input type = "password" name = "newPsw">';
								echo '<br/><br/>';
								echo 'New password again： <input type = "password" name = "newPswA">';
								echo '<br/><br/>';
								echo '<input type = "hidden" name = "choiceResult" value = "'.$choiceResult.'">';
								echo '<input type = "submit" value = "儲存" name="save">'; 
							echo '</form>';
						}else if($choiceResult == 2) {		// 修改會員資料
							echo'<div class="row">';
								echo '<br/>修改會員資料<br/><br/><br/>';
							echo'</div>';
							
							echo '<form action = "" method = "post">';
								echo 'Name： <input type = "text" name = "newName">';
								echo '<br/><br/>';
								echo 'Email： <input type = "text" name = "newEmail">';
								echo '<br/><br/>';
								echo '<input type = "hidden" name = "choiceResult" value = "'.$choiceResult.'">';
								echo '<input type = "submit" value = "儲存" name="save">';
							echo '</form>';
						}else if($choiceResult == 3) {		// 訂單查詢
							echo'<div class="row">';
								echo '<br/>訂單查詢<br/><br/><br/>';
							echo'</div>';
							
							echo'<div class="row">';
								echo'<div class="col-2">';
									echo '查詢條件 : ';
								echo'</div>';								
								// 未出貨
								echo'<div class="col-2">';
									echo '<input type = "radio" name = "choice" value = "noShipping" onchange="this.form.submit()">';
									echo '未出貨';
								echo'</div>';
								
								// 已出貨
								echo'<div class="col-2">';
									echo '<input type = "radio" name = "choice" value = "shipping" onchange="this.form.submit()">';
									echo '已出貨';
								echo'</div>';
								
								// 已完成
								echo'<div class="col-2">';
									echo '<input type = "radio" name = "choice" value = "finish" onchange="this.form.submit()">';
									echo '已完成';
								echo'</div>';
								
								// 已評價
								echo'<div class="col-2">';
									echo '<input type = "radio" name = "choice" value = "evaluate" onchange="this.form.submit()">';
									echo '已評價';
								echo'</div>';
								
								echo '<br/><hr/>';
							echo'</div>';
						}
					echo '</div>';
				echo '</div>';
					
			

			
			

			
			
			

			?>
		</div>
	</body>
</html> 
<?php # 一些 PHP 函式放這邊


?>
