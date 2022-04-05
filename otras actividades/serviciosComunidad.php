
<!DOCTYPE HTML>  
    <html>
        <head>
            <style>
            .error {color: #FF0000;}      
            </style>
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        </head>

        <body>
            <?php

            $nomActividad = $dirigido = $fecha = $asistentes = $obs = "";
            $nomActividadErr = $dirigidoErr = $fechaErr = $asistentesErr = "";
            

            if($_SERVER["REQUEST_METHOD"] == "POST"){
                
                if (empty($_POST["nomActividad"])) {
                    $nomActividadErr = "Nombre de actividad es requerido";
                  } else {
                    $nomActividad = test_input($_POST["nomActividad"]);
                    if (!preg_match("/^[a-zA-Z-' ]*$/",$nomActividad)) {
                        $nomActividadErr = "Unicamente se permiten letras y espacios en blanco.";
                    }
                }
    
                if (empty($_POST["dirigido"])) {
                    $dirigidoErr = "Dirigido es requerido";
                  } else {
                    $dirigido = test_input($_POST["dirigido"]);
                    if (!preg_match("/^[a-zA-Z-' ]*$/",$dirigido)) {
                        $dirigidoErr = "Unicamente se permiten letras y espacios en blanco.";
                    }
                }  
                
                if (empty($_POST["fecha"])) {
                    $fechaErr = "Fecha es requerida";
                  } else {
                  $fecha = $_POST["fecha"];
                  }

                  if (empty($_POST["asistentes"])) {
                    $asistentesErr = "Número de asistentes es requerido";
                  } else {
                  $asistentes = test_input($_POST["asistentes"]);
                    if (! is_integer("asistentes")) {
                        $asistentesErr = "Unicamente se permiten números enteros.";
                    }
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
        
            <h2>Registro de </h2>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

                <div class="form-group">
						
                <div class="row" style="margin-top:7px;">
					<div class="col-sm-2">
        			    <label for="sel1">Nombre de actividad<span style="color:red;">*</span>:</label>
					</div>
					<div class="col-sm-10">
                        <input type="text" class="form-control" name="nomActividad" /> <?php echo $nomActividadErr;?>
					</div>						
				</div> 
                
                <div class="row" style="margin-top:7px;">
					<div class="col-sm-2">
        			    <label for="sel1">Dirigido a<span style="color:red;">*</span>:</label>
					</div>
					<div class="col-sm-10">
                        <input type="text" class="form-control" name="dirigido" /> <?php echo $dirigidoErr;?>
					</div>						
				</div>
                
                <div class="row" style="margin-top:7px;">
					<div class="col-sm-12">
						<div class="row">
							<div class="col-sm-2">
								<label for="sel1">Fecha <span style="color:red;">*</span>:</label>
							</div>
						    <div class="col-sm-10">
							<input type="date" class="form-control" name="fecha"/> <?php echo $fechaErr;?>
						    </div>	
					    </div>
				    </div>
			    </div>

                <div class="row" style="margin-top:7px;">
        			<div class="col-sm-2">
					    <label for="sel1">Número de asistentes<span style="color:red;">*</span>:</label>
					</div>
    				<div class="col-sm-10">
                        <input type="int" class="form-control" name="asistentes" /><?php echo $asistentesErr;?>
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
            
        </body>    
    </html>