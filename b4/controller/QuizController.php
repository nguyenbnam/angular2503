<?php 
class QuizController extends BaseController {
    protected $model; 
    public function __construct() {
        $this->model = $this -> model('model');
    }
    public function _getQuiz()
    {
        $questions =  $this->model->getData('question');
        $options =  $this->model->getData('options');
        $result =  $this->model->getData('result');
        $array_questions = array();
        $array_options = array(); 
        foreach($questions as $key =>$value) {
            $tmp = explode('|', $value);
            $id = $tmp[0]; 
            $question =$tmp[1];
            $array_questions[$id] = array('question'=>$question);
        }
        foreach($options as $key => $value){
            $tmp = explode('|', $value); 
            $id = $tmp[0]; 
            $option = $tmp[1]; 
            $answer = $tmp[2];
            $array_options[$id][$option]= [$answer];
        }
        foreach($result as $key => $value){
            $tmp = explode('|', $value); 
            $id = $tmp[0]; 
            $option = $tmp[1];
            $result = $tmp[2]; 
            $array_result[$id][$option]= [$result]; 
        }
        $arr_question_all = array(); 
        foreach($array_questions as $key => $value){
            $arr_question_all[$key]['question'] = $value['question']; 
            $arr_question_all[$key]['option'] = $array_options[$key]; 
        }
        $this->view('quiz', [
        'arr_question_all'=>$arr_question_all
        ]);
    }
    public function _result()
    {
        $result =  $this->model->getData('result');
        $array_result = array(); 
        foreach($result as $key => $value){
            $tmp = explode('|', $value); 
            $id = $tmp[0]; 
            $option = $tmp[1]; 
            $answer = $tmp[2]; 
            $array_result[$id][$option] = $answer;
        }
        array_pop($_POST);  
        $res = array();
        $_true = 0;  
        foreach($array_result as $key => $value){
        $key=(int)trim($key); 
        foreach($value as $key_child => $value_child){
            if(trim($_POST[$key])==trim($key_child)){
                $resq = true;
                $_true+=1;
            }
                else {
                    $resq = false;
            }
        }
        $res[$key]['result']= $resq; 
        $res[$key]['_true']= $_true; 
    }   
        $this->view('viewResult', [
        'res'=> $res, 
        '_true'=>$_true,
        'array_result'=>$array_result
        ]); 
    }
}