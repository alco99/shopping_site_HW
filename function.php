<?php
//商品種類篩選
function getProductsCategory($cat, $sort = 'ID', $pat = 'DESC') {
	global $dblink;
	$exam_sql  = "
				SELECT * 
				FROM products 
				WHERE Category = '$cat'
				ORDER BY $sort $pat
				";
	$chk_rlt=mysqli_query($dblink,$exam_sql); if (FALSE===$chk_rlt) echo __LINE__ . mysqli_error($dblink);
	$idx=0;
	while($row = mysqli_fetch_assoc($chk_rlt)) { #ID ProductName UnitPrice InStock Category	Author Issuer
		$rtn['ID'][$idx]=$row['ID'];
		$rtn['ProductName'][$idx]=$row['ProductName'];
		$rtn['UnitPrice'][$idx]=$row['UnitPrice'];
		$rtn['InStock'][$idx]=$row['InStock'];
		$rtn['Category'][$idx]=$row['Category'];
		$rtn['Author'][$idx]=$row['Author'];
		$rtn['Issuer'][$idx]=$row['Issuer'];
		$idx++;
	}
	return $rtn;
}

//搜尋產品名稱
function getProduct($pro, $sort = 'ID', $pat = 'DESC') {
	global $dblink;
	$exam_sql  = "
				SELECT * 
				FROM products 
				WHERE ProductName LIKE '%$pro%'
				ORDER BY $sort $pat
				";
	$chk_rlt=mysqli_query($dblink,$exam_sql); if (FALSE===$chk_rlt) echo __LINE__ . mysqli_error($dblink);
	$idx=0;
	while($row = mysqli_fetch_assoc($chk_rlt)) { #ID ProductName UnitPrice InStock Category	Author Issuer
		$rtn['ID'][$idx]=$row['ID'];
		$rtn['ProductName'][$idx]=$row['ProductName'];
		$rtn['UnitPrice'][$idx]=$row['UnitPrice'];
		$rtn['InStock'][$idx]=$row['InStock'];
		$rtn['Category'][$idx]=$row['Category'];
		$rtn['Author'][$idx]=$row['Author'];
		$rtn['Issuer'][$idx]=$row['Issuer'];
		$idx++;
	}
	return $rtn;
}

//取得所有有庫存的商品
function getAllProduct($sort = 'ID', $pat = 'DESC') {
	global $dblink;
	$exam_sql  = "
				SELECT * 
				FROM products 
				WHERE InStock != 0
				ORDER BY $sort $pat
				";
	$chk_rlt=mysqli_query($dblink,$exam_sql); if (FALSE===$chk_rlt) echo __LINE__ . mysqli_error($dblink);
	$idx=0;
	while($row = mysqli_fetch_assoc($chk_rlt)) { #ID ProductName UnitPrice InStock Category	Author Issuer
		$rtn['ID'][$idx]=$row['ID'];
		$rtn['ProductName'][$idx]=$row['ProductName'];
		$rtn['UnitPrice'][$idx]=$row['UnitPrice'];
		$rtn['InStock'][$idx]=$row['InStock'];
		$rtn['Category'][$idx]=$row['Category'];
		$rtn['Author'][$idx]=$row['Author'];
		$rtn['Issuer'][$idx]=$row['Issuer'];
		$idx++;
	}
	return $rtn;
}

//從ID搜尋完整商品資料
function getProductformID($id) {
	global $dblink;
	$exam_sql  = "
				SELECT * 
				FROM products 
				WHERE ID = '$id'
				";
	$chk_rlt=mysqli_query($dblink,$exam_sql); if (FALSE===$chk_rlt) echo __LINE__ . mysqli_error($dblink);
	$idx=0;
	while($row = mysqli_fetch_assoc($chk_rlt)) { #ID ProductName UnitPrice InStock Category	Author Issuer
		$rtn['ID'][$idx]=$row['ID'];
		$rtn['ProductName'][$idx]=$row['ProductName'];
		$rtn['UnitPrice'][$idx]=$row['UnitPrice'];
		$rtn['InStock'][$idx]=$row['InStock'];
		$rtn['Category'][$idx]=$row['Category'];
		$rtn['Author'][$idx]=$row['Author'];
		$rtn['Issuer'][$idx]=$row['Issuer'];
		$idx++;
	}
	return $rtn;
}

