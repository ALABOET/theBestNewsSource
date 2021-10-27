<?php
$error = NULL;
//у меня вместо conn mysqli


if(isset($_POST['submit']))
{
    //get the form data
    $u = $_POST['u'];
    $e = $_POST['e'];
    $p = $_POST['p'];
    $s = $_POST['s'];
    $a = $_POST['a'];
    if(strlen($u) < 5)
    {
    $error = "Ошиька, больше символов";
    }
    else
    {
        // form is valid
        $mysqli = new mysqli('localhost', 'root', '', 'comments');

        $u = $mysqli->real_escape_string($u);
        $e = $mysqli->real_escape_string($e);
        $p = $mysqli->real_escape_string($p);
        $s = $mysqli->real_escape_string($s);
        $a = $mysqli->real_escape_string($a);

//generate key

$vkey = md5(time().$u);
echo $vkey;


//insert

$p = md5($p);
$insert = $mysqli->query("INSERT INTO users(name, sex, email, password, age, vkey, createdOn) VALUES('$u','$s','$e','$p','$a','$vkey', NOW())");

if($insert)
{
    $to = $e;
    $subject = "Email verification";
    $message = "<a href='http://localhost/news/files/verify.php?vkey=$vkey'>Register Account</a>";
    $headers = "From: tiurin192@gmail.com \r\n";
    $headers .= "MIME-Version: 1.0" . "\r\n";
    $ehaders .= "Content-type:text/html;charset = UTF-8" . "\r\n";

    mail($to, $subject, $message, $headers);
    header('location:thanks.php');
}
else
{ echo 'Ошибка';
    echo $mysqli->error;
}

    }
}
else
{
    echo 'ничего ен работает';
}

?>