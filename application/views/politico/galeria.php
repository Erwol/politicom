<!-- Cada vez que se liste a un político se llamará a esta página -->
<div class="col-sm-4 portfolio-item">
    <a href="#<?=$Id?>" class="portfolio-link" data-toggle="modal">
        <div class="caption">
            <div class="caption-content">
                <i class="fa fa-search-plus fa-3x"></i>
            </div>
        </div>
        <!-- Carga de imágenes desde rta en BD -->
        <img src="<?php echo $Imagen; ?>" class="img-responsive" alt="">


    </a>
        <div class="jumbotron">
            <?php echo validation_errors(); ?>
            <?php echo form_open("http://".base_url()."index.php/politicos/votar")?>
                <!-- Campo vacío para almacenar la Id del político -->
                <input type="hidden" name="id" value="<?=$Id?>">
                <label class="radio-inline">
                    <input type="radio" name="puntuacion" value="1"> 1
                </label>
                <label class="radio-inline">
                    <input type="radio" name="puntuacion" value="2"> 2
                </label>
                <label class="radio-inline">
                    <input type="radio" name="puntuacion" value="3"> 3
                </label>
                <label class="radio-inline">
                    <input type="radio" name="puntuacion" value="4"> 4
                </label>
                <label class="radio-inline">
                    <input type="radio" name="puntuacion" value="5"> 5
                </label>
                <label class="input-inline">
                    <button type="submit" class="btn btn-success btn-xs">Votar</button>
                </label>
            </form>
        </div>
    <!-- Puntuaciones -->

</div>
