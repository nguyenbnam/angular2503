<?php 
class QuizController extends BaseController {
    protected $model; 
    public function __construct() {
        $this->model = $this -> model('model');

    }



    public function _getQuiz()
    {
        $questions =  $this->model->getData('question');
        // echo $questions;die; 
        $options =  $this->model->getData('options');
        // gộp chung đáp án đúng với cái nay
        $result =  $this->model->getData('result');

        /**
         * để cho ra 1 câu hỏi cà các đáp án thì sẽ là: 
         * id [chứa câu hỏi][
         *      chứa các lựa chọn - 
         *      - chứa câu trả lời 
         * ]
         * [id question][question] = cau hoi; 
         * trong câu hỏi chứa câu trả lời; 
         * [id question][lựa chọn] = câu trả lời; 
         * bên view se
         */

        $array_questions = array();
        $array_options = array(); 
        //$array_result = array(); 

        foreach($questions as $key =>$value) {
            $tmp = explode('|', $value);
            // echo '<pre>'; 
            // print_r($tmp);die; 
            $id = $tmp[0]; // lấy id câu hỏi số
            $question =$tmp[1];  // gán câu hỏi với id 
            $array_questions[$id] = array('question'=>$question); // gộp cái câu hỏi với id câu hỏi số; 
        }

        foreach($options as $key => $value){
            $tmp = explode('|', $value); 
            // echo '<pre>'; 
            // print_r($tmp);die; 
            $id = $tmp[0]; // lấy id câu hỏi
            $option = $tmp[1]; // lấy các lựa chọn
            $answer = $tmp[2]; // gán các đáp án
            // và gộp các đáp án với câu hỏi + lựa chọn 
            $array_options[$id][$option]= [$answer]; // gán giá trị vào mảng 2 chiều 
        }

        foreach($result as $key => $value){
            $tmp = explode('|', $value); 
            // echo '<pre>'; 
            // print_r($tmp);die; 
            $id = $tmp[0]; // lấy id câu hỏi
            $option = $tmp[1]; // gán các kq
            $result = $tmp[2]; // gán các kq
            // và gộp các đáp án với câu hỏi + lựa chọn 
            $array_result[$id][$option]= [$result]; // gán giá trị vào mảng 2 chiều 
        }

        // echo '<pre>';
        // print_r($array_result); die;
        // echo '<pre>';
        // print_r($array_options); die;
        // echo '<pre>';
        // print_r($array_questions); die;

        // gộp câu hỏi và các lựa chọn vào mảng 2 chiều; 
        $arr_question_all = array(); // tạo ra 1 mảng rỗng để chứa câu hỏi và các lựa chọn 
        foreach($array_questions as $key => $value){    //lặp cái câu hỏi để lấy id câu hỏi gộp cho các lựa chọn 
            $arr_question_all[$key]['question'] = $value['question']; //gán câu hỏi với id cho từng câu
            $arr_question_all[$key]['option'] = $array_options[$key]; // gán các option cho câu hỏi đó
            // gán thêm cho n cái đáp án 
            //$arr_question_all[$key]['result']= $array_result[$key]; // $array_result[$key] là giá trị truong cai mang đó 

        }
        // echo '<pre>';
        // print_r($arr_question_all); die;
        
        //đẩy n ra view; 
        $this->view('quiz', [
            'arr_question_all'=>$arr_question_all
        ]);
    }

    public function _result()
    {
        // gộp chung đáp án đúng với cái nay
        $result =  $this->model->getData('result');

        // echo 'oi doi oi'; 
        // echo '<pre>'; 
        // print_r($result); die; 
        $array_result = array(); 
        foreach($result as $key => $value){
            $tmp = explode('|', $value); 
            $id = $tmp[0]; 
            $option = $tmp[1]; 
            $answer = $tmp[2]; 
            $array_result[$id][$option] = $answer;
            // handle
        }


        echo '<pre>'; 
        // print_r($array_result); 
        array_pop($_POST);  
        // print_r($_POST[$key]); die; 
        $array_right = array(); 
        $res = array(); 
        foreach($array_result as $key => $value){
            // print_r($value);
            // var_dump((int)trim($key));die;
            $key=(int)trim($key); 
            // var_dump(trims($_POST[$key]));die; 
            foreach($value as $key_child => $value_child){
                // var_dump($key_child); die;
                // $res = ($key_child==$_POST[$key])? 'dung' : 'sai';
                // $resq = ($_POST[$key]==$key_child)? 'dung' : 'sai';
                if(trim($_POST[$key])==trim($key_child)){
                    $resq = 'dung';
                }
                else $resq = 'sai';
                $res[$key] = $resq; 
            }

            // echo $res; 
        }   
        // print_r($res); 
        
        

        $this->view('viewResult', [
            'array_result'=> $array_result, 
            '_post'=> $_POST
        ]); 
    }

}