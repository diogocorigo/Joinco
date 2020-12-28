<?php
    $db = mysqli_connect('localhost','root','','joinco');

    $img=$_GET['img'];
    $img = $_FILES['file'][$img];

    $position = strpos($img, ".");
    $fileextension = substr($img, $position+ 1);
    $fileextension = strtolower($fileextension);

    if(!is_dir('../imgRepository/')){
        mkdir('../imgRepository/');
    }

    $path = '../imgRepository/';
    if (move_uploaded_file($tmp_img, $path . $img)) { 
        $timeId=date("his");
        $extra="img";
        rename ("$path.$img", "$path.$supplierName.$timeId.$extra");
        mysqli_query($db,"insert into images(codImg,url,codSup) values(null,'".$supplierName.$timeId.$extra."','".$codSup."'");    
    }  else {
        echo mysqli_error($db);
        echo "Erro";
    }

?>