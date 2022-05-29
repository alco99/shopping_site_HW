<?php session_start(); ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<script type="text/javascript" src="js/jquery-3.6.0.min.js"></script>
		<script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
		<script type="text/javascript" src="js/jquery.form.min.js"></script> 
		<title>結帳頁面</title>
		<?php # 一些 PHP 程式碼
			require_once 'db_connect.php';
			require_once 'function.php';
			//echo time();
			//$n = getOldOrder($_SESSION['UserID']);
			//echo '<pre>';print_r($n);echo '</pre>';
			
		
			if (isset($_POST["checkout"]) && ($_POST["checkout"]!="")) {
				$seq = explode(",", $_POST["seq"]);
				$list = explode(",", $_POST["cartList"]);
				$sum = explode(",", $_POST["sum"]);
				
				$details = array();
				for($i = 0; $i < count($list); $i++){
					
					$details[$i] = getThisCart($_SESSION['UserID'], $list[$i]);
				}
				//echo '<pre>';print_r($details);echo '</pre>';
				$total = array_sum($sum);
			}
							
			if (isset($_POST["sent"]) && ($_POST["sent"]!="")){
				if(isset($_POST["receiver"]) && isset($_POST["phone"]) && isset($_POST["address"]) && isset($_POST["bill"])){
					$orderID = explode(";", $_POST["order"]);
					for($i = 0; $i < count($orderID); $i++){
						$wholeOrder[$i] = explode(",", $orderID[$i]);
						
					}
					
					$n = getOldOrder($_SESSION['UserID']);
					//echo '<pre>';print_r($n);echo '</pre>';
					if($n == NULL){
						$time = 1;
					}else{
						$count = array_values($n['OrderNum']);
						$allcount = array_sum($count);
						$time = $allcount +1;
					}
					
					
					
					for($i = 0; $i < count($wholeOrder); $i++){
						$k = newOrder($time, $wholeOrder[$i][2], $_SESSION['UserID'], $wholeOrder[$i][5], $_POST["address"], $_POST["receiver"], $_POST["phone"], 'n', 'n', $_POST["bill"]);
					}
					echo '<script>';
						echo 'window.location.href = "index.php"';
					echo '</script>';
				}else {
					echo '填寫不完全';
					echo '<script>';
					echo 'window.location.href = "checkout.php"';
					echo '</script>';
				}
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
						}
					echo '</div>';
				echo '</div>';
				
				echo '<div class="row">';
				
					echo '<div class="col-8">';
						echo '<hr/><br/>';
						echo '訂單明細<br/><br/>';
						echo '<div class="row">';
							echo '<div class="col-6">';
								echo '商品名稱<br/>';
							echo '</div>';
							echo '<div class="col-3">';
								echo '商品價格<br/>';
							echo '</div>';
							echo '<div class="col-3">';
								echo '商品數量<br/>';
							echo '</div>';
						echo '</div>';
						//明細
						for($j = 0; $j < count(array_keys($details)); $j++){
							echo '<div class="row">';
								echo '<div class="col-6">';
									echo $details[$j]['ProductName'];
								echo '</div>';
								echo '<div class="col-3">';
									echo $details[$j]['ProductPrice'];
								echo '</div>';
								echo '<div class="col-3">';
									echo $details[$j]['ProductQuantity'];
								echo '</div>';
							echo '</div>';
						}
						
						echo '<hr/><br/>';
						echo '<div class="row">';
							echo '<div class="col-6">';
							echo '</div>';
							echo '<div class="col-3">';
								echo '商品總金額<br/>運費<br/>訂單總金額';
							echo '</div>';
							echo '<div class="col-3">';
								$all = $total+130;
								echo 'NTD '.$total.'<br/>NTD 130<br/>NTD  '.$all;
							echo '</div>';
						echo '</div>';
						
						
						
						//$tmp =  array();
						$orderList =  array();
						for($j = 0; $j < count($details); $j++){
							
							$orderList[$j] = implode(',', $details[$j]);
						}
						
						$wholeList = implode(';', $orderList);
						
						//echo '<pre>';print_r($wholeList);echo '</pre>';
						
					echo '</div>';
					
					echo '<div class="col-4">';
						echo '<hr/>';
						//收件資訊
						echo '<form action = "" method = "post">';
							echo '<input type = "hidden" name = "order" value = "'.$wholeList.'">';
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
