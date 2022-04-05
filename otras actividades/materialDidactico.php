
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
            
            $nomActividad = $tipoActividad = $tipoEnseñanza = $cargo = "";
            $inicio = $termino = $obs = "";
            $nomActividadErr = $tipoActividadErr = $tipoEnseñanzaErr = $cargoErr = "";
            $inicioErr = $termino = $obs = "";

            if($_SERVER["REQUEST_METHOD"] == "POST"){
                
                if (empty($_POST["nomActividad"])) {
                    $nomActividadErr = "Nombre de actividad es requerido";
                  } else {
                    $nomActividad = test_input($_POST["nomActividad"]);
                    if (!preg_match("/^[a-zA-Z-' ]*$/",$nomActividad)) {
                        $nomActividadErr = "Unicamente se permiten letras y espacios en blanco.";
                    }
                }
                
                if (empty($_POST["tipoActividad"])) {
                    $tipoActividadErr = "Tipo de actividad es requerido";
                  } else {
                    $tipoActividad = test_input($_POST["tipoActividad"]);
                    if (!preg_match("/^[a-zA-Z-' ]*$/",$tipoActividad)) {
                        $tipoActividadErr = "Unicamente se permiten letras y espacios en blanco.";
                    }
                }

                if (empty($_POST["tipoEnseñanza"])) {
                    $tipoEnseñanzaErr = "Tipo de enseñanza es requerido";
                  } else {
                    $tipoEnseñanza = test_input($_POST["tipoEnseñanza"]);
                    if (!preg_match("/^[a-zA-Z-' ]*$/",$tipoEnseñanza)) {
                        $tipoEnseñanzaErr = "Unicamente se permiten letras y espacios en blanco.";
                    }
                }

                if (empty($_POST["cargo"])) {
                    $cargoErr = "Cargo es requerido";
                  } else {
                    $cargo = test_input($_POST["cargo"]);
                    if (!preg_match("/^[a-zA-Z-' ]*$/",$cargo)) {
                        $cargoErr = "Unicamente se permiten letras y espacios en blanco.";
                    }
                }

                if (empty($_POST["inicio"])) {
                    $inicioErr = "Fecha de inicio es requerida";
                  } else {
                  $inicio = $_POST["inicio"];
                  }
            
                $termino = $_POST["termino"];
                

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
        
            <h2>Registro de material didáctico</h2>
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
        			    <label for="sel1">Tipo de actividad<span style="color:red;">*</span>:</label>
					</div>
					<div class="col-sm-10">
                        <input type="text" class="form-control" name="tipoActividad" /> <?php echo $tipoActividadErr;?>
					</div>						
				</div> 

                <div class="row" style="margin-top:7px;">
					<div class="col-sm-2">
        			    <label for="sel1">Tipo de enseñanza<span style="color:red;">*</span>:</label>
					</div>
					<div class="col-sm-10">
                        <input type="text" class="form-control" name="tipoEnseñanza" /> <?php echo $tipoEnseñanzaErr;?>
					</div>						
				</div>

                <div class="row" style="margin-top:7px;">
					<div class="col-sm-2">
        			    <label for="sel1">Cargo<span style="color:red;">*</span>:</label>
					</div>
					<div class="col-sm-10">
                        <input type="text" class="form-control" name="cargo" /> <?php echo $cargoErr;?>
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
            
        </body>    
    </html>