<?php
include "authorization.php"
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Russia</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
    <!--Scroll reveal CDN-->
    <script src="https://unpkg.com/scrollreveal"></script>
    <link rel="stylesheet" href="css/bootstrap/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/currency.css">
    <link rel="stylesheet" href="css/new.css">
</head>
<body>
<section class="forms">
<div class="modal fade" id="registerModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Регистрация</h5>
            </div>
            <div class="modal-body">
                <input type="text" name="u" id="userName" class="form-control" placeholder="Ваше имя" >
                <input type="email" name="e" id="userEmail" class="form-control" placeholder="Ваша почта" >
                <input type="password" name="p" id="userPassword" class="form-control" placeholder="Ваш пароль" >
                <input type="text" name="s" id="userSex" class="form-control" placeholder="Ваш пол">               
                <input type="number" name="a" id="userAge" class="form-control" placeholder="Ваш возраст">
                
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" id="registerBtn">Зарегистрироваться</button>
                <button class="btn btn-default" data-dismiss="modal">Закрыть</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="logInModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Авторизация</h5>
                </div>
                <div class="modal-body">
                    <input type="email" id="userLEmail" class="form-control" placeholder="Ваша почта">
                    <input type="password" id="userLPassword" class="form-control" placeholder="Ваш пароль">
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" id="loginBtn">Войти</button>
                    <button class="btn btn-default" data-dismiss="modal">Закрыть</button>
                </div>
            </div>
        </div>
    </div>
</section>

<header class="top-menu">
<div class="container">
<nav class="nav navnews">
    <div class="menu-toggle">
         <i class="openbutton fas fa-bars thebar"></i>

         <i class="closebutton fas fa-times"></i>
    </div>
    <a href="useless/frontpage.html" class="logo"><img src="pics/tags.png" class="eagle" alt=""></a>

    <div class="pleasework"><?php 
if(!$loggedIn)  
  echo '
  
  <button class="btn btn-primary" data-toggle="modal" data-target="#registerModal">Регистрация</button>
  <button class="btn btn-success" data-toggle="modal" data-target="#logInModal">Войти</button>';
  else
     echo '<a href="logOut.php" class="btn btn-warning btnExit">Выйти</a><br>
     
    '
;
  ?></div>
    <ul class="nav-list">
        <li class="nav-item">
            <a href="mainpage.php" class="nav-link">Домой</a>
        </li>
        <li class="nav-item">
            <a href="hot.php" class="nav-link">Самое актуальное</a>
        </li>

        <li class="nav-item">
            <a href="russia.php" class="nav-link">Наука</a>
        </li>

        <li class="nav-item">
            <a href="tech.php" class="nav-link">Новости Хайтека</a>
        </li>

        <li class="nav-item">
            <a href="usa.php" class="nav-link">Англоязычный блок</a>
        </li>
    </ul>
    
</nav>
</div>
    </header>






<?php
    $url = "https://newsapi.org/v2/top-headlines?country=ru&category=sports&apiKey=fb89237aea724504ae612adc1e824e37";
    $response = file_get_contents($url);
    $Newsdata = json_decode($response);

    ?>
    <?php
    foreach ($Newsdata->articles as $News) {
    ?>
        <div class="row Newsgrid">
            <div class="col-md-3">
                <img src="<?php echo $News->urlToImage ?>" id="newsimg" alt="error">
            </div>
            <div class="col-md-9 news-column">
                <p id="title"><?php echo $News->title ?> </p>
                <p id="description"><?php echo $News->description ?></p>
                <!-- <p id="content">Content: <?php echo $News->content ?></p> -->
                <!-- <p id="published">Published: <?php echo $News->publishedAt ?></p> -->
                <p id="source">К источнику: <a href="<?php echo $News ->url?>"><?php echo $News ->url?></a></p>
            </div>
        </div>
    
    <?php
    }
    ?>






    <div class="container theComments">
<div class="row">
<div class="col-md-12">
    <textarea class="form-control" id="mainComment" placeholder="Ваш комментарий" cols="30" rows="5"></textarea>
    <br>
    <button class="btn btn-primary" id="addComment">Добавить комментарий</button>
</div>
</div>
<div class="row">
        <div class="col-md-12">
            <h2>Количество комментариев: <b id="numComments"><?php echo $numComments ?></b></h2>
            <div class="userComments">
            </div>
        </div>
    </div>
</div>
<div class="row replyRow" style="display:none">
    <div class="col-md-12">
        <textarea class="form-control" id="replyComment" placeholder="Add Public Comment" cols="30" rows="2"></textarea><br>
        <button style="float:right" class="btn-default btn" onclick="$('.replyRow').hide();">Закрыть</button>
        <button style="float:right" class="btn-primary btn" onclick="isReply = true;" id="addReply">Ответить</button>
    </div>
