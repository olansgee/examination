<?php 
$i = 0;
$animal = ["cat", "dog", "horse"];

// for (list($a[i] = $animal); $i<count($animal); $i++){
// 	echo $a . "<br>";
// }

foreach($animal as $anim){
	echo $anim . "<br>";
}
echo $animal[0];

?>