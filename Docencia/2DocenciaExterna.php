
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
            $universidad = $facultad = $nivel = $carrera = $asignatura = "";
            $grupo = $semestre = $observaciones = "";
            $universidadErr = $facultadErr = $nivelErr = $carreraErr = $asignaturaErr = "";
            $grupoErr = $semestreErr = $observacionesErr = "";
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
                
                if (empty($_POST["asignatura"])) {
                    $asignaturaErr = "Asignatura es requerida";
                  } else {
                    //verificar el dato tenga las especificaciones adecuadas
                    $asignatura = test_input($_POST["asignatura"]);
                    if (!preg_match("/^[a-zA-Z0-9.]+$/",$asignatura)) {
                        $asignaturaErr = "Unicamente se permiten letras, números y espacios en blanco.";
                    }
                }
                
                if (empty($_POST["grupo"])) {
                    $grupoErr = "Grupo es requerido";
                  } else {
                    //verificar el dato tenga las especificaciones adecuadas
                    $grupo = test_input($_POST["grupo"]);
                    if (!preg_match("/^[a-zA-Z0-9.]+$/",$grupo)) {
                        $grupoErr = "Unicamente se permiten letras, números y espacios en blanco.";
                    }
                }
                
                if (empty($_POST["semestre"])) {
                    $semestreErr = "Semestre/año es requerido";
                  } else {
                    //verificar el dato tenga las especificaciones adecuadas
                    $semestre = test_input($_POST["semestre"]);
                    if (!preg_match("/^[a-zA-Z0-9.]+$/",$semestre)) {
                        $semestreErr = "Unicamente se permiten letras, números y espacios en blanco.";
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
        
            <h2>Registro de docencia externa</h2>
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
                                <label for="sel1">Nombre de la asignatura<span style="color:red;">*</span>:</label>
                                </div>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="asignatura" /><?php echo $asignaturaErr;?>
                                </div>        
                            </div>
                            
                            <div class="row" style="margin-top:7px;">
                                <div class="col-sm-2">
                                <label for="sel1">Clave grupo<span style="color:red;">*</span>:</label>
                                
                                </div>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="grupo" /><?php echo $grupoErr;?>
                                </div>
                            </div>
                            
                            <div class="row" style="margin-top:7px;">
                                <div class="col-sm-2">
                                <label for="sel1">Año/Semestre<span style="color:red;">*</span>:</label>
                                
                                </div>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="semestre" /><?php echo $semestreErr;?>
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