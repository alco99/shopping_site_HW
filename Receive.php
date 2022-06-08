<?php session_start(); ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<script type="text/javascript" src="js/jquery-3.6.0.min.js"></script>
		<script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
		<script type="text/javascript" src="js/jquery.form.min.js"></script> 
		<title>加入購物車的處理</title>
		<?php # 一些 PHP 程式碼
		require_once 'db_connect.php';
		require_once 'function.php';
		
		//$_POST["ProductID"]
		//$_POST["quantity"]
		if($_SESSION['login']){
		if(isset($_POST["quantity"]) && $_POST["quantity"]!=""){
			if(isset($_POST["ProductID"])){//在購物車裡面尋找商品
				$inCart = selectCart($_SESSION['UserID'], $_POST["ProductID"]);
				
				if($inCart != ""){ //已經在購物車內，只要修改數量
					
					//增加購買數量>庫存量的條件篩選
					$new = $inCart['ProductQuantity'][0] + $_POST["quantity"];
					$pro = getProductformID($inCart['ProductID'][0]);
					//echo $new.'<br/>';
					if($new < $pro['InStock'][0] && $new >= 0){
						UpdateCartQ($_SESSION['UserID'], $_POST["ProductID"], $new);
						echo '已加入購物車';
					} else if($new > $pro['InStock'][0]){
						
						echo '購物車內已有商品，庫存不足，請選擇正確數量';
					} elseif($new < 0){
						UpdateCartQ($_SESSION['UserID'], $_POST["ProductID"], 0);
						echo '購物車商品已經刪除完畢，請選擇正確數量';
					}
					
					
				}else{
					if($_POST["quantity"] <= 0){
						echo '請選擇正確數量';
					} else{
						//新增
						$new = getProductformID($_POST["ProductID"]);
						$k = newProCart($_SESSION['UserID'], $_POST["ProductID"], $new['ProductName'][0], $new['UnitPrice'][0], $_POST["quantity"]);
						echo '已加入購物車';
					}
				}
			}
			//echo '已加入購物車';
		} else {
			echo '請選擇數量';
		}
		}else {
			echo '請登入';
		}
		
		?>
	</head>
	<body>
		<div class="container">	
			<?php # 一些 PHP 程式碼
			
			?>
		</div>	
	</body>
</html> 
<?php # 一些 PHP 函式放這邊


?>