//立刻跳出資訊
function ajaxFormJs($idName,$span) { # Ajax 表單 , 需要 jquery
	if ($span) $rtn='<span id="Rlt'.$idName.'"></span>'; else $rtn=''; 
	$rtn.="<script type=\"text/javascript\">  
			$(document).ready(function() { $('#".$idName."').ajaxForm({ target: '#Rlt".$idName."', success: function() { $('#Rlt".$idName."').fadeIn('slow'); } }); });
		</script>";
	return $rtn;	
}

//取的所有購物車內的商品
function getAllCart($act) {
	global $dblink;
	$exam_sql  = "
				SELECT * 
				FROM cart 
				WHERE UserID = '$act' && ProductQuantity > 0
				ORDER BY ID DESC
				";
	$chk_rlt=mysqli_query($dblink,$exam_sql); if (FALSE===$chk_rlt) echo __LINE__ . mysqli_error($dblink);
	$idx=0;
	while($row = mysqli_fetch_assoc($chk_rlt)) { #ID UserID	ProductID ProductQuantity State
		$rtn['ID'][$idx]=$row['ID'];
		$rtn['UserID'][$idx]=$row['UserID'];
		$rtn['ProductID'][$idx]=$row['ProductID'];
		$rtn['ProductName'][$idx]=$row['ProductName'];
		$rtn['ProductPrice'][$idx]=$row['ProductPrice'];
		$rtn['ProductQuantity'][$idx]=$row['ProductQuantity'];
		$idx++;
	}
	return $rtn;
}

//搜索購物車，取得個人購物車內的特定商品
function selectCart($act, $pro) {
	global $dblink;
	$exam_sql  = "
				SELECT * 
				FROM cart 
				WHERE UserID = '$act' and ProductID = '$pro'
				ORDER BY ID DESC
				";
	$chk_rlt=mysqli_query($dblink,$exam_sql); if (FALSE===$chk_rlt) echo __LINE__ . mysqli_error($dblink);
	$idx=0;
	$rtn = NULL;
	while($row = mysqli_fetch_assoc($chk_rlt)) { #ID UserID	ProductID ProductQuantity State
		$rtn['ID'][$idx]=$row['ID'];
		$rtn['UserID'][$idx]=$row['UserID'];
		$rtn['ProductID'][$idx]=$row['ProductID'];
		$rtn['ProductName'][$idx]=$row['ProductName'];
		$rtn['ProductPrice'][$idx]=$row['ProductPrice'];
		$rtn['ProductQuantity'][$idx]=$row['ProductQuantity'];
		$idx++;
	}
	return $rtn;
}

function getThisCart($act, $id) {
	global $dblink;
	$exam_sql  = "
				SELECT * 
				FROM cart 
				WHERE UserID = '$act' and ID = '$id'
				ORDER BY ID DESC
				";
	$chk_rlt=mysqli_query($dblink,$exam_sql); if (FALSE===$chk_rlt) echo __LINE__ . mysqli_error($dblink);
	$idx=0;
	$rtn = NULL;
	$row = mysqli_fetch_assoc($chk_rlt);
	
	
	return $row;
}

