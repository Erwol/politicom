
<link rel="stylesheet" type="text/css" href="http://<?=base_url()?>public/css/estiloMapa.css" media="screen" />
<link rel="stylesheet" type="text/css" href="http://<?=base_url()?>public/css/estiloIndex.css" media="screen" />
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <!-- <img class="img-responsive" src="img/profile.png" alt=""> -->
            <div class="intro-text">
                <center><h2>Políticos por comunidad</h2></center>
                <hr>
		<div id="MapaEspana" class="grid_6">
			<td>
			<map name='mapa'>
			<area href="http://<?=base_url()?>index.php/comunidades/mostrar/andalucia" shape='poly' alt='Andalucía' title='Andalucía' coords='61, 288, 50, 309, 55, 329, 73, 329, 93, 346, 91, 351, 103, 376, 123, 389, 135, 380, 141, 367, 152, 365, 159, 366, 172, 354, 241, 356, 247, 348, 258, 352, 278, 322, 268, 318, 262, 307, 263, 297, 242, 288, 248, 277, 239, 266, 175, 274, 146, 255, 124, 270, 129, 280, 120, 286, 120, 281, 105, 291, 74, 280'>
			<area href="http://<?=base_url()?>index.php/comunidades/mostrar/aragon" shape='poly' alt='Aragón' title='Aragón' coords='303, 47, 302, 55, 288, 65, 282, 86, 288, 90, 281, 99, 266, 95, 270, 110, 261, 116, 264, 124, 258, 122, 256, 137, 267, 137, 279, 152, 278, 164, 275, 163, 270, 173, 284, 185, 289, 181, 297, 187, 295, 192, 303, 195, 313, 186, 316, 178, 325, 174, 323, 159, 327, 151, 337, 156, 343, 153, 344, 140, 341, 132, 345, 132, 348, 112, 346, 104, 352, 102, 360, 73, 356, 57, 327, 57'>
			<area href="http://<?=base_url()?>index.php/comunidades/mostrar/asturias" shape='poly' alt='Principado de Asturias' title='Principado de Asturias' coords='81, 14, 81, 20, 76, 21, 84, 33, 88, 31, 91, 35, 84, 40, 88, 45, 102, 46, 106, 38, 124, 43, 150, 38, 158, 31, 161, 35, 170, 31, 172, 25, 147, 22, 143, 17, 129, 16, 125, 10, 120, 16'>
			<area href="http://<?=base_url()?>index.php/comunidades/mostrar/baleares" shape='poly' alt='Baleares' title='Baleares' coords='385, 244, 392, 254, 401, 252, 400, 238, 441, 215, 449, 216, 455, 220, 461, 215, 468, 197, 482, 188, 498, 191, 494, 177, 478, 180, 476, 184, 460, 197, 454, 196, 454, 186, 425, 207, 432, 213, 398, 234, 388, 233'>
			<area href="http://<?=base_url()?>index.php/comunidades/mostrar/canarias" shape='poly' alt='Canarias' title='Canarias' coords='297, 404, 303, 418, 299, 449, 290, 454, 299, 461, 303, 453, 329, 441, 353, 442, 363, 442, 367, 431, 399, 456, 456, 442, 472, 432, 492, 394, 493, 374, 472, 400, 457, 435, 410, 445, 408, 436, 396, 434, 391, 444, 368, 424, 379, 415, 367, 414, 362, 421, 343, 425, 349, 435, 337, 435, 328, 432, 306, 445, 308, 414, 310, 399'>
			<area href="http://<?=base_url()?>index.php/comunidades/mostrar/cantabria" shape='poly' alt='Cantabria' title='Cantabria' coords='164, 42, 175, 44, 187, 55, 196, 54, 190, 47, 201, 37, 210, 37, 207, 32, 221, 28, 209, 24, 204, 19, 196, 23, 194, 20, 173, 23, 170, 31, 162, 33'>
			<area href="http://<?=base_url()?>index.php/comunidades/mostrar/leon" shape='poly' alt='Castilla y León' title='Castilla y León' coords='82, 93, 95, 94, 96, 108, 104, 107, 108, 111, 81, 141, 83, 176, 92, 178, 107, 167, 115, 176, 121, 175, 131, 181, 135, 178, 139, 185, 145, 187, 162, 178, 164, 181, 174, 171, 186, 153, 189, 154, 193, 144, 215, 130, 232, 126, 246, 141, 256, 135, 257, 122, 260, 114, 268, 109, 265, 95, 257, 96, 256, 89, 246, 87, 241, 94, 228, 93, 222, 89, 222, 63, 229, 63, 219, 53, 223, 48, 215, 33, 210, 37, 200, 36, 189, 46, 196, 54, 187, 53, 176, 45, 161, 42, 159, 34, 150, 37, 124, 44, 105, 38, 102, 45, 87, 46, 79, 65, 87, 68, 91, 77, 81, 85'>
			<area href="http://<?=base_url()?>index.php/comunidades/mostrar/mancha" shape='poly' alt='Castilla La Mancha' title='Castilla La Mancha' coords='154, 222, 162, 219, 159, 227, 163, 233, 157, 232, 155, 241, 152, 240, 156, 247, 147, 254, 174, 274, 238, 264, 247, 275, 243, 287, 250, 289, 263, 275, 275, 272, 279, 275, 285, 258, 295, 254, 303, 257, 303, 244, 293, 243, 290, 239, 294, 226, 281, 222, 282, 212, 288, 208, 295, 193, 286, 193, 282, 187, 269, 173, 273, 164, 277, 153, 267, 138, 256, 136, 246, 141, 233, 127, 206, 136, 209, 143, 207, 154, 220, 174, 222, 189, 192, 198, 202, 187, 180, 179, 164, 181, 143, 188, 137, 185, 136, 197, 139, 205, 144, 200, 143, 213'>
			<area href="http://<?=base_url()?>index.php/comunidades/mostrar/cataluna" shape='poly' alt='Cataluña' title='Cataluña' coords='355, 164, 369, 153, 363, 149, 375, 136, 413, 124, 417, 113, 448, 98, 451, 87, 446, 76, 453, 70, 441, 62, 423, 70, 412, 67, 404, 71, 400, 65, 384, 68, 380, 55, 357, 48, 355, 57, 359, 72, 351, 100, 347, 104, 347, 112, 345, 131, 343, 140, 342, 151'>
			<area href="http://<?=base_url()?>index.php/comunidades/mostrar/valencia" shape='poly' alt='Comunidad Valenciana' title='Comunidad Valenciana' coords='298, 273, 303, 277, 301, 285, 310, 298, 321, 280, 320, 273, 350, 254, 348, 249, 337, 246, 325, 218, 356, 164, 343, 152, 338, 157, 328, 148, 324, 161, 325, 172, 317, 177, 313, 186, 305, 195, 292, 185, 283, 186, 285, 192, 299, 195, 288, 207, 280, 215, 280, 221, 293, 225, 288, 238, 293, 244, 304, 242, 302, 255'>
			<area href="http://<?=base_url()?>index.php/comunidades/mostrar/extremadura" shape='poly' alt='Extremadura' title='Extremadura' coords='56, 205, 68, 234, 74, 234, 74, 240, 62, 255, 59, 267, 71, 278, 105, 290, 118, 282, 118, 286, 126, 281, 124, 271, 147, 253, 155, 248, 150, 239, 157, 234, 153, 223, 142, 213, 144, 199, 138, 206, 135, 198, 137, 185, 131, 180, 120, 175, 114, 175, 106, 168, 91, 179, 82, 178, 74, 181, 79, 189, 75, 206'>
			<area href="http://<?=base_url()?>index.php/comunidades/mostrar/galicia" shape='poly' alt='Galicia' title='Galicia' coords='52, 2, 28, 22, 18, 21, 0, 34, 2, 40, 5, 48, 15, 50, 7, 58, 18, 57, 10, 66, 11, 96, 25, 85, 38, 82, 42, 85, 36, 92, 40, 98, 51, 95, 66, 100, 80, 93, 80, 87, 87, 79, 86, 69, 78, 65, 87, 45, 83, 41, 83, 31, 76, 22, 80, 19, 80, 14, 66, 5'>
			<area href="http://<?=base_url()?>index.php/comunidades/mostrar/madrid" shape='poly' alt='Madrid' title='Madrid' coords='168, 178, 175, 171, 189, 154, 192, 145, 205, 136, 209, 143, 206, 155, 219, 173, 223, 189, 190, 199, 202, 187, 179, 180'>
			<area href="http://<?=base_url()?>index.php/comunidades/mostrar/murcia" shape='poly' alt='Murcia' title='Murcia' coords='295, 312, 314, 310, 311, 299, 300, 283, 303, 279, 297, 272, 301, 255, 295, 255, 284, 258, 278, 276, 274, 271, 263, 276, 250, 289, 263, 296, 264, 306, 266, 317, 276, 320'>
			<area href="http://<?=base_url()?>index.php/comunidades/mostrar/navarra" shape='poly' alt='Navarra' title='Navarra' coords='246, 70, 270, 84, 264, 92, 278, 98, 290, 90, 282, 86, 287, 65, 301, 56, 302, 48, 284, 38, 283, 42, 278, 40, 283, 31, 268, 27, 258, 46, 251, 47, 247, 62, 241, 63'>
			<area href="http://<?=base_url()?>index.php/comunidades/mostrar/vasco" shape='poly' alt='País Vasco' title='País Vasco' coords='235, 24, 253, 29, 266, 25, 258, 46, 249, 45, 247, 61, 229, 62, 219, 54, 225, 48, 216, 34, 222, 29, 227, 24'>
			<area href="http://<?=base_url()?>index.php/comunidades/mostrar/rioja" shape='poly' alt='La Rioja' title='La Rioja' coords='235, 66, 238, 67, 247, 69, 268, 84, 265, 90, 257, 95, 257, 89, 247, 86, 243, 94, 227, 92, 223, 88, 220, 63, 227, 64'>

			</map>
			<center><img src='http://<?=base_url()?>public/img/mapa.png' alt='Municipios de Cádiz' usemap='#mapa' class='imgmapa'></center>
			</td>
		</div>
    </div>
</div>
</div>
</div>
	<br><br><br>
