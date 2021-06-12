<?php 
class BaseController {
    public function model($model)
    {
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
        foreach($data as $key=>$value){
            $$key = $value; 
        }
        if(file_exists(_DIR_ROOT_.'/views/'.$view_name.'.php')){
            require_once _DIR_ROOT_.'/views/'.$view_name.'.php'; 
        }
    }
}