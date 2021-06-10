<?php 
// cái controller này có tác dụng dùng để kiểm tra và điều khiển các file model ... 
// - muốn viết cái này thì mỗi khi dùng thì phải extend cái này - cái này giống với cái BaseController hay viết; thiếu cái view, hnay chưa update; 

class BaseController {
    // dung cho load model 
    public function model($model)
    {
        //kiểm tra xem cái file đó có tồn tại hay không - nhưng trước đó phải define 1 biến đường dẫn  _DIR_ROOT_ trong cái config  routes;
        if(file_exists(_DIR_ROOT_.'/Models/'.$model.'.php')){
            require_once _DIR_ROOT_.'/Models/'.$model.'.php'; 
            if(class_exists($model)){
                $model = new $model();
                return $model; 
            }

        }
        return false; 
    }

    public function view($view_name, array $data = [])
    {
        // extract($data);
        foreach($data as $key=>$value){
            $$key = $value; 
        }
        // echo $view_name;
        if(file_exists(_DIR_ROOT_.'/views/'.$view_name.'.php')){
            require_once _DIR_ROOT_.'/views/'.$view_name.'.php'; 
        }
    }
}