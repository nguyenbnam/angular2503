<?php 
class model {
    public function getData($name_file = '')
    {
        if(!file_exists($name_file.'.txt')) return 'file khong ton tai'; 
        $data = file($name_file.'.txt'); 
        array_shift($data);
        return $data; 
    }
}