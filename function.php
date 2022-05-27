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
		$rtn['InStock'][$idx]=$row['InStock']; # 注意 cse_Rcsno 及 cse_rcsno
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
		$rtn['InStock'][$idx]=$row['InStock']; # 注意 cse_Rcsno 及 cse_rcsno
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
		$rtn['InStock'][$idx]=$row['InStock']; # 注意 cse_Rcsno 及 cse_rcsno
		$rtn['Category'][$idx]=$row['Category'];
		$rtn['Author'][$idx]=$row['Author'];
		$rtn['Issuer'][$idx]=$row['Issuer'];
		$idx++;
	}
	return $rtn;
}

?>
