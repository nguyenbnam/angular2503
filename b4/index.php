<?php 
define('_DIR_ROOT_', __DIR__); 
const CONTROLLER_FOLDER = __DIR__ . '/controller';


require_once 'autoLoading.php/autoLoadController.php'; 

$quiz = new QuizController(); 
$home = new HomeController(); 

// route 
$action = $_GET['action']; 
// echo $action; die;
switch($action){
    case 'quiz': { $quiz->_getQuiz(); break; }
    case 'result': { $quiz->_result(); break; }
    default: $home->index(); 
}

