<?php 
session_start();
if(isset($_POST['login']))
{
    $_SESSION['username']=$_POST['username'];
    $_SESSION['password']=$_POST['password'];
    $user=$_SESSION['username'];
    $pass=$_SESSION['password'];

    $servername="localhost";
    $bdusername='root';
    $bdpassword='';
    $dbname='marks';
    try{
        $conx=new PDO("mysql:host=$servername;dbname=$dbname",$bdusername,$bdpassword);
        $conx->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $sql='select * from admin where login="'.$user.'" AND password="'.$pass.'"';
        echo $sql;
        $result=$conx->query($sql);
        $res=$result->fetch();
        print_r($res);
        if(count($res)!=0)
        {
            $_SESSION['nom']=$res['name'];
            header('location: showmarks.php');
        }
        else
        {
            echo 'username et password incorrectes ';
        }
    }
    catch(PDOException $e){
        echo "erreur dans la connexion";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
</head>
<body style="text-align: center;text-size-adjust: 23px;">
<form action="auth.php" method="post">
        <p>
            <label> Username </label>
            <input type="text" name="username" placeholder="Enter Username" required>
        </p> 
        <p>   
            <label> Password </label>
            <input type="password" name="password" placeholder="Enter Password" required>
        </p>
        <input type="submit" name="login" value="Login">
    </form>
</body>
</html>