</div>
</div>

    <section class="container">
    <div class="back-to-top">
        <a href="#top"><i class="fas fa-chevron-up"></i></a>
    </div>
    <div class="footer-content">
        <div class="footer-content-divider animate-bottom">
            <div class="social-media">
                <ul class="social-icons">
                    <li>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="fab fa-facebook"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="fab fa-vk"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="fab fa-youtube"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="fab fa-reddit"></i></a>
                    </li>
                </ul>
            </div>
            <div class="newsletter-container">
                <h4>Получайте новости первыми!</h4>
                <form action="" class="newsletter-form">
                    <input type="text" class="newsletter-iunput" placeholder="Ваш email">
                    <button class="newsletter-btn" type="submit">
                        <i class="fas fa-envelope"></i>
                    </button>
                </form>
            </div>
        </div>
    </div>
    </section>


  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
  <script src="js/mainfile.js"></script>
  <script type="text/javascript">
    var isReply = false, commentID = 0, max = <?php echo $numComments ?>;

    $(document).ready(function () {
        $("#addComment, #addReply").on('click', function () {
            var comment;

            if (!isReply)
                comment = $("#mainComment").val();
            else
                comment = $("#replyComment").val();

            if (comment.length > 5) {
                $.ajax({
                    url: 'sport.php',
                    method: 'POST',
                    dataType: 'text',
                    data: {
                        addComment: 1,
                        comment: comment,
                        isReply: isReply,
                        commentID: commentID
                    }, success: function (response) {
                        max++;
                        $("#numComments").text(max);

                        if (!isReply) {
                            $(".userComments").prepend(response);
                            $("#mainComment").val("");
                        } else {
                            commentID = 0;
                            $("#replyComment").val("");
                            $(".replyRow").hide();
                            $('.replyRow').parent().next().append(response);
                        }
                    }
                });
            } else
                alert('Пожалуйста, введите точные данные');
        });

        $("#registerBtn").on('click', function () {
            var name = $("#userName").val();
            var email = $("#userEmail").val();
            var password = $("#userPassword").val();
            var sex = $("#userSex").val();
            var age = $("#userAge").val();

            if (name != "" && email != "" && password != "" && sex !="" && age !="") {
                if (sex != "мужской" && sex!="женский" )
                {
                    alert("Ошибка, введите 'пол' в формате 'мужской/женский'")
                }
                else{
                $.ajax({
                    url: 'sport.php',
                    method: 'POST',
                    dataType: 'text',
                    data: {
                        register: 1,
                        name: name,
                        sex: sex,
                        email: email,
                        password: password,
                        age:age
                    }, success: function (response) {
                        if (response === 'failedEmail')
                            alert('Неправильный формат почты, повторите попытку!');
                        else if (response === 'failedUserExists')
                            alert('Пользователь с такой почтой уже существует!');
                        else
                            window.location = window.location;
                            alert('Проверьте Вашу почту для подтверждения! ')
                    }
                })
            };
            } else
                alert('Пожалуйста, введите точные данные');
        });

        $("#loginBtn").on('click', function () {
            var email = $("#userLEmail").val();
            var password = $("#userLPassword").val();

            if (email != "" && password != "") {
                $.ajax({
                    url: 'sport.php',
                    method: 'POST',
                    dataType: 'text',
                    data: {
                        logIn: 1,
                        email: email,
                        password: password
                    }, success: function (response) {
                        if (response === 'failed')
                            alert('Неправильный логин, повторите попытку!');
                        else
                            window.location = window.location;
                    }
                });
            } else
                alert('Пожалуйста, введите точные данные');
        });

        getAllComments(0, max);
    });

    function reply(caller) {
        commentID = $(caller).attr('data-commentID');
        $(".replyRow").insertAfter($(caller));
        $('.replyRow').show();
    }

    function getAllComments(start, max) {
        if (start > max) {
            return;
        }

        $.ajax({
            url: 'sport.php',
            method: 'POST',
            dataType: 'text',
            data: {
                getAllComments: 1,
                start: start
            }, success: function (response) {
                $(".userComments").append(response);
                getAllComments((start+20), max);
            }
        });
    }
</script>
    <script type="text/javascript" src="https://blogjquery.ru/wp-content/files/services/valuta/valuta.php?USD=1&EUR=2&CNY=3&JPY=4&GBP=5&CHF=6&KZT=7&UAH=8&codvaluta&cod=4243743"></script>
</body>

</html>