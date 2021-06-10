<?php 

//read file 
function fread_file($file='')
{
    if(file_exists($file)){         // if file exists then implement the next command
        // echo 'file ton tai';
        $open_f = @fopen($file, 'r');     // open file => only read file; 

        $data = fread($open_f, filesize($file));    // then read all file 

        fclose($open_f); 
        return $data; 

    } 
    else return 'error: read file error'; 
}

// check quyền ghi file;
function checkMission()   
{
    $fp = @fopen('_student.txt', "a+");
  
    // Kiểm tra file mở thành công không
    if (!$fp) {
        echo 'Mở file không thành công';
    }
    else
    {
        // Đọc file và trả về nội dung
        // $data = fread($fp, filesize('_student.txt'));
        $ob = [
            'nam', '22'
        ];
        $ob = implode('| ', $ob); 
        fwrite($fp, $ob); 
    }
    fclose($fp); 

}

