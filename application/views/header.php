<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Vista de la cabecera -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?=$titulo?></title>

    <!-- Bootstrap Core CSS -->
    <link type="text/css" href="http://<?=base_url()?>public/css/bootstrap.min.css" rel="stylesheet">
    <!-- CSS login y registro -->
    <link type="text/css" href="http://<?=base_url()?>public/css/signin.css" rel="stylesheet">

    <!-- Favicon -->
    <link href="http://<?=base_url()?>public/img/favicon.ico" rel="shortcut icon" type="image/x-icon" />

    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="http://<?=base_url()?>public/css/freelancer.css"/>
    <script src="http://<?=base_url()?>public/js/bootstrap.min.js"></script>
    <script src="http://<?=base_url()?>public/js/jquery.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

    <!-- Custom Fonts -->
    <link href="http://<?=base_url()?>public/fonts/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

</head>

<body id="page-top" class="index">

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="http://<?=base_url()?>index.php/inicio">Politi.co</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            </i>Políticos<b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="http://<?=base_url()?>index.php/politicos/ranking"><i class="glyphicon glyphicon-stats"></i>Ranking</a>
                            </li>
                            <li class="divider"></li>
                            <li><a href="http://<?=base_url()?>index.php/politicos"><i class="glyphicon glyphicon-check"></i>Votar</a>
                            </li>
                        </ul>
                    </li>

                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-user fa-fw"></i>Mi cuenta<b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="http://<?=base_url()?>index.php/cuenta"><i class="fa fa-user fa-fw"></i>Perfil</a>
                            </li>
                            <li class="divider"></li>
                            <li><a href="http://<?=base_url()?>index.php/cuenta/salir"><i class="fa fa-sign-out fa-fw"></i>Salir</a>
                            </li>
                        </ul>
                    </li>

                    <li class="page-scroll">
                        <a href="http://<?=base_url()?>index.php/inicio/contacto">Contacto</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>
