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
		
		//收到搜尋指令
		if (isset($_POST["search"]) && ($_POST["search"]!="")) {
			$bookname = getProduct($_POST["search"]);
		}
		
		//收到分類顯示商品的指令
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
						
						//顯示排序選項
						if($bookname) {
							echo '<hr/>';
							echo '排序：<br/>';
							echo '<form action = "" method = "post">';
								echo '<input type = "radio" name = "sort" value = "pricelow">';
								echo '價錢從低到高<br/>';
								echo '<br/>';
								echo '<input type = "radio" name = "sort" value = "pricehigh">';
								echo '價錢從高到低<br/>';
								echo '<br/>';
								echo '<input type = "radio" name = "sort" value = "stock">';
								echo '庫存量多到少<br/>';
								echo '<br/>';
							echo '</form>';
						}
						
						
						
					echo '</div>';
					
					//商品展示部分
					echo '<div class="col-10">';
						echo '<hr/>';

						if($bookname) {//已經有搜尋商品
							echo '搜尋"'.$_POST["search"].'"的結果：<br/>';
							for ($sch  = 0; $sch < count($bookname['ProductName']); $sch++){
								//排版
								echo '<div class="row">';
									//圖片
									echo '<div class="col-4">';
										echo '<img src = "productsImage/'.$bookname['ID'][$sch].'.png">';
									echo '</div>';
									//名稱
									echo '<div class="col-3">';
										echo '<br/>';
										echo $bookname['ProductName'][$sch].'<br />';
									echo '</div>';
									//價錢和加入購物車
									echo '<div class="col-3">';
										echo '<br/>';
										//單價
										echo 'NTD  '.$bookname['UnitPrice'][$sch].'<br />';
										//庫存量
										if($bookname['InStock'][$sch] == 0){
											echo '暫無庫存<br />';
										}else {
											echo '庫存： '.$bookname['InStock'][$sch].'<br />';
										}
										//加入購物車
										echo '<form action = "" method = "post">';
											echo '<input type = "submit" name = "shopping" value = "加入購物車">';
										echo '</form>';
										
										echo '<br/>';
									echo '</div>';
								echo '</div>';
							}
						}else if($getCat){//選擇分類
							for ($cat  = 0; $cat < count($getCat['ProductName']); $cat++){
								
								echo '<div class="row">';
									//圖片
									echo '<div class="col-4">';
										echo '<img src = "productsImage/'.$getCat['ID'][$cat].'.png">';
									echo '</div>';
									//名稱
									echo '<div class="col-3">';
										echo '<br/>';
										echo $getCat['ProductName'][$cat].'<br />';
									echo '</div>';
									//價錢和加入購物車
									echo '<div class="col-3">';
										echo '<br/>';
										//單價顯示
										echo 'NTD  '.$getCat['UnitPrice'][$cat].'<br />';
										//庫存量
										if($getCat['InStock'][$cat] == 0){
											echo '暫無庫存<br />';
										}else {
											echo '庫存： '.$getCat['InStock'][$cat].'<br />';
										}
										//購物車按鈕
										echo '<form action = "" method = "post">';
											echo '<input type = "submit" name = "shopping" value = "加入購物車">';
										echo '</form>';
										
										echo '<br/>';
									echo '</div>';
								echo '</div>';
							}
						} else { //沒有搜尋商品，隨機展示兩項商品
							//所有商品列表
							$allPro = getAllProduct();

							//產生隨機數
							$randomone = rand(0, count($allPro['ID'])-1);
							if($randomone < 3){
								$randomtwo = rand($randomone+1, count($allPro['ID'])-1);
							} else {
								$randomtwo = rand(0, $randomone-1);
							}
							//分成兩格
							echo '<div class="row">';
								//商品圖片
								echo '<div class="col-5">';
									echo '<img src = "productsImage/'.$allPro['ID'][$randomone].'.png">';
									echo $allPro['ProductName'][$randomone];
								echo '</div>';
								
								//商品名稱
								echo '<div class="col-5">';
									
									echo '<img src = "productsImage/'.$allPro['ID'][$randomtwo].'.png">';
									echo $allPro['ProductName'][$randomtwo];
								echo '</div>';
									
								echo '<br/>';
							echo '</div>';
						}
						
					echo '</div>';
				echo '</div>';
			
			
			

			?>
		</div>	
	</body>
</html> 
<?php # 一些 PHP 函式放這邊


?>
