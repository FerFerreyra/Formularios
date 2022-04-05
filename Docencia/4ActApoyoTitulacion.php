
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
            $entidad = $nivel = $carrera = $formaTitulacion = $fecha = "";
            $tituloTrabajo = $nomAlumno = $tipoParticipacion = $observaciones = "";
            $entidadErr = $nivelErr = $carreraErr = $formaTitulacionErr = $fechaErr = "";
            $tituloTrabajoErr = $nomAlumnoErr = $tipoParticipacionErr = $observacionesErr = "";
            if($_SERVER["REQUEST_METHOD"] == "POST"){
                
                if (empty($_POST["entidad"])) {
                    $entidadErr = "Entidad es requerida";
                  } else {
                  $entidad = test_input($_POST["entidad"]);
                    if (! is_int("entidad")) {
                        $entidadErr = "Unicamente se permiten números enteros.";
                    }
                }
                
                if (empty($_POST["nivel"])) {
                    $nivelErr = "Nivel es requerid0";
                  } else {
                  $nivel = test_input($_POST["nivel"]);
                    if (! is_int("nivel")) {
                        $nivelErr = "Unicamente se permiten números.";
                    }
                }
                
                if (empty($_POST["carrera"])) {
                    $carreraErr = "Carrera es requerida";
                  } else {
                  $carreraErr = test_input($_POST["carrera"]);
                    if (! is_integer("carrera")) {
                        $carreraErr = "Unicamente se permiten números enteros.";
                    }
                }
                
                if (empty($_POST["formaTitulacion"])) {
                    $formaTitulacionErr = "Forma de titulación es requerida";
                  } else {
                    //verificar el dato tenga las especificaciones adecuadas
                    $formaTitulacion = test_input($_POST["formaTitulacion"]);
                    if (!preg_match("/^[a-zA-Z0-9.]+$/",$formaTitulacion)) {
                        $formaTitulacionErr = "Unicamente se permiten letras, números y espacios en blanco.";
                    }
                }
                
                if (empty($_POST["tituloTrabajo"])) {
                    $tituloTrabajoErr = "Título de trabajo es requerido";
                  } else {
                    //verificar el dato tenga las especificaciones adecuadas
                    $tituloTrabajo = test_input($_POST["tituloTrabajo"]);
                    if (!preg_match("/^[a-zA-Z0-9.]+$/",$tituloTrabajo)) {
                        $tituloTrabajoErr = "Unicamente se permiten letras, números y espacios en blanco.";
                    }
                }
                
                if (empty($_POST["nomAlumno"])) {
                    $nomAlumnoErr = "Nombre del alumno es requerido";
                  } else {
                    //verificar el dato tenga las especificaciones adecuadas
                    $nomAlumno = test_input($_POST["nomAlumno"]);
                    if (!preg_match("/^[a-zA-Z0-9.]+$/",$nomAlumno)) {
                        $nomAlumnoErr = "Unicamente se permiten letras, números y espacios en blanco.";
                    }
                }

                if (empty($_POST["tipoParticipacion"])) {
                    $tipoParticipacionErr = "Tipo de participación es requerido";
                  } else {
                    //verificar el dato tenga las especificaciones adecuadas
                    $tipoParticipacion = test_input($_POST["tipoParticipacion"]);
                    if (!preg_match("/^[a-zA-Z0-9.]+$/",$tipoParticipacion)) {
                        $tipoParticipacionErr = "Unicamente se permiten letras, números y espacios en blanco.";
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
        
            <h2>Registro de actividades de apoyo a la titulación</h2>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

                <div class="form-group">
						
                        <div class="row">
                            <div class="col-sm-12">

                            <div class="row" style="margin-bottom:7px;">
                            <div class="col-sm-2">
                            <input type="hidden" name="entidad" />
                                    <label for="sel1">Entidad<span style="color:red;">*</span>:</label>
                                </div>
                                <div class="col-sm-4">
                                    <select class="form-control" name="entidad"> <?php echo $entidadErr;?>
                                        <option value="0">Seleccionar</option>
                                        <option value="1">UNAM</option>
                                        <option value="9">Otro</option>
                                    </select>
                                </div>
                                <div class="col-sm-1">
                                    <label for="sel1">Otro:</label>
                                </div>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="otro1" id="otro1" disabled />
                                </div>
                        </div>

                        <div class="row" style="margin-bottom:7px;">
                            <div class="col-sm-2">
                            <input type="hidden" name="nivel" />
                                    <label for="sel1">Nivel<span style="color:red;">*</span>:</label>
                                </div>
                                <div class="col-sm-4">
                                    <select class="form-control" name="nivel"> <?php echo $nivelErr;?>
                                        <option value="0">Seleccionar</option>
                                        <option value="1">1</option>
                                        <option value="9">Otro</option>
                                    </select>
                                </div>
                                <div class="col-sm-1">
                                    <label for="sel1">Otro:</label>
                                </div>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="otro1" id="otro1" disabled />
                                </div>
                        </div>
                                                          
                        <div class="row" style="margin-bottom:7px;">
                            <div class="col-sm-2">
                            <input type="hidden" name="carrera" />
                                    <label for="sel1">Carrera<span style="color:red;">*</span>:</label>
                                </div>
                                <div class="col-sm-4">
                                    <select class="form-control" name="carrera"> <?php echo $carreraErr;?>
                                        <option value="0">Seleccionar</option>
                                        <option value="1">1</option>
                                        <option value="9">Otro</option>
                                    </select>
                                </div>
                                <div class="col-sm-1">
                                    <label for="sel1">Otro:</label>
                                </div>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="otro1" id="otro1" disabled />
                                </div>
                        </div> 
                            
                            <div class="row" style="margin-top:7px;">
                                <div class="col-sm-2">
                                <label for="sel1">Forma de titulación<span style="color:red;">*</span>:</label>
                                </div>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="formaTitulacion" /><?php echo $formaTitulacionErr;?>
                                </div>        
                            </div>
                            
                            <div class="row" style="margin-top:7px;">
                                <div class="col-sm-2">
                                <label for="sel1">Titulo del trabajo<span style="color:red;">*</span>:</label>
                                
                                </div>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="tituloTrabajo" /><?php echo $tituloTrabajoErr;?>
                                </div>
                            </div>
                            
                            <div class="row" style="margin-top:7px;">
                                <div class="col-sm-2">
                                <label for="sel1">Nombre del alumno<span style="color:red;">*</span>:</label>
                                
                                </div>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="nomAlumno" /><?php echo $nomAlumnoErr;?>
                                </div>
                            </div>

                            <div class="row" style="margin-top:7px;">
                                <div class="col-sm-2">
                                <label for="sel1">Tipo de participación<span style="color:red;">*</span>:</label>
                                
                                </div>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="tipoParticipacion" /><?php echo $tipoParticipacionErr;?>
                                </div>
                            </div>

                            <div class="row" style="margin-bottom:7px;">
					            <div class="col-sm-2">
							    <label for="sel1">Fecha<span style="color:red;">*</span>:</label>
						        </div>
						        <div class="col-sm-9">
                                <input type="date" name="fecha"> <?php echo $fechaErr;?></span>	
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
                        </div>
                </div>
                <div class="col-sm-10">
                <button type="submit" class="btn btn-primary my-1">Agregar</button>
                </div>
            </form>
            
        </body>    
    </html>