<?php 
class model {
    //read data; 
    public function getData($name_file = '')
    {
        // echo 'ok @@ '; 
        // // mở file; 
        // $fp1 = fopen($name_file.'.txt', 'r'); 
        if(!file_exists($name_file.'.txt')) return 'file khong ton tai'; 
        $data = file($name_file.'.txt'); 
        array_shift($data);
        // $readFile = fread($fp1, filesize($name_file.'.txt')); 
        // echo '<pre>'; 
        // var_dump($data); die; 

        return $data; 
    }
}