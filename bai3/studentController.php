<?php 

// print_r($_POST);die; 

// CHECK OPEN FILE
$fileName = '_student.txt'; 
$of = @fopen($fileName, 'a+'); // cấp quyền đọc và ghi tiếp != ghi đè ở chế độ append; 

// check file tồn tại không sau đó check mở file 
if(file_exists($fileName)){
    // echo '<pre>';
    // echo 'file tồn tại'; 
    // check mở file
    if($of){
        // echo '<br>mo duoc<br>'; 
        // print_r($_POST); 
        // print_r(implode(" | ", $_POST)."\n"); die; 
        // var_dump(implode(' | ', $_POST)); die; 

        $_string = implode(" | ", $_POST); 
        fputs($of, trim($_string)."\n"); 
        fclose($of);
        echo 'ghi thanh cong <br>'; 
        // đọc file: 
        require_once 'handle_student.php'; 
        echo '<pre>'; 
        print_r(fread_file($fileName)); 
        echo '</pre>'; 

        echo 'bạn muốn thêm mới user? <br>'; 
        echo '<a href="index.php">Thêm mới thành viên</a>'; 
    }
    else echo 'Error: Mở file không thành công'; 
}else {
    echo 'file khong ton tai'; 
    // không có thì tạo mới file 
    mkdir($fileName); 
}
