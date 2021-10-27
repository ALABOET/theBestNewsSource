<?php

$error = NULL;
//у меня вместо conn mysqli


if(isset($_POST['submit']))
{
    $mysqli = new mysqli('localhost', 'root', '', 'comments');
       
        $e = $mysqli->real_escape_string($_POST['$e']);
        $p = $mysqli->real_escape_string($_POST['$p']);


        $resultSet = $mysqli->query("SELECT * FROM users where username = '$u' and password = 
        '$p' LIMIT 1");

        if($resultSet->num_rows !=0)
        {
            //log in
            $row = $resultSet->fetch_assoc();
            $verified = $row['verified'];

            if($verified == 1)
            {

            }
            else
            {
                echo "до сих пор аккаунт ен был подтвержден! Проверьте $email";
            }
        }
        else
        {
            $error = "Неверные данные";
        }
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
<form method="POST" action="">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Login</h5>
            </div>
            <div class="modal-body">
                <input type="email" name="e" id="userEmail" class="form-control" placeholder="Your email" >
                <input type="password" name="p" id="userPassword" class="form-control" placeholder="Your password" >
                <input type="SUBMIT" name="submit" value="Register">
            </div>
            
        </div>
    </div>
    
    </form>
</body>
</html>