//會員資訊
function getMember($acct) {
	global $dblink;
	$exam_sql  = "
				SELECT * 
				FROM member 
				WHERE Account = '$acct'
				";
	$chk_rlt=mysqli_query($dblink,$exam_sql); if (FALSE===$chk_rlt) echo __LINE__ . mysqli_error($dblink);
	$idx=0;
	while($row = mysqli_fetch_assoc($chk_rlt)) { #ID Account Password Name Email
		$rtn['ID'][$idx]=$row['ID'];
		$rtn['Account'][$idx]=$row['Account'];
		$rtn['Password'][$idx]=$row['Password'];
		$rtn['Name'][$idx]=$row['Name'];
		$rtn['Email'][$idx]=$row['Email'];
		$idx++;
	}
	return $rtn;
}

//註冊
function signUpSet($act, $psw) {
	global $dblink;
	$inst_sql = "
			INSERT INTO  member
			( Account, Password ) VALUES ( '$act', '$psw' )";
	$inst_result=mysqli_query($dblink,$inst_sql); if (FALSE===$inst_result) echo __LINE__ . mysqli_error($dblink);
	return  mysqli_insert_id($dblink);
}	

//修改購物車商品數量
function UpdateCartQ($act, $pro, $new) {
	global $dblink;
	$sql=" 	UPDATE cart
			SET 
			ProductQuantity = '$new'
			WHERE 
			UserID = '$act' and ProductID = '$pro'
			";
	$result = mysqli_query($dblink,$sql);if (FALSE===$result) echo __LINE__ . mysqli_error($dblink);
	return  mysqli_affected_rows($dblink);
}

//新增商品至購物車
function newProCart($usr, $pro, $name, $price, $proQ) {
	global $dblink;
	$inst_sql = "
			INSERT INTO  cart
			( UserID, ProductID, ProductName, ProductPrice, ProductQuantity) 
			VALUES ( '$usr', '$pro', '$name', '$price', '$proQ' )
			";//UserID	ProductID ProductName ProductPrice ProductQuantity
	$inst_result=mysqli_query($dblink,$inst_sql); if (FALSE===$inst_result) echo __LINE__ . mysqli_error($dblink);
	return  mysqli_insert_id($dblink);
}

//新訂單
function newOrder($ordN, $pro, $usr, $proQ, $add, $name, $pho, $pay, $sent, $bill) {
	global $dblink;
	$inst_sql = "
			INSERT INTO  `order`
			( OrderNum, ProductID, UserID, Amount, ReceiveAddress, ReceiveName, ReceivePhone, Payment, Sent, Bill) 
			VALUES ( '$ordN', '$pro', '$usr', '$proQ', '$add', '$name', '$pho', '$pay', '$sent', '$bill')
			";//OrderNum	ProductID	UserID	Amount	ReceiveAddress	ReceiveName	ReceivePhone	Payment	Sent
	$inst_result=mysqli_query($dblink,$inst_sql); if (FALSE===$inst_result) echo __LINE__ . mysqli_error($dblink);
	return  mysqli_insert_id($dblink);
}

//搜尋用戶過往訂單的訂單編號
function getOldOrder($id) {
	global $dblink;
	$exam_sql  = "
				SELECT * 
				FROM `order`
				WHERE UserID = '$id'
				";
	$chk_rlt=mysqli_query($dblink,$exam_sql); if (FALSE===$chk_rlt) echo __LINE__ . mysqli_error($dblink);
	$idx=0;
	echo $id;
	while($row = mysqli_fetch_assoc($chk_rlt)) { #OrderNum ProductID UserID Amount ReceiveAddress ReceiveName ReceivePhone Payment Sent Bill
		$rtn['ID'][$idx]=$row['ID'];
		echo $row['ID'];
		$rtn['OrderNum'][$idx]=$row['OrderNum'];
		$rtn['ProductID'][$idx]=$row['ProductID'];
		$rtn['UserID'][$idx]=$row['UserID'];
		$rtn['Amount'][$idx]=$row['Amount'];
		$rtn['ReceiveAddress'][$idx]=$row['ReceiveAddress'];
		$rtn['ReceiveName'][$idx]=$row['ReceiveName'];
		$rtn['ReceivePhone'][$idx]=$row['ReceivePhone'];
		$rtn['Payment'][$idx]=$row['Payment'];
		$rtn['Sent'][$idx]=$row['Sent'];
		$rtn['Bill'][$idx]=$row['Bill'];
		$idx++;
	}
	return $rtn;
}

