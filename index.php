<?php session_start(); ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>這裡放標題</title>
		<?php # 一些 PHP 程式碼
		
		require_once 'db_connect.php';
		require_once 'function.php';
		if (isset($_POST["search"]) && ($_POST["search"]!="")) {
			$bookname = getProduct($_POST["search"]);
		}
		
		
		
		?>
	</head>
	<body>
		<?php # 一些 PHP 程式碼
		
		//logo
		echo '<img src = "images/logo.png">';
		//搜尋
		echo '<form action = "" method = "post">';
			echo '<input type = "text" name = "search">';
			echo '<input type = "submit" value = "搜尋">';
		echo '</form>';
		
		//購物車用超連結
		echo '<a href = "settlement.php" >';
		//插入購物車圖片
		echo '購物車';
		echo '</a>';
		
		//登入登出用超連結
		
		echo $_SESSION['login'];
		if($_SESSION['login'] != ""){
			echo '<a href = "logout.php" >';
			//插入圖片
			echo '登出';
			echo '</a>';
		} else {
			echo '<a href = "login.php" >';
			//插入圖片
			echo '登入';
			echo '</a>';
		}
		
		if($bookname) {
			for ($cat  = 0; $cat < count($bookname['ProductName']); $cat++){
				echo $bookname['ProductName'][$cat];
				echo '<br/>';
				//echo '<img src = "productsImage/'.$ProductsCategory['ID'][$cat].'.png">';
			}
		}else{
			
		}
		
		
		
		

		?>
	</body>
</html> 
<?php # 一些 PHP 函式放這邊


?>
