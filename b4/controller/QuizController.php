<?php 
class QuizController extends BaseController {
    protected $model; 
    public function __construct() {
        $this->model = $this -> model('model');

    }


    public function _getQuiz()
    {
        $answer =  $this->model->getData('answer'); 
        $answer = explode('|', $answer); 
        // unset($answer[0], $answer[1]); 

        // return $answer; 
        $this->view('quiz', [
            'answer'=>$answer
        ]);
    }
}