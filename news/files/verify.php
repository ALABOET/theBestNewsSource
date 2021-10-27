<?php

if(isset($_GET['vkey']))
{
    $vkey = $_GET['vkey'];
    $mysqli = new mysqli('localhost', 'root', '', 'comments');
    $resultSet = $mysqli->query("SELECT verified, vkey FROM users where verified = 0 and vkey = '$vkey' limit 1");

    if($resultSet->num_rows ==1)
    {
        //validate
        $update = $mysqli->query("UPDATE users set verified = 1 where vkey ='$vkey' LIMIT 1");
        if("$update")
        {
            echo 'Аккаунт подтвержден, сделайте вход!';
        }
        else{
            echo 'well, it aint working mate';
            echo $mysqli->error;
        }
    }
    else
    {
        echo 'этот аккаунт уже подтвержден / что-то пошло не так';
    }
}
else{
    die("something died");
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="mainpage.php"><button>Вернуться на главную</button></a>
</body>
</html>