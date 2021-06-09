<?php 
$file = '_student.txt'; 
    if(file_exists($file))
    {
        echo 'file khong ton tai'; 
        fopen($file, 'r'); 
    }
    else echo 'file khong ton tai'; 
?>