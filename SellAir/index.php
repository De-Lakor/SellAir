<?php

    echo "<pre>";
        var_dump($_GET);
    echo "</pre>";

    $action = $_GET['action'];
    $content = ""; // Определение выводящихся блоков на главную страницу
    $title = ""; // Заголовок страницы

    if($action == 'news'){
        $title .= "Новости";
        $content .= "Новости";
    }elseif($action == 'items'){
        $title .= "Товары";
        $content .= 'список товаров';
    }elseif($action == 'item'){
        $content .= 'Опредеоенный товар:';


    }else{
        $title .= "Главная страница";
        $content .= <<<HTML

            <div class="content">
                <div class="conthead">
                    <h1>Лучшее оборудование на рынке</h1>
                </div>
            </div>
                <div id="cont-nav">
                    <a href="#">
                        <div class="cont-nav-box">
                            <div class="cont-nav-wrap">
                                <div class="contnav-img">
                                    <center>
                                        <img src="images/freon1.png" alt="Фрион">
                                    </center>
                                </div>
                                <div class="contnav-name">Фрион</div>
                            </div>
                        </div>
                    </a>
                    <a href="#">
                        <div class="cont-nav-box">
                            <div class="cont-nav-wrap">
                                <div class="contnav-img">
                                    <center>
                                        <img src="images/chiler1.png" alt="Фрион">
                                    </center>
                                </div>
                                <div class="contnav-name">Чиллера</div>
                            </div>
                        </div>
                    </a>
                    <a href="#">
                        <div class="cont-nav-box">
                            <div class="cont-nav-wrap">
                                <div class="contnav-img">
                                    <center>
                                        <img src="images/conder.png" alt="Фрион">
                                    </center>
                                </div>
                                <div class="contnav-name">Кондиционеры</div>
                            </div>
                        </div>
                    </a>
                    <a href="#">
                        <div class="cont-nav-box">
                            <div class="cont-nav-wrap">
                                <div class="contnav-img">
                                    <center>
                                        <img src="images/freon1.png" alt="Фрион">
                                    </center>
                                </div>
                                <div class="contnav-name">Вентиляция</div>
                            </div>
                        </div>
                    </a>
                </div>
            <div class="content" style="min-height:300px;">
                <div class="conthead">
                    <h2>Топ новинки</h2>
                </div>

                <div id="newitems">
                    <div class="newitem">
                        <a href="/items.html">
                            <div class="item-img">
                                <center>
                                    <img src="images/chiler1.png" alt="">
                                </center>
                            </div>
                        </a>
                            <div class="item-info">
                                <div class="item-name">
                                    <div class="itemname-bg">
                                        <a href="/items.html" >
                                            <span class="itmnamebg-title">Название товара, длинное название товара)))</span>
                                        </a>
                                        <span class="glyphicon glyphicon-edit"></span>
                                    </div>
                                </div>
                                <div class="itemtext-cont">
                                    <span class="item-text">
                                        <p>Гера, тут можно сделать как маркерованный
                                            список так и оставить информацию сплошным текстом.
                                            Обязательно подумай об этом чуть позже
                                        </p>
                                    </span>
                                </div>
                            </div>
                    </div>

                    <div class="newitem">
                        <a href="/items.html">
                            <div class="item-img">
                                <center>
                                    <img src="images/chiler1.png" alt="">
                                </center>
                            </div>
                        </a>
                            <div class="item-info">
                                <div class="item-name">
                                    <div class="itemname-bg">
                                        <a href="/items.html" >
                                            <span class="itmnamebg-title">Название товара, длинное название товара)))</span>
                                        </a>
                                        <span class="glyphicon glyphicon-edit"></span>
                                    </div>
                                </div>
                                <div class="itemtext-cont">
                                    <span class="item-text">
                                        <p>Гера, тут можно сделать как маркерованный
                                            список так и оставить информацию сплошным текстом.
                                            Обязательно подумай об этом чуть позже
                                        </p>
                                    </span>
                                </div>
                            </div>
                    </div>

                    <div class="newitem">
                        <a href="/items.html">
                            <div class="item-img">
                                <center>
                                    <img src="images/chiler1.png" alt="">
                                </center>
                            </div>
                        </a>
                            <div class="item-info">
                                <div class="item-name">
                                    <div class="itemname-bg">
                                        <a href="/items.html" >
                                            <span class="itmnamebg-title">Название товара, длинное название товара)))</span>
                                        </a>
                                        <span class="glyphicon glyphicon-edit"></span>
                                    </div>
                                </div>
                                <div class="itemtext-cont">
                                    <span class="item-text">
                                        <p>Гера, тут можно сделать как маркерованный
                                            список так и оставить информацию сплошным текстом.
                                            Обязательно подумай об этом чуть позже
                                        </p>
                                    </span>
                                </div>
                            </div>
                    </div>

                    <div class="newitem">
                        <a href="/items.html">
                            <div class="item-img">
                                <center>
                                    <img src="images/chiler1.png" alt="">
                                </center>
                            </div>
                        </a>
                            <div class="item-info">
                                <div class="item-name">
                                    <div class="itemname-bg">
                                        <a href="/items.html" >
                                            <span class="itmnamebg-title">Название товара, длинное название товара)))</span>
                                        </a>
                                        <span class="glyphicon glyphicon-edit"></span>
                                    </div>
                                </div>
                                <div class="itemtext-cont">
                                    <span class="item-text">
                                        <p>Гера, тут можно сделать как маркерованный
                                            список так и оставить информацию сплошным текстом.
                                            Обязательно подумай об этом чуть позже
                                        </p>
                                    </span>
                                </div>
                            </div>
                    </div>
                </div>






            </div>
