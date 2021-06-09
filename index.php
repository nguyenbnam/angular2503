<?php 
$a = [1, 2, 3, 5, 12, 23]; 
function fsum($a = [])
{
    $sum = 0; 
    foreach($a as $key => $value){
        $sum+=$value; 
    }
    return $sum; 
}
// cach 1: 
// echo array_sum($a); 
// cach 2: 
// $sum = 0; 
// foreach($a as $key => $value){
//     $sum+=$value; 
// }
// echo $sum; 
// $tong = fsum($a);
// echo $tong; 

require_once 'student.php'; 

?>