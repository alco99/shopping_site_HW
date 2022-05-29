<?php session_start(); ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<script type="text/javascript" src="js/jquery-3.6.0.min.js"></script>
		<script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
		<script type="text/javascript" src="js/jquery.form.min.js"></script> 
		<title>購物車</title>
		<?php # 一些 PHP 程式碼
			require_once 'db_connect.php';
			require_once 'function.php';
			
			
			if(isset($_POST["Buy"]) && $_POST["Buy"]!=""){
				if($_POST["count"]==NULL){
					$count = 0;
				} else {
					$count = $_POST["count"] +1;
				}
				//echo 'count:'.$count.'<br/>';
				
				$calculate = getThisCart($_SESSION['UserID'], $_POST["Buy"]);
				$seq = explode(",", $_POST["seq"]);
				$list = explode(",", $_POST["cartList"]);
				$sum = explode(",", $_POST["sum"]);
				
				
				$sum[$count] = $calculate['ProductPrice'] * $calculate['ProductQuantity'];
				$seq[$count] = $_POST["ind"];
				$list[$count] = $_POST["Buy"];
				
				$sequence = implode(",", $seq);
				$cartList = implode(",", $list);
				$summary = implode(",", $sum);
				
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
					
					echo '<div class="col-1">';
						echo '勾選';
					echo '</div>';
						
					echo '<div class="col-6">';
						echo '商品名稱';
					echo '</div>';
						
					echo '<div class="col-3">';
						echo '單價';
					echo '</div>';
						
					echo '<div class="col-2">';
						echo '數量';
					echo '</div>';
						
					echo '<br/><br/>';
					
				echo '</div>';
				
				echo '<div class="row">';
					echo '<hr/>';
				echo '</div>';
				
				echo '<div class="row">';//購物車產品列
					$cart = getAllCart($_SESSION['UserID']);
					
					for($i = 0; $i < count($cart["ID"]); $i++){
						echo '<div class="col-1">';
							$seq = explode(",", $sequence);
							//print_r($seq);
							if($seq == NULL || !(in_array($i, $seq))){//勾勾框
								$sequence = implode(",", $seq);
								echo '<form action = "" method = "post">';
									echo '<input type = "hidden" name = "count" value = "'.$count.'">';
									echo '<input type = "hidden" name = "ind" value = "'.$i.'">';
									echo '<input type = "hidden" name = "seq" value = "'.$sequence.'">';
									echo '<input type = "hidden" name = "cartList" value = "'.$cartList.'">';
									echo '<input type = "hidden" name = "sum" value = "'.$summary.'">';
									echo '<input type = "checkbox" name = "Buy" value = "'.$cart["ID"][$i].'" onchange="this.form.submit()">';
									
								echo '</form>';
							}
						echo '</div>';
						
						echo '<div class="col-6">';
							echo $cart["ProductName"][$i];
						echo '</div>';
						
						echo '<div class="col-3">';
							echo $cart["ProductPrice"][$i];
						echo '</div>';
						
						echo '<div class="col-2">';
							echo $cart["ProductQuantity"][$i];
						echo '</div>';
						
						echo '<br/><br/>';
					}
				echo '</div>';
				
				echo '<div class="row">';
					echo '<hr/>';
				echo '</div>';
				
				echo '<div class="row">';
					//結帳
					echo '<div class="col-7">';
						//空白
					echo '</div>';
					echo '<div class="col-3">';
						//總金額計算
						$sum = explode(",", $summary);
						echo 'NTD  '.array_sum($sum);
						
					echo '</div>';
					echo '<div class="col-2">';
						//結帳頁面跳轉
						
						echo '<form action = "checkout.php" method = "post">';
							echo '<input type = "hidden" name = "seq" value = "'.$sequence.'">';
							echo '<input type = "hidden" name = "cartList" value = "'.$cartList.'">';
							echo '<input type = "hidden" name = "sum" value = "'.$summary.'">';
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
