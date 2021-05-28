<?php


    $action = $_GET['action'];
    $content = ""; // Определение выводящихся блоков на главную страницу
    $title = ""; // Заголовок страницы
    $act_title = "";


    //подключение к базе данных
    $db = mysqli_connect('localhost', 'root', '', 'SellAir');
    if($db){
        if($action == 'addNewItem'){
            $title .= "Добавление товара";
            $act_title .= "Добавление нового товара на сайт";



            if($_SERVER['REQUEST_METHOD'] === "POST"){
                $content .= "Данные получены, можно обраюатывать информацию";

                $trust = '';
                if(empty($_POST['itemname']) OR strlen($_POST['itemname'] < 6)) $trust .= 
            }else{
                $content .= "Заполните необходимые поля<br/>";
                $content .= <<<HTML
                <form class="" action="" method="post">
                    <input type="text" name="itemName" value="" placeholder="Укажите наименование товара"><br/>
                    <input type="number" name="itemCost" value="" placeholder="Укажите цену товара"><br/>
                    <input type="text" name="itemManufacture" value="" placeholder="Укажите марку или производителя товара"><br/>
                    <select class="select" name="itemCategory">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select> <br/>
                    <textarea name="itemDescription" rows="8" cols="80" placeholder="Описание товара"></textarea><br/>
                    <input type="file" name="itemMainImg" value="">
                    <input type="file" name="itemDopImg" value="">
                    <input type="submit" name="" value="Добавить товар"><br/>
                </form>
HTML;
            }
        }elseif($action == 'allItems'){
            $title .= "Все товары";
            $act_title .= "Страница всех товаров сайта";
            $content .= "";
        }elseif($action == 'allOrders'){
            $title .= "Заказы";
            $act_title .= "Список заказов товара с сайта";
            $content .= "";
        }elseif($action == 'news'){
            $title .= "Новости";
            $act_title .= "Добавление и редактирование новостей";
            $content .= "";
        }else{
            $title .= "";
            $act_title .= "";
            $content .= "";
        }
    }else{
        $act_title .= "Ошибка подключения к базе данных!";
    }

    // echo "<pre>";
    //     var_dump($_GET);
    // echo "</pre>";








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
        <link rel="stylesheet" href="css/itemPage.css?">
        <link rel="stylesheet" href="css/media.css?">
        <link rel="stylesheet" href="css/adminPage.css?">
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

                           <!-- <li class="dropdown">
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
                           </li> -->

                            <li> <a href="http://github/SellAir/SellAir/admin.php?action=addNewItem">Добавить товар</a> </li>
                            <li> <a href="http://github/SellAir/SellAir/admin.php?action=allItems">Все товары</a> </li>
                            <li> <a href="http://github/SellAir/SellAir/admin.php?action=allOrders">Список заказовы</a> </li>
                            <li> <a href="http://github/SellAir/SellAir/admin.php?action=news">Новости</a> </li>

                         </ul>

                         <ul class="nav navbar-nav navbar-right">
                           <li><a href="index.php">На сайт</a></li>

                           <li><a href="">
                               <span class="glyphicon glyphicon-user"> </span>
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

        <div id="wrapper">
            <div class="conthead">
                <h1><?=$act_title?></h1>
            </div>
            <div id="admincontent"><?=$content?></div>
            <?php
            echo "<pre>";
                var_dump($_SERVER['REQUEST_METHOD']);
            echo "</pre>";
            echo "<pre>";
                var_dump($_POST);
            echo "</pre>";
            ?>
        </div>







        <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" crossorigin="anonymous"></script>
    </body>
</html>
