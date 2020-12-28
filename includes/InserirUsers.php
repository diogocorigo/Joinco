<?php
$db = mysqli_connect('localhost','root','','joinco');
$codUser=$_GET['codUser'];
$name=$_GET['name'];
$email=$_GET['email'];
$password=$_GET['password'];
$type=$_GET['type'];
$contact=$_GET['contact'];
$sql_find_email="select email from users where email='".$email."'";
$result=mysqli_query($db,$sql_find_email);
if($result){
    echo "email em uso!";
} else{
    $sql="Insert into users(codUser,name,email,password,type,contact) values('$codUser','$name','$email','$password','$type','$contact')";
    $result=mysqli_query($db,$sql);
    if($result){
        echo "User criado com Sucesso!";
    } else {
        echo mysqli_error($db);
        echo "Erro ao inserir User";
    }
}
?>