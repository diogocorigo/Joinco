<?php
$db = mysqli_connect('localhost','root','','joinco');

$category=$_GET['category'];
$catsql="Select codCat from Categories where catName=$category";
$codCat=mysqli_query($db,$catsql);
$sql="Insert into supcat(codDefault,codCat) values('".$codDefault."','".$codCat."')";
$result=mysqli_query($db,$sql);
if($result){
    echo "Sucesso!";
} else {
        echo mysqli_error($db);
    echo "Erro";
}
?>