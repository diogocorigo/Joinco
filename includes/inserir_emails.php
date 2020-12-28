<?php
$db = mysqli_connect('localhost','root','','joinco');

$email=$_GET['email'];
$radio=$_GET['radio'];

$sql_find_email="select email from email where email='".$email."'";
$result=mysqli_query($db,$sql_find_email);
if($result){
    echo "em uso!";
} else{
    $sql="Insert into email(codDefault,email,defaultEmail) values('$codDefault','$email','$default')";
    $result=mysqli_query($db,$sql);
    if($result){
        echo "Sucesso!";
    } else {
        echo mysqli_error($db);
        echo "Erro";
    }
}
?>