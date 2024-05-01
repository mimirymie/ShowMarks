<?php 
session_start();
if(isset($_POST['submit']))
{
    $_SESSION['submit']=$_POST['submit'];
    header('location: showmarks.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Marks</title>
</head>
<body style="text-align: center;">
    <table>
        <thead>
            <tr>
                <th> ITIRC Show marks </th>
                <th> <a href="showmarks.php" > Show marks </a></th>
                <th> <a href="addmarks.php" > Add marks </a></th>
            </tr>
    </table>
    <form action="addmarks.php" method="post">
        <p>
            <label for="student">Student</label>
            <select name="student">
                <option value='1001'>adil madani</option>
                <option value='1002'>Sarah alaoui</option>
                <option value='1003'>mohcine daoudi</option>
                <option value='1004'>youssef kolaoui</option>
            </select>
        </p>
        <p>
            <label for="subject">Subject</label>
            <select name="subject" class="form-control" id="subject">
                <option value='1'>BD</option>
                <option value='2'>WEB</option>
                <option value='3'>JAVA</option>
                <option value='4'>C++</option>
            </select>
        </p>
        <p>
            <label for="mark">Mark</label>
            <input type="text" name="mark" class="form-control" id="mark" placeholder="Mark">
        </p>
        <button type="submit" name="submit" >Submit</button>
    </form>
</body>
</html>