<!doctype html>
<html lang="en">
<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
  <div class="container">
    <div class="jumbotron">
        <h1 class="display-4">Kết quả bài kiểm tra chắc nghiệm</h1>
        <hr class="my-4">
        <div class="row">
            <div class="col-12">

                <div>
                    <?php $i=1; //echo '<pre>'; print_r($res);die; ?>
                    <label for="">Số câu trả lời đúng: <?php echo $_true ?></label>
                    <?php 
                    
                    foreach($array_result as $key=>$values) : ?>
                    <?php //echo '<pre>';var_dump($array_result);; die; ?>
                        <div class="form-check"> 
                            <label  for="">Câu hỏi 
                                <?php 
                                echo $key.': '; 
                                echo $res[$i]['result']?'Đúng':'Sai' ?>
                            </label>
                            <br>
                            <?php foreach($values as $key_child=>$value_child) : ?>
                            <label  for=""> Câu trả lời đúng là: <?php echo $key_child.': '.$value_child ?></label>
                            <?php endforeach; // vong for cua thang con?>
                        </div> 
                        <?php  $i++; // vong for cua thang con values?>
                        
                        <?php endforeach; // vong for cua thang arr_question?>
                        
                    </div>
                    

                </div>
            </div>
        </div>
        
        
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>