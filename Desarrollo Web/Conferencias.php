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
            $titulo = $invitacion = $pais = $ciudad = $institucion = "";
            $facultad = $fecha = $observaciones = "";
            $tituloErr = $invitacionErr = $paisErr = $ciudadErr = $institucionErr = "";
            $facultadErr = $fecha = $observaciones = "";

            if($_SERVER["REQUEST_METHOD"] == "POST"){
                
                if (empty($_POST["titulo"])) {
                    $tituloErr = "Título es requerido";
                  } else {
                    $titulo = test_input($_POST["titulo"]);
                    if (!preg_match("/^[a-zA-Z-' ]*$/",$titulo)) {
                        $titulo = "Unicamente se permiten letras y espacios en blanco.";
                    }
                }

                if (empty($_POST["invitacion"])) {
                    $invitacionErr = "Este campo es requerido";
                  } else {
                    $invitacion = $_POST["invitacion"];
                  }
                
                if (empty($_POST["pais"])) {
                    $paisErr = "País es requerido";
                  } else {
                    $pais = test_input($_POST["pais"]);
                    if (!preg_match("/^[a-zA-Z-' ]*$/",$pais)) {
                        $paisErr = "Unicamente se permiten letras y espacios en blanco.";
                    }
                }
                if (empty($_POST["ciudad"])) {
                    $ciudadErr = "Ciudad es requerida";
                  } else {
                    $ciudad = test_input($_POST["ciudad"]);
                    if (!preg_match("/^[a-zA-Z-' ]*$/",$ciudad)) {
                        $ciudadErr = "Unicamente se permiten letras y espacios en blanco.";
                    }
                }

                if (empty($_POST["institucion"])) {
                    $institucionErr = "Institucion es requerido";
                  } else {
                    $institucion = test_input($_POST["institucion"]);
                    if (!preg_match("/^[a-zA-Z-' ]*$/",$institucion)) {
                        $institucionErr = "Unicamente se permiten letras y espacios en blanco.";
                    }
                }

                if (empty($_POST["facultad"])) {
                    $facultadErr = "Facultad es requerido";
                  } else {
                    $facultad = test_input($_POST["facultad"]);
                    if (!preg_match("/^[a-zA-Z-' ]*$/",$facultad)) {
                        $facultadErr = "Unicamente se permiten letras y espacios en blanco.";
                    }
                }

                if (empty($_POST["fecha"])) {
                    $fechaErr = "Fecha es requerida";
                  } else {
                  $fecha = $_POST["fecha"];
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
        
            <h2>Registro de Conferencias</h2>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

                <div class="form-group">
						
                <div class="row" style="margin-top:7px;">
					<div class="col-sm-2">
						<label for="sel1">Título:<span style="color:red;">*</span>:</label>
					</div>
					<div class="col-sm-10">
                        <input type="text" class="form-control" name="titulo" > <?php echo $tituloErr;?>
					</div>						
				</div> 

                <div class="row">
                            <div class="col-sm-12">
                            
                        <div class="row" style="margin-bottom:7px;">
                            <div class="col-sm-2">
                                <input type="hidden" name="invitacion" />
                                    <label for="sel1">Invitado<span style="color:red;">*</span>:</label>
                            </div>
                                <div class="col-sm-10">
                                    <select class="form-control" name="invitacion"> <?php echo $invitacionErr;?>
                                        <option value="2">Seleccionar</option>
                                        <option value="0">No</option>
                                        <option value="1">Sí</option>
                                    </select>
                                </div>
                        </div>
                                
                <div class="row" style="margin-top:7px;">
					<div class="col-sm-2">
						<label for="sel1">País<span style="color:red;">*</span>:</label>
					</div>
					<div class="col-sm-10">
                        <input type="text" class="form-control" name="pais" /> <?php echo $paisErr;?>
					</div>						
				</div> 

                <div class="row" style="margin-top:7px;">
					<div class="col-sm-2">
						<label for="sel1">Ciudad<span style="color:red;">*</span>:</label>
					</div>
					<div class="col-sm-10">
                        <input type="text" class="form-control" name="ciudad" /> <?php echo $ciudadErr;?>
					</div>						
				</div> 

                <div class="row" style="margin-top:7px;">
					<div class="col-sm-2">
						<label for="sel1">Institución<span style="color:red;">*</span>:</label>
					</div>
					<div class="col-sm-10">
                        <input type="text" class="form-control" name="institucion" /> <?php echo $institucionErr;?>
					</div>						
				</div> 

                <div class="row" style="margin-top:7px;">
					<div class="col-sm-2">
						<label for="sel1">Facultad o escuela<span style="color:red;">*</span>:</label>
					</div>
					<div class="col-sm-10">
                        <input type="text" class="form-control" name="facultad" /> <?php echo $facultadErr;?>
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