
<head>
        <!-- MetisMenu CSS -->
        <link href="http://<?=base_url()?>public/css/metisMenu.min.css" rel="stylesheet">

        <!-- Timeline CSS -->
        <link href="http://<?=base_url()?>public/css/timeline.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="http://<?=base_url()?>public/css/startmin.css" rel="stylesheet">

        <!-- Morris Charts CSS -->
        <link href="http://<?=base_url()?>public/css/morris.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="http://<?=base_url()?>public/css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>



    <div class="container">
        <div class="jumbotron">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"><?=$titulo?></h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="glyphicon glyphicon-saved fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?=$NumeroVotaciones?></div>
                                    <div>Votos emitidos</div>
                                </div>
                            </div>
                        </div>
                        <a href="http://<?=base_url()?>index.php/administrador/mostrar_votos">
                            <div class="panel-footer">
                                <span class="pull-left">Ver detalles</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="glyphicon glyphicon-user fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?=$NumeroUsuarios?></div>
                                    <div>Usuarios</div>
                                </div>
                            </div>
                        </div>
                        <a href="http://<?=base_url()?>index.php/administrador/mostrar_usuarios">
                            <div class="panel-footer">
                                <span class="pull-left">Ver detalles</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="glyphicon glyphicon-stats fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?=$TotalPuntos?></div>
                                    <div>Puntos en total</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


        </div>
    </div>
