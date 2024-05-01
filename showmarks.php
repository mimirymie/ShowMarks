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

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Marks</title>
</head>
<body style="text-align: center;">
    <table>
        <thead>
            <tr>
                <th> ITIRC </th>
                <th> <a href="showmarks.php" > Show marks </a></th>
                <th> <a href="addmarks.php" > Add marks </a></th>
            </tr>
    </table><b>
    <?php 
    $sql='select id_apogee, first_name, last_name, marks.id, name, idSubject, idStudent, mark from marks 
    join subjects on idSubject=subjects.id
    join students on idStudent=id_apogee ';
    $result=$conx->query($sql);
    $res=$result->fetchAll();
    ?>
    <p style="align: center;" >
        <table style="border: 0px;" >
        <h1><caption> Show all marks </caption></h1>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Num Apogee</th>
                    <th>Nom et Prenom</th>
                    <th>Matiere</th>
                    <th>Note</th>
                    <th>Action</th>
                </tr>
            </thead>
            <?php 
                for($i=0;$i<count($res);$i++)
                {
            ?>
            <tr>
                <td><?php echo $i ?> </td>
                <td><?php echo $res[$i]['id_apogee'] ?> </td>
                <td><?php echo $res[$i]['first_name']." ".$res[$i]['last_name'] ?> </td>
                <td><?php echo $res[$i]['name'] ?> </td>
                <td><?php echo $res[$i]['mark'] ?> </td>
                <td> <a href="delete.php?id=<?php echo $res[$i]['id'] ?> "><img width="20px" src="delete.png" alt="delete"></a> <?php  ?> </td>
            </tr>
            <?php   
                }
                if(isset($_POST['submit']))
                {
            ?>
            <tr>
                <td></td>
            </tr>
            <?php   
                }
            ?>
        </table><b>
    <p>

</body>
</html>