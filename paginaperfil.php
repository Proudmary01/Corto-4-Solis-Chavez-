<?php

	// Allow the config
	define('__CONFIG__', true);
	// Require the config
	require_once "inc/config.php";

?>
<!DOCTYPE html>
<html>
    <head>
      <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>Cargar Imágenes</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-beta.30/css/uikit.min.css" />
    </head>
    <body>
      <div class="uk-section uk-container">
        <?php
          echo "Corto #5";
         ?>
         <form action="cambiodatospersonales.php" enctype="multipart/form-data" method="post">
           <br />
           <label for="imagen">Imagen:</label>
           <div class="uk-margin" uk-margin>
               <div uk-form-custom="target: true">
                   <input id="imagen" name="imagen" size="30" type="file" />
                   <input class="uk-input uk-form-width-medium" type="text" placeholder="Select file" disabled>
               </div>
               <input class="uk-button uk-button-default" type="submit" value="Enviar" />
           </div>
         </form>
				 <p>
					 <a href="imagenesPerfil.php"><button class="uk-button uk-button-secondary">Ver Imágenes</button></a>
				 </p>
      </div>
      <?php require_once "inc/footer.php"; ?>
    </body>
</html>
