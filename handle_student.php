<?php 

//read file 
function fread_file($file='')
{
    if(file_exists($file)){         // if file exists then implement the next command
        // echo 'file ton tai';
        $open_f = @fopen($file, 'r');     // open file => only read file; 

        $data = fread($open_f, filesize($file));    // then read all file 

        return $data; 
    } 
    else return 'error: read file error'; 
}

// only write
function fwrite_file()
{
    
}