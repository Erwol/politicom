<!-- Descripción del político -->
<div class="portfolio-modal modal fade" id="<?=$Id?>" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal">
                <div class="lr">
                    <div class="rl">
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="modal-body">
                            <h2><?=$Nombre?> <?=$Apellidos?> (<?=$Siglas?>)</h2>
                            <hr>
                            <img src="<?php echo $Imagen; ?>" class="img-responsive img-centered" alt="">
                            <p><?=$Descripcion?></p>
                            <ul class="list-inline item-details">
                                <li>Nota media (sobre 5):
                                    <strong><?=round($Puntos/$NumeroDeVotos, 2)?></strong>
                                </li>
                                <li>Veces que ha sido votado:
                                    <strong><?=$NumeroDeVotos?></strong>
                                </li>
                                <li>Partido:
                                    <!-- Busca el partido que coincida con sus iniciales -->
                                    <strong><?=$Siglas?>
                                    </strong>
                                </li>
                            </ul>
                            <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i>Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