HTML;
    }
?>









<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title><?=$title?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <link rel="stylesheet" href="https://bootswatch.com/3/slate/bootstrap.min.css" crossorigin="anonymous">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" crossorigin="anonymous">

        <link rel="stylesheet" href="css/styles.css?v=23">
        <link rel="stylesheet" href="css/media.css?">
        <link rel="stylesheet" href="css/itemPage.css?">
    </head>
    <body>
        <div id="topline">
            <div id="topwrapper">
                    <div class="navbar navbar-default navbar-fixed-top">
                     <div class="container">
                       <div class="navbar-header">
                         <a href="" class="navbar-brand">
                            <span id="logo">
                                Sell
                            </span>

                            <span id="logo1">
                                AIR
                            </span>
                         </a>
                         <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
                           <span class="icon-bar"></span>
                           <span class="icon-bar"></span>
                           <span class="icon-bar"></span>
                         </button>
                       </div>
                       <div class="navbar-collapse collapse" id="navbar-main">
                         <ul class="nav navbar-nav">
                           <li class="dropdown">
                             <a class="dropdown-toggle" data-toggle="dropdown" href="#" id="themes">item <span class="caret"></span></a>
                             <ul class="dropdown-menu" aria-labelledby="themes">
                               <li><a href="">Default</a></li>
                               <li class="divider"></li>
                             </ul>
                           </li>
                           <li class="dropdown">
                             <a class="dropdown-toggle" data-toggle="dropdown" href="#" id="download">Товары <span class="caret"></span></a>
                             <ul class="dropdown-menu" aria-labelledby="download">
                               <li><a href="">Open Sandbox</a></li>
                               <li class="divider"></li>
                               <li><a href="">bootstrap.min.css</a></li>
                               <li><a href="">bootstrap.css</a></li>
                               <li class="divider"></li>
                               <li><a href="">variables.less</a></li>
                               <li><a href="">bootswatch.less</a></li>
                               <li class="divider"></li>
                               <li><a href="">_variables.scss</a></li>
                               <li><a href="">_bootswatch.scss</a></li>
                             </ul>
                           </li>

                           <li>
                                <a href="#">Контакты</a>
                           </li>
                           <li>
                             <a href="">Help</a>
                           </li>


                         </ul>

                         <!-- <li>
                           <a href="../help/">Help</a>
                         </li> -->


                         <ul class="nav navbar-nav navbar-right">
                           <li><a href="">+7 (777)-777-77-77</a></li>

                           <li><a href="">
                               <span id="num-tov-basket">99</span>
                               <span class="glyphicon glyphicon-shopping-cart" id="topbasket"> </span>
                               <span id="baskettext">Корзина</span></a></li>
                         </ul>

                       </div>
                     </div>
                   </div>
              </div>
			</div>
            <!-- <div id="quart">
                <span id="logo">
                    Sell
                </span>
                <span id="logo1">
                    AIR
                </span>
            </div> -->
        </div>
        <div id="slider">
            <div id="carusel">
                        <div id="myCarousel" class="carousel slide" data-ride="carousel">
                  <!-- Indicators -->
                  <ol class="carousel-indicators">
                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#myCarousel" data-slide-to="1"></li>
                    <li data-target="#myCarousel" data-slide-to="2"></li>
                  </ol>

                  <!-- Wrapper for slides -->
                  <div class="carousel-inner">
                    <div class="item active">
                      <img src="images/figure_king.png" alt="Los Angeles">
                    </div>

                    <div class="item">
                      <img src="images/figure_slon_b.png" alt="Chicago">
                    </div>

                    <div class="item">
                      <img src="images/figure_slon_w.png" alt="New York">
                    </div>
                  </div>

                  <!-- Left and right controls -->
                  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                    <span class="sr-only">Previous</span>
                  </a>
                  <a class="right carousel-control" href="#myCarousel" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right"></span>
                    <span class="sr-only">Next</span>
                  </a>
                </div>
            </div>
            <div id="slidenavig">
                <span class="slider-nav-item slider-nav-item-bg ">Item 1</span>
                <span class="slider-nav-item slider-nav-item-bg">Item 2</span>
                <span class="slider-nav-item slider-nav-item-bg">Item 3</span>
                <span class="slider-nav-item slider-nav-item-bg">Item 4</span>
                <span class="slider-nav-item slider-nav-item-bg">Item 5</span>
                <span class="slider-nav-item ">Item 6</span>

            </div>
        </div>
        <div id="wrapper">
            <?=$content?>
        </div>







        <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" crossorigin="anonymous"></script>
    </body>
</html>
