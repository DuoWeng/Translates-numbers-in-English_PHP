<?php
$stop = false;
$digit = array("","one","two","three","four","five","six","seven","eight","nine");
while(!$stop)
{
    echo "Please enter a number:\n";
    $var = trim(fgets(STDIN));
    if(!is_numeric($var)) break;
    echo "You input number is : $var\n";
    switch($var){
    case $var === 0:echo "zero\n";break;
    case $var <= 99 && $var > 0: echo d2digit($var)."\n";break;
    case $var <= 999: echo d3digit($var)."\n";break;
    case $var <= 999999: echo d6digit($var)."\n";break;
    case $var <= 999999999: echo d9digit($var)."\n";break;
    case $var >= 1000000000:echo d10digit($var)."\n";break;}
}

function d2digit($num)
{
    global $digit;
    $tens = array("","","twenty","thirty","fourty","fifty","sixty","seventy","eighty","ninety");
    $teen = array("ten","eleven","twelve","thirteen","fourteen","fifteen","sixteen","seventeen","eighteen","nineteen");
    switch($num){
    case $num < 10 : return $digit[$num];
    case $num < 20 : return $teen[$num%10];
    case $num%10 == 0 : return $tens[$num/10];
    default: return $tens[floor($num/10)].' '.$digit[$num%10];}
}
function d3digit($num){
    global $digit;
    if($num < 100 ) return d2digit($num);
    else return $digit[floor($num/100)]. ' hundred '.d2digit($num%100);
}
function d6digit($num){
    if($num < 1000) return d3digit($num);
    if($num < 10000) return d2digit(floor($num/1000)).' thousand '.d3digit($num%1000);
    else return d3digit(floor($num/1000)).' thousand '.d3digit($num%1000);
}
function d9digit($num){
    if($num < 1000000) return d6digit($num);
    if($num < 100000000) return d2digit(floor($num/1000000)).' million '.d6digit($num%1000000);
    else return d3digit(floor($num/1000000)).' million '.d6digit($num%1000000);
}
function d10digit($num){
    if($num < 10000000000) return d2digit(floor($num/1000000000)). ' billion '.d9digit($num-floor($num/1000000000)*1000000000);
    else return "You input invalid number. Try again.";
}
?>
