<?php session_start(); ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
		<title>no.918</title>
		<?php # 一些 PHP 程式碼
		
		require_once 'db_connect.php';
		require_once 'function.php';
		//$bookname = NULL;
		//$getCat = NULL;
		
		if (isset($_POST["search"]) && ($_POST["search"]!="")) {
			$bookname = getProduct($_POST["search"]);
		}
		
		if (isset($_POST["category"]) && ($_POST["category"]=="books")) {
			$getCat = getProductsCategory(1);
		} else if(isset($_POST["category"]) && ($_POST["category"]=="cd")){
			$getCat = getProductsCategory(2);
		}
		
		
		
		?>
	</head>
	<body>
		<div class="container">	
			<?php # 一些 PHP 程式碼
				echo '<div class="row">'; # 第一列
					echo '<div class="col-3">';
						//logo
						echo '<a href = "index.php" >';
						echo '<img src = "images/logo.png">';
						echo '</a>';
					echo '</div>';
					
					echo '<div class="col-5">';
						//搜尋
						echo '<form action = "" method = "post">';
							echo '<input type = "text" name = "search">';
							echo '<input type = "submit" value = "搜尋">';
						echo '</form>';
					echo '</div>';
					
					echo '<div class="col-1">';
						//購物車用超連結
						echo '<a href = "settlement.php" >';
						//插入購物車圖片
						echo '<img src = "images/cart.png">';
						echo '</a>';
					echo '</div>';
					
					//登入登出用超連結
					echo '<div class="col-3">';
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
					//分類
					echo '<div class="col-2">';
						echo '<hr/>';
						
						echo '<form action = "" method = "post">';
							echo '<input type = "submit" name = "category" value = "books">';
							echo '<br/>';
							echo '<input type = "submit" name = "category" value = "cd">';
						echo '</form>';
						
						
						
					echo '</div>';
					
					//商品展示
					echo '<div class="col-10">';
						echo '<hr/>';

						if($bookname) {//已經有搜尋商品
							for ($sch  = 0; $cat < count($bookname['ProductName']); $sch++){
								
								echo '<img src = "productsImage/'.$bookname['ID'][$sch].'.png">';
								echo $bookname['ProductName'][$sch];
								echo '<br/>';
							}
						}else if($getCat){//選擇分類
							for ($cat  = 0; $cat < count($getCat['ProductName']); $cat++){
								
								echo '<img src = "productsImage/'.$getCat['ID'][$cat].'.png">';
								echo $getCat['ProductName'][$cat];
								echo '<br/>';
							}
						} else { //沒有搜尋商品
							$allPro = getAllProduct();

							$randomone = rand(0, count($allPro['ID'])-1);
							if($randomone < 3){
								$randomtwo = rand($randomone+1, count($allPro['ID'])-1);
							} else {
								$randomtwo = rand(0, $randomone-1);
							}
								
							echo '<div class="col-5">';
								echo '<img src = "productsImage/'.$allPro['ID'][$randomone].'.png">';
								echo $allPro['ProductName'][$randomone];
							echo '</div>';
							
							echo '<div class="col-5">';
								echo '<img src = "productsImage/'.$allPro['ID'][$randomtwo].'.png">';
								echo $allPro['ProductName'][$randomtwo];
							echo '</div>';
								
							
							echo '<br/>';
						}
						
					echo '</div>';
				echo '</div>';
			
			
			

			?>
		</div>	
	</body>
</html> 
<?php # 一些 PHP 函式放這邊


?>
