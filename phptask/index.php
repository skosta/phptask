<?php

function binarySearch($file,$keyInfo){
	$readFile = file_get_contents($file);		
	$explodeStr = explode('\x0A',$readFile);
	array_pop($explodeStr); //Удаляем последний элемент, т.к. самым последним будет разделитель и из-за этого в конце получается пустое значение
	$start = 0;
	$end = count($explodeStr)-1;		
	while($start <= $end){			
		$sredn = floor(($start+$end)/2);
		$infoExplode = explode('\t',$explodeStr[$sredn]); //Получаем ключ, чтобы сравнить с ключом, который мы указывали
		$sravstr = strnatcmp($infoExplode[0], $keyInfo);
	//	echo $sravstr." - ".$infoExplode[0]." - ".$keyInfo."</br>";
		if($sravstr > 0){
			$end = $sredn-1;
		}elseif($sravstr < 0){
			$start = $sredn+1;
		}else{
			return $infoExplode[1]; //Получаем значение, которое соответствует нашему ключу
		}
	}		
	return 'undef';
}



//Исходные данные
$PuthFile = $_SERVER['DOCUMENT_ROOT']."/info.txt";
$MyKey = "ключ67";

//Вывод значения
echo binarySearch($PuthFile,$MyKey)."</br>";



/*
//Чтение построчно
function binarySearchStr($file,$keyInfo){
	$fp = file($file);
	foreach($fp as $arItemf){
		echo $arItemf."</br>";
		$explodeStr = explode('\x0A',$arItemf);
		array_pop($explodeStr); //Удаляем последний элемент, т.к. самым последним будет разделитель и из-за этого в конце получается пустое значение
		$start = 0;
		$end = count($explodeStr)-1;		
		while($start <= $end){			
			$sredn = floor(($start+$end)/2);
			$infoExplode = explode('\t',$explodeStr[$sredn]); //Получаем ключ, чтобы сравнить с ключом, который мы указывали
			$sravstr = strnatcmp($infoExplode[0], $keyInfo);
		//	echo $sravstr." - ".$infoExplode[0]." - ".$keyInfo."</br>";
			if($sravstr > 0){
				$end = $sredn-1;
			}elseif($sravstr < 0){
				$start = $sredn+1;
			}else{
				return $infoExplode[1]; //Получаем значение, которое соответствует нашему ключу
			}
		}				
	}
	return 'undef';
}

echo binarySearchStr($PuthFile,$MyKey);

*/



?>
