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
				<p>
					<a href="paginaperfil.php"><button class="uk-button uk-button-primary">Agregar más imágenes</button></a>
				</p>
        <?php
          /* lanzamos la consulta para traernos el nombre de la imagen, en nuestro caso
          el campo ruta_imagen se encuentra en la tabla usuarios */
          $result = $con->prepare("SELECT * FROM users", array(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY => true));
          $result-> execute();
          foreach ($result as $key) {
            $ruta_img = $key["ruta_imagen" ];
            //echo $ruta_img;
            echo '<img style="width: 100px; height:100px;" src="intranet/uploads/'; echo $ruta_img; echo '" alt="" />';
          }
         ?>

      </div>
      <?php require_once "inc/footer.php"; ?>
    </body>
</html>
