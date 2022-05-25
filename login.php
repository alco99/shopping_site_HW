<?php session_start(); ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>這裡放標題</title>
		<?php # 一些 PHP 程式碼
		require_once 'db_connect.php';
		require_once 'function.php';
		
		
		
		?>
	</head>
	<body>
		<?php # 一些 PHP 程式碼
		$_SESSION['login'] = '1';
		echo $_SESSION['login'];
		
		echo '<a href = "index.php" >';
		//插入圖片
		echo '首頁';
		echo '</a>';

		
		
		

		?>
	</body>
</html> 
<?php # 一些 PHP 函式放這邊


?>
