<?php


    $action = $_GET['action'];
    $content = ""; // Определение выводящихся блоков на главную страницу
    $title = ""; // Заголовок страницы
    $act_title = "";


    // echo "<pre>";
    //     var_dump($_SERVER['REQUEST_METHOD']);
    // echo "</pre>";
    // echo "<pre>";
    //     var_dump($_POST);
    // echo "</pre>";

    $allCategory = [
        1 => 'somethink 1',
        2 => 'somethink 2',
        3 => 'somethink 3',
        4 => 'somethink 4',
        5 => 'somethink 5',
        6 => 'somethink 6',
        7 => 'somethink 7',
        8 => 'somethink 8'
    ];
    function displayAllCategory($selectCut = false){
        $options = '';
        global $allCategory;

        foreach($allCategory as $key=>$category){
            if($selectCut AND $selectCut == $key) $options .= "<option value='{$key}' selected>{$category}</option>";
            else $options .= "<option value='{$key}'>{$category}</option>";
        }

        return $options;
    }

    //подключение к базе данных
    $db = mysqli_connect('localhost', 'root', '', 'SellAir');
    if($db){
        if($action == 'addNewItem'){
            $title .= "Добавление товара";
            $act_title .= "Добавление нового товара на сайт";



            if($_SERVER['REQUEST_METHOD'] === "POST"){
                echo "<pre>";
                    var_dump($_FILES);
                echo "</pre>";
                if($_FILES['itemMainImg']){
                    $content .= 'Главное изображение было добавлено<br/>';
                }else{
                    $content .= 'Главное изображение не добавлено<br/>';
                }
                $trust = '';
                if(empty($_POST['itemName'])  OR strlen($_POST['itemName']) < 6) $trust .= "Поле <b>'Имя товара'</b> не заполнено или включает в себя менее 6 символов<br/>";
                if(empty($_POST['itemCost'])) $trust .= "Поле <b>'Цена товара'</b> не заполнено<br/>";
                if(empty($_POST['itemManufacturer'])) $trust .= "Поле <b>'Производитель товара'</b> не заполнено<br/>";
                if(empty($_POST['itemCategory'])) $trust .= "Вы не указали <b>'Категорию товара'</b><br/>";
                if(empty($_POST['itemDescription']) OR strlen($_POST['itemDescription']) < 25) $trust .= "Вы не заполнили <b>'Описание товара'</b><br/>";


                if(empty($_FILES['itemMainImg'] ['name'])) $trust .= 'Главное изображение товара не указано<br/>';
                if($_FILES['itemMainImg'] ['name'] AND $_FILES['itemMainImg'] ['size' ] > 5000000) $trust .= 'Главное изображение не иожет вемить юольше 5мб<br/>';
                if(!empty($_FILES['itemMainImg'] ['error'])) $trust .= "Выбранное вами изображение не подходит для загрузки на сервер<br/>";
                // if($_FILES['itemMainImg']['type'] !== 'image/jpg' or $_FILES['itemMainImg']['type'] !== 'image/jpeg' or $_FILES['itemMainImg']['type'] !== 'image/png') $trust .= "Главное изображение не подхожит по формату. Доступные форматы: <b>jpg. jpeg. png. gif.</b>";

                if(empty($trust)){

                    $uploaded_files = dirname(__FILE__)."/images/userImages/";
                    $mainImg = mktime()."_".$_FILES['itemMainImg']['name'];

                    move_uploaded_file($_FILES['itemMainImg'] ['tmp_name'], $uploaded_files.$mainImg);


                    $addDate = mktime();
                    $itemName = trim($_POST['itemName']);
                    $itemCost = trim($_POST['itemCost']);
                    $itemManufacturer = trim($_POST['itemManufacturer']);
                    $itemCategory = trim($_POST['itemCategory']);
                    $itemDescription = trim($_POST['itemDescription']);

                    $insertQuery = "INSERT INTO `Items` (addDate, itemName, itemCost, itemManufacturer, itemCategory, itemDescription, itemMainImg) VALUES ('{$addDate}', '{$itemName}', '{$itemCost}', '{$itemManufacturer}', '{$itemCategory}', '{$itemDescription}', '{$mainImg}')";

                    if(mysqli_query($db, $insertQuery)){
                        $content .= "Товар добавлен. <a href='http://github/SellAir/SellAir/admin.php?action=allItems'>К списку всех товаров</a> ";
                    }else{
                        $content .= "Ошибка!<br/> Товар не добавлен<br/> Информация для отладки: <b>MYSQLERROR: ".mysqli_errno($db)."</b> , <b>MYSQLI MSG: ".mysqli_error($db)."</b>";
                    }
                }else{
                    $content .= "<b>Ошибка заполнения данных</b><br/> Вы не указали следующие поля: <br/>";
                    $content .= $trust;
                    $content .= $itemName;
                }
            }else{
                $content .= "Заполните необходимые поля<br/>";
                $content .= <<<HTML
                <form method="POST" action="" enctype="multipart/form-data">
                    <input type="text" name="itemName" value="" placeholder="Укажите наименование товара"><br/>
                    <input type="number" name="itemCost" value="" placeholder="Укажите цену товара"><br/>
                    <input type="text" name="itemManufacturer" value="" placeholder="Укажите марку или производителя товара"><br/>
                    <select class="select" name="itemCategory">
                        <option>Выбрать категорию</option>
HTML;
                $content .= displayAllCategory();
                $content .= <<<HTML
                    </select> <br/>
                    <textarea name="itemDescription" rows="8" cols="80" placeholder="Описание товара"></textarea><br/>

                    <input type="file" name="itemMainImg" value="">
                    <input type="file" name="itemDopImg" value="">

                    <input type="submit" name="" value="Добавить товар"/><br/>
                </form>
HTML;
            }
        }elseif($action == 'allItems'){
            $title .= "Все товары";
            $act_title .= "Страница всех товаров сайта";

            $selectQuery = "SELECT * FROM `items`";

            if($result = mysqli_query($db, $selectQuery)){
                $items = mysqli_fetch_all($result, MYSQLI_ASSOC);

                $content .= <<<HTML
                <table border="1px" bordercolor="#cecece" style="width:100%; background-color:white;">
HTML;
                $content .= "<tr>
                    <th>ID товара в базе</th>
                    <th>Наименование товара</th>
                    <th>Цена</th>
                    <th>Производитель</th>
                    <th>Действие</th>
                </tr>";

                if(!empty($items)){
                    foreach($items as $item){
                        $content .= "<tr class='cont-hover'>
                                        <td>{$item['id']}</td>
                                        <td>{$item['itemName']}</td>
                                        <td>{$item['itemCost']}</td>
                                        <td>{$item['itemManufacturer']}</td>
                                        <td calss='item-action'>
                                            <a href='http://github/SellAir/SellAir/admin.php?action=editItem&id={$item['id']}'>
                                                <span class='glyphicon glyphicon-pencil'></span>
                                            </a>
                                            <a href=''>
                                                <span class='glyphicon glyphicon-remove'></span>
                                            </a>
                                        </td>
                                    </tr>";
                    }
                }else{
                    $content .= "<center>В базе не товаров</center>";
                }

                $content .= <<<HTML
                </table>
                <style media="screen">
                    th,td{
                        padding-left:8px;

                    }
                    .item-action{
                        padding-left:10px;
                        padding-right:10px;

                    }
                    td,th{
                        padding:5px;
                    }
                    .glyphicon-pencil{
                        color:green;
                        float:left;
                    }
                    .glyphicon-remove{
                        color:red;
                        float:right;
                    }
                    .cont-hover:hover{
                        background-color:rgb(208, 208, 208);
                    }
                </style>
HTML;
        }else{
            $content .= "<b>Ошибка:</b> Не удалось выподнить запрос всех товаров из базы данных";
        }


    }elseif($action == "editItem"){
        $itemId = (int) $_GET['id'];

        $title = "Редактирование товара";
        $act_title = "Редактирование  товара в базе данных";

        if($itemId){
            $selectQuery = "SELECT * FROM `Items` WHERE id='{$itemId}'";

            if($result = mysqli_query($db, $selectQuery)){
                $item = mysqli_fetch_assoc($result);
                if($item){
                    if($_SERVER['REQUEST_METHOD'] === 'POST'){

                        $trust = '';
                        if(empty($_POST['itemName'])  OR strlen($_POST['itemName']) < 6) $trust .= "Поле <b>'Имя товара'</b> не заполнено или включает в себя менее 6 символов<br/>";
                        if(empty($_POST['itemCost'])) $trust .= "Поле <b>'Цена товара'</b> не заполнено<br/>";
                        if(empty($_POST['itemManufacturer'])) $trust .= "Поле <b>'Производитель товара'</b> не заполнено<br/>";
                        if(empty($_POST['itemCategory'])) $trust .= "Вы не указали <b>'Категорию товара'</b><br/>";
                        if(empty($_POST['itemDescription']) OR strlen($_POST['itemDescription']) < 25) $trust .= "Вы не заполнили <b>'Описание товара'</b><br/>";


                        if(empty($_FILES['itemMainImg'] ['name'])) $trust .= 'Главное изображение товара не указано<br/>';
                        if($_FILES['itemMainImg'] ['name'] AND $_FILES['itemMainImg'] ['size' ] > 5000000) $trust .= 'Главное изображение не иожет вемить юольше 5мб<br/>';
                        if(!empty($_FILES['itemMainImg'] ['error'])) $trust .= "Выбранное вами изображение не подходит для загрузки на сервер<br/>";


                        if(empty($trust)){

                            $uploaded_files = dirname(__FILE__)."/images/userImages/";
                            $mainImg = mktime()."_".$_FILES['itemMainImg']['name'];

                            move_uploaded_file($_FILES['itemMainImg'] ['tmp_name'], $uploaded_files.$mainImg);

                            $itemName = trim($_POST['itemName']);
                            $itemCost = trim($_POST['itemCost']);
                            $itemManufacturer = trim($_POST['itemManufacturer']);
                            $itemCategory = trim($_POST['itemCategory']);
                            $itemDescription = trim($_POST['itemDescription']);

                            $updateQuery = "UPDATE `items` SET itemName='{$iteName}', itemCost='{$itemCost}', itemManufacturer='{$itemManufacturer}', itemCategory='{$itemCategory}', itemDescription='{$itemDescription}' WHERE id='{$itemId}'";

                            if(mysqli_query($db, $updateQuery)){
                                $content .= "Данные успешно обновлены.<br/> <a href='http://github/SellAir/SellAir/admin.php?action=allItems'>Все товары</a> <br/><a href=''>Посмотреть изменения</a> ";
                            }
                        }else{
                            $content .= "<b>Ошибка заполнения данных</b><br/> Вы не указали следующие поля: <br/>";
                            $content .= $trust;
                            $content .= $itemName;

                        }

                    }else{
                        $content .= "Заполните необходимые поля<br/>";
                        $content .= <<<HTML
                        <form method="POST" action="" enctype="multipart/form-data">
                            <input type="text" name="itemName" value="{$item['itemName']}" placeholder="Укажите наименование товара"><br/>
                            <input type="number" name="itemCost" value="{$item['itemCost']}" placeholder="Укажите цену товара"><br/>
                            <input type="text" name="itemManufacturer" value="{$item['itemManufacturer']}" placeholder="Укажите марку или производителя товара"><br/>
                            <select class="select" name="itemCategory">
                                <option><b>Изменить категорию:</b></option>
HTML;
                        $content .= displayAllCategory($item['itemCategory']);
                        $content .= <<<HTML
                            </select> <br/>
                            <textarea name="itemDescription" rows="8" cols="80" placeholder="Описание товара">{$item['itemDescription']}</textarea><br/>
                            <input type="file" name="itemMainImg" value=""> <img src="/images/{$item['itemMainImg']}" style="width:64px;"/>
                            <input type="file" name="itemDopImg" value="">
                            <input type="submit" width="150px" name="" value="Сохранить изменения"/><br/>
                        </form>
HTML;
                    }

                }else{
                    $content .= "Товара с таким ID нет";
                }
            }else{
                $content .= "<b>Ошибка</b><br/> Не удалось выполнить запрос на получение информации о редактируемом товаре";
            }
        }else{
            $content .= "Вы не указали ID редактируемого товара";
        }

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
                           </a>
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

        </div>







        <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" crossorigin="anonymous"></script>
    </body>
</html>
