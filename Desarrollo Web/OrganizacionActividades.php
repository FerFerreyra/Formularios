
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
            
            $tipoActividad = $nomActividad = $sede = $inicio = $obs = "";
            $terminada = $numOrganizadores = $numAsistentes = $numInstituciones = "";
            $tipoActividadErr = $nomActividadErr = $sedeErr = $inicioErr = $obs = "";
            $terminada = $numOrganizadores = $numAsistentesErr = $numInstitucionesErr = "";

            if($_SERVER["REQUEST_METHOD"] == "POST"){
                
                if (empty($_POST["tipoActividad"])) {
                    $tipoActividadErr = "Tipo de actividad es requerido";
                  } else {
                    $tipoActividad = test_input($_POST["tipoActividad"]);
                    if (!preg_match("/^[a-zA-Z-' ]*$/",$tipoActividad)) {
                        $tipoActividadErr = "Unicamente se permiten letras y espacios en blanco.";
                    }
                }
                
                if (empty($_POST["nomActividad"])) {
                    $nomActividadErr = "Nombre de actividad es requerido";
                  } else {
                    $nomActividad = test_input($_POST["nomActividad"]);
                    if (!preg_match("/^[a-zA-Z-' ]*$/",$nomActividad)) {
                        $nomActividadErr = "Unicamente se permiten letras y espacios en blanco.";
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

                if (empty($_POST["terminada"])) {
                    $terminadaErr = "Este campo es requerido";
                } else {
                    $terminada = $_POST["terminada"];
                }

                if (empty($_POST["numOrganizadores"])) {
                    $numOrganizadoresErr = "Número de organizadores es requerido";
                  } else {
                  $numOrganizadores = test_input($_POST["numOrganizadores"]);
                    if (! is_int("numOrganizadores")) {
                        $numOrganizadores = "Unicamente se permiten números enteros.";
                    }
                }

                if (empty($_POST["numInstituciones"])) {
                    $numInstitucionesErr = "Número de instituciones es requerido";
                  } else {
                  $numInstituciones = test_input($_POST["numInstituciones"]);
                    if (! is_int("numInstituciones")) {
                        $numInstituciones = "Unicamente se permiten números enteros.";
                    }
                }

                if (empty($_POST["numAsistentes"])) {
                    $numAsistentesErr = "Número de asistentes es requerido";
                  } else {
                  $numAsistentes = test_input($_POST["numAsistentes"]);
                    if (! is_int("numAsistentes")) {
                        $numAsistentes = "Unicamente se permiten números enteros.";
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
        
            <h2>Registro de organización de actividades</h2>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

                <div class="form-group">

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
        			    <label for="sel1">Nombre de actividad<span style="color:red;">*</span>:</label>
					</div>
					<div class="col-sm-10">
                        <input type="text" class="form-control" name="nomActividad" /> <?php echo $nomActividadErr;?>
					</div>						
				</div> 

                <div class="row" style="margin-top:7px;">
					<div class="col-sm-2">
        			    <label for="sel1">Sede<span style="color:red;">*</span>:</label>
					</div>
					<div class="col-sm-10">
                        <input type="text" class="form-control" name="sede" /> <?php echo $sedeErr;?>
					</div>						
				</div> 
						
                <div class="row" style="margin-top:7px;">
					<div class="col-sm-12">
						<div class="row">
							<div class="col-sm-2">
								<label for="sel1">Fecha de inicio<span style="color:red;">*</span>:</label>
							</div>
						    <div class="col-sm-10">
							<input type="date" class="form-control" name="inicio"/> <?php echo $inicioErr;?>
						    </div>	
					    </div>
				    </div>
			    </div>

                  <div class="row" style="margin-bottom:7px;">
                            <div class="col-sm-2">
                                <input type="hidden" name="terminada" />
                                    <label for="sel1">Finalizada<span style="color:red;">*</span>:</label>
                            </div>
                                <div class="col-sm-10">
                                    <select class="form-control" name="terminada"> <?php echo $terminadaErr;?>
                                        <option value="2">Seleccionar</option>
                                        <option value="0">No</option>
                                        <option value="1">Sí</option>
                                    </select>
                                </div>
                        </div>

                <div class="row" style="margin-top:7px;">
        			<div class="col-sm-2">
					    <label for="sel1">Número de organizadores<span style="color:red;">*</span>:</label>
					</div>
    				<div class="col-sm-10">
                        <input type="int" class="form-control" name="numOrganizadores" /><?php echo $numOrganizadoresErr;?>
					</div>						
				</div>

                <div class="row" style="margin-top:7px;">
        			<div class="col-sm-2">
					    <label for="sel1">Número de asistentes<span style="color:red;">*</span>:</label>
					</div>
    				<div class="col-sm-10">
                        <input type="int" class="form-control" name="numAsistentes" /><?php echo $numAsistentesErr;?>
					</div>						
				</div>

                <div class="row" style="margin-top:7px;">
        			<div class="col-sm-2">
					    <label for="sel1">Número de instituciones<span style="color:red;">*</span>:</label>
					</div>
    				<div class="col-sm-10">
                        <input type="int" class="form-control" name="numInstituciones" /><?php echo $numInstitucionesErr;?>
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