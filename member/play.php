<?php 


$size = "M, XL";
$size_data = explode(', ', $size);
foreach ($size_data as $data) {
	echo $data . "<br>";
}


?>