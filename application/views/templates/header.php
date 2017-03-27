<!DOCTYPE html>
<!--[if lt IE 7 ]> <html class="no-js ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]>    <html class="no-js ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]>    <html class="no-js ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> <html class="no-js" lang="ja"> <!--<![endif]-->
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
        <title><?php echo $title;?></title>
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/materialize.min.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/style.css" type="text/css" media="screen,projection"/>
        <script src="http://code.jquery.com/jquery-2.1.1.min.js"></script>
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <input type="hidden" name="offset" value="<?=$offset?>"/>
        <header>
            <nav>
                <div class="nav-wrapper brown lighten-5">
                &nbsp;<a href="#" class="brand-logo left"><?php echo $title;?></a>
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li><a href="<?php echo base_url(); ?>/dental_list">一覧表示</a></li>
                    <li><a href="<?php echo base_url(); ?>/dental_map">地図表示</a></li>
                </ul>
                </div>
            </nav>
        </header>
        <div class="container">


