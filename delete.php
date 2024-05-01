<?php 
session_start();
$servername="localhost";
$bdusername='root';
$bdpassword='';
$dbname='marks';
try{
    $conx=new PDO("mysql:host=$servername;dbname=$dbname",$bdusername,$bdpassword);
    $conx->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e){
    echo "erreur dans la connexion";
}

   $id=$_GET['id'];
    $sql='Delete from marks where id='.$id;
    echo $sql;
    echo $conx->exec($sql);
?> 