// 更新會員資料
function updateMemberData($id, $name, $email){
	global $dblink;
	$sql =" UPDATE member
			SET
			Name = '$name',
			Email = '$email'
			WHERE
			ID = '$id'
			";
	$result = mysqli_query($dblink,$sql);if (FALSE===$result) echo __LINE__ . mysqli_error($dblink);
	return  mysqli_affected_rows($dblink);
}

// 尋找密碼
function searchPassword($id, $psw) {
	global $dblink;
	$exam_sql  = "
				SELECT * 
				FROM member 
				WHERE ID = '$id' and Password = '$psw'
				";
	$chk_rlt=mysqli_query($dblink,$exam_sql); if (FALSE===$chk_rlt) echo __LINE__ . mysqli_error($dblink);
	$idx=0;
	while($row = mysqli_fetch_assoc($chk_rlt)) { #ID Account Password Name Email
		$rtn['ID'][$idx]=$row['ID'];
		$rtn['Account'][$idx]=$row['Account'];
		$rtn['Password'][$idx]=$row['Password'];
		$rtn['Name'][$idx]=$row['Name'];
		$rtn['Email'][$idx]=$row['Email'];
		$idx++;
	}
	return $rtn;
}

// 更新密碼
function updatePassword($id, $psw){
	global $dblink;
	$sql =" UPDATE member
			SET
			Password = '$psw'
			WHERE
			ID = '$id'
			";
	$result = mysqli_query($dblink,$sql);if (FALSE===$result) echo __LINE__ . mysqli_error($dblink);
	return  mysqli_affected_rows($dblink);
}

// 獲得會員訂單
function getOrder($id){
	global $dblink;
	$exam_sql  = "
				SELECT * 
				FROM `order`
				WHERE UserID = '$id'
				";
	$chk_rlt=mysqli_query($dblink,$exam_sql); if (FALSE===$chk_rlt) echo __LINE__ . mysqli_error($dblink);
	$idx=0;
	while($row = mysqli_fetch_assoc($chk_rlt)) { #ID Account Password Name Email
		$rtn['ID'][$idx]=$row['ID'];
		$rtn['OrderNum'][$idx]=$row['OrderNum'];
		$rtn['ProductID'][$idx]=$row['ProductID'];
		$rtn['UserID'][$idx]=$row['UserID'];
		$rtn['Amount'][$idx]=$row['Amount'];
		$rtn['ReceiveAddress'][$idx]=$row['ReceiveAddress'];
		$rtn['ReceiveName'][$idx]=$row['ReceiveName'];
		$rtn['ReceivePhone'][$idx]=$row['ReceivePhone'];
		$rtn['Payment'][$idx]=$row['Payment'];
		$rtn['Sent'][$idx]=$row['Sent'];
		$idx++;
	}
	return $rtn;
}

// 獲得商品的價錢和名稱
function getPriceAndName($id){
	global $dblink;
	$exam_sql  = "
				SELECT P.UnitPrice, P.ProductName 
				FROM products as P, `order` as O
				WHERE P.ID = O.ProductID and O.UserID = '$id'
				";
	$chk_rlt=mysqli_query($dblink,$exam_sql); if (FALSE===$chk_rlt) echo __LINE__ . mysqli_error($dblink);
	$idx=0;
	while($row = mysqli_fetch_assoc($chk_rlt)) { #ID Account Password Name Email
		$rtn['UnitPrice'][$idx]=$row['UnitPrice'];
		$rtn['ProductName'][$idx]=$row['ProductName'];
		$idx++;
	}
	return $rtn;
}


?>
