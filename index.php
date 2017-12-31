<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html
  xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <title></title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="ckeditor/ckeditor.js"></script>
        <link rel="stylesheet" href="ckeditor/styles.css">

       <style type="text/css">
           .i-has-teh-code {
            background: rgb(20,30,30);
  color: rgb(220,230,230);
  margin: 0 auto;
  font-family: Monaco, Consolas, "Lucida Console", monospace;
}
       </style>
        </head>
        <body class="i-has-teh-code" >
               <div class="container">
          <hr>
            <center>
              <H1>EMAIL SPAMMER BY EN1GM4</H1>
            </center>
            <hr>
           
              	<form name="form1"  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" enctype="multipart/form-data"  class="form-horizontal" >

                <div class="form-row">
                  <div class="form-group col-md-5">
                    <label  id="letras" class="col-form-label">De:</label>
                    <input type="text" class="form-control" name="nombre" placeholder="ejemplo@ejemplo.com">
                    </div>


                  <div class="form-group col-md-2">

                  </div>
          



                    <div class="form-group col-md-5">
                      <label id="letras" class="col-form-label" >Lista de correos:</label>
                      <input  class="col-form-label" name="fper" size="30" type="file"/>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-12">
                      <label id="letras" class="col-form-label">Asunto</label>
                      <input type="text" class="form-control" name="asunto" >
                      </div>
                    </div>
                    <br>
                      <div class="col-xs-12 col-md-12 col-lg-12"  style="margin-top: 25px">
                        <textarea name="area2" rows="10" class="ckeditor"  placeholder="Escribe aquí la noticia"  ></textarea>
                      </div>
                      <br>
                      <script type="text/javascript">
// This is a check for the CKEditor class. If not defined, the paths must be checked.
if ( typeof CKEDITOR == 'undefined' )
{
    document.write(
        '<strong><span style="color: #ff0000">Error</span>: CKEditor not found</strong>.' +
        'This sample assumes that CKEditor (not included with CKFinder) is installed in' +
        'the "/ckeditor/" path. If you have it installed in a different place, just edit' +
        'this file, changing the wrong paths in the &lt;head&gt; (line 5) and the "BasePath"' +
        'value (line 32).' ) ;
}
else
{
    var editor = CKEDITOR.replace( 'area2' );
    // Just call CKFinder.setupCKEditor and pass the CKEditor instance as the first argument.
    // The second parameter (optional), is the path for the CKFinder installation (default = "/ckfinder/").
    CKFinder.setupCKEditor( editor, 'ckeditor/ckfinder/' ) ;
    // It is also possible to pass an object with selected CKFinder properties as a second argument.
    // CKFinder.setupCKEditor( editor, { basePath : '../', skin : 'v1' } ) ;
}

                      </script>
                      <center>
                      
                          <div class="form-group col-md-12">
                          
                          	<hr>
                            <button type="submit" name="enviar" class="btn btn-primary">ENVIAR</button>
                          </center>
                        </div>
                        <br>
                        </form>
                    
                      <?php
		if(isset($_POST['enviar'])) {


	    $cap = $_FILES['fper']['name'];
		$de=$_POST['nombre'];	


		$dir ='listas/';


		if($cap == !null) {
		    $trozo1=explode(".", $_FILES['fper']['name']);
		   if ($trozo1['1']=="txt"  ){ 

		$nuevonombre="lista".".".$trozo1['1'];

		 $subir = @move_uploaded_file($_FILES["fper"]["tmp_name"],$dir.$nuevonombre);

		$Asunto = $_POST['asunto'];
		$mensaje = $_POST['area2'];
		$cabeceras = 'MIME-Version: 1.0' . "\r\n";
$cabeceras .= 'Content-type: text/html; charset=utf-8' . "\r\n";
$cabeceras .= 'From: '.$de."\r\n";


		$correos = file($dir.$nuevonombre);

	foreach ($correos as $numero => $correo) {
		    

		$email_salida = $correo;
		
		@mail($email_salida, $Asunto, $mensaje, $cabeceras);

	}


?>						<div class="container">

                      <div class="alert alert-success" role="alert">Correos enviados con exito!</div>

                      <?php

		}
		}
		}
		


	?>  </div>
                    </body>
                  </html>