<?php
session_start();

$loggedIn = false;
if (isset($_SESSION['loggedIn']) && isset($_SESSION['name'])) {
    $loggedIn = true;
}

$conn = new mysqli('localhost', 'root', '', 'comments');

function createCommentRow($data) {
    global $conn;

    $response = '
            <div class="comment">
                <div class="user">'.$data['name'].' <span class="time">'.$data['createdOn'].'</span></div>
                <div class="userComment">'.$data['comment'].'</div>
                <div class="reply"><a href="javascript:void(0)" data-commentID="'.$data['id'].'" onclick="reply(this)">REPLY</a></div>
                <div class="replies">';

    $sql = $conn->query("SELECT replies.id, name, comment, DATE_FORMAT(replies.createdOn, '%Y-%m-%d') AS createdOn FROM replies INNER JOIN users ON replies.userID = users.id WHERE replies.commentID = '".$data['id']."' ORDER BY replies.id DESC LIMIT 1");
    while($dataR = $sql->fetch_assoc())
        $response .= createCommentRow($dataR);

    $response .= '
                        </div>
            </div>
        ';

    return $response;
}

if (isset($_POST['getAllComments'])) {
    $start = $conn->real_escape_string($_POST['start']);

    $response = "";
    $sql = $conn->query("SELECT thecomments.id, name, comment, DATE_FORMAT(thecomments.createdOn, '%Y-%m-%d') AS createdOn FROM thecomments INNER JOIN users ON thecomments.userID = users.id ORDER BY thecomments.id DESC LIMIT $start, 20");
    while($data = $sql->fetch_assoc())
        $response .= createCommentRow($data);

    exit($response);
}

if (isset($_POST['addComment'])) {
    $comment = $conn->real_escape_string($_POST['comment']);
    $isReply = $conn->real_escape_string($_POST['isReply']);
    $commentID = $conn->real_escape_string($_POST['commentID']);
 
    if ($isReply != 'false') {
        $conn->query("INSERT INTO replies (comment, commentID, userID, createdOn) VALUES ('$comment', '$commentID', '".$_SESSION['userID']."', NOW())");
        $sql = $conn->query("SELECT replies.id, name, comment, DATE_FORMAT(replies.createdOn, '%Y-%m-%d') AS createdOn FROM replies INNER JOIN users ON replies.userID = users.id ORDER BY replies.id DESC LIMIT 1");
    } else {
        $conn->query("INSERT INTO thecomments (userID, comment, createdOn) VALUES ('".$_SESSION['userID']."','$comment',NOW())");
        $sql = $conn->query("SELECT thecomments.id, name, comment, DATE_FORMAT(thecomments.createdOn, '%Y-%m-%d') AS createdOn FROM thecomments INNER JOIN users ON thecomments.userID = users.id ORDER BY thecomments.id DESC LIMIT 1");
    }

    $data = $sql->fetch_assoc();
    exit(createCommentRow($data));
}

if (isset($_POST['register'])) 
{


    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $password = $conn->real_escape_string($_POST['password']);
    $sex= $conn->real_escape_string($_POST['sex']);
    $age= $conn->real_escape_string($_POST['age']);
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $sql = $conn->query("SELECT id FROM users WHERE email='$email'");
        if ($sql->num_rows > 0)
            exit('failedUserExists');
        else 
        {
            $vkey = md5(time().$u);

            $ePassword = password_hash($password, PASSWORD_BCRYPT);
            // $conn->query("INSERT INTO users (name, sex, email,password, age, createdOn) VALUES ('$name', '$sex', '$email', '$ePassword', '$age', NOW())");
            $conn->query("INSERT INTO users(name, sex, email, password, age, vkey, createdOn) VALUES('$name','$sex','$email','$ePassword','$age','$vkey', NOW())");
            $to = $email;
            $subject = "Подтверждение почты";
            $message = "<a href='http://localhost/news/files/verify.php?vkey=$vkey'>Нажмите для подтвержения аккаунта</a>";
            $headers = "From: tiurin192@gmail.com \r\n";
            $headers .= "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset = UTF-8" . "\r\n";

            mail($to, $subject, $message, $headers);
            echo "<script>alert('Проверьте вашу почту!')</script>";
        }
            // $sql = $conn->query("SELECT id FROM users ORDER BY id DESC LIMIT 1");
            // $data = $sql->fetch_assoc();
            
            // $_SESSION['loggedIn'] = 1;
            // $_SESSION['name'] = $name;
            // $_SESSION['email'] = $email;
            // $_SESSION['sex'] = $sex;
            // $_SESSION['age'] = $age;
            // $_SESSION['userID'] = $data['id'];
    } 
    else{
        exit('failedEmail');
    }
}

if (isset($_POST['logIn'])) {
    $email = $conn->real_escape_string($_POST['email']);
    $password = $conn->real_escape_string($_POST['password']);
    $verified = $conn->real_escape_string($_POST['verified']);
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $sql = $conn->query("SELECT * FROM users WHERE email='$email' LIMIT 1");
        if ($sql->num_rows == 0)
            exit('failed');
        else {
            $data = $sql->fetch_assoc();
            $passwordHash = $data['password'];
            $verified = $data['verified'];

            if($verified == 1)
            {
            if (password_verify($password, $passwordHash)) 
            {
                $_SESSION['loggedIn'] = 1;
                $_SESSION['name'] = $data['name'];
                $_SESSION['email'] = $email;
                $_SESSION['userID'] = $data['id'];
                $_SESSION['sex'] = $sex;
                $_SESSION['age'] = $age;
                exit('success');
            }
            else {
                exit('failedverified');
            }
            }
             else{
                exit('failed!');
        }
    }
    } else
        exit('failed');
}

$sqlNumComments = $conn->query("SELECT id FROM thecomments");
$numComments = $sqlNumComments->num_rows;
?>