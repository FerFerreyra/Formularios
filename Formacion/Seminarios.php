<!--
  Este formulario recolecta los datos ingresados
  por el usuario, le solicita rellenar los
  campos obligatorias y verifica los cáracteres.
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
  //creación de variables
  $titulo = $sede = $obs = $inicio = $termino = "";
  $tituloErr = $sedeErr = $obs = $inicioErr = $terminoErr = "";
  //método de petición para acceder a la página
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
      //verificar el campo fue llenado
      if (empty($_POST["titulo"])) {
        $tituloErr = "Título es requerido";
      } else {
        //verificar el dato tenga las especificaciones adecuadas
        $titulo = test_input($_POST["titulo"]);
        if (!preg_match("/^[a-zA-Z-' ]*$/",$titulo)) {
            $tituloErr = "Unicamente se permiten letras y espacios en blanco.";
        }
    }
    
      if (empty($_POST["sede"])) {
        $sedeErr = "Sede es requerida";
      } else {
      $sede = test_input($_POST["sede"]);
        if (!preg_match("/^[a-zA-Z-' ]*$/",$sede)) {
            $sedeErr = "Unicamente se permiten letras y espacios en blanco.";
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

    //función que verifica y optimiza la información 
    function test_input($data) {
      $data = trim($data);
      $data = stripslashes($data);
      //transforma cáracteres especiales para mantener el codigo seguro
      $data = htmlspecialchars($data);
      return $data;
    }
?>

<p><span class="error">* Campo requerido</span></p>
<h2>Registro de seminario</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <div class="form-group">
						
        <div class="row">
           <div class="col-sm-12">
                            
           <div class="row" style="margin-bottom:7px;">
                                
            <div class="col-sm-6">
              <div class="row">
               <div class="col-sm-3">
                 <label for="sel1">Título:</label>
               </div>
               <div class="col-sm-9">
                <input type="text" name="titulo" /><span class="error">* <?php echo $tituloErr;?></span>	
              </div>
                                        
            </div>	
          </div>
                                
          <div class="col-sm-6">
            <div class="row">
              <div class="col-sm-3">
                <label for="sel1">Sede:</label>
              </div>
              <div class="col-sm-9">
                <input type="text" name="sede" /><span class="error">* <?php echo $sedeErr;?></span>	
              </div>
                                        
            </div>	
          </div>
        </div>

        <div class="row" style="margin-bottom:7px;">
					<div class="col-sm-6">
					  <div class="row">
						  <div class="col-sm-3">
							  <label for="sel1">Fecha inicio:</label>
						  </div>
						  <div class="col-sm-9">
                <input type="date" name="inicio"><span class="error">* <?php echo $inicioErr;?></span>	
			  			</div>
											
				  	</div>	
			  	</div>
									
					<div class="col-sm-6">
						<div class="row">
							<div class="col-sm-3">
								<label for="sel1">Fecha fin:</label>
						</div>
						<div class="col-sm-9">
                        <input type="date" name="termino"><span class="error">* <?php echo $terminoErr;?></span>
						</div>
											
					</div>	
				</div>
										
		  </div>
								
								
			<div class="row" style="margin-bottom:7px;">
								
				<div class="col-sm-6">
					<div class="row">
						<div class="col-sm-3">
							<label for="sel1">Observaciones: </label>
						</div>
						<div class="col-sm-9">
                            <textarea name="obs" rows="4" cols="40"></textarea>
						</div>											
					</div>	
				</div>									
		  </div>
    </div>
    <button type="submit" class="btn btn-primary my-1">Submit</button>
</form>


<?php
      echo "<h2>Los datos ingresados:</h2>";
      echo $titulo;
      echo "<br>";
      echo $sede;
      echo "<br>";
      echo $inicio;
      echo "<br>";
      echo $termino;
      echo "<br>";
      echo $obs;
  ?>

</body>
</html>