<?php
$db = mysqli_connect('localhost','root','','joinco');
$username=$_GET['username'];
$password=$_GET['password'];
$sql="Select type,codUser from users where email='".$username."' and password ='".$password."'";
$result=mysqli_query($db,$sql);
if($result){
    if (mysqli_num_rows($result)>0) {
        session_start();
        $row = $result -> fetch_array(MYSQLI_ASSOC);
        $_SESSION['codUser']=$row['codUser'];
        $_SESSION['type']=$row['type'];
        echo "*Pode entrar";
    }
    else{
        echo "*Username ou password invalida";
    }
}else{
    echo "*Erro executado com sucesso";
}
?>