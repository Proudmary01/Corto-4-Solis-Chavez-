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
        <title>Procesar Imágenes</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-beta.30/css/uikit.min.css" />
    </head>
    <body>
      <div class="uk-section uk-container">
        <?php
          // Recibo los datos de la imagen
          $nombre_img = $_FILES['imagen']['name'];
          $tipo = $_FILES['imagen']['type'];
          $tamano = $_FILES['imagen']['size'];
          //Si existe imagen y tiene un tamaño correcto
          if (($nombre_img == !NULL) && ($_FILES['imagen']['size'] <= 200000))
          {
           //indicamos los formatos que permitimos subir a nuestro servidor
           if (($_FILES["imagen"]["type"] == "image/gif")
           || ($_FILES["imagen"]["type"] == "image/jpeg")
           || ($_FILES["imagen"]["type"] == "image/jpg")
           || ($_FILES["imagen"]["type"] == "image/png"))
           {
              // Ruta donde se guardarán las imágenes que subamos
              $directorio = $_SERVER['DOCUMENT_ROOT'].'/corto4/intranet/uploads/';
              // Muevo la imagen desde el directorio temporal a nuestra ruta indicada anteriormente
              move_uploaded_file($_FILES['imagen']['tmp_name'],$directorio.$nombre_img);

              /* en pasos anteriores deberíamos tener una conexión abierta a nuestra base de
              datos para ejecutar nuestra sentencia SQL */
              /* con la siguiente sentencia le asignamos a nuestro campo de la tabla ruta_imagen
              el nombre de nuestra imagen */
              $sql = $con->query("INSERT INTO users VALUES ('$nombre_img')");

              /* volvemos a la página principal para cargar la imagen que hemos subido */
              header("Location: imagenesPerfil.php");
            }
            else
            {
               //si no cumple con el formato
               echo "No se puede subir una imagen con ese formato ";
							 echo '<br /><br /><a href="paginaperfil.php"><button class="uk-button uk-button-danger">Regresar</button></a>';
            }
          }
          else
          {
           //si existe la variable pero se pasa del tamaño permitido
           if($nombre_img == !NULL)
					 {
						 echo "La imagen es demasiado grande ";
						 echo '<br /><br /><a href="paginaperfil.php"><button class="uk-button uk-button-danger">Regresar</button></a>';
					 }
					 else {
					 	echo "No subio ningun archivo.";
						echo '<br /><br /><a href="paginaperfil.php"><button class="uk-button uk-button-danger">Regresar</button></a>';
					 }
          }
         ?>
      </div>
      <?php require_once "inc/footer.php"; ?>
    </body>
</html>
