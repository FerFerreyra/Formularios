<!--
  Este formulario recolecta únicamente los datos
  ingresados por el usuario.
-->

<!DOCTYPE HTML>  
<html>
<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
		<link rel='stylesheet prefetch' href='https://cdn.datatables.net/1.10.9/css/jquery.dataTables.min.css'>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

		

		<style>
			body {
				background-color:#ffffff;
			}
			
			ul {
				list-style: none;
				padding: 0;
			}

			ul .inner {
				overflow: hidden;
				display: none;
			}

			ul li {
				margin: 0;
				padding-top: 0.2em !important;
			}

			ul li a {
				text-decoration:none;
				color: #f1f1f1;
				font-size:13px;
					
				
			}
			
			ul li a:hover {
				text-decoration:none;
				color: #EEA845;
			}


			ul.inner li>a {
				padding-left: 1em;
			}

			ul.inner .inner li>a {
				padding-left: 2em;
			}

			ul.inner .inner .inner li>a {
				padding-left: 3em;
			}
			

			
		</style>
  </head>
<body>

<?php
  $tipo = $entidad = $objetivo = $contparte = $descripcion = "";
  $funcion = $inicio = $termino = $observaciones = "";
  $tipoErr = $entidadErr = $objetivoErr = $contparteErr = $descripcionErr = "";
  $funcionErr = $inicioErr = $terminoErr = $observaciones = "";
  if($_SERVER["REQUEST_METHOD"] == "POST"){
      
    if (empty($_POST["tipo"])) {
      $tipoErr = "Tipo es requerido";
    } else {
      $tipo = test_input($_POST["tipo"]);
      if (!preg_match("/^[a-zA-Z-' ]*$/",$tipo)) {
          $tipoErr = "Unicamente se permiten letras y espacios en blanco.";
      }
    }

    if (empty($_POST["entidad"])) {
      $entidadErr = "Entidad es requerida";
    } else {
      $entidad = test_input($_POST["entidad"]);
      if (!preg_match("/^[a-zA-Z-' ]*$/",$entidad)) {
          $entidadErr = "Unicamente se permiten letras y espacios en blanco.";
      }
    }

    if (empty($_POST["objetivo"])) {
      $objetivoErr = "Objetivo es requerido";
    } else {
      $objetivo = test_input($_POST["objetivo"]);
      if (!preg_match("/^[a-zA-Z-' ]*$/",$objetivo)) {
          $objetivoErr = "Unicamente se permiten letras y espacios en blanco.";
      }
    }

    if (empty($_POST["objetivo"])) {
      $objetivo = test_input($_POST["objetivo"]);
      if (!preg_match("/^[a-zA-Z-' ]*$/",$objetivo)) {
          $objetivoErr = "Unicamente se permiten letras y espacios en blanco.";
      }
    }

    if (empty($_POST["descripcion"])) {
      $descripcionErr = "Descripción es requerida";
    } else {
      $descripcion = test_input($_POST["descripcion"]);
      if (!preg_match("/^[a-zA-Z-' ]*$/",$descripcion)) {
          $descripcionErr = "Unicamente se permiten letras y espacios en blanco.";
      }
    }

    if (empty($_POST["funcion"])) {
      $funcionErr = "Función es requerida";
    } else {
      $funcion = test_input($_POST["funcion"]);
      if (!preg_match("/^[a-zA-Z-' ]*$/",$funcion)) {
          $funcionErr = "Unicamente se permiten letras y espacios en blanco.";
      }
    }

    if (empty($_POST["inicio"])) {
      $inicioErr = "Fecha de inicio es requerida";
    } else {
    $inicio = $_POST["inicio"];
    }

    if (empty($_POST["termino"])) {
      $terminoErr = "Fecha de termino es requerida";
    } else {
    $termino = $_POST["termino"];
    }

    if (empty($_POST["obs"])) {
      $obs = "";
    } else {
      $obs = test_input($_POST["obs"]);
    }
  }
  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
?>

<!--
  Formulario
-->

<h2>Registro de apoyo académico</h2>
Proporciona la siguiente información.
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

<div class="form-group">

<div class="row" style="margin-top:7px;">
    <div class="col-sm-2">
      <label for="sel1">Tipo<span style="color:red;">*</span>:</label>
    </div>
    <div class="col-sm-10">
        <input type="text" class="form-control" name="tipo" /> <?php echo $tipoErr;?>
    </div>						
  </div> 

  <div class="row" style="margin-top:7px;">
    <div class="col-sm-2">
      <label for="sel1">Entidad<span style="color:red;">*</span>:</label>
    </div>
    <div class="col-sm-10">
        <input type="text" class="form-control" name="entidad" /> <?php echo $entidadErr;?>
    </div>						
  </div> 

  <div class="row" style="margin-top:7px;">
    <div class="col-sm-2">
      <label for="sel1">Objetivo<span style="color:red;">*</span>:</label>
    </div>
    <div class="col-sm-10">
        <input type="text" class="form-control" name="objetivo" /> <?php echo $objetivoErr;?>
    </div>						
  </div> 

  <div class="row" style="margin-top:7px;">
    <div class="col-sm-2">
      <label for="sel1">Contraparte:</label>
    </div>
    <div class="col-sm-10">
        <input type="text" class="form-control" name="contraparte" /> <?php echo $contparteErr;?>
    </div>						
  </div> 

  <div class="row" style="margin-top:7px;">
    <div class="col-sm-2">
      <label for="sel1">Descripción<span style="color:red;">*</span>:</label>
    </div>
    <div class="col-sm-10">
        <input type="text" class="form-control" name="descripcion" /> <?php echo $descripcionErr;?>
    </div>						
  </div> 

  <div class="row" style="margin-top:7px;">
    <div class="col-sm-2">
      <label for="sel1">Funcion<span style="color:red;">*</span>:</label>
    </div>
    <div class="col-sm-10">
        <input type="text" class="form-control" name="funcion" /> <?php echo $funcionErr;?>
    </div>						
  </div> 

  <div class="row" style="margin-bottom:7px;">
		<div class="col-sm-2">
			<label for="sel1">Fecha inicio<span style="color:red;">*</span>:</label>
		</div>
		<div class="col-sm-4">								
			<input type="date" class="form-control" name="inicio"  /> <?php echo $inicioErr;?> 		
		</div>
		<div class="col-sm-1">
			<label for="sel1">Fecha fin<span style="color:red;">*</span>:</label>
		</div>
		<div class="col-sm-5">
	  	<input type="date" class="form-control" name="termino"  /> <?php echo $terminoErr;?>
		</div>							
	</div>
										
        <div class="row" style="margin-top:7px;">
                                <div class="col-sm-2">
                                <label for="sel1">Observaciones:</label>
                                
                                </div>
                                <div class="col-sm-10">
                                    <textarea name="obs" class="form-control" cols="40"></textarea>
                                </div>
                            </div>


              <div class="col-sm-10">
                  <button type="submit" class="btn btn-primary my-1">Agregar</button>
              </div>
</form>


  <?php
        echo "<h2>Los datos ingresados:</h2>";
        echo $tipo;
        echo "<br>";
        echo $entidad;
        echo "<br>";
        echo $objetivo;
        echo "<br>";
        echo $contparte;
        echo "<br>";
        echo $descripcion;
        echo "<br>";
        echo $funcion;
        echo "<br>";
        echo $inicio;
        echo "<br>";
        echo $termino;
        echo "<br>";
        echo $observaciones;
  ?>

</body>
</html>

