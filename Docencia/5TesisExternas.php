
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
            $universidad = $facultad = $nivel = $carrera = $nomAlumno = "";
            $titulo = $url = $anio = $tipoParticipacion = $obs = "";
            $universidadErr = $facultadErr = $nivelErr = $carreraErr = $nomAlumnoErr = "";
            $tituloErr = $urlErr = $anioErr = $tipoParticipacionErr = $obsErr = "";
            if($_SERVER["REQUEST_METHOD"] == "POST"){
                
                if (empty($_POST["universidad"])) {
                    $universidadErr = "Universidad es requerida";
                  } else {
                  $universidad = test_input($_POST["universidad"]);
                    if (! is_integer("universidad")) {
                        $universidadErr = "Unicamente se permiten números enteros.";
                    }
                }
                
                if (empty($_POST["facultad"])) {
                    $facultadErr = "Facultad es requerido";
                  } else {
                    //verificar el dato tenga las especificaciones adecuadas
                    $facultad = test_input($_POST["facultad"]);
                    if (!preg_match("/^[a-zA-Z-' ]*$/",$facultad)) {
                        $facultadErr = "Unicamente se permiten letras y espacios en blanco.";
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
                
                if (empty($_POST["nomAlumno"])) {
                    $nomAlumnoErr = "Nombre del alumno es requerido";
                  } else {
                    //verificar el dato tenga las especificaciones adecuadas
                    $nomAlumno = test_input($_POST["nomAlumno"]);
                    if (!preg_match("/^[a-zA-Z0-9.]+$/",$nomAlumno)) {
                        $nomAlumnoErr = "Unicamente se permiten letras, números y espacios en blanco.";
                    }
                }
                
                if (empty($_POST["titulo"])) {
                    $tituloErr = "Título es requerido";
                  } else {
                    //verificar el dato tenga las especificaciones adecuadas
                    $titulo = test_input($_POST["titulo"]);
                    if (!preg_match("/^[a-zA-Z0-9.]+$/",$titulo)) {
                        $tituloErr = "Unicamente se permiten letras, números y espacios en blanco.";
                    }
                }

                if (empty($_POST["url"])) {
                    $obs = "";
                  } else {
                    $obs = test_input($_POST["url"]);
                  }
                
                if (empty($_POST["anio"])) {
                    $anioErr = "Año es requerido";
                  } else {
                    //verificar el dato tenga las especificaciones adecuadas
                    $anio = test_input($_POST["anio"]);
                    if (! is_int("anio")) {
                        $anioErr = "Unicamente se permiten números.";
                    }
                }
                
                if (empty($_POST["obs"])) {
                    $obs = "";
                  } else {
                    $obs = test_input($_POST["obs"]);
                  }

                  if (empty($_POST["tipoParticipacion"])) {
                    $tipoParticipacionErr = "Tipo de participación es requerido";
                  } else {
                    $tipoParticipacion = test_input($_POST["tipoParticipacion"]);
                    if (! is_int("tipoParticipacion")) {
                        $tipoParticipacionErr = "Unicamente se permiten números.";
                    }
                }
            }

            function test_input($data) {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            }
            ?> 
        
            <h2>Registro de tesis externas</h2>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

                <div class="form-group">
						
                        <div class="row">
                            <div class="col-sm-12">
                            
                            <div class="row" style="margin-bottom:7px;">
                                <div class="col-sm-2">
                            <input type="hidden" name="universidad" />
                                    <label for="sel1">Universidad<span style="color:red;">*</span>:</label>
                                </div>
                                <div class="col-sm-4">
                                    <select class="form-control" name="universidad"> <?php echo $universidadErr;?>
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

                            <div class="row" style="margin-top:7px;">
									<div class="col-sm-2">
									  <label for="sel1">Facultad<span style="color:red;">*</span>:</label>
									</div>
									<div class="col-sm-10">
                                        <input type="text" class="form-control" name="facultad" /> <?php echo $facultadErr;?>
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
                                        <option value="1">Matemáticas</option>
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
                                <label for="sel1">Nombre del alumno<span style="color:red;">*</span>:</label>
                                </div>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="nomAlumno" /><?php echo $nomAlumnoErr;?>
                                </div>        
                            </div>
                            
                            <div class="row" style="margin-top:7px;">
                                <div class="col-sm-2">
                                <label for="sel1">Título del trabajo<span style="color:red;">*</span>:</label>
                                
                                </div>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="titulo" /><?php echo $tituloErr;?>
                                </div>
                            </div>

                            <div class="row" style="margin-top:7px;">
                                <div class="col-sm-2">
                                <label for="sel1">URL:</label>
                                
                                </div>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="url" />
                                </div>
                            </div>
                            
                            <div class="row" style="margin-top:7px;">
                                <div class="col-sm-2">
                                <label for="sel1">Año<span style="color:red;">*</span>:</label>
                                
                                </div>
                                <div class="col-sm-10">
                                    <input type="int" class="form-control" name="anio" /><?php echo $anioErr;?>
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

                            <div class="row" style="margin-bottom:7px;">
                            <div class="col-sm-2">
                            <input type="hidden" name="tipoParticipacion" />
                                    <label for="sel1">Tipo de participación<span style="color:red;">*</span>:</label>
                                </div>
                                <div class="col-sm-4">
                                    <select class="form-control" name="tipoParticipacion"> <?php echo $tipoParticipacionErr;?>
                                        <option value="0">Seleccionar</option>
                                        <option value="1">Asesor</option>
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
                        </div>
                </div>
                <div class="col-sm-10">
                <button type="submit" class="btn btn-primary my-1">Agregar</button>
                </div>
            </form>
            
        </body>    
    </html>