<?php 
define('_DIR_ROOT_', __DIR__); 

// // mở file; 
// $fp1 = fopen('answer.txt', 'r'); 
// $fp2 = fopen('result.txt', 'r'); 
// $fp3 = fopen('_choice_result.txt', 'r'); 

// // doc 

// $answer = fread($fp1, filesize('answer.txt')); 
// $result = fread($fp2, filesize('result.txt')); 
// $_choice_result = fread($fp3, filesize('_choice_result.txt')); 


// echo '<pre>'; 
// print_r($answer); 
// print_r($result); 
// print_r($_choice_result); 


require_once 'controller/BaseController.php'; 
require_once 'Models/model.php'; 
require_once 'controller/QuizController.php'; 
$quiz = new QuizController(); 

$quiz->_getQuiz(); 