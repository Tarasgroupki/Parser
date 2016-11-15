<?php
///////////////////////////////////Names Parsing//////////////////////////////////////
$String = file_get_contents("http://lviv.delivero.com.ua/uk/restaurant/pizza-555");
function Parse2($p1,$p2,$p3){
 $num = strpos($p1,$p2);
 if($num === false) return 0;
 $num1 = substr($p1,$num);
 return substr($num1,0,strpos($num1,$p3));
}
$oi = Parse2($String,'<div class="gitem " id="item-723">','<div class="gitem " id="item-862">');
$description12 = '/div class="field-content".+?</';
$name = '/[А-Яа-я].+?</';
if(preg_match_all($description12,$oi,$descs)){
echo "<pre>";
print_r($descs);
echo "</pre>";
}
for($hj = 0; $hj<count($descs[0]);$hj++){
if(preg_match($name,$descs[0][$hj],$names[$hj])){
echo "<pre>";
print_r($names);
echo "</pre>";
}
if($names[$hj][0] != $names[0][0]){
$names3[$hj] = $names[$hj][0];
}
}
$names3 = implode("  ",$names3);
$names3 = str_replace("<","",$names3);
$names3 = explode("  ",$names3);
var_dump($names3);
///////////////////////////////////Price Parsing////////////////////////////////////////
function Parse3($p1,$p2,$p3){
 $num = strpos($p1,$p2);
 if($num === false) return 0;
 $num1 = substr($p1,$num);
 return substr($num1,0,strpos($num1,$p3));
}
$fg = Parse2($String,'<div class="gitem " id="item-723">','<div class="gitem " id="item-862">');
$price = '/span class="price".+?</';
$price1 = '/[0-9].+?</';
if(preg_match_all($price,$fg,$prices)){
echo "<pre>";
print_r($prices);
echo "</pre>";
}
for($hj1 = 0; $hj1<count($prices[0]);$hj1++){
if(preg_match($price1,$prices[0][$hj1],$prices3[$hj1])){
echo "<pre>";
var_dump($prices3);
echo "</pre>";
}}
for($nb = 0;$nb<count($prices3);$nb++){
$price23[$nb] = str_replace("<","",$prices3[$nb][0]);
}
print_r($price23);
///////////////////////////////////Description Parsing////////////////////////////////////////
$fg = Parse2($String,'<div class="gitem " id="item-723">','<div class="gitem " id="item-862">');
$description = '/div class="field-content"><p>.+?</';
$description1 = '/[А-Яа-я].+?</';
if(preg_match_all($description,$fg,$descriptions)){
echo "<pre>";
print_r($descriptions);
echo "</pre>";
}
print_r($descriptions);
for($hj2 = 0; $hj2<count($descriptions[0]);$hj2++){
if(preg_match($description1,$descriptions[0][$hj2],$description3[$hj2])){
echo "<pre>";
var_dump($description3);
echo "</pre>";
}}
for($nb1 = 0;$nb1<count($description3);$nb1++){
$descript[$nb1] = str_replace("<","",$description3[$nb1][0]);
}
print_r($descript);
///////////////////////////////////Images Parsing///////////////////////////////////////
function Parse1($p1,$p2,$p3){
 $num = strpos($p1,$p2);
 if($num === false) return 0;
 $num1 = substr($p1,$num);
 return substr($num1,0,strpos($num1,$p3));
}
$n = Parse1($String,'<div class="gitem " id="item-723">','<div class="gitem " id="item-862">');
$image = "/src=.+?w/";
if(preg_match_all($image,$n,$things)){
echo "<pre>";
print_r($things);
echo "</pre>";
}
for($num = 0; $num<count($things[0]);$num++){
$images[$num] = $things[0][$num];
if($images[$num] != $images[1]){
$images1[$num] = $images[$num];
}
//$images1[$num] = str_replace("src=","",$images1[num]);
//unset($images[$num+1]);

}
$images2 = implode("w",$images1);
$images2 = str_replace("wwsrc=","",$images2);
$images2 = str_replace('"',"",$images2);
$images2 = str_replace("src=","",$images2);
print $images2;
$dirname = dirname(__FILE__);
$images1 = explode(' ',$images2);
$path1 = array('1','2','3','4','5','6','7','8','9','10','11','12','13','14','15','16','17','18');
//$path = $dirname.'/images/1234.png';
for($number = 0;$number<count($images1);$number++){
$path = $dirname.'/image/data/demo/'.$path1[$number].'pizza-555_pizza.png';
file_put_contents($path,file_get_contents(trim($images1[$number])));
}
print_r($images1);
echo "<br />";
print $n;
print_r($ru);
?>