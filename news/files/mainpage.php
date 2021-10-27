<?php 

include "authorization.php"
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Main page</title>
    <!--Font awesome CDN-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
    <!--Scroll reveal CDN-->
    <script src="https://unpkg.com/scrollreveal"></script>
    <link rel="stylesheet" href="css/bootstrap/bootstrap.css">
    <link rel="stylesheet" href="css/allcurrency.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/new.css">
    
    
</head>
<body class ="">
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
            <a href="frontpage.html" class="logo"><img src="pics/tags.png" class="eagle" alt=""></a>
        
            <div class="pleasework"><?php 
        if(!$loggedIn)  
          echo '
          
          <button class="btn btn-primary" data-toggle="modal" data-target="#registerModal">Регистрация</button>
          <button class="btn btn-success" data-toggle="modal" data-target="#logInModal">Войти</button>';
          else
             echo '<a href="logOut.php" class="btn btn-warning btnExit">Выйти</a>';
             
          ?></div>
          <ul class="nav-list">
          <li class="nav-item">
              <a href="mainpage.php" class="nav-link rrrapido">Домой</a>
          </li>
          <li class="nav-item">
              <a href="hot.php" class="nav-link">Самое актуальное</a>
          </li>
  
          <li class="nav-item">
              <a href="russia.php" class="nav-link">Здоровье</a>
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
    <section class="news newssec2">
            <div class="container">
                <div class="info">
                    <div class="description padding-right animate-left">
                         <div class="global-headline">
                             <h1 class="headline headline-dark">Ваше путешествие в мир новостей</h1>
                         </div>
                         <p>Приветствуем Вас на райском островке новостей. У нас Вы найдете самые актуальные новости, которые происходят в России и за рубежом. 
                         <br>Что же нужно для начала? Выберите интересующее поле в шапке сайта или меню и начинайте свое персональное погружение в прекрасный мир новостей.
                         <br>Все источники отфильтрованы и проверены, а это значит что на нашем сайте у Вас никогда не возникнет проблем с публикатором. 
                         Приятного время препровождения и удачи!
                            </p>
                            
                    </div>
                    <div class="info-img animate-right">
                        
                    </div>
                </div>
            </div>
    </section>
<!-- header тут -->
<section class="news-block">
<div class="container cta-100 news-block" id="hereugoson">
    <div class="container">
      <div class="row blog">
        <div class="col-md-12">
          <div id="blogCarousel" class="carousel slide container-blog" data-ride="carousel">

            <!-- Carousel items -->
            <div class="carousel-inner">
              <div class="carousel-item active">
                <div class="row">
                  <div class="col-md-4" >
                    <div class="item-box-blog">
                      <div class="item-box-blog-image">
                        <!--Date-->
                        <!--Image-->
                        <figure> <img alt="" src="pics/business.jpg"> </figure>
                      </div>
                      <div class="item-box-blog-body">
                        <div class="item-box-blog-heading">
                          <a href="#" tabindex="0">
                            <h5>Страна бизнеса</h5>
                          </a>
                        </div>
                        <div class="item-box-blog-text">
                          <p>Про бизнес в России</p>
                        </div>
                        <div class="mt"> <a href="business.php" tabindex="0" class="btn bg-blue-ui white read">Читать дальше</a> </div>
                        <!--Read More Button-->
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4" >
                    <div class="item-box-blog">
                      <div class="item-box-blog-image">
                        <!--Date-->
                        <!--Image-->
                        <figure> <img alt="" src="pics/sport.jpg"> </figure>
                      </div>
                      <div class="item-box-blog-body">
                        <div class="item-box-blog-heading">
                          <a href="#" tabindex="0">
                            <h5>Планета спорта</h5>
                          </a>
                        </div>
                        <div class="item-box-blog-text">
                          <p>Обо всех спортивных событиях в России</p>
                        </div>
                        <div class="mt"> <a href="sport.php" tabindex="0" class="btn bg-blue-ui white read">Читать дальше</a> </div>
                        <!--Read More Button-->
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4" >
                    <div class="item-box-blog">
                      <div class="item-box-blog-image">
                        <!--Date-->
                        <!--Image-->
                        <figure> <img alt="" src="pics/city.jpg"> </figure>
                      </div>
                      <div class="item-box-blog-body">
                        <div class="item-box-blog-heading">
                          <a href="#" tabindex="0">
                            <h5>Галактика развлечений</h5>
                          </a>
                        </div>
                        <div class="item-box-blog-text">
                          <p>Все про досуг в России</p>
                        </div>
                        <div class="mt"> <a href="fun.php" tabindex="0" class="btn bg-blue-ui white read">Читать дальше</a> </div>
                        <!--Read More Button-->
                      </div>
                    </div>
                  </div>
                <!--.row-->
              </div>
            </div>
            <!--.carousel-inner-->
          </div>
          <!--.Carousel-->
        </div>
      </div>
    </div>
  </div>
<!-- конец -->
</section>
    <section class="news newssec1">
        <div class="container">
            <div class="info">
            <section class="news">
        <div class="container" id="search">
            <div class="blkyrs"><div class="blkyrs1"></div><div class="blkyrs3"><a class="blavtors" href="https://blogjquery.ru" 
             title="Скрипты на jQuery, PHP, Joomla и Wordpress">Создано в blogjquery.ru</a></div></div>
        </div>
    </section>
                <div class="description padding-right animate-left">
                     <div class="global-headline">
                         <h2 class="sub-headline">
                             <span class="first-letter">Найдётся всё</span>
                         </h2></div>
                         
                         <section class="russia-search rounded">
                            <form class="search" action="">
                            <div class="container h-100">
                               <div class="">
                                 <div class="searchbar">
                                 <input class="search_input" type="text" name="" placeholder="Пример: Covid-19">
                                 <input type="submit" class="search_icon">
                                 </div>
                                </div>
                           </div>
                            </form>

                            <div class="container">
                              <ul class="news-list">
                                
                              </ul>
                              <div class="back-to-top">
        
    </div>
                            </div>
                        </section>
                       
                     
                        
                </div>
                <div class="info-img animate-right">
                    
                </div>
            </div>
        </div>

    



<!-- тут слайды -->

   

<!-- this sections ends -->
<section class="container f00ter">
    <div class="back-to-top">
        <a href="#hereugoson"><i class="fas fa-chevron-up"></i></a>
    </div>


    <div class="footer-content">
        <div class="footer-content-about animate-up">
            <h4>О сайте</h4>
            <p>Наш сайт был создан с одной целью - собрать все лучшие новости и актуальные источники в одном месте. Мы сотрудничаем с множеством ресурсов для того, чтобы Вы получали все как можно раньше.</p>
        </div>
        <div class="footer-content-divider animate-bottom">
            <div class="social-media">
                <h4>Мы в социальных сетях</h4>
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
  <script type="text/javascript" src="https://blogjquery.ru/wp-content/files/services/valuta/valuta.php?USD=1&EUR=2&CNY=3&JPY=4&GBP=5&CHF=6&KZT=7&UAH=8&codvaluta&cod=4243743"></script>
  <script src="js/mainfile.js"></script>
    <script type="text/javascript">
  $(document).ready(function () {

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
                    url: 'mainpage.php',
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
                    url: 'mainpage.php',
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


    });
    
    </script>
</body>