<?php session_start(); ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
		<title>賣家頁面</title>
		<?php # 一些 PHP 程式碼
		require_once 'db_connect.php';
		require_once 'function.php';
		
		if(isset($_POST['choice'])){
			if($_POST['choice'] == "newProduct"){
				$newPro = 1;
			} else if($_POST['choice'] == "newInstock"){
				$allPro = getAllProduct();
			} else if($_POST['choice'] == "orderUpdate"){
				$allUnsent = getUnsentOrder();
				if($allUnsent == ""){
					$allUnsent = 1;
				}
				$allUnpay = getUnpayOrder();
				if($allUnpay == ""){
					$allUnpay = 1;
				}
			}
		}
		
		//新增商品
		if(isset($_POST['newPro']) && $_POST['newPro']!= ""){
			if($_POST['ProName'] && $_POST['price'] && $_POST['instock'] && $_POST['category'] && $_POST['author'] && $_POST['issuer']){
				$tmp = NewProducts($_POST['ProName'], $_POST['price'], $_POST['instock'], $_POST['category'], $_POST['author'], $_POST['issuer']);
				echo '輸入成功';
				
				$all = getAllProduct();
			}else{
				echo '請填寫完整';
			}
		}
		
		//更新庫存

		if(isset($_POST['QuaSent']) && $_POST['ProQ']!= ""){
			$tmp = UpdateInstock($_POST['ProQ'], $_POST['whichPro']);
			$allPro = getAllProduct();
		}
		
		//更新訂單
		
		
		if(isset($_POST['paymentSub']) && $_POST['paymentUser']!= ""){
			$tmp = UpdatePayment($_POST['paymentUser'], $_POST['paymentOrder']);
			$allUnsent = getUnsentOrder();
				if($allUnsent == ""){
					$allUnsent = 1;
				}
				$allUnpay = getUnpayOrder();
				if($allUnpay == ""){
					$allUnpay = 1;
				}
		}
			
		if(isset($_POST['shippingSub']) && $_POST['shippingUser']!= ""){
			$tmp = UpdateShipping($_POST['shippingUser'], $_POST['shippingOrder']);
			$allUnsent = getUnsentOrder();
				if($allUnsent == ""){
					$allUnsent = 1;
				}
				$allUnpay = getUnpayOrder();
				if($allUnpay == ""){
					$allUnpay = 1;
				}
		}
		
		?>
	</head>
	<body>
		<div class="container">	
			<?php # 一些 PHP 程式碼
				echo '<br/>';
				echo '<div class="row">'; # 第一列
					echo '<div class="col-3">';
						//logo
						echo '<a href = "index.php" >';
						echo '<img src = "images/logo.png">';
						echo '</a>';
					echo '</div>';
					
					echo '<div class="col-7">';
					echo '</div>';
					
					//登入登出用超連結
					echo '<div class="col-2">';
						if($_SESSION['login'] == '1'){
							echo '<a href = "logout.php" >';
							//插入圖片
							echo '<img src = "images/logout.png">';
							echo '</a>';
						} else {
							echo '<a href = "login.php" >';
							//插入圖片
							echo '<img src = "images/login.png">';
							echo '</a>';
							$_SESSION['login'] = NULL;
						}
					echo '</div>';
				echo '</div>';
				
				echo '<hr/>';
				
				echo '<div class="row">'; # 第2列
					echo '<div class="col-3">'; //功能列表
						echo '<form action = "" method = "post">';
							echo '<input type = "radio" name = "choice" value = "newProduct" onchange="this.form.submit()">';
							echo '新品上架<br/>';
							echo '<br/>';
							
							echo '<input type = "radio" name = "choice" value = "newInstock" onchange="this.form.submit()">';
							echo '修改商品庫存<br/>';
							echo '<br/>';
							
							echo '<input type = "radio" name = "choice" value = "orderUpdate" onchange="this.form.submit()">';
							echo '訂單狀態更新<br/>';
							echo '<br/>';
							
						echo '</form>';
					echo '</div>';
					
					
					
					echo '<div class="col-9">';
						if($newPro){//新品上架
									echo '<form action = "" method = "post">';
										echo '商品名稱：<input type = "text" name = "ProName"><br/><br/>';
										echo '單&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;價：<input type = "number" name = "price" ><br/><br/>';
										echo '現在庫存：<input type = "number" name = "instock" ><br/><br/>';
										echo '種&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;類：<select name = "category">';
											echo '<option value = "1">Books</option>';
											echo '<option value = "2">CD</option>';
										echo '</select><br/><br/>';
										echo '作&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;者：<input type = "text" name = "author" ><br/><br/>';
										echo '出&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;版：<input type = "text" name = "issuer" ><br/><br/>';
										echo '<input type = "submit" name = "newPro" value = "sent">';
									echo '</form>';
								
						} elseif($allPro){//更改庫存
							echo '<div class="row">';
								
								
								echo '<div class="col-1">';
									echo 'ID';
								echo '</div>';
								echo '<div class="col-5">';
									echo '名稱';
								echo '</div>';
								echo '<div class="col-2">';
									echo '單價';
								echo '</div>';
								echo '<div class="col-2">';
									echo '庫存';
								echo '</div>';
								echo '<div class="col-2">';
									echo '更改為';
								echo '</div>';
								echo '<br/><hr/><br/>';
							
								
								
								for($i = 0; $i < count($allPro['ID']); $i++){
									
									echo '<div class="col-1">';
										echo $allPro['ID'][$i];
									echo '</div>';
									echo '<div class="col-5">';
										echo $allPro['ProductName'][$i];
									echo '</div>';
									echo '<div class="col-2">';
										echo $allPro['UnitPrice'][$i];
									echo '</div>';
									echo '<div class="col-2">';
										echo $allPro['InStock'][$i];
									echo '</div>';
									echo '<div class="col-2">';
										echo '<form action = "" method = "post">';
										echo '<input type = "hidden" name = "whichPro" value = "'.$allPro['ID'][$i].'" >';
										echo '<input type = "number" name = "ProQ" style = "width: 5ch">';
										echo '<input type = "submit" name = "QuaSent" value = "sent">';
										echo '</form>';
									echo '</div>';
									
									echo '<br/>';
	
									
								}
							
							echo '</div>';
						} elseif($allUnsent || $allUnpay){//更新訂單
							echo '<div class="row">';
								echo '<div class="col-6">'; //未出貨
									echo '未出貨<br/><hr/>';
									echo '<div class="row">';
										echo '<div class="col-2">';
											echo 'ID';
										echo '</div>';
										echo '<div class="col-3">';
											echo '訂單編號';
										echo '</div>';
										echo '<div class="col-3">';
											echo '用戶編號';
										echo '</div>';
										echo '<div class="col-4">';
											echo '勾選框';
										echo '</div>';
									echo '</div>';
									echo '<div class="row">';
										if($allUnsent == 1){
											echo '無';
										}else{
										for($i = 0; $i < count($allUnsent['ID']); $i++){
											if($allUnsent['OrderNum'][$i] != $allUnsent['OrderNum'][$i-1] ||$allUnsent['UserID'][$i] != $allUnsent['UserID'][$i-1]){
												//
												echo '<div class="col-2">';
												echo $allUnsent['ID'][$i];
												echo '</div>';
												//
												echo '<div class="col-3">';
												echo $allUnsent['OrderNum'][$i];
												echo '</div>';
												//
												echo '<div class="col-3">';
												echo $allUnsent['UserID'][$i];
												echo '</div>';
												//
												echo '<div class="col-4">';
												echo '<form action = "" method = "post">';
													echo '<input type="hidden" name="shippingOrder" value="'.$allUnsent['OrderNum'][$i].'">';
													echo '<input type="radio" name="shippingUser" value="'.$allUnsent['UserID'][$i].'">';
													echo '<input type = "submit" name = "shippingSub" value = "sent">';
													
												echo '</form>';
												echo '</div>';
											}
										}
										}
									echo '</div>';
								echo '</div>';
								echo '<div class="col-6">';
									echo '未付款<br/><hr/>';
									echo '<div class="row">';
										echo '<div class="col-2">';
											echo 'ID';
										echo '</div>';
										echo '<div class="col-3">';
											echo '訂單編號';
										echo '</div>';
										echo '<div class="col-3">';
											echo '用戶編號';
										echo '</div>';
										echo '<div class="col-4">';
											echo '勾選框';
										echo '</div>';
									echo '</div>';
									echo '<div class="row">';
									if($allUnpay == 1){
										echo '無';
									}else {
										for($i = 0; $i < count($allUnpay['ID']); $i++){
											
											if($allUnpay['OrderNum'][$i] != $allUnpay['OrderNum'][$i-1] || $allUnpay['UserID'][$i] != $allUnpay['UserID'][$i-1]){
												//
												echo '<div class="col-2">';
												echo $allUnpay['ID'][$i];
												echo '</div>';
												//
												echo '<div class="col-3">';
												echo $allUnpay['OrderNum'][$i];
												echo '</div>';
												//
												echo '<div class="col-3">';
												echo $allUnpay['UserID'][$i];
												echo '</div>';
												//
												echo '<div class="col-4">';
												echo '<form action = "" method = "post">';
													echo '<input type="hidden" name="paymentOrder" value="'.$allUnpay['OrderNum'][$i].'">';
													echo '<input type="radio" name="paymentUser" value="'.$allUnpay['UserID'][$i].'">';
													echo '<input type = "submit" name = "paymentSub" value = "sent">';
													
												echo '</form>';
												echo '</div>';
											}
										}
									}
									echo '</div>';
								echo '</div>';
							echo '</div>';
							
						} elseif($all){
							
							echo '新增<br/>';
							echo '商品名稱：'.$all['ProductName'][0].'<br/>';
							echo '商品價格：'.$all['UnitPrice'][0].'<br/>';
							echo '商品庫存：'.$all['InStock'][0].'<br/>';
						}
						
					echo '</div>';
				echo '</div>';
				
			?>
		</div>	
	</body>
</html> 
<?php # 一些 PHP 函式放這邊


?>
