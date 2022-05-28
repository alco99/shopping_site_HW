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

//取得所有商品
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

//立刻跳出加入購物車資訊
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
				WHERE UserID = '$act' && State = 1
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
		$rtn['State'][$idx]=$row['State'];
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
	while($row = mysqli_fetch_assoc($chk_rlt)) { #ID UserID	ProductID ProductQuantity State
		$rtn['ID'][$idx]=$row['ID'];
		$rtn['UserID'][$idx]=$row['UserID'];
		$rtn['ProductID'][$idx]=$row['ProductID'];
		$rtn['ProductName'][$idx]=$row['ProductName'];
		$rtn['ProductPrice'][$idx]=$row['ProductPrice'];
		$rtn['ProductQuantity'][$idx]=$row['ProductQuantity'];
		$rtn['State'][$idx]=$row['State'];
		$idx++;
	}
	return $rtn;
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
?>
