<?php
//商品種類篩選
function getProductsCategory($cat) {
	global $dblink;
	$exam_sql  = "
				SELECT * 
				FROM products 
				WHERE Category = '$cat'
				ORDER BY UnitPrice DESC
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

//根據作者名稱搜尋
function getAuthor($aut) {
	global $dblink;
	$exam_sql  = "
				SELECT * 
				FROM products 
				WHERE Author LIKE '$aut'
				ORDER BY UnitPrice DESC
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

//依照發行人/出版社搜尋
function getIssuer($isr) {
	global $dblink;
	$exam_sql  = "
				SELECT * 
				FROM products 
				WHERE Issuer LIKE '$isr'
				ORDER BY UnitPrice DESC
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

function getProduct($pro) {
	global $dblink;
	$exam_sql  = "
				SELECT * 
				FROM products 
				WHERE ProductName LIKE '%$pro%'
				ORDER BY UnitPrice DESC
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
