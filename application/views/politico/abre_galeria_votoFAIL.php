<!-- Inicio del listado de la galería -->
    <section id="portfolio">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h3>Error al votar<h3>
                    <p>Ya has votado a <?=$Nombre?> <?=$Apellidos?> con <?=$Puntos?> puntos.</p>
                    <p>Si lo deseas, <a href="http://<?=base_url()?>index.php/administrador/misvotos">haz clic aquí</a> para modificar tus votos.</p>
                    <p>Id del voto registrado: <?=$Id_Voto?>. Id del político: <?=$Id_Politico?></p>
                    <hr>
                    <h2>Políticos disponibles</h2>
                    <hr>
                </div>
            </